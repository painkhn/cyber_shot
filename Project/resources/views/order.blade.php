@extends('layouts.app')

@section('content')
    <h1 class="text-2xl max-w-80 h-20 border-b border-black flex items-center justify-center mx-auto my-0 mb-20">
        Подтверждение товаров
    </h1>
    <div class="max-w-7xl w-full mx-auto my-0">
        <div class="flex justify-between gap-10">
            <div class="max-w-80 w-full">
                <div class="p-16 border border-black w-full flex flex-col gap-12">
                    <img src="../public/avatar.png" alt="" class="rounded-full">
                    <p class="text-center border-b border-black py-2 text-xl">
                        Username
                    </p>
                    <p class="text-center border-b border-black py-2 text-xl">
                        Всего покупок: 2
                    </p>
                </div>
            </div>
            <ul class="flex flex-col gap-8">
                <li class="flex gap-5">
                    <div class="w-full p-4 border border-black flex flex-col gap-4">
                        <img src="../public/product.png" alt="" class="w-44">
                        <div>
                            <h3 class="mb-5 text-xl">
                                Видеокарта ASUS GeForce RTX 4080 ProArt OC edition [PROART-RTX4080-O16G]
                            </h3>
                            <div class="flex justify-between mb-5">
                                <p class="text-xl">
                                    #000000
                                </p>
                                <p class="text-xl">
                                    165.999 руб.
                                </p>
                            </div>
                            <div class="flex items-center justify-end gap-5">
                                <button class="py-2 px-6 text-xl bg-white transition-all hover:bg-black/10">
                                    Отменить
                                </button>
                                <button class="py-2 px-6 text-xl bg-[#E98074] transition-all hover:bg-[#d67165]">
                                    Подтвердить
                                </button>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="flex gap-5">
                    <div class="w-full p-4 border border-black flex flex-col gap-4">
                        <img src="../public/product.png" alt="" class="w-44">
                        <div>
                            <h3 class="mb-5 text-xl">
                                Видеокарта ASUS GeForce RTX 4080 ProArt OC edition [PROART-RTX4080-O16G]
                            </h3>
                            <div class="flex justify-between mb-5">
                                <p class="text-xl">
                                    #000000
                                </p>
                                <p class="text-xl">
                                    165.999 руб.
                                </p>
                            </div>
                            <div class="flex items-center justify-end gap-5">
                                <button class="py-2 px-6 text-xl bg-white transition-all hover:bg-black/10">
                                    Отменить
                                </button>
                                <button class="py-2 px-6 text-xl bg-[#E98074] transition-all hover:bg-[#d67165]">
                                    Подтвердить
                                </button>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="flex gap-5">
                    <div class="w-full p-4 border border-black flex flex-col gap-4">
                        <img src="../public/product.png" alt="" class="w-44">
                        <div>
                            <h3 class="mb-5 text-xl">
                                Видеокарта ASUS GeForce RTX 4080 ProArt OC edition [PROART-RTX4080-O16G]
                            </h3>
                            <div class="flex justify-between mb-5">
                                <p class="text-xl">
                                    #000000
                                </p>
                                <p class="text-xl">
                                    165.999 руб.
                                </p>
                            </div>
                            <div class="flex items-center justify-end gap-5">
                                <button class="py-2 px-6 text-xl bg-white transition-all hover:bg-black/10">
                                    Отменить
                                </button>
                                <button class="py-2 px-6 text-xl bg-[#E98074] transition-all hover:bg-[#d67165]">
                                    Подтвердить
                                </button>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="flex gap-5">
                    <div class="w-full p-4 border border-black flex flex-col gap-4">
                        <img src="../public/product.png" alt="" class="w-44">
                        <div>
                            <h3 class="mb-5 text-xl">
                                Видеокарта ASUS GeForce RTX 4080 ProArt OC edition [PROART-RTX4080-O16G]
                            </h3>
                            <div class="flex justify-between mb-5">
                                <p class="text-xl">
                                    #000000
                                </p>
                                <p class="text-xl">
                                    165.999 руб.
                                </p>
                            </div>
                            <div class="flex items-center justify-end gap-5">
                                <button class="py-2 px-6 text-xl bg-white transition-all hover:bg-black/10">
                                    Отменить
                                </button>
                                <button class="py-2 px-6 text-xl bg-[#E98074] transition-all hover:bg-[#d67165]">
                                    Подтвердить
                                </button>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="max-w-80 w-full">
                <div class="py-12 px-11 border border-black w-full flex flex-col gap-12">
                    <a href="#!" class="w-full py-5 text-center bg-[#D0C0A5] text-xl transition-all hover:bg-[#E98074]">
                        Отчет по продажам
                    </a>
                    <a href="#!" class="w-full py-5 text-center bg-[#D0C0A5] text-xl transition-all hover:bg-[#E98074]">
                        Изменить фото
                    </a>
                    <a href="#!" class="w-full py-5 text-center bg-[#D0C0A5] text-xl transition-all hover:bg-[#E98074]">
                        Изменить имя
                    </a>
                    <a href="#!" class="w-full py-5 text-center bg-[#D0C0A5] text-xl transition-all hover:bg-[#E98074]">
                        Панель управления
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
