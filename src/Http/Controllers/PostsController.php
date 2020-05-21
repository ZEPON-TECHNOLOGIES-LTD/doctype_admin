<?php
namespace doctype_admin\Blog\Http\Controllers;

use doctype_admin\Blog\Models\Category;
use doctype_admin\Blog\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Intervention\Image\Facades\Image as Image;

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
         $posts = Post::with('category')->get();
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
        $categories = Category::all();
        /* Retriving Tags */
        $tags = Post::existingTags()->pluck('name');
        return view('blog::post.create',compact('categories','tags'));
    }
    
    /**
    *
    *Stores a newly created resources in storage
    *
    *@param \Illuminate\Http\Request $request
    *
    *@return \Illuminate\Http\Response
    *
    */
    public function store(Request $request)
    {

        $post = Post::create($this->validateData());
        /* Assigning tags */
         $post->tag(explode(',', $request->tags));  
        $this->uploadImage($post);
        return redirect('/admin/post');
    }

    /**
    *
    *Show specified resource
    *
    *@param doctype_admin\Blog\Http\Models\Post $post
    *
    *@return \Illuminate\Http\Response
    *
    */

    public function show(Post $post)
    {
        return view("blog::post.show",compact('post'));
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
                /* Retriving tags */
                $tags = $post->existingTags()->pluck('name');
                $remove_tags = $post->tagged->pluck('tag_name');
                $categories = Category::all();
        return view("blog::post.edit",compact('post','tags','remove_tags','categories'));
    }



    public function update(Request $request,Post $post)
    {
     
        $post->update($this->validateData());
        /* Assigning tags */
        $post->tag(explode(',', $request->tags));  
        /* ---------------- */
         /* Removing tags */
         if(!empty($request->remove_tags)){
             $post->untag($request->remove_tags);
 }
 /* ------------------ */
        $this->uploadImage($post);
        return redirect('/admin/post');
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
                     'image' => 'file|image|max:5000',
                 ]);
             }
        }
    );
    }

    private function uploadImage($post){
        if(!empty(request()->image) && request()->has('image'))
        {
            $post->update([
                'image' => request()->image->store('uploads/blog/post','public')
            ]);
            $image = Image::make(request()->file('image')->getRealPath());
            $image->save(public_path('storage/' . $post->image));
        }  

    }

}