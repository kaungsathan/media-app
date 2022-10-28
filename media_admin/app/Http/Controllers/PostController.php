<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    //direct page to post page
    public function index() {
        $post = Post::get();
        $category = Category::get();
        return view('admin.post.index',compact('category','post'));
    }

    // direct page to update page
    public function updatePostPage($id) {
        $post = Post::where('id',$id)->first();
        $category = Category::get();

        return view('admin.post.update',compact('post','category'));
    }

    // create post
    public function createPost(Request $request) {
        $this->createPostValidate($request);
        $data = $this->getCreateData($request);

        if($request->hasFile('postImg')) {
            $imgName = uniqid().$request->file('postImg')->getClientOriginalName();
            // $request->file('postImg')->storeAs('public',$imgName);
            $request->file('postImg')->move(public_path().'/storage',$imgName);

            $data['image'] = $imgName;
        }

        Post::create($data);
        return back();
    }

    // update post
    public function updatePost($id,Request $request) {
        $this->createPostValidate($request);
        $data = $this->getCreateData($request);

        if($request->hasFile('postImg')) {
            $oldImg = Post::where('id',$id)->first();
            $oldImg = $oldImg->image;

            if($oldImg) {
                Storage::delete('public/'.$oldImg);
            }

            $updateImg = uniqid().$request->file('postImg')->getClientOriginalName();
            $request->file('postImg')->storeAs('public',$updateImg);

            $data['image'] = $updateImg;
        }

        Post::where('id',$id)->update($data);
        return redirect()->route('admin#post');
    }

    // delete post
    public function deletePost($id) {
        $post = Post::where('id',$id)->first();

        if($post->image) {
            Storage::delete('public/'.$post->image);
        }
        Post::where('id',$id)->delete();
        return back();
    }

    // private function
    // create post validation
    private function createPostValidate($request) {
        Validator::make($request->all(),[
            'postTitle' => 'required',
            'postDesc' => 'required',
            'postCategory' => 'required'
        ])->validate();
    }

    // format array to create post
    private function getCreateData($request) {
        return [
            'title' => $request->postTitle,
            'description' => $request->postDesc,
            'category_id' => $request->postCategory
        ];
    }
}
