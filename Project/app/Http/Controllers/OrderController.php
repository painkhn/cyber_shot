<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Auth;

class OrderController extends Controller
{
    public function index(){
        $rejected = Order::where('status', 'rejected')->count();
        $confirmed = Order::where('status', 'confirmed')->count();

        return view('order', [
            'orders' => Order::with('product')->where('status', 'waiting')->get(),
            'rejected' => $rejected,
            'confirmed' => $confirmed,
            'total' => $rejected + $confirmed
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

    public function update($id, Request $request) {
        $order = Order::find($id);
        if (!$order) {
            return redirect()->back();
        }

        $order->status = $request->status;
        $order->save();

        return redirect()->back();
    }
}
