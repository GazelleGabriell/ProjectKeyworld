<?php

namespace App\Http\Controllers;

use App\Models\Keyboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KeyboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('manager', ['except' => ['viewKeyboardByCategory', 'searchKeyboardByCategory', 'viewKeyboardDetail']]);
    }

    public function viewKeyboardByCategory($categoryId){
        $categories = CategoryController::getAllCategories();
        $keyboards = Keyboard::where('category_id','LIKE',$categoryId)->paginate(8);
        return view('keyboard_by_category',compact('categories','keyboards'));
    }

    public function searchKeyboardByCategory(Request $request,$categoryId){
        $categories = CategoryController::getAllCategories();
        $keyboards = Keyboard::where('category_id','LIKE',$categoryId)
        ->where($request->search_by,'LIKE','%'.$request->search.'%')->paginate(8);
        return view('keyboard_by_category',compact('categories','keyboards'));
    }

    public function viewKeyboardDetail($id){
        $categories = CategoryController::getAllCategories();
        $keyboard = Keyboard::findOrFail($id);
        return view('keyboard_detail',compact('categories','keyboard'));
    }

    public function goAddKeyboard(){
        $categories = CategoryController::getAllCategories();
        return view('keyboard_add', compact('categories'));
    }

    public function addKeyboard(Request $request)
    {
        $file = $request->file('keyboard_image');

        // Category	        Must be selected
        // Keyboard Name	Must be filled, unique, and minimum 5 characters
        // Keyboard Price	Must be filled with integer format and minimum 30 characters
        // Description	    Must be filled and minimum 20 characters
        // Keyboard Image	Must be filled


        $request->validate([
            'category_id' => 'required',
            'keyboard_name' => 'required|unique:keyboards,name|string|min:5',
            'keyboard_price' => 'required|integer|min:30',
            'keyboard_description' => 'required|min:20',
            'keyboard_image' => 'required',
        ]);

        $imageName = time() . '-' . $file->getClientOriginalName();
        Storage::putFileAs('public/image-keyboard', $file, $imageName);

        $imagePath = 'storage/image-keyboard/' . $imageName;

        Keyboard::create([
            'category_id' => $request->category_id,
            'name' => $request->keyboard_name,
            'price' => $request->keyboard_price,
            'description' => $request->keyboard_description,
            'image' => $imagePath,
        ]);

        return redirect('/');

    }

    public function goEditKeyboard($id)
    {
        $categories = CategoryController::getAllCategories();

        $selected_keyboard = Keyboard::findOrFail($id);

        return view('keyboard_edit',compact('categories','selected_keyboard'));
    }

    public function updateKeyboard(Request $request, $id){
        // Category	        Must be selected
        // Keyboard Name	Must be filled, and minimum 5 characters
        // Keyboard Price	Must be filled with integer format and more than 0
        // Description	    Must be filled and minimum 20 characters
        // Keyboard Image	Can be filled or not


        $request->validate([
            'category_id' => 'required',
            'keyboard_name' => 'required|string|min:5',
            'keyboard_price' => 'required|integer|min:1',
            'keyboard_description' => 'required|string|min:20',
        ]);

        $file = $request->file('keyboard_image');

        $keyboard = Keyboard::findOrFail($id);
        $keyboard->category_id = $request->category_id;
        $keyboard->name = $request->keyboard_name;
        $keyboard->price = $request->keyboard_price;
        $keyboard->description = $request->keyboard_description;

        if ($file != null) {
            $imageName = time() . '-' . $file->getClientOriginalName();

            Storage::putFileAs('public/image-keyboard', $file, $imageName);

            $imagePath = 'storage/image-keyboard/' . $imageName;
            $keyboard->image = $imagePath;
        }

        $keyboard->save();

        return redirect('/keyboard/category/'. $request->category_id);
    }


    public function deleteKeyboard($id)
    {
        Keyboard::destroy($id);
        return back();
    }

}
