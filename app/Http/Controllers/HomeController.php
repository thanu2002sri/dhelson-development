<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

use App\Transaction;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function faq(){
        return view('faq');
    }

    public function terms_and_conditions(){
            return view('terms_and_conditions');
    }

     public function privacy_and_policy(){
                return view('privacy_and_policy');
     }
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $user = Auth::user();


        // // $count = $user->id;
        // // $count = $count_1+1;
        // // // str_pad(string,length,pad_string,pad_type)
        // // $unique_code = str_pad($count, 12, "917000000000", STR_PAD_LEFT);
        
        // // $count = $user->id;
        // // $count = '9170000'.$count+1;
        // // // str_pad(string,length,pad_string,pad_type)
        // // $code_no = str_pad($count, 8, "0", STR_PAD_LEFT);
        
        // // print_r($user->id);
        // // echo '<br>';
        // // print_r($code_no);
        
        // // echo '<br>';
        // // echo '<br>';
        // // echo '<br>';


        // $count_1 = '10000000';
        // // str_pad(string,length,pad_string,pad_type)
        // $code_nos = str_pad($count_1, 12, "917000000000", STR_PAD_LEFT);
        // print_r($count_1);
        // echo '<br>';
        // print_r($code_nos);

        
        // exit;
        return view('home');
    }

    public function admin(Request $req){
        return view('admin.wallet')->withMessage('Admin');
    }


    public function distributor(Request $req){
        return view('distributors.wallet')->withMessage('Distributor');
    }

    public function agent(Request $req){
        return view('agent.wallet')->withMessage('Agent');
    }


    public function user(Request $req){
        return view('user.wallet')->withMessage('User');
    }

    public function transactionDetails(){
        
        $data = DB::table('transaction')->select('transaction_id', 'receiver_details->sender_id as send-id', 'receiver_details->receiver_id as receiver-id', 'sender_details->before_amount as before-amount', 'sender_details->sent_amount as amount', 'sender_details->after_amount as after-amount', 'type', 'receiver_details->name as name', 'created_at as date')->where('sender_details->sender_id', '29')->where('created_at', 'like', '%2020-05-26%')->orderBy('created_at', 'DESC')->get();

        echo '<pre>';
        print_r($data);
        echo '<pre>';
    }

    public function spent()
    {
        $data = DB::table('transaction')->select('receiver_details->sender_id as send-id', 'receiver_details->receiver_id as receiver-id', 'sender_details->before_amount as before-amount', 'sender_details->sent_amount as amount', 'sender_details->after_amount as after-amount', 'type', 'receiver_details->name as name', 'created_at as date')->where('sender_details->sender_id', '108')->where('created_at', 'like', '%2020-04-15%')->orderBy('created_at', 'DESC')->get();

       /*  $data['before-amount'] = DB::table('transaction')->where('sender_details->sender_id', '108')->where('created_at', 'like', '%2020-04-15%')->sum('sender_details->before_amount');
        $data['amount'] = DB::table('transaction')->where('sender_details->sender_id', '108')->where('created_at', 'like', '%2020-04-15%')->sum('sender_details->sent_amount');
        $data['after-amount'] = DB::table('transaction')->where('sender_details->sender_id', '108')->where('created_at', 'like', '%2020-04-15%')->sum('sender_details->after_amount');
 */
        echo '<pre>';
        print_r($data);
        echo '<pre>';
        exit;
    }

    public function receive()
    {
        //$data = DB::table('transaction')->select('receiver_details->sender_id as send-id', 'receiver_details->receiver_id as receiver-id', 'receiver_details->before_amount as before-amount', 'receiver_details->received_amount as amount', 'receiver_details->after_amount as after-amount', 'type', 'receiver_details->name as name', 'created_at as date')->where('receiver_details->receiver_id', '108')->where('created_at', 'like', '%2020-04-15%')->orderBy('created_at', 'DESC')->get();
        //$data = DB::table('transaction')->paginate(10);

       /*  $data['before-amount'] = DB::table('transaction')->where('sender_details->sender_id', '108')->where('created_at', 'like', '%2020-04-15%')->sum('sender_details->before_amount');
        $data['amount'] = DB::table('transaction')->where('sender_details->sender_id', '108')->where('created_at', 'like', '%2020-04-15%')->sum('sender_details->sent_amount');
        $data['after-amount'] = DB::table('transaction')->where('sender_details->sender_id', '108')->where('created_at', 'like', '%2020-04-15%')->sum('sender_details->after_amount');
 */
$records = array(); 
Transaction::chunk(200, function($transactions) {
    foreach($transactions as $transaction) {
        //$records[] = $transaction;
        print_r($transaction);
    }
});

//print_r($records);
exit;
$debit = "DR";
        $credit = "CR";
            $transactions = DB::table('transaction')->select('receiver_details->before_amount as pre_balance', 'sender_details->sender_id as sender_id', 'receiver_details->receiver_id as receiver_id', 'receiver_details->date as receiver_date', 'receiver_details->phone as receiver_phone', 'receiver_details->name as receiver_name', 'receiver_details->after_amount as balance', 'receiver_details->received_amount as receive_amount', 'type', 'status', 'transaction_id', 'sender_details->before_amount as before_balance', 'receiver_details->date as sender_date', 'sender_details->name as sender_name', 'sender_details->after_amount as after_balance', 'sender_details->sent_amount as sent_amount', 'sender_details->phone as sender_phone', 'status_two')->orderBy('id', 'DESC')->get()->chunk(100);
            
          /*   print_r($transactions);
            exit; */
            foreach($transactions as $lists)
            
                        {
                            /* $senderProfileID = DB::table('users')->select('user_id as sender_id')->where('id', $lists->sender_id)->where('type', '!=', 'admin')->first();
                            $receiverProfileID = DB::table('users')->select('user_id as receiver_id')->where('id', $lists->receiver_id)->where('type', '!=', 'admin')->first(); */
                            $senderProfileID = DB::table('users')->select('user_id as sender_id')->where('id', $lists->sender_id)->first();
                            $receiverProfileID = DB::table('users')->select('user_id as receiver_id')->where('id', $lists->receiver_id)->first();
                            if(!empty($senderProfileID) && !empty($receiverProfileID))
                            {
                                if(!empty($lists->type) && ($lists->type=='ETISALAT-E-VOUCHER' || $lists->type=='DU-E-VOUCHER' || $lists->type=='SUPER-E'))
                                {
                                    $receiver_phone = '-';
                                    $receiver_name = '-';
                                    $product_name = $lists->receiver_name;
                                }
                                else{
                                    $receiver_phone = $lists->receiver_phone;
                                    $receiver_name = $lists->receiver_name;
                                    $product_name = '-';
                                }
                                //  && $lists->type=='DU-E-VOUCHER' && $lists->type=='ETISALAT-E-TOPUP'
                                
                                $listsCount[] = array(
                                    'transaction_id' => $lists->transaction_id,
                                    'type' => $lists->type,
                                    'product_name' => $product_name,
                                    'status' => $lists->status,
                                    'user_id' => $senderProfileID->sender_id,
                                    'sender_phone' => $lists->sender_phone,
                                    'ser_name' => $lists->sender_name,
                                    'receiver_phone' => $receiver_phone,
                                    'recendeiver_name' => $receiver_name,
                                    'pre_balance' => round($lists->before_balance, 2),
                                    'balance' => round($lists->after_balance, 2),
                                    'sent_amount' => round($lists->sent_amount, 2),
                                    'date' => $lists->sender_date,
                                    'debit' => $debit,
                                    'status' => $lists->status_two
                                );
                                $listsCount[] = array(
                                                    'transaction_id' => $lists->transaction_id,
                                                    'type' => $lists->type,
                                                    'product_name' => $product_name,
                                                    'status' => $lists->status,
                                                    'user_id' => $receiverProfileID->receiver_id,
                                                    'sender_phone' => $lists->sender_phone,
                                                    'sender_name' => $lists->sender_name,
                                                    'receiver_phone' => $receiver_phone,
                                                    'receiver_name' => $receiver_name,
                                                    'pre_balance' => round($lists->pre_balance, 2),
                                                    'balance' => round($lists->balance, 2),
                                                    'receive_amount' => round($lists->receive_amount, 2),
                                                    'date' => $lists->receiver_date,
                                                    'credit' => $credit,
                                                    'status' => $lists->status_two
                                                );
                            }
                            
                            
                        }
                        $data['transactionDetails'] = $listsCount;

        echo '<pre>';
        print_r($data);
        echo '<pre>';
        exit;
    }

    
}
