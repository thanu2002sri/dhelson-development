<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;
use App\Role;
use File;
use Validator;
use Response;
use Illuminate\Support\Facades\DB;
use DataTables;
use App\Branch;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        
        $data['title'] = 'Admin Dashboard';
        $data['branch_count'] = Branch::count();
        $data['agent_count'] = User::join('roles as r', 'r.id', '=', 'users.role')->where('r.role', 'agent')->count();
        $data['incharge_count'] = User::join('roles as r', 'r.id', '=', 'users.role')->where('r.role', 'incharge')->count();
        $data['guard_count'] = User::join('roles as r', 'r.id', '=', 'users.role')->where('r.role', 'guard')->count();
        $data['customercare_count'] = User::join('roles as r', 'r.id', '=', 'users.role')->where('r.role', 'customercare')->count();
        return view('admin.home', $data);
    }

    public function valid_email($str) {
        return (!preg_match("/^([a-z0-9\+\-]+)(\.[a-z0-9\+\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
    }
    
    ######## Agend Module ########

    public function addAgent()
    {
        $data['title'] = 'Create Agent';
        $data['roles'] = Role::where('role', 'agent')->where('status', '0')->get();
        return view('admin.agents.create-agent', $data);
    }

    public function createAgent(Request $request)
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
        $role = Role::select('id')->where('role', 'agent')->where('status', '0')->first(); 
        $uniqueID = str_pad($userID, 16, "AGT-917000000000", STR_PAD_LEFT);
        $newAgent = new User;
        $newAgent->profile_id = $uniqueID; 
        $newAgent->name = $request->name; 
        $newAgent->email = $request->email; 
        $newAgent->phone = $request->phone; 
        $newAgent->role = $role->id;
        if(!empty($request->pan))
        {
            $newAgent->pan = $request->pan; 
        }
        else
        {
            $newAgent->aadhar = $request->aadhar; 
        }
        $newAgent->password =  Hash::make($request->password);
        $newAgent->address = $request->address; 
        $newAgent->pincode = $request->pincode; 
        $newAgent->city = $request->city; 
        $newAgent->state = $request->state; 
        $newAgent->country = $request->country; 

        $image = $request->file('aadhar_pic');
        $newAgent->aadhar_pic = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/agent/kyc');
        $newAgent->save();
        $image->move($destinationPath, $newAgent->aadhar_pic);
        return redirect('/admin/manage-agents')->with('success', 'Agent Successfully Created!');
    }
    
    public function editAgent($id)
    {
        $agent = User::find($id);
        
        if($agent){
            $data['title'] = 'Edit Agent';
            $data['agent'] = $agent; 
            $data['roles'] = Role::where('role', 'agent')->where('status', '0')->get();
            return view('admin.agents.edit-agent', $data);
        }
        else{
            return redirect('/admin/manage-agents')->with('error', 'Invalid Agent!');
        }
        
    }

    public function updateAgent(Request $request, $id)
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

        $agent = User::find($id);
        if($agent){
            $destinationPath = public_path('/agent/kyc');

            $agent->name = $request->name; 
            $agent->email = $request->email; 
            $agent->phone = $request->phone; 
            if(!empty($request->pan))
            {
                $agent->pan = $request->pan; 
            }
            else
            {
                $agent->aadhar = $request->aadhar; 
            }

            if ($request->hasFile('aadhar_pic')) {
                $image = $request->file('aadhar_pic');
                File::delete($destinationPath.'/'.$agent->aadhar_pic);
                $agent->aadhar_pic = time().'.'.$image->getClientOriginalExtension();
                $image->move($destinationPath, $agent->aadhar_pic);
                
            }
            $agent->password =  Hash::make($request->password);
            $agent->address = $request->address; 
            $agent->pincode = $request->pincode; 
            $agent->city = $request->city; 
            $agent->state = $request->state; 
            $agent->country = $request->country; 
            $agent->status = $request->status;
            $agent->save();

             return redirect('/admin/manage-agents')->with('success', 'Agent Successfully Updated!');
        }
         else{
            return redirect('/admin/'.$id.'/edit-agent')->with('error', 'Invalid Agent!');
        }
    }
    
    public function deleteAgent($id)
    {
        /* print_r($id);
        exit; */
        $agent = User::find($id);
        $delete_file = public_path('/agent/kyc');
        File::delete($delete_file.'/'.$agent->aadhar_pic);
        $agent->delete();
        return redirect('/admin/manage-agents')->with('success', 'Agent Deleted Successfully!');
    }
    
    
    public function manageAgents()
    {
        $data['agents'] = User::select('r.id as role_id', 'r.name as role_name', 'users.*')->join('roles as r', 'r.id', '=', 'users.role')->where('r.role', 'agent')->get();
        $data['title'] = 'Manage Agents';
        return view('admin.agents.manage-agents', $data);
    }    

    ######## Agend Module ########


    ######## Incharge Module ########

    public function addIncharge()
    {
        $data['title'] = 'Create Incharge';
        $data['roles'] = Role::where('role', 'incharge')->where('status', '0')->get();
        return view('admin.incharge.create-incharge', $data);
    }

    public function createIncharge(Request $request)
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
        $role = Role::select('id')->where('role', 'incharge')->where('status', '0')->first(); 
        $uniqueID = str_pad($userID, 16, "INC-917000000000", STR_PAD_LEFT);
        $newIncharge = new User;
        $newIncharge->profile_id = $uniqueID; 
        $newIncharge->name = $request->name; 
        $newIncharge->email = $request->email; 
        $newIncharge->phone = $request->phone; 
        $newIncharge->role = $role->id;
        if(!empty($request->pan))
        {
            $newIncharge->pan = $request->pan; 
        }
        else
        {
            $newIncharge->aadhar = $request->aadhar; 
        }
        $newIncharge->password =  Hash::make($request->password);
        $newIncharge->address = $request->address; 
        $newIncharge->pincode = $request->pincode; 
        $newIncharge->city = $request->city; 
        $newIncharge->state = $request->state; 
        $newIncharge->country = $request->country; 

        $image = $request->file('aadhar_pic');
        $newIncharge->aadhar_pic = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/incharge/kyc');
        $newIncharge->save();
        $image->move($destinationPath, $newIncharge->aadhar_pic);
        return redirect('/admin/manage-incharges')->with('success', 'Incharge Successfully Created!');
    }
    
    public function editIncharge($id)
    {
        $incharge = User::find($id);
        
        if($incharge){
            $data['title'] = 'Edit Incharge';
            $data['incharge'] = $incharge; 
            $data['roles'] = Role::where('role', 'incharge')->where('status', '0')->get();
            return view('admin.incharge.edit-incharge', $data);
        }
        else{
            return redirect('/admin/manage-incharges')->with('error', 'Invalid Incharge!');
        }
        
    }

    public function updateIncharge(Request $request, $id)
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

        $incharge = User::find($id);
        if($incharge){
            $destinationPath = public_path('/incharge/kyc');

            $incharge->name = $request->name; 
            $incharge->email = $request->email; 
            $incharge->phone = $request->phone; 
            if(!empty($request->pan))
            {
                $incharge->pan = $request->pan; 
            }
            else
            {
                $incharge->aadhar = $request->aadhar; 
            }

            if ($request->hasFile('aadhar_pic')) {
                $image = $request->file('aadhar_pic');
                File::delete($destinationPath.'/'.$incharge->aadhar_pic);
                $incharge->aadhar_pic = time().'.'.$image->getClientOriginalExtension();
                $image->move($destinationPath, $incharge->aadhar_pic);
                
            }
            $incharge->password =  Hash::make($request->password);
            $incharge->address = $request->address; 
            $incharge->pincode = $request->pincode; 
            $incharge->city = $request->city; 
            $incharge->state = $request->state; 
            $incharge->country = $request->country; 
            $incharge->status = $request->status;
            $incharge->save();

             return redirect('/admin/manage-incharges')->with('success', 'Incharge Successfully Updated!');
        }
         else{
            return redirect('/admin/'.$id.'/edit-incharge')->with('error', 'Invalid Incharge!');
        }
    }
    
    public function deleteIncharge($id)
    {
        /* print_r($id);
        exit; */
        $incharge = User::find($id);
        $delete_file = public_path('/incharge/kyc');
        File::delete($delete_file.'/'.$incharge->aadhar_pic);
        $incharge->delete();
        return redirect('/admin/manage-incharges')->with('success', 'Incharge Deleted Successfully!');
    }

    public function manageIncharges()
    {
        $data['incharges'] = User::select('r.id as role_id', 'r.name as role_name', 'users.*')->join('roles as r', 'r.id', '=', 'users.role')->where('r.role', 'incharge')->get();
        $data['title'] = 'Manage Incharges';
        return view('admin.incharge.manage-incharges', $data);
    }    

    ######## Incharge Module ########

    ######## Guard Module ########

    public function addGuard()
    {
        $data['title'] = 'Create Guard';
        $data['roles'] = Role::where('role', 'guard')->where('status', '0')->get();
        return view('admin.guards.create-guard', $data);
    }

    public function createGuard(Request $request)
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
        $role = Role::select('id')->where('role', 'guard')->where('status', '0')->first(); 
        $uniqueID = str_pad($userID, 16, "GRD-917000000000", STR_PAD_LEFT);
        $newGuard = new User;
        $newGuard->profile_id = $uniqueID; 
        $newGuard->name = $request->name; 
        $newGuard->email = $request->email; 
        $newGuard->phone = $request->phone; 
        $newGuard->role = $role->id;
        if(!empty($request->pan))
        {
            $newGuard->pan = $request->pan; 
        }
        else
        {
            $newGuard->aadhar = $request->aadhar; 
        }
        $newGuard->password =  Hash::make($request->password);
        $newGuard->address = $request->address; 
        $newGuard->pincode = $request->pincode; 
        $newGuard->city = $request->city; 
        $newGuard->state = $request->state; 
        $newGuard->country = $request->country; 

        $image = $request->file('aadhar_pic');
        $newGuard->aadhar_pic = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/guard/kyc');
        $newGuard->save();
        $image->move($destinationPath, $newGuard->aadhar_pic);
        return redirect('/admin/manage-guards')->with('success', 'Guard Successfully Created!');
    }
    
    public function editGuard($id)
    {
        $guard = User::find($id);
        
        if($guard){
            $data['title'] = 'Edit Guard';
            $data['guard'] = $guard; 
            $data['roles'] = Role::where('role', 'guard')->where('status', '0')->get();
            return view('admin.guards.edit-guard', $data);
        }
        else{
            return redirect('/admin/manage-guards')->with('error', 'Invalid Guard!');
        }
        
    }

    public function updateGuard(Request $request, $id)
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

        $guard = User::find($id);
        if($guard){
            $destinationPath = public_path('/guard/kyc');

            $guard->name = $request->name; 
            $guard->email = $request->email; 
            $guard->phone = $request->phone; 
            if(!empty($request->pan))
            {
                $guard->pan = $request->pan; 
            }
            else
            {
                $guard->aadhar = $request->aadhar; 
            }

            if ($request->hasFile('aadhar_pic')) {
                $image = $request->file('aadhar_pic');
                File::delete($destinationPath.'/'.$guard->aadhar_pic);
                $guard->aadhar_pic = time().'.'.$image->getClientOriginalExtension();
                $image->move($destinationPath, $guard->aadhar_pic);
                
            }
            $guard->password =  Hash::make($request->password);
            $guard->address = $request->address; 
            $guard->pincode = $request->pincode; 
            $guard->city = $request->city; 
            $guard->state = $request->state; 
            $guard->country = $request->country; 
            $guard->status = $request->status;
            $guard->save();

                return redirect('/admin/manage-guards')->with('success', 'Guard Successfully Updated!');
        }
            else{
            return redirect('/admin/'.$id.'/edit-guard')->with('error', 'Invalid Guard!');
        }
    }
    
    public function deleteGuard($id)
    {
        /* print_r($id);
        exit; */
        $guard = User::find($id);
        $delete_file = public_path('/guard/kyc');
        File::delete($delete_file.'/'.$guard->aadhar_pic);
        $guard->delete();
        return redirect('/admin/manage-guards')->with('success', 'Guard Deleted Successfully!');
    }

    public function manageGuards()
    {
        $data['guards'] = User::select('r.id as role_id', 'r.name as role_name', 'users.*')->join('roles as r', 'r.id', '=', 'users.role')->where('r.role', 'guard')->get();
        $data['title'] = 'Manage Guards';
        return view('admin.guards.manage-guards', $data);
    }    
    
    ######## Guard Module ########

    ######## Support Module ########

    public function addSupport()
    {
        $data['title'] = 'Create Customer Care';
        $data['roles'] = Role::where('role', 'customercare')->where('status', '0')->get();
        return view('admin.customer-care.create-customercare', $data);
    }

    public function createSupport(Request $request)
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
        return redirect('/admin/manage-customercare')->with('success', 'Customer Care Successfully Created!');
    }
    
    public function editSupport($id)
    {
        $customercare = User::find($id);
        
        if($customercare){
            $data['title'] = 'Edit Customer Care';
            $data['customercare'] = $customercare; 
            $data['roles'] = Role::where('role', 'customercare')->where('status', '0')->get();
            return view('admin.customer-care.edit-customercare', $data);
        }
        else{
            return redirect('/admin/manage-customercare')->with('error', 'Invalid Customer Care!');
        }
        
    }

    public function updateSupport(Request $request, $id)
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

                return redirect('/admin/manage-customercare')->with('success', 'Customer Care Successfully Updated!');
        }
            else{
            return redirect('/admin/'.$id.'/edit-customercare')->with('error', 'Invalid Customer Care!');
        }
    }
    
    public function deleteSupport($id)
    {
        /* print_r($id);
        exit; */
        $customercare = User::find($id);
        $delete_file = public_path('/customercare/kyc');
        File::delete($delete_file.'/'.$customercare->aadhar_pic);
        $customercare->delete();
        return redirect('/admin/manage-customercare')->with('success', 'Customer Care Deleted Successfully!');
    }

    public function manageSupport()
    {
        $data['customercares'] = User::select('r.id as role_id', 'r.name as role_name', 'users.*')->join('roles as r', 'r.id', '=', 'users.role')->where('r.role', 'customercare')->get();
        $data['title'] = 'Manage Customer Care';
        return view('admin.customer-care.manage-customercare', $data);
    }    
    
    ######## Support Module ########

    // Settings View
    public function editProfile()
    {
        $data['title'] = 'Edit Profile';
        return view('admin.settings.editProfile', $data);
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
        // print_r($password);
        //     exit;
        if (Hash::check($data['old_password'], $password->password)) { 
            $newPassword['password'] = Hash::make($data['new_password']);
            User::where('id', Auth::user()->id)->update($newPassword);
            
            return redirect('/admin/dashboard')->with('success', 'Password Successfully updated!');
        }
        else{
            return redirect('/admin/edit-profile')->with('error', 'Invalid old password!');
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
            return redirect('/admin/dashboard')->with('success', 'Pin Number Successfully updated!');
        }
        else{
            return redirect('/admin/edit-profile')->with('error', 'Invalid old pin number!');
        }
        return $request->all();
    } 
    
    public function otherSettings(Request $request)
    {
        $data['settings'] =  DB::table('settings')->where('id','1')->first();
        $data['title'] = "Other Settings";
        return view('admin.settings.otherSettings', $data);
    }

    public function otherSettingsUpdate(Request $request)
    {
        $data = array();

        $upto_3_months = 0;
        $upto_3_6_months = 0;
        $upto_6_12_months = 0;
        $above_12_months = 0;

        $upto_3_months = $request->upto_3_months;
        $upto_3_6_months = $request->upto_3_6_months;
        $upto_6_12_months = $request->upto_6_12_months;
        $above_12_months = $request->above_12_months;
    
        $validator = Validator::make($request->all(), [
            'upto_3_months' => 'required|numeric|min:0',
            'upto_3_6_months' => 'required|numeric|min:0',
            'upto_6_12_months' => 'required|numeric|min:0',
            'above_12_months' => 'required|numeric|min:0'            
        ]);

        $data = array(
            'upto_3_months' => $upto_3_months,
            'upto_3_6_months' => $upto_3_6_months,
            'upto_6_12_months' => $upto_6_12_months,
            'above_12_months' => $above_12_months
        );

        if ($validator->fails()) {
            
            return redirect('/admin/other-settings')->with('error', $validator->errors()->first());
        }
        
        if ($validator->passes()) {

            $update_commission =DB::table('settings')
                                ->where('id', 1)
                                ->update($data);

            
            return redirect('/admin/other-settings')->with('success', 'Settings Updated Successfully!');
        }
        return redirect('/admin/other-settings')->with('alert', 'Not available in this version');
    }

    public function transitSettingsUpdate(Request $request)
    {
        $data = array();

        $transit_tax = 0;
        $transit_priceOne = 0;
        $transit_priceTwo = 0;
        $transit_priceThree = 0;
        $transit_priceFour = 0;
        $transit_priceFive = 0;

        $transit_tax = $request->transit_tax;
        $transit_priceOne = $request->transit_priceOne;
        $transit_priceTwo = $request->transit_priceTwo;
        $transit_priceThree = $request->transit_priceThree;
        $transit_priceFour = $request->transit_priceFour;
        $transit_priceFive = $request->transit_priceFive;
    
        $validator = Validator::make($request->all(), [
            'transit_tax' => 'required|numeric|min:0',
            'transit_priceOne' => 'required|numeric|min:0',
            'transit_priceTwo' => 'required|numeric|min:0',
            'transit_priceThree' => 'required|numeric|min:0',
            'transit_priceFour' => 'required|numeric|min:0',
            'transit_priceFive' => 'required|numeric|min:0'             
        ]);

        $data = array(
            'transit_tax' => $transit_tax,
            'transit_priceOne' => $transit_priceOne,
            'transit_priceTwo' => $transit_priceTwo,
            'transit_priceThree' => $transit_priceThree,
            'transit_priceFour' => $transit_priceFour,
            'transit_priceFive' => $transit_priceFive
        );

        if ($validator->fails()) {
            
            return redirect('/admin/other-settings')->with('error', $validator->errors()->first());
        }
        
        if ($validator->passes()) {

            $update_commission =DB::table('settings')
                                ->where('id', 1)
                                ->update($data);

            
            return redirect('/admin/other-settings')->with('success', 'Settings Updated Successfully!');
        }
        return redirect('/admin/other-settings')->with('alert', 'Not available in this version');
    }
    
    public function branchInvoice($id)
    {
        $branch = Branch::find($id);
        
        if($branch){
            $data['title'] = "Branch Invoice";
            $data['branch'] = $branch; 
            $data['agent'] = User::where('branch', $branch->branch_id)->first(); 

            return view('admin.branch-invoice.print-invoice', $data);
        }
        else{
            return redirect('/admin/manage-branches')->with('error', 'Invalid Branche!');
        }
    }

}
