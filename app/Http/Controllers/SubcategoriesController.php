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
        $data['subcategories'] = Subcategories::select('c.name as category', 'subcategories.name', 'subcategories.id')->join('categories as c', 'c.id', '=', 'subcategories.category')->where('subcategories.status', '0')->get();
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
        //
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
        $this->validate($request, [
            'updated_name' => 'required|unique:categories,name'
        ]);
        $category = Subcategories::find($request->id);
        if(!empty($category))
        {
            $category->name = $request->updated_name; 
            $category->save();
            return redirect('/admin/categories')->with('success', 'Subcategory Successfully Updated!');
        }
        else
        {
            return redirect('/admin/categories')->with('error', 'Something went wrongt ry again!');
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
        $category = Subcategories::find($id);
        if(!empty($category))
        {
            $category->delete();
            return redirect('/admin/categories')->with('success', 'Subcategory Successfully Deleted!');
        }
        else
        {
            return redirect('/admin/categories')->with('error', 'Something went wrongt ry again!');
        }
    }
}
