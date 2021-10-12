<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('manager');
    }

    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    public function edit($id)
    {
        $categories = Category::all();
        $category = Category::find($id);
        return view('category.edit', compact('categories','category'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'categoryName' => 'required|unique:categories,categoryName'
        ]);

        $category = Category::find($id);

        $category->categoryName = $request->categoryName;

        $img = $request->file('categoryImage');
        if ($img) {
            $category->categoryImage = $img->store('category-images');
        }

        $category->save();

        return redirect('/manage/category');
    }

    public function delete($id){
        Category::destroy($id);
        return back();
    }
}
