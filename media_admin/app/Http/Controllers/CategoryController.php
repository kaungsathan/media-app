<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //direct page to category page
    public function index() {
        $data = Category::when(request('key'),function($query){
            $query->where('title','like','%'.request('key').'%');
        })
        ->get();
        return view('admin.category.index',compact('data'));
    }

    // direct page to edit category page
    public function editCategoryPage($id) {

        $data = Category::where('id',$id)->first();
        return view('admin.category.edit',compact('data'));
    }

    // update category
    public function updateCategory(Request $request,$id) {

        $this->createCategoryValidate($request);
        Category::where('id',$id)->update([
            'title' => $request->categoryName,
            'description' => $request->categoryDesc
        ]);
        return redirect()->route('admin#category');
    }

    // create category
    public function createCategory(Request $request) {

        $this->createCategoryValidate($request);
        Category::create([
            'title' => $request->categoryName,
            'description' => $request->categoryDesc
        ]);
        return redirect()->route('admin#category');
    }

    // delete category
    public function deleteCategory($id) {
        Category::where('id',$id)->delete();
        return redirect()->route('admin#category');
    }

    // private function
    // category create validation
    private function createCategoryValidate($request) {
        Validator::make($request->all(),[
            'categoryName' => 'required',
            'categoryDesc' => 'required'
        ])->validate();
    }
}
