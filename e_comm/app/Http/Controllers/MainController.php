<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

class MainController extends Controller
{
function index(){
    $categories = Category::with('products')->get();
    return view('home.homepage', compact('categories'));
}
function show($id){
    $product = Product::find($id);

    return view('home.product',compact('product'));
}
function addtocart(Request $request,$id){
    if(Auth::id()){
        $user=Auth::user();
        $product=product::find($id);
        $cart=new cart;
        $cart->user_id=$user->id;
        $cart->product_id=$id;
        $cart->price=$request->input('Quantity')*$product->price;
        $cart->quantity_bought=$request->input('Quantity');
        $product->quantity-=$request->input('Quantity');
        $product->save();
        $cart->save();
        return redirect()->route('returnindex');
    }
    else{
        return redirect('login');
    }
}

function showcart(){
    if(Auth::id()){
        $id=Auth::user()->id;
        $cart=cart::where('user_id','=',$id)->get();
        return view('home.showcart',compact('cart'));
    }
    else{
        return redirect('login');
    }
}
function destroycart($id){
    $cart=Cart::find($id);
    $product=product::find($cart->product_id);
    $product->quantity+=$cart->quantity_bought;
    $product->save();
    Cart::find($id)->delete();

    return redirect()->route('showcart');
}
function addtoorderstable(){
    $id=Auth::user()->id;
    $data=cart::where('user_id','=',$id)->get();

    foreach($data as $data){
        $order=new order;
        $order->user_id=$data->user_id;
        $order->product_id=$data->product_id;
        $order->price=$data->price;
        $order->quantity_bought=$data->quantity_bought;
        $order->save();

        $cartid=$data->id;
        $cart=cart::find($cartid);
        $cart->delete();
    }
    session()->flash('success', 'Order placed successfully will be there in 5 days max !');
    return redirect()->route('returnindex');

}
}
