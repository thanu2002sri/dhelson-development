<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;
use File;
use Validator;
use Response;
use Illuminate\Support\Facades\DB;
class CustomerCareController extends Controller
{
    public function __construct()
    {   
        $this->middleware('customercare');
    }

    public function index()
    {
        $data['title'] = 'Customer Care Dashboard';
        return view('customercare.home', $data);
    }

    // Users Views
   
    
    public function createUser(Request $request)
    {

        $input = array();
        $user = User::latest()->first();
        if(!empty($user)){
            $userID = $user->id+1;
        }
        else{
            $userID = 1;
        }
        // str_pad(string,length,pad_string,pad_type)
        $uniqueID = str_pad($userID, 16, "USR-917000000000", STR_PAD_LEFT);
        
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required|numeric|unique:users|digits_between:10,12',
            'email' => 'required|unique:users,email',
            'security_question' => 'required',
            'security_answer' => 'required',
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%#?&-+,.=(){}<>]/',
            'password_confirmation' => 'min:8',
            'transaction_pin' => 'numeric|digits:4|min:4|required_with:confirm_transaction_pin|same:confirm_transaction_pin',
            'confirm_transaction_pin' => 'min:4',
            'kyc_id' => 'required|numeric|unique:users,kyc_id|digits:15',
            'kyc_expiry_date' => 'required|date_format:d-m-Y',
            'kyc_file_front' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'kyc_file_back' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);
        // print_r($request->all());
        // exit;
        $kyc_file_front = $request->file('kyc_file_front');
        $kyc_file_back = $request->file('kyc_file_back');
        $input['kyc_file_front'] = 'front-'.time().'.'.$kyc_file_front->getClientOriginalExtension();
        $input['kyc_file_back'] = 'back-'.time().'.'.$kyc_file_back->getClientOriginalExtension();
        $destinationPath = public_path('/user/kyc');
        $data = $request->all();
       
        // KYC Details
        $kyc_details['kyc_file_front'] = $input['kyc_file_front'];
        $kyc_details['kyc_file_back'] = $input['kyc_file_back'];
        $kyc_details['kyc_expiry_date'] = date("Y-m-d", strtotime($data['kyc_expiry_date'])); 

        $data['type'] = 'user';
        $data['kyc_id'] = $data['kyc_id'];
        $data['user_id'] = $uniqueID;
        $data['api_token'] = str_random(100);
        $data['password'] = Hash::make($data['password']);
        $data['transaction_pin'] = Hash::make($data['transaction_pin']);
        $data['kyc_start_date'] = date('Y-m-d');
        $data['kyc_expiry_date'] = $kyc_details['kyc_expiry_date'];
        $kyc_start = date('Y-m-d');   
        $kyc_expiry = $kyc_details['kyc_expiry_date'];
        $data['kyc_days'] = (dateDiffInDays($kyc_start, $kyc_expiry) + 1);
        // Distributor Details
        $distributor_details['agent_id'] = Auth::user()->id;
         
        // Security Question && Answer Details
        $q_a['security_question'] = $data['security_question'];
        $q_a['security_answer'] = $data['security_answer'];
        

