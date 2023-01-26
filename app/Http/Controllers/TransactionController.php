<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\DetailTransaction;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{

    public function __construct()
    {
        $this->middleware('customer');
    }

    public function getAllTransactionHistory(){
        $categories = CategoryController::getAllCategories();
        $historys = Transaction::where('user_id','LIKE',Auth::user()->id)->orderBy('date','desc')->get();
        return view('transaction_history',compact('historys', 'categories'));
    }

    public function getDetailTransactionHistory($id)
    {
        $categories = CategoryController::getAllCategories();
        $details = DetailTransaction::where('transaction_id', 'LIKE', $id)->get();
        return view('transaction_detail', compact('details', 'categories'));
    }

    public function addTransaction(){
        $user = Auth::user();
        $carts = Cart::where('user_id','LIKE',$user->id)->get();

        $transaction = Transaction::create([
            'user_id' => $user->id,
            'date' => date("Y-m-d H:i:s"),
        ]);

        foreach ($carts as $cart) {
            DetailTransaction::create([
                'transaction_id' => $transaction->id,
                'keyboard_id' => $cart->keyboard_id,
                'qty' => $cart->qty
            ]);
            Cart::destroy($cart->id);
        }

        return redirect('/transaction');
    }


}
