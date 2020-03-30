<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $idUser = Auth::id();
        $posts = Post::where("user_id",$idUser)->get();
        return view("admin.index",compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        return view("admin.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            "title"=> "required|string|max:30",
            "body"=> "required|string"
        ]);
        $data = $request->all();
        $post = new Post;
        $post->fill($data);
        $post->user_id = Auth::id();
        $post->slug =  Str::finish(Str::slug($post->title, '-'), rand(1, 1000));
        $slug = $post->slug;
        if($post->save()){
            return redirect()->route('admin.posts.show', [$slug]);
        }
        else{
            abort("404");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where("slug",$slug)->first();
        
        return view("admin.show",compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view("admin.update",compact("post"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Post $post)
    {
        $request->validate([
            "title" => "required|string|max:30",
            "body" => "required|string"
        ]);

        $data=$request->all();
        
        

        $slug = $post->slug;
        if($post->update($data)){
            return redirect()->route('admin.posts.show', [$slug]);
        }else {
            abort("4040");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        if(empty($id)){
            abort("404 Nessun elemento da cancellare");
        }
        $post = Post::find($id);
        if($post->delete()){
            return redirect()->route("admin.posts.index")->with("delete", $post);
        }
    }
}