        $data['extras'] = json_encode(array(
                            'kyc_details' => $kyc_details,
                            'security_details' => $q_a,
                            'agent_details' => $distributor_details
                          ));
        $user = User::create($data);
        $user_id = User::latest()->first();
        if($user) {
            $kyc_file_front->move($destinationPath, $input['kyc_file_front']);
            $kyc_file_back->move($destinationPath, $input['kyc_file_back']);
            $get_settings = DB::table('settings')->first();
            $comission = User::select('extras->commission_details->flat_rate_for_registration as registration_comission', 'extras->distributor_details->distributor_id as distributor_id')->where('id', Auth::user()->id)->first();

            if($comission->count() >= 1){
                if($comission->registration_comission >= 1)
                {
                        $distributorDetails = User::select('id', 'phone', 'name', 'wallet_balance', 'total_commission')->where('id', $comission->distributor_id)->first();
                        
                        $transactions['transaction_id'] = str_pad(mt_rand(1,99999999999999999),16,'0',STR_PAD_LEFT);
                        // Sender Details adding in transaction table -> sender_details

                        $sender['sender_id'] = $distributorDetails->id;
                        $sender['receiver_id'] = Auth::user()->id;
                        $sender['name'] = $distributorDetails->name; 
                        $sender['phone'] = $distributorDetails->phone;  
                        $sender['sent_amount'] = number_format($comission->registration_comission, 2, '.', '');
                        $sender['after_amount'] = number_format($distributorDetails->total_commission, 2, '.', '');
                        $sender['before_amount'] = number_format($distributorDetails->total_commission, 2, '.', '');
                        $sender['date'] = date('d-m-Y H:i:s');

                        $receiver['receiver_id'] = Auth::user()->id;
                        $receiver['sender_id'] = $distributorDetails->id;
                        $receiver['name'] = Auth::user()->name;
                        $receiver['phone'] = Auth::user()->phone; 
                        $receiver['before_amount'] = number_format(Auth::user()->total_commission, 2, '.', '');
                        $receiver['received_amount'] = number_format($comission->registration_comission, 2, '.', '');
                        $receiver['after_amount'] = number_format((Auth::user()->total_commission + $comission->registration_comission), 2, '.', ''); 
                        $receiver['date'] = date('d-m-Y H:i:s'); 
                        
                        $transactions['distributor_id'] = $this->getDistributorID(Auth::user()->id); 
                        $transactions['agent_id'] = Auth::user()->id; 
                        $transactions['user_id'] = $user_id->id;
                        $transactions['product_id'] = 0;
                        $transactions['amount'] = 0;

                        $transactions['status'] = 'receive'; 
                        $transactions['type'] = 'REGISTRATION-COMMISSION';  
                        $transactions['commission'] = number_format($comission->registration_comission, 2, '.', '');
                        
                        $transactions['sender_details'] = json_encode($sender); 
                        $transactions['receiver_details'] = json_encode($receiver);

                        $transaction = DB::table('transaction')->insert($transactions);

                        $registrationCommission['total_commission'] = (Auth::user()->total_commission + $comission->registration_comission);
                        $registrationCommission['registration_commission'] = (Auth::user()->registration_commission + $comission->registration_comission);
                        //$registrationCommission['wallet_balance'] = (Auth::user()->wallet_balance + $comission->registration_comission);
                        User::where('id', Auth::user()->id)->update($registrationCommission);
                }   
                else{
                    return redirect('/customercare/manage-users')->with('success', 'User Successfully Created!');
                }   
    
            }
            else {
                return redirect('/customercare/manage-users')->with('success', 'User Successfully Created!');
            }
            return redirect('/customercare/manage-users')->with('success', 'User Successfully Created!');
        }
    }

    public function manageUsers()
    {
        $data['users'] = DB::table('users')->where('type', 'user')->where('extras->agent_details->agent_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        $data['title'] = 'Manage Users';
        return view('customercare.users.manageUsers', $data);
    }

    public function editUser($id)
    {
        $users = User::find($id);
        if($users){
            $data['user'] = $users; 
            $data['title'] = 'Edit User';
            return view('customercare.users.editUser', $data);
        }
        else{
            return redirect('/customercare/manage-users')->with('error', 'Invalid User!');
        }
        
    }

    public function updateUser(Request $request)
    {
        
        $input = array();
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required|numeric|unique:users|digits_between:10,12',
            'email' => 'required|unique:users|email:filter',
            'security_question' => 'required',
            'security_answer' => 'required',
            'kyc_file' => 'required|image|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);
        
        $image = $request->file('kyc_file');
        $input['kyc_file'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/user/kyc');
        $data = $request->all();
        $update_data['name'] = $data['name'];
        $update_data['phone'] = $data['phone'];
        $update_data['email'] = $data['email'];
        // Distributor Details
        $distributor_details['sp_id'] = Auth::user()->id;
        // KYC Details
        $kyc_details['kyc_file'] = $input['kyc_file'];
        // Security Question && Answer Details
        $q_a['security_question'] = $data['security_question'];
        $q_a['security_answer'] = $data['security_answer'];

        $update_data['extras'] = json_encode(array(
                            'kyc_details' => $kyc_details,
                            'security_details' => $q_a,
                            'sp_details' => $distributor_details
                          ));
        // print_r($data['email']);
        // exit;
        $userDetails = User::select('extras')->where('email', $data['email'])->get();      
        DB::table('users')->where('email', $data["email"])->update($update_data);
        if($userDetails) {
            $image->move($destinationPath, $input['kyc_file']);
            
            // Get current image of user, then delete it
            File::delete($destinationPath.'/'.json_decode($userDetails[0]->extras)->kyc_details->kyc_file);
            return redirect('/customercare/manage-users')->with('success', 'User Successfully Updated!');
        }
        return $request->all();
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        // Get current image of user, then delete it
        $delete_file = public_path('/user/kyc');
        File::delete($delete_file.'/'.json_decode($user->extras)->kyc_details->kyc_file);
        $user->delete();
        return redirect('/customercare/manage-users')->with('success', 'User Deleted Successfully!');
    }


    public function getUserDetails(Request $request)
    {   
        
        $validator = Validator::make($request->all(), [
            'phone' => 'required|numeric|digits_between:10,12'
        ]);
        
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        $userData = User::select('id', 'type', 'name', 'email', 'phone','wallet_balance')->where('phone', $request->phone)->first();
        
        if(!empty($userData->type) && $userData->type != 'distributor')
        {
            if($request->phone==Auth::user()->phone)
            {
                return response()->json(['errors'=> ['You can\'t send money to yourself!']]);
            }
            else
            {
                if($userData){
                    $kyc = User::select('id', 'name', 'email', 'phone','wallet_balance')->where('id', $userData->id)->where('kyc_status', 'APPROVED')->first();
                    if($kyc)
                    {
                        return response()->json(['success' => $userData]);
                    }
                    else {
                        return response()->json(['errors'=> ['KYC PENDING']]);
                    }   
                    
                }
                else{
                    return response()->json(['errors'=> ['Invalid phone number']]);
                } 
            }
        }
        else
        {
            return response()->json(['errors'=> ['You can\'t send money to the Distributor!']]);
        }
    }
    
    // Settings View
    public function editProfile()
    {
        $data['title'] = 'Edit Profile';
        return view('customercare.settings.editProfile', $data);
    }

    public function resetPassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'min:8|required|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%#?&-+,.=(){}<>]/',
            'new_password' => 'min:8|required_with:confirm_password|same:confirm_password|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%#?&-+,.=(){}<>]/',
            'confirm_password' => 'min:8'
        ]);
        $data = $request->all();
        $password = User::where('id', Auth::user()->id)->first('password');
        if (Hash::check($data['old_password'], $password->password)) { 
            $newPassword['password'] = Hash::make($data['new_password']);
            User::where('id', Auth::user()->id)->update($newPassword);
            return redirect('/customercare/dashboard')->with('success', 'Password Successfully updated!');
        }
        else{
            return redirect('/customercare/edit-profile')->with('error', 'Invalid old password!');
        }
        return $request->all();
    }

    public function resetPin(Request $request)
    {
        $this->validate($request, [
            'old_pin' => 'required|numeric|digits:4',
            'new_pin' => 'numeric|digits:4|min:4|required_with:confirm_pin|same:confirm_pin',
            'confirm_pin' => 'min:4', 
        ]);
        $data = $request->all();
        $transaction_pin = User::where('id', Auth::user()->id)->first('transaction_pin');
        if (Hash::check($data['old_pin'], $transaction_pin->transaction_pin)) { 
            $newPassword['transaction_pin'] = Hash::make($data['new_pin']);
            User::where('id', Auth::user()->id)->update($newPassword);
            return redirect('/customercare/dashboard')->with('success', 'Pin Number Successfully updated!');
        }
        else{
            return redirect('/customercare/edit-profile')->with('error', 'Invalid old pin number!');
        }
        return $request->all();
    }
    public function addUser()
    {
        $data['title'] = "Booking / New Orders";
        $data['settings'] = DB::table('settings')->first();
        return view('customercare.orders.create-order', $data);
    }
    
}
