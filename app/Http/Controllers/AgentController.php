<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;
use App\Order;
use File;
use Validator;
use Response;
use Illuminate\Support\Facades\DB;
use App\GpsTracking;
class AgentController extends Controller
{
    public function __construct()
    {   
        $this->middleware('agent');
    }

    public function index()
    {
        // $file = File::files('2020-08-16.txt');
        // print_r($file);
        // exit;
        $data['title'] = 'Agent Dashboard';
        $data['start_pins'] = GpsTracking::where('created_at', '>=', date('Y-m-d').' 00:00:00')->orderBy('id', 'desc')->first();
        $data['gps_data'] = GpsTracking::where('created_at', '>=', date('Y-m-d').' 00:00:00')->limit(1)->orderBy('id', 'desc')->get();
        return view('agent.home', $data);
    }

    public function getLatitude()
    {
        $data = GpsTracking::where('created_at', '>=', date('Y-m-d').' 00:00:00')->orderBy('id', 'desc')->first();
        $locations = array('locations' => [array('latitude' => $data->latitude, 'longitude' => $data->longtitude)]);
        return json_encode($locations);
    }

    // Users Views
    public function addUser()
    {
        $data['title'] = 'Add User';
        return view('agent.users.addUser', $data);
    }
    
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
        
        $user = Order::create($data);
        $user_id = Order::latest()->first();
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
                    return redirect('/agent/manage-users')->with('success', 'User Successfully Created!');
                }   
    
            }
            else {
                return redirect('/agent/manage-users')->with('success', 'User Successfully Created!');
            }
            return redirect('/agent/manage-users')->with('success', 'User Successfully Created!');
        }
    }

    public function manageUsers()
    {
        $data['users'] = DB::table('users')->where('type', 'user')->where('extras->agent_details->agent_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        $data['title'] = 'Manage Users';
        return view('agent.users.manageUsers', $data);
    }

    public function editUser($id)
    {
        $users = User::find($id);
        if($users){
            $data['user'] = $users; 
            $data['title'] = 'Edit User';
            return view('agent.users.editUser', $data);
        }
        else{
            return redirect('/agent/manage-users')->with('error', 'Invalid User!');
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
            return redirect('/agent/manage-users')->with('success', 'User Successfully Updated!');
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
        return redirect('/agent/manage-users')->with('success', 'User Deleted Successfully!');
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
        return view('agent.settings.editProfile', $data);
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
            return redirect('/agent/dashboard')->with('success', 'Password Successfully updated!');
        }
        else{
            return redirect('/agent/edit-profile')->with('error', 'Invalid old password!');
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
            return redirect('/agent/dashboard')->with('success', 'Pin Number Successfully updated!');
        }
        else{
            return redirect('/agent/edit-profile')->with('error', 'Invalid old pin number!');
        }
        return $request->all();
    }

    ######## Order Module ########

    public function addOrder()
    {
        $data['title'] = 'Create Order';
        $data['settings'] =  DB::table('settings')->where('id','1')->first();
        /* $data['roles'] = Role::where('role', 'customercare')->where('status', '0')->get(); */
        return view('agent.orders.create-order', $data);
    }

    public function createOrder(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required|numeric|unique:users|digits_between:10,12',
            'pan' => 'required_without:aadhar|unique:users,pan',
            'aadhar' => 'required_without:pan|unique:users,aadhar',
            'address' => 'required',
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%#?&-+,.=(){}<>]/',
            'password_confirmation' => 'min:8',
            'pincode' => 'required|numeric|digits_between:6,8',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'aadhar_pic' => 'required|image|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);
        $user = User::select('id')->orderBy('id', 'desc')->first();
        if(!empty($user)){
            $userID = $user->id+1;
        }
        else{
            $userID = 1;
        }
        $role = Role::select('id')->where('role', 'customercare')->where('status', '0')->first(); 
        $uniqueID = str_pad($userID, 16, "CMC-917000000000", STR_PAD_LEFT);
        $newSupport = new User;
        $newSupport->profile_id = $uniqueID; 
        $newSupport->name = $request->name; 
        $newSupport->email = $request->email; 
        $newSupport->phone = $request->phone; 
        $newSupport->role = $role->id;
        if(!empty($request->pan))
        {
            $newSupport->pan = $request->pan; 
        }
        else
        {
            $newSupport->aadhar = $request->aadhar; 
        }
        $newSupport->password =  Hash::make($request->password);
        $newSupport->address = $request->address; 
        $newSupport->pincode = $request->pincode; 
        $newSupport->city = $request->city; 
        $newSupport->state = $request->state; 
        $newSupport->country = $request->country; 

        $image = $request->file('aadhar_pic');
        $newSupport->aadhar_pic = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/customercare/kyc');
        $newSupport->save();
        $image->move($destinationPath, $newSupport->aadhar_pic);
        return redirect('/agent/manage-customercare')->with('success', 'Customer Care Successfully Created!');
    }
    
    public function editOrder($id)
    {
        $customercare = User::find($id);
        
        if($customercare){
            $data['title'] = 'Edit Customer Care';
            $data['customercare'] = $customercare; 
            $data['roles'] = Role::where('role', 'customercare')->where('status', '0')->get();
            return view('admin.customer-care.edit-customercare', $data);
        }
        else{
            return redirect('/agent/manage-customercare')->with('error', 'Invalid Customer Care!');
        }
        
    }

    public function updateOrder(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|numeric|digits_between:10,12',
            'pan' => 'required_without:aadhar',
            'aadhar' => 'required_without:pan',
            'address' => 'required',
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%#?&-+,.=(){}<>]/',
            'password_confirmation' => 'min:8',
            'pincode' => 'required|numeric|digits_between:6,8',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'aadhar_pic' => 'image|mimes:jpeg,png,jpg,pdf|max:2048',
            'status' => 'required'
        ]);

        $customercare = User::find($id);
        if($customercare){
            $destinationPath = public_path('/customercare/kyc');

            $customercare->name = $request->name; 
            $customercare->email = $request->email; 
            $customercare->phone = $request->phone; 
            if(!empty($request->pan))
            {
                $customercare->pan = $request->pan; 
            }
            else
            {
                $customercare->aadhar = $request->aadhar; 
            }

            if ($request->hasFile('aadhar_pic')) {
                $image = $request->file('aadhar_pic');
                File::delete($destinationPath.'/'.$customercare->aadhar_pic);
                $customercare->aadhar_pic = time().'.'.$image->getClientOriginalExtension();
                $image->move($destinationPath, $customercare->aadhar_pic);
                
            }
            $customercare->password =  Hash::make($request->password);
            $customercare->address = $request->address; 
            $customercare->pincode = $request->pincode; 
            $customercare->city = $request->city; 
            $customercare->state = $request->state; 
            $customercare->country = $request->country; 
            $customercare->status = $request->status;
            $customercare->save();

                return redirect('/agent/manage-customercare')->with('success', 'Customer Care Successfully Updated!');
        }
            else{
            return redirect('/agent/'.$id.'/edit-customercare')->with('error', 'Invalid Customer Care!');
        }
    }


    public function manageOrders()
    {
        $data['customercares'] = User::select('r.id as role_id', 'r.name as role_name', 'users.*')->join('roles as r', 'r.id', '=', 'users.role')->where('r.role', 'customercare')->get();
        $data['title'] = 'Manage Customer Care';
        return view('agent.customer-care.manage-customercare', $data);
    }    
    
    ######## Order Module ########
    
}
