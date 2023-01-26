<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('customer');
    }

    public function viewCart()
    {
        $categories = CategoryController::getAllCategories();
        $user = Auth::user()->id;
        $my_cart = Cart::where('user_id','LIKE',$user)->get();

        return view('my_cart', compact('categories', 'my_cart'));
    }

    public function addCartItem(Request $request){
        $user = Auth::user()->id;
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $oldItem = Cart::where('keyboard_id','LIKE',$request->keyboard_id)
                        ->where('user_id','LIKE',$user)
                        ->first();

        if($oldItem!=null){
            $oldItem->qty += $request->quantity;
            $oldItem->save();
            return redirect('/cart');
        }

        Cart::create([
            'user_id' => $user,
            'keyboard_id' => $request->keyboard_id,
            'qty' => $request->quantity,
        ]);

        return redirect('/cart');

    }

    public function updateCartItem(Request $request, $id){
        $request->validate([
            'quantity' => 'required|integer|min:0'
        ]);

        $newQty = $request->quantity;

        if($newQty==0){
            Cart::destroy($id);
        }
        else{
            $oldItem = Cart::find($id);
            $oldItem->qty = $newQty;
            $oldItem->save();
        }

        return redirect('/cart');
    }
}
