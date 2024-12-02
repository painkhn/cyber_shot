<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Order, Card};
use Auth;

class OrderController extends Controller
{
    /*
    * Открытие страницы заказа
    */
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

    /*
    * Создание заказа
    */
    public function upload(Request $request) {

        if ($request->payment == 'cash') {
            Order::create([
                'user_id' => Auth::id(),
                'product_id' => $request->id,
                'payment_method' => $request->payment,
                'status' => 'waiting'
            ]);
        } elseif ($request->payment == 'card') {
            $card = Card::where('user_id', Auth::id())->first();
            if ($card) {
                Order::create([
                    'user_id' => Auth::id(),
                    'product_id' => $request->id,
                    'payment_method' => $request->payment,
                    'status' => 'waiting'
                ]);
            } else {
                return view('card');
            }
        }

        return redirect(route('index'))->with('message', "Заказ успешно принят");
    }

    /*
    * Обновление заказа
    */
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
