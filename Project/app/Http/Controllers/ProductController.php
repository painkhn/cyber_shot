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
            'category' => $category
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

    public function update($id, Request $request)
    {
        $request->validate([
            'category' => 'required|integer|min:1',
            'name' => 'required|string|min:3',
            'price' => 'required|integer|min:1',
            'description' => 'required|string|min:3',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $product = Product::findOrFail($id);

        // Обновляем поля товара
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category');

        // Если загружено новое фото, обновляем путь к фото
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $timestamp = time();
            $photoPath = $file->storeAs('service', $timestamp . '.' . $file->getClientOriginalExtension(), 'public');
            $product->image = $photoPath;
        }

        // Сохраняем изменения
        $product->save();

        return redirect(route('admin.index'));
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

    public function edit($article)
    {
        $product = Product::where('article', $article)->first();
        dd($product);

        if (!$product) {
            return redirect()->route('admin')->withErrors(['article' => 'Товар с таким артикулом не найден']);
        }

        return view('admin', ['product' => $product, 'categories' => Category::all()]);
    }

    public function search_update(Request $request) {
        $article = $request->input('article');
        if (strpos($article, '#') === 0) {
            $article = substr($article, 1);
        }
        $product = Product::where('article', $article)->first();
        if (!$product) {
            return redirect()->back();
        }
        $categories = Category::all();
        return view('updateProduct', [
            'product' => $product,
            'categories' => $categories
        ]);
    }
}
