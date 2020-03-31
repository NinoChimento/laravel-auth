<?php

namespace App\Http\Controllers;
use App\Post;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {

        // $request->validate([
        //     "title" => "required|string|max:30",
        //     "body" => "required|string"
        // ]);
        $data = $request->all();
        $comment = new Comment;
        $comment->fill($data);
       
        
     
        if ($comment->save()) {
            return redirect()->route('postsShow',$comment->post);
        } else {
            abort("404");
        }
    }

    public function delete(Comment $comment){
        $slug = $comment->post->slug;
       
        if($comment->delete()) {
             return redirect()->route('admin.posts.show', [$slug])->with("delete", $comment);
        }
    }
}
