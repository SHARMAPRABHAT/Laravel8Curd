<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function addPost(){
        return view('add-post');
    }

    public function createPost( Request $request ){

        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return back()->with('post_created',"Post Created Successfully");

    }

    public function getPost(){

        $posts = Post::orderBy('id','DESC')->get();
        return view('posts',compact('posts'));
    }

    public function postDetail( $id ){

        $post =Post::where('id',$id)->select('id','title','body')->first();
        return view('post-detail',compact('post'));
    }
    
    public function deletePost( $id ){

        $post =Post::where('id',$id)->delete();
        return back()->with('post_deleted',"Post Deleted Successfully");
    }
    
    public function editPost( $id ){

        $post =Post::where('id',$id)->first();
        return view('edit-post',compact('post'));
    }

    public function updatePost( Request $request ){

        $post = Post::find($request->id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return back()->with('post_updt',"Post Updated Successfully");
    }
}
