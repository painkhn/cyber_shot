<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Order;

class ProfileController extends Controller
{
    /**
     * Открытие страницы пользователя
     */
    public function index(Request $request): View
    {
        return view('profile', [
            'orders' => Order::with('product')->where('user_id', Auth::id())->get(),
            'user' => $request->user(),
        ]);
    }

    /**
     * обновлении информации (Имени и фото)
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        $file = $request->file('photo');
        if ($file){
            $timestamp = time();
            $photoPath = $file->storeAs('avatars', $timestamp. '.'. $file->getClientOriginalExtension(), 'public');

            $request->user()->update([
                'name' => $request->name,
                'photo' => $photoPath
            ]);
        } else {
            $request->user()->update([
                'name' => $request->name,
            ]);
        }

        return Redirect::route('profile.index')->with('status', 'profile-updated');
    }
}
