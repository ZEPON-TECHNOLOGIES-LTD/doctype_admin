<?php
namespace doctype_admin\Blog\Http\Controllers;

use doctype_admin\Blog\Http\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PostsController extends Controller
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
    *@param doctype_admin\Blog\Http\Models\Post $post
    *
    *@return \Illuminate\Http\Response
    *
    */
    public function edit(Post $post)
    {
        //
    }

    /**
    *
    *Updates the speciefed resource
    *
    *@param \Illuminate\Http\Request
    *@param \doctype_admin\Blog\Http\Models\Post $post
    *
    *@return \Illuminate\Http\Response
    *
    */
    public function update(Request $request,Post $post)
    {
        //
    }

    /**
    *
    *Destroys the speciefed resource
    *
    *@param \doctype_admin\Blog\Http\Models\Post $post
    *
    *@return \Illuminate\Http\Response
    *
    */
    public function destroy(Post $post)
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