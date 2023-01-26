<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    public static function getAllCategories(){
        $categories = Category::all();
        return $categories;
    }

    public function __construct()
    {
        $this->middleware('manager', ['except' => ['getAllCategories',]]);
    }

    public function goManageCategory(){
        $categories = $this->getAllCategories();
        return view('manage_category',compact('categories'));
    }

    public function goEditCategory($id)
    {
        $categories = $this->getAllCategories();
        $selected_category = Category::find($id);
        return view('manage_category_edit', compact('categories', 'selected_category'));
    }

    public function updateCategory(Request $request, $id){

//      Category Name	Must be filled, unique, and minimum 5 characters
//      Category Image	Can be filled or not

        $request->validate([
            'category_name' => 'required|unique:categories,name|string|min:5',
        ]);

        $file = $request->file('category_image');

        $category = Category::findOrFail($id);
        $category->name = $request->category_name;

        if($file!=null){
            $imageName = time().'-'.$file->getClientOriginalName();

            Storage::putFileAs('public/category-cover', $file, $imageName);

            $category->image = 'storage/category-cover/'.$imageName;
        }

        $category->save();

        return redirect('/manage');
    }


    public function deleteCategory($id){
        Category::destroy($id);
        return back();
    }
}
