<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /*
     * Добавление нового товара
     */
    public function upload(Request $request)
    {
        // Валидация данных
        $request->validate([
            'category' => 'required|integer|min:1',
            'name' => 'required|string|min:3',
            'price' => 'required|integer|min:1',
            'description' => 'required|string|min:3',
            'photo' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        // Обработка загрузки изображения
        $file = $request->file('photo');
        $timestamp = time();
        $photoPath = $file->storeAs('service', $timestamp. '.'. $file->getClientOriginalExtension(), 'public');

        // Генерация уникального кода для article
        $randomCode = substr(str_shuffle('0123456789'), 0, 3);
        $article = $timestamp . $randomCode;

        // Создание экземпляра модели Product
        $product = new Product([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image' => $photoPath,
            'article' => $article,
            'category_id' => $request->input('category'),
        ]);

        // Сохранение модели в базе данных
        $product->save();

        // Перенаправление с сообщением об успехе
        return redirect()->back()->with('success', 'Товар успешно добавлен.');
    }
}
