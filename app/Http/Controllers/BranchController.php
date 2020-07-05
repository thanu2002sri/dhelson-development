<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Response;
use App\Branch;
use Auth;
use App\User;
use App\AllBranches;

class BranchController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $data['title'] = 'Add Branch';
        $data['agents'] = User::select('r.name as role_name', 'users.*')->join('roles as r', 'r.id', '=', 'users.role')->where('r.role', 'agent')->whereNull('users.branch')->get();
        return view('admin.branches.create-branche', $data);
    }

    public function addBranche(Request $request)
    {
        /* print_r($request->all());
        exit; */

        $this->validate($request, [
            'agent_id' => 'required',
            'name' => 'required',
            'email' => 'required|unique:branches,email|email:filter',
            'phone' => 'required|numeric|unique:branches,phone|digits_between:10,12',
            'address' => 'required',
            'pincode' => 'required|numeric|digits_between:6,8',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'lattitude' => 'required',
            'logtitude' => 'required'
         ]);
        $generatBranch = substr(strtoupper($request->city), 0, 5);
        $allBranches = AllBranches::select('branches_count')->where('branch_city', $request->city)->first();
        if(!empty($allBranches)){
            $brnchID = (int)$allBranches->branches_count + 1;
            AllBranches::where('branch_city', $request->city)->update(['branches_count' => $brnchID]);
        }
        else{
            $brnchID = 1;
            $uniqueID = str_pad($brnchID, 10, "".$generatBranch."-0000000000000", STR_PAD_LEFT);
            $allBranches = new AllBranches;
            $allBranches->branch_prefix = $uniqueID;
            $allBranches->branch_city = $request->city;
            $allBranches->branches_count = 1;
            $allBranches->save();
        }

        $uniqueID = str_pad($brnchID, 10, "".$generatBranch."-0000000000000", STR_PAD_LEFT);
        $newBranch = new Branch;
        $newBranch->branch_id = $uniqueID;
        $newBranch->agent_id = $request->agent_id;
        $newBranch->name = $request->name;
        $newBranch->email = $request->email;
        $newBranch->phone = $request->phone;
        $newBranch->address = $request->address;
        $newBranch->pincode = $request->pincode;
        $newBranch->city = $request->city;
        $newBranch->state = $request->state;
        $newBranch->country = $request->country;
        $newBranch->lattitude = $request->lattitude;
        $newBranch->logtitude = $request->logtitude;
        $newBranch->save();
        $updateData['branch'] = $uniqueID; 
        User::where('id', $request->agent_id)->update($updateData);
        return redirect('/admin/manage-branches')->with('success', 'Branche Successfully Created!');
        
    }

    public function editBranche($id)
    {
        
        $branch = Branch::find($id);
        if($branch){
            
            $data['title'] = 'Edit Branch';
            $data['branch'] = $branch; 
            $data['agents'] = User::join('roles as r', 'r.id', '=', 'users.role')->where('r.role', 'agent')->get();
            return view('admin.branches.edit-branche', $data);
        }
        else{
            return redirect('/admin/manage-branches')->with('error', 'Invalid Branch!');
        }
        
    }

    public function updateBranche(Request $request, $id)
    {
        $this->validate($request, [
            'agent_id' => 'required',
            'name' => 'required',
            'email' => 'required|email:filter',
            'phone' => 'required|numeric|digits_between:10,12',
            'address' => 'required',
            'pincode' => 'required|numeric|digits_between:6,8',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'status' => 'required'
            /*             'lattitude' => 'required',
            'logtitude' => 'required', */
         ]);


         $branch = Branch::find($id);
         if($branch){
             $branch->agent_id = $request->agent_id;
             $branch->name = $request->name;
             $branch->email = $request->email;
             $branch->phone = $request->phone;
             $branch->address = $request->address;
             $branch->pincode = $request->pincode;
             $branch->city = $request->city;
             $branch->state = $request->state;
             $branch->country = $request->country;
             $branch->status = $request->status;
     /*         $branch->lattitude = $request->lattitude;
             $branch->logtitude = $request->logtitude; */
             $branch->save();
             return redirect('/admin/manage-branches')->with('success', 'Branche Successfully Updated!');
         }
         else{
            return redirect('/admin/'.$id.'/edit-branch')->with('error', 'Invalid Branch!');
        }
    }
    

    public function manageBranches()
    {
        $data['branches'] = Branch::all();
        $data['title'] = 'Manage Branches';
        return view('admin.branches.manage-branches', $data);
    }

    public function deleteBranche($id)
    {
        $branch = Branch::find($id);
        $allBranches = AllBranches::where('branch_city', $branch->city)->first();
        $user = User::where('branch', $branch->branch_id)->first();
        $allBranches->branches_count = $allBranches->branches_count-1;
        $user->branch = '';
        $user->save();
        $allBranches->save();
        $branch->delete();
        return redirect('/admin/manage-branches')->with('success', 'Branch Deleted Successfully!');
    }

    
}
