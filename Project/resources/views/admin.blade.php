@extends('layouts.app')

@section('content')
    </h1>
    <div class="max-w-7xl w-full mx-auto my-0">
        <div class="flex justify-between">
            <div class="w-80 border border-black h-[600px] flex items-center">
                <div class="h-[400px] mx-auto my-0 flex flex-col gap-20">
                    <h2 class="text-center text-2xl">
                        Добавить товар
                    </h2>
                    <form class="w-48 flex flex-col mx-auto my-0 h-full">
                        <input type="text" placeholder="Название товара"
                            class="mb-10 w-full h-10 border-b border-black text-center text-xl bg-transparent outline-none transition-all focus:bg-transparent/5 placeholder:text-[#C8C8C8]">
                        <input type="text" placeholder="Характеристики"
                            class="mb-10 w-full h-10 border-b border-black text-center text-xl bg-transparent outline-none transition-all focus:bg-transparent/5 placeholder:text-[#C8C8C8]">
                        <label
                            class="flex items-center mb-10 justify-center bg-transparent py-1 border-b border-black text-center text-xl cursor-pointer outline-none text-[#C8C8C8]">
                            Фото товара
                            <input type="file" class="hidden" />
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
                        <input type="text" placeholder="Название товара"
                            class="mb-10 w-full h-10 border-b border-black text-center text-xl bg-transparent outline-none transition-all focus:bg-transparent/5 placeholder:text-[#C8C8C8]">
                        <input type="text" placeholder="Характеристики"
                            class="mb-10 w-full h-10 border-b border-black text-center text-xl bg-transparent outline-none transition-all focus:bg-transparent/5 placeholder:text-[#C8C8C8]">
                        <label
                            class="flex items-center justify-center mb-10 bg-transparent py-1 border-b border-black text-center text-xl cursor-pointer outline-none text-[#C8C8C8]">
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
                        <input type="text" placeholder="Артикул"
                            class="mb-10 w-full h-10 border-b border-black text-center text-xl bg-transparent outline-none transition-all focus:bg-transparent/5 placeholder:text-[#C8C8C8]">
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
@endsection
