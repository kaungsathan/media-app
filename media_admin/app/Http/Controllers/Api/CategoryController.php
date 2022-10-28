<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //get all category
    public function getAllCategory() {
        $category = Category::select('id','title','description')->get();

        return response()->json([
            'category' => $category
        ]);
    }

    public function searchCategory(Request $request) {
        // logger($request->all());

        if($request->categoryId != null) {
            $posts = Post::where('category_id', $request->categoryId)->get();
        }else {
            $posts = Post::get();
        }

        return response()->json([
            'searchData' => $posts
        ]);
    }
}
