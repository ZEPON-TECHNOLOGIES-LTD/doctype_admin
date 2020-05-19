<?php
namespace doctype_admin\Blog\Http\Controllers;

use doctype_admin\Blog\Models\Post;
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
         $posts = Post::all();
        return view('blog::post.index',compact('posts'));
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
        return view('blog::post.create');
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
        Post::create($this->validateData());
        return redirect('/post');
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
        return view("blog::post.edit",compact('post'));
    }



    public function update(Request $request,Post $post)
    {
        $post->update($this->validateData());
        return redirect('/post');
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
        $post->delete();
        return redirect('/blog');
    }


    private function validateData()
    {
    return tap(
        request()->validate([
            'author_id' => 'required|numeric',
            'category_id' => 'numeric',
            'title' => 'required|max:100',
            'seo_title' => 'max:100',
            'excerpt' => 'required|max:300',
            'body' => 'sometimes|max:5000',
            'image' => 'sometimes|file|image|max:5000',
            'slug' => 'required|max:100',
            'meta_description' => 'max:200',
            "meta_keywords" => 'max:300',
            "status" => 'required|numeric',
            'featured' => 'required|numeric'
        ]),
        function(){
             if(request()->has('image')){
                 request()->validate([
                     'image' => 'sometimes|file|image|max:5000',
                 ]);
             }
        }
    );
    }

}