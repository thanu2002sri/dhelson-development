<?php

namespace App\Http\Controllers;
use Auth;
use App\Categories;
use Illuminate\Http\Request;
use Validator;

class CategoriesController extends Controller
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
        $data['title'] = "Categories";
        $data['categories'] = Categories::all();
        return view('admin.settings.categories', $data);
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
            'name' => 'required|unique:categories,name'
        ]);
        $newCategory = new Categories;
        $newCategory->name = $request->name; 
        $newCategory->save();
        return redirect('/admin/categories')->with('success', 'Category Successfully Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(Categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categories $categories)
    {
        $category = Categories::find($request->id);
        if(!empty($request->updated_name) && $request->updated_name==$category->name)
        {
            $category->name = $request->updated_name; 
        }
        else
        {
            $this->validate($request, [
                'updated_name' => 'required|unique:categories,name',
            ]);
            $category->name = $request->updated_name; 
        }
        
        if(!empty($category))
        {
            $category->status = $request->status; 
            $category->save();
            return redirect('/admin/categories')->with('success', 'Category Successfully Updated!');
        }
        else
        {
            return redirect('/admin/categories')->with('error', 'Something went wrongt ry again!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Categories::find($id);
        if(!empty($category))
        {
            $category->delete();
            return redirect('/admin/categories')->with('success', 'Category Successfully Deleted!');
        }
        else
        {
            return redirect('/admin/categories')->with('error', 'Something went wrongt ry again!');
        }
    }
}
