<?php

namespace App\Http\Controllers;
use Auth;
use Validator;
use App\Categories;
use App\Subcategories;
use Illuminate\Http\Request;

class SubcategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Subategories";
        $data['categories'] = Categories::all();
        $data['subcategories'] = Subcategories::select('c.name as category', 'subcategories.name', 'subcategories.id', 'subcategories.status')->join('categories as c', 'c.id', '=', 'subcategories.category')->get();
        return view('admin.settings.subCategories', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category' => 'required',
            'name' => 'required|unique:subcategories,name'
        ]);

        $data = new Subcategories;
        $data->category = $request->category; 
        $data->name = $request->name; 
        $data->save();
        return redirect('/admin/sub-categories')->with('success', 'Sucategory Successfully Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subcategories  $subcategories
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategories $subcategories)
    {
        print_r($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subcategories  $subcategories
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategories $subcategories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subcategories  $subcategories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategories $subcategories)
    {
        $subcategory = Subcategories::find($request->id);
        if(!empty($request->updated_name) && $request->updated_name==$subcategory->name)
        {
            $subcategory->name = $request->updated_name;
            $subcategory->category = $request->updated_category;  
            
        }
        else
        {
            $this->validate($request, [
                'updated_name' => 'required|unique:subcategories,name',
            ]);
            $subcategory->name = $request->updated_name; 
            $subcategory->category = $request->updated_category;  
        }
        if(!empty($subcategory))
        {
            $subcategory->status = $request->status; 
            $subcategory->save();
            return redirect('/admin/sub-categories')->with('success', 'Subcategory Successfully Updated!');
        }
        else
        {
            return redirect('/admin/sub-categories')->with('error', 'Something went wrongt ry again!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subcategories  $subcategories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = Subcategories::find($id);
        if(!empty($subcategory))
        {
            $subcategory->delete();
            return redirect('/admin/sub-categories')->with('success', 'Subcategory Successfully Deleted!');
        }
        else
        {
            return redirect('/admin/sub-categories')->with('error', 'Something went wrongt ry again!');
        }
    }
}
