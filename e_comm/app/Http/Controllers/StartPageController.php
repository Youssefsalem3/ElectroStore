<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class StartPageController extends Controller
{
   public function redirect(){

        $usertype=Auth::user()->usertype;

        if($usertype == '1'){
            $orders=Order::get();
            return view('admin.home',compact('orders'));
        }

        else{
            return redirect()->route('returnindex');
        }
    }

    public function index(){
        return view('home.homepage');
    }
}
