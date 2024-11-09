<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Auth;

class OrderController extends Controller
{
    public function index(){
        return view('order', [
            'orders' => Order::with('product')->where('status', 'waiting')->get()
        ]);
    }

    public function upload(Request $request) {

        Order::create([
            'user_id' => Auth::id(),
            'product_id' => $request->id,
            'status' => 'waiting'
        ]);

        return redirect(route('index'))->with('message', "Заказ успешно принят");
    }
}
