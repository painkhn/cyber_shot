@extends('layouts.app')

@section('content')
    <h1 class="text-2xl max-w-80 h-20 border-b border-black flex items-center justify-center mx-auto my-0 mb-20">
        Панель управления
    </h1>
    <div class="max-w-7xl w-full mx-auto my-0">
        <div class="flex justify-between">
            <div class="w-full border border-black h-full flex items-center">
                <div class="h-full mx-auto my-0 flex flex-col gap-20 w-3/4">
                    <h2 class="text-center text-2xl">
                        Редактировать товар
                    </h2>
                    @if (isset($product))
                        <form method="POST" action="{{ route('product.upgrade', $product->id) }}"
                            class="w-full flex flex-col  mx-auto my-0 h-full" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <select name="category" id="category"
                                class="mb-10 w-full h-10 border-b border-black text-center text-lg bg-transparent outline-none transition-all focus:bg-transparent/5 placeholder:text-[#C8C8C8]"
                                required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <input type="text" name="name" id="name" placeholder="Название товара"
                                class="mb-10 w-full h-10 border-b border-black text-center text-xl bg-transparent outline-none transition-all focus:bg-transparent/5 placeholder:text-[#C8C8C8]"
                                value="{{ $product->name }}" required>
                            <input type="number" name="price" id="price" placeholder="Цена товара"
                                class="mb-10 w-full h-10 border-b border-black text-center text-xl bg-transparent outline-none transition-all focus:bg-transparent/5 placeholder:text-[#C8C8C8]"
                                value="{{ $product->price }}" min="1" required>
                            <textarea name="description" id="description" placeholder="Характеристики"
                                class="mb-10 w-full h-20 border-b border-black text-center text-xl bg-transparent outline-none transition-all focus:bg-transparent/5 placeholder:text-[#C8C8C8]"
                                required>{{ $product->description }}</textarea>
                            <label
                                class="flex items-center mb-10 justify-center bg-transparent py-1 border-b border-black text-center text-xl cursor-pointer outline-none text-[#C8C8C8]">
                                Фото товара
                                <input type="file" name="photo" id="photo" class="hidden" />
                            </label>
                            <div class="flex-1"></div>
                            <button type="submit"
                                class="py-3 text-xl bg-[#E98074] transition-all hover:bg-[#d67165] mb-10">
                                Обновить
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>
        function validateMinValue(input) {
            if (input.value < 1) {
                input.setCustomValidity("Цена должна быть не менее 1");
            } else {
                input.setCustomValidity("");
            }
        }
    </script>
@endsection
