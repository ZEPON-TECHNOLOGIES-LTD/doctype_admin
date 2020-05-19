<?php
namespace doctype_admin\Blog\Http\Controllers;

use doctype_admin\Blog\Http\Models\Category;
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
        //
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
        //
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
        //
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
        //
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
        //
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
        //
    }

    /**
    *
    *Validates the incoming requests
    *
    *@return return_type
    *
    */
    private function validateData()
    {
        //
    }

}