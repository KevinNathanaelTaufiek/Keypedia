<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware('customer');
    }

    public function index()
    {
        $categories = Category::all();
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        return view('cart.index', compact('categories', 'carts'));
    }

    public function store(Request $request){

        $cart = $request->validate([
            'qty' => 'required|numeric|min:1'
        ]);

        $isExist = Cart::where('keyboard_id',$request->keyboard_id)->first();
        if($isExist){
            $isExist->qty += $request->qty;
            $isExist->save();
        }
        else {
            $cart['user_id'] = Auth::user()->id;
            $cart['keyboard_id'] = $request->keyboard_id;
            Cart::create($cart);
        }
        return redirect('/cart');
    }

    public function update(Request $request, $id){
        $request->validate([
            'qty' => 'required|numeric|min:0'
        ]);

        $cart = Cart::find($id);
        if($request->qty == 0){
            Cart::destroy($id);
        }
        else {
            $cart->qty = $request->qty;
            $cart->save();
        }
        return back();

    }

}
