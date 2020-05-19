<?php
namespace doctype_admin\Blog\Http\Controllers;


use doctype_admin\Blog\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CategoriesController extends Controller
{
    /**
    *
    *Display a listing of resources
    *
    *@return \Illuminate\Http\Response
    *
    */

    public function index()
    {
        $categories = Category::all();
        return view("blog::category.index",compact('categories'));
    }
    
    /**
    *
    *Show tthe form for creating new resources
    *
    *@return \Illuminate\Http\Response
    *
    */
    public function create()
    {
        return view("blog::category.create");
    }
    
    /**
    *
    *Stores a newly created resourcesin storage
    *
    *@param \Illuminate\Http\Request $request
    *
    *@return \Illuminate\Http\Response
    *
    */
    public function store(Request $request)
    {
        Category::create($this->validateData());
        return redirect('/category');
    }
    
    /**
    *
    *Shows the form to edit specified resources
    *
    *@param doctype_admin\Blog\Http\Models\Category $category
    *
    *@return \Illuminate\Http\Response
    *
    */
    public function edit(Category $category)
    {
        return view("blog::category.edit",compact('category'));
    }

    /**
    *
    *Updates the speciefed resource
    *
    *@param \Illuminate\Http\Request
    *@param \doctype_admin\Blog\Http\Models\Category $category
    *
    *@return \Illuminate\Http\Response
    *
    */
    public function update(Request $request,Category $category)
    {
        $category->update($this->validateData());
        return redirect('/category');
    }

    /**
    *
    *Destroys the speciefed resource
    *
    *@param \doctype_admin\Blog\Http\Models\Category $category
    *
    *@return \Illuminate\Http\Response
    *
    */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('/category');
    }


    private function validateData()
    {
        return tap(
            request()->validate([
                'name' => 'required|max:50',
                'slug'=> 'required|max:50'
            ])
        );
    }

}