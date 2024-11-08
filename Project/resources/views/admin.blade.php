@extends('layouts.app')

@section('content')
    <h1 class="text-2xl max-w-80 h-20 border-b border-black flex items-center justify-center mx-auto my-0 mb-20">
        Панель управления
    </h1>
    <div class="max-w-7xl w-full mx-auto my-0">
        <div class="flex justify-between">
            <div class="w-80 border border-black h-[600px] flex items-center">
                <div class="h-[500px] mx-auto my-0 flex flex-col gap-5">
                    <h2 class="text-center text-2xl">
                        Добавить товар
                    </h2>
                    <form method="POST" action="{{ route('product.upload') }}" class="w-48 flex flex-col mx-auto my-0 h-full" enctype="multipart/form-data">
                        @csrf
                        <select name="category" id="category" class="mb-10 w-full h-10 border-b border-black text-center text-lg bg-transparent outline-none transition-all focus:bg-transparent/5 placeholder:text-[#C8C8C8]" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <input type="text" name="name" id="name" placeholder="Название товара" class="mb-10 w-full h-10 border-b border-black text-center text-xl bg-transparent outline-none transition-all focus:bg-transparent/5 placeholder:text-[#C8C8C8]" required>
                        <input type="number" name="price" id="price" placeholder="Цена товара" class="mb-10 w-full h-10 border-b border-black text-center text-xl bg-transparent outline-none transition-all focus:bg-transparent/5 placeholder:text-[#C8C8C8]" min="1" required>
                        <!-- <input type="text" placeholder="Характеристики" class="mb-10 w-full h-10 border-b border-black text-center text-xl bg-transparent outline-none transition-all focus:bg-transparent/5 placeholder:text-[#C8C8C8]"> -->
                        <textarea name="description" id="description" placeholder="Характеристики" class="mb-10 w-full h-20 border-b border-black text-center text-xl bg-transparent outline-none transition-all focus:bg-transparent/5 placeholder:text-[#C8C8C8]" required></textarea>
                        <label class="flex items-center mb-10 justify-center bg-transparent py-1 border-b border-black text-center text-xl cursor-pointer outline-none text-[#C8C8C8]">
                            Фото товара
                            <input type="file" name="photo" id="photo" class="hidden" required/>
                        </label>
                        <div class="flex-1"></div>
                        <button type="submit" class="py-3 text-xl bg-[#E98074] transition-all hover:bg-[#d67165]">
                            Добавить
                        </button>
                    </form>
                </div>
            </div>
            <div class="w-80 border border-black h-[600px] flex items-center">
                <div class="h-[400px] mx-auto my-0 flex flex-col gap-20">
                    <h2 class="text-center text-2xl">
                        Редактировать товар
                    </h2>
                    <form class="flex flex-col w-48 mx-auto my-0 h-full">
                        <input type="text" placeholder="Название товара" class="mb-10 w-full h-10 border-b border-black text-center text-xl bg-transparent outline-none transition-all focus:bg-transparent/5 placeholder:text-[#C8C8C8]">
                        <input type="text" placeholder="Характеристики" class="mb-10 w-full h-10 border-b border-black text-center text-xl bg-transparent outline-none transition-all focus:bg-transparent/5 placeholder:text-[#C8C8C8]">
                        <label class="flex items-center justify-center mb-10 bg-transparent py-1 border-b border-black text-center text-xl cursor-pointer outline-none text-[#C8C8C8]">
                            Фото товара
                            <input type="file" class="hidden" />
                        </label>
                        <div class="flex-1"></div>
                        <button type="submit" class="py-3 text-xl bg-[#E98074] transition-all hover:bg-[#d67165]">
                            Применить
                        </button>
                    </form>
                </div>
            </div>
            <div class="w-80 border border-black h-[600px] flex items-center">
                <div class="h-[400px] mx-auto my-0 flex flex-col gap-20">
                    <h2 class="text-center text-2xl">
                        Удалить товар
                    </h2>
                    <form class="flex flex-col w-48 mx-auto my-0 h-full">
                        <input type="text" placeholder="Артикул" class="mb-10 w-full h-10 border-b border-black text-center text-xl bg-transparent outline-none transition-all focus:bg-transparent/5 placeholder:text-[#C8C8C8]">
                        <p class="text-center">
                            Видеокарта ASUS GeForce RTX 4080 ProArt OC edition [PROART-RTX4080-O16G]
                        </p>
                        <div class="flex-1"></div>
                        <button type="submit" class="py-3 text-xl bg-[#E98074] transition-all hover:bg-[#d67165]">
                            Удалить
                        </button>
                    </form>
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
