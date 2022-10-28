<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //get all post api
    public function getAllPost() {
        $posts = Post::get();

        return response()->json([
            'status' => 'success',
            'posts' => $posts
        ]);
    }

    // search post api
    public function searchPost(Request $request) {
        // logger($request->all());
        $posts = Post::where('title','like','%'. $request->searchKey .'%')->get();

        return response()->json([
            'searchData' => $posts
        ]);
    }

    // view post detail
    public function postDetail($id) {
        $post = Post::where('id',$id)->first();

        return response()->json([
            'post' => $post
        ]);
    }
}
