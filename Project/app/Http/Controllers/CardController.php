<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use Auth;

class CardController extends Controller
{
    public function upload(Request $request) {
        Card::create([
            'user_id' => Auth::id(),
            'card_number' => $request->number,
            'expiration_date' => $request->date,
            'cvv' => $request->cvv
        ]);

        return redirect(route('basket.index'));
    }
}
