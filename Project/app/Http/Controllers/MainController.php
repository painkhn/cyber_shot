<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class MainController extends Controller
{
    public function index()
    {
        return view('index', [
            'categories' => Category::all(),
        ]);
    }

    public function search(Request $request) {
        $request->validate([
            'searchInput' => 'required|nullable|string|max:255',
        ]);

        $searchInput = $request->input('searchInput');
        $products = Product::where('name', 'like', '%' . $searchInput . '%')->get();

        return view('search', [
            'products' => $products,
        ]);
    }
}