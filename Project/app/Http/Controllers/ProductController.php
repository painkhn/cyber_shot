<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($category){
        $category = Category::where('link', $category)->firstOrFail();
        $products = Product::where('category_id', $category->id)->get();

        return view('category', [
            'products' => $products,
        ]);
    }
    /*
     * Добавление нового товара
     */
    public function upload(Request $request){
        $request->validate([
            'category' => 'required|integer|min:1',
            'name' => 'required|string|min:3',
            'price' => 'required|integer|min:1',
            'description' => 'required|string|min:3',
            'photo' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $file = $request->file('photo');
        $timestamp = time();
        $photoPath = $file->storeAs('service', $timestamp. '.'. $file->getClientOriginalExtension(), 'public');

        $randomCode = substr(str_shuffle('0123456789'), 0, 3);
        $article = $timestamp . $randomCode;

        $product = new Product([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image' => $photoPath,
            'article' => $article,
            'category_id' => $request->input('category'),
        ]);

        $product->save();

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'article' => 'required|string',
        ]);

        $article = $request->input('article');
        if (strpos($article, '#') === 0) {
            $article = substr($article, 1);
        }
        $product = Product::where('article', $article)->first();
        if (!$product) {
            return redirect()->back()->withErrors(['article' => 'Продукт с таким артикулом не найден']);
        }
        $product->delete();
        return redirect()->back()->with('success', 'Продукт успешно удален');
    }

    public function show($article){
        $product = Product::where('article', $article)->firstOrFail();
        return view('product', [
            'product' => $product,
        ]);
    }
}
