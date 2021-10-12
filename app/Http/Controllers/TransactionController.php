<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('customer');
    }

    public function index(){
        $categories = Category::all();
        $transactions = Transaction::where('user_id', Auth::user()->id)->get();
        return view('transaction.index', compact('categories', 'transactions'));
    }

    public function checkout(){
        $carts = Cart::all();
        $transaction = Transaction::create([
            'user_id' => Auth::user()->id,
            'transactionDate' => date("Y-m-d H:i:s"),
        ]);
        foreach ($carts as $cart) {
            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'keyboard_id' => $cart->keyboard_id,
                'qty' => $cart->qty
            ]);
            Cart::destroy($cart->id);
        }
        return redirect('/transaction');
    }

    public function detail($id){
        $categories = Category::all();
        $transactionDetails = TransactionDetail::where('transaction_id',$id)->get();
        return view('transaction.detail', compact('categories', 'transactionDetails'));
    }
}
