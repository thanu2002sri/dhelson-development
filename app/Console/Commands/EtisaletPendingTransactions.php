<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use App\User;
use Validator;

class EtisaletPendingTransactions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pending:transactions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Etisalet pending transaction amount revert to all users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function topUpStatus($tid)
    {
        // $tid = 1009296033;
 
         date_default_timezone_set('Asia/Dubai');
 
         $d = date('Y-m-d');
         $t = date('H:i:s');
         $c = date("H:i:s", strtotime($t) - 8);
         $dt = $d.'T'.$c.'.400+0400';
 
         //$data = 'POST/restcon/rest/pos/1576530001/topup/{"destMsisdn":"971502801246","amount":1,"externalField1":"","externalField2":"","externalField3":"","externalField4":"","externalField5":"","externalField6":""}secretWord=123456789api-request-merchantid006541971api-request-timestamp'.$dt;
 
         $data = 'POST/restcon/rest/pos/1576530001/topupconfirm{"confirm":"true","txnId":"'.$tid.'"}secretWord=123456789api-request-merchantid006541971api-request-timestamp'.$dt;
        
        $fp = fopen("".asset('private_keys/topup_status_private_key.pem')."", "r");
        $priv_key = fread($fp, 8192);
        fclose($fp);
        $private_key = openssl_get_privatekey($priv_key); 
 
         $binary_signature = "";
 
         $algo = "SHA256";
         //$algo = "SHA1";
         openssl_sign($data, $binary_signature, $private_key, $algo);
         //print(base64_encode($binary_signature) ."\n");
         //die;
         $sig = base64_encode($binary_signature);
         $dta = array("confirm" => "true","txnId" => "$tid");
         $postdata = json_encode($dta);
 
 
         $url = "https://86.96.242.180/restcon/rest/pos/1576530001/topupconfirm";
         $ch=curl_init($url);
         curl_setopt_array($ch, array(
             CURLOPT_POST => true,
             CURLOPT_POSTFIELDS => $postdata,
             CURLOPT_HEADER => false,
             CURLOPT_SSL_VERIFYHOST => 0,
             CURLOPT_SSL_VERIFYPEER => false,
             CURLOPT_VERBOSE => 0,
             CURLOPT_RETURNTRANSFER => true,
             CURLOPT_HTTPHEADER => array('Content-Type:application/json','api-request-merchantId:006541971','api-request-timestamp:'.$dt,'api-request-channel: MERCHANT_POS','api-operation-signature:'.$sig)
         ));
         $result = curl_exec($ch);
         curl_close($ch);
         $response = json_decode($result, true);
         if(!empty($response['status']) && $response['status'] =='SUCCESS')
         {
            return $response['status'] = 'SUCCESS'; 
         }
         else
         {
            return 'FAIL';
         }        
    }

    public function handle()
    {
       $pending_transactions = array();
       $pending_transactions = DB::table('etisalat_transactions')->where('status', 'PENDING')->get();
       if(!empty($pending_transactions) && $pending_transactions->count() > 0)
       {
            // Transaction Admin insert data 
            $txn_id = str_pad(mt_rand(1,99999999999999999),16,'0',STR_PAD_LEFT);
            foreach($pending_transactions as $pending_transaction)
            {
                //$status = $this->topUpStatus($pending_transaction->reponse_txn_id);
                $status = 'FAIL';
                if(!empty($status) && $status!='FAIL')
                {

                    $updateTxn['response_time'] = date('d-m-Y H:i:s');
                    $updateTxn['status'] = 'SUCCESS';
                    $update_txn['status_two'] = 'SUCCESS';
                    //$cms_txn_update['status'] = 'SUCCESS';
                    $cms_txn_update['response_time'] = date('d-m-Y H:i:s');
                    DB::table('service_commission_reports')->where('txn_id', $pending_transaction->txn_id)->update($updateTxn); 
                    DB::table('etisalat_transactions')->where('txn_id', $pending_transaction->txn_id)->update($updateTxn);
                    DB::table('transaction')->where('transaction_id', $pending_transaction->txn_id)->update($update_txn);
                    return response()->json([
                        'success' => 'TRUE',
                        'message' => 'Recharge  was Successful!'
                    ], 200);
                }
                else
                {
                    $cms_new_transactions = DB::table('transaction as t')->select('t.transaction_id', 't.distributor_id', 't.agent_id', 't.user_id', 't.sender_details->sender_id as sender_id', 't.sender_details->name as sender_name', 't.sender_details->phone as sender_phone', 't.sender_details->sent_amount as sender_sent_amount', 't.type', 't.receiver_details->receiver_id as receiver_id', 't.receiver_details->name as receiver_name', 't.receiver_details->phone as receiver_phone', 't.receiver_details->received_amount as receiver__received_amount', 'u.total_commission as total_commission')->join('users as u', 'u.id', '=', 't.receiver_details->receiver_id')->where('t.transaction_id', $pending_transaction->txn_id)->where('t.status_two', 'PENDING')->where('t.type', 'ETISALAT-E-TOPUP-COMMISSION')->get();
                    
                    if(!empty($cms_new_transactions))
                    {
                        foreach($cms_new_transactions as $cms_new_transaction)
                        {

                            $AdminSeTr['sender_id'] = $cms_new_transaction->receiver_id;
                            $AdminSeTr['receiver_id'] = $cms_new_transaction->sender_id;
                            $AdminSeTr['name'] = $cms_new_transaction->receiver_name;  
                            $AdminSeTr['phone'] = $cms_new_transaction->receiver_phone;  
                            $AdminSeTr['after_amount'] = ($cms_new_transaction->total_commission - $cms_new_transaction->receiver__received_amount);
                            $AdminSeTr['before_amount'] = $cms_new_transaction->total_commission;
                            $AdminSeTr['sent_amount'] = $cms_new_transaction->receiver__received_amount;
                            $AdminSeTr['date'] = date('d-m-Y H:i:s');

                            $AdminReTr['receiver_id'] = $cms_new_transaction->sender_id;
                            $AdminReTr['sender_id'] = $cms_new_transaction->receiver_id;
                            $AdminReTr['name'] = $cms_new_transaction->sender_name;
                            $AdminReTr['phone'] = $cms_new_transaction->sender_phone; 
                            $AdminReTr['before_amount'] = 0;
                            $AdminReTr['received_amount'] = $cms_new_transaction->receiver__received_amount; 
                            $AdminReTr['after_amount'] = 0;
                            $AdminReTr['date'] = date('d-m-Y H:i:s');
                            
                            $admTransactions['distributor_id'] = $cms_new_transaction->distributor_id;
                            $admTransactions['agent_id'] = $cms_new_transaction->agent_id;
                            $admTransactions['user_id'] = $cms_new_transaction->user_id;
                            $admTransactions['product_id'] = 0;
                            $admTransactions['amount'] = 0;
                            $admTransactions['sender_details'] = json_encode($AdminSeTr); 
                            $admTransactions['receiver_details'] = json_encode($AdminReTr);
                            $admTransactions['transaction_id'] = $txn_id;
                            $admTransactions['status'] = 'receive';
                            $admTransactions['status_two'] = 'REFUND';
                            $admTransactions['type'] = $cms_new_transaction->type;
                            DB::table('transaction')->insert($admTransactions);
                            $adminUpdate['total_commission'] = ($cms_new_transaction->total_commission - $cms_new_transaction->receiver__received_amount);
                            DB::table('users')->where('id', $cms_new_transaction->receiver_id)->update($adminUpdate);

                            $response_time = (int) (microtime(true) * 1000000);
                            $log = logData($request, json_encode($admTransactions), $txn_id, 'ETISALAT-E-TOPUP', 'REFUND', 'ONLINE', $response_time);
                            $name = str_replace(' ', '-', $cms_new_transaction->receiver_name);
                            putLogData('etisalatTopUp', 'users/'.strtolower($name).'-'.$cms_new_transaction->receiver_id.'-'.date("Y-m-d").'.json', $log);

                        }
                    }

                    $new_transactions = DB::table('transaction as t')->select('t.transaction_id', 't.distributor_id', 't.agent_id', 't.user_id', 't.sender_details->sender_id as sender_id', 't.sender_details->name as sender_name', 'u.phone as sender_phone', 't.sender_details->sent_amount as sender_sent_amount', 't.receiver_details->receiver_id as receiver_id', 't.receiver_details->name as receiver_name', 't.receiver_details->phone as receiver_phone', 't.receiver_details->received_amount as receiver__received_amount', 't.type as type', 'u.id as id', 'u.wallet_balance as wallet_balance')->join('users as u', 'u.id', '=', 't.sender_details->sender_id')->where('t.transaction_id', $pending_transaction->txn_id)->where('t.status_two', 'PENDING')->where('t.type', 'ETISALAT-E-TOPUP')->get();
                   
                    if(!empty($new_transactions))
                    {
                        foreach($new_transactions as $new_transaction)
                        {

                            $UserSeTr['sender_id'] = $new_transaction->receiver_id;
                            $UserSeTr['receiver_id'] = $new_transaction->sender_id;
                            $UserSeTr['name'] = $new_transaction->receiver_name;  
                            $UserSeTr['phone'] = $new_transaction->receiver_phone;  
                            $UserSeTr['after_amount'] = 0;
                            $UserSeTr['before_amount'] = 0;
                            $UserSeTr['sent_amount'] = $new_transaction->sender_sent_amount;
                            $UserSeTr['date'] = date('d-m-Y H:i:s');

                            $UserReTr['receiver_id'] = $new_transaction->sender_id;
                            $UserReTr['sender_id'] = $new_transaction->receiver_id;
                            $UserReTr['name'] = $new_transaction->sender_name;
                            $UserReTr['phone'] = $new_transaction->sender_phone; 
                            $UserReTr['before_amount'] = $new_transaction->wallet_balance;
                            $UserReTr['received_amount'] = $new_transaction->sender_sent_amount; 
                            $UserReTr['after_amount'] = ($new_transaction->wallet_balance + $new_transaction->sender_sent_amount);
                            $UserReTr['date'] = date('d-m-Y H:i:s');
                            
                            $usrTransactions['distributor_id'] = $new_transaction->distributor_id;
                            $usrTransactions['agent_id'] = $new_transaction->agent_id;
                            $usrTransactions['user_id'] = $new_transaction->user_id;
                            $usrTransactions['product_id'] = 0;
                            $usrTransactions['amount'] = 0;
                            $usrTransactions['sender_details'] = json_encode($UserSeTr); 
                            $usrTransactions['receiver_details'] = json_encode($UserReTr);
                            $usrTransactions['transaction_id'] = $txn_id;
                            $usrTransactions['status'] = 'receive';
                            $usrTransactions['status_two'] = 'REFUND';
                            $usrTransactions['type'] = $new_transaction->type;
                            //print_r($usrTransactions);
                            DB::table('transaction')->insert($usrTransactions);
                            $usrUpdate['wallet_balance'] = ($new_transaction->wallet_balance + $new_transaction->sender_sent_amount);
                            DB::table('users')->where('id', $new_transaction->receiver_id)->update($usrUpdate);

                            $response_time = (int) (microtime(true) * 1000000);
                            $log = logData($request, json_encode($usrTransactions), $txn_id, 'ETISALAT-E-TOPUP', 'REFUND', 'ONLINE', $response_time);
                            $name = str_replace(' ', '-', $new_transaction->receiver_name);
                            putLogData('etisalatTopUp', 'users/'.strtolower($name).'-'.$new_transaction->receiver_id.'-'.date("Y-m-d").'.json', $log);

                            
                        }
                    }
                    $updateTxn['response_time'] = date('d-m-Y H:i:s');
                    $updateTxn['status'] = 'FAIL';
                    $update_txn['status_two'] = 'FAIL';
                    DB::table('service_commission_reports')->where('txn_id', $pending_transaction->txn_id)->update($updateTxn); 
                    DB::table('etisalat_transactions')->where('txn_id', $pending_transaction->txn_id)->update($updateTxn);
                    DB::table('transaction')->where('transaction_id', $pending_transaction->txn_id)->update($update_txn);
                    return response()->json([
                        'success' => 'TRUE',
                        'message' => 'Recharge Refund Amount Initiated!'
                    ], 200);
 
                }
                
            }
            
            
       }
       return false;
    }
    
}

