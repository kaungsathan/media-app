<?php

namespace App\Http\Controllers;

use App\Models\ActionLog;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class TrendPostController extends Controller
{
    //trend posts
    public function index() {
        $post = ActionLog::select('action_logs.*','posts.title','posts.image',DB::raw('COUNT(action_logs.post_id) as qty'))
        ->leftJoin('posts','posts.id','action_logs.post_id')
        ->groupBy('action_logs.post_id')
        ->get();
        // dd($post->toArray());
        return view('admin.trend_post.index',compact('post'));
    }

    // trend post detail
    public function trendPostDetail($id) {
        $post = Post::where('id',$id)->first();
        $category = Category::get();

        return view('admin.trend_post.detail',compact('post','category'));
    }
}
