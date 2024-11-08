@extends('layouts.app')

@section('content')
    <div class="max-w-4xl w-full h-auto mx-auto my-0 mb-[120px]">
        <form class="flex gap-3 items-center mb-24">
            <input type="search" name="searchInput" id="searchInput" class="h-14 border-2 px-4 font-medium text-lg bg-transparent transition-all focus:bg-transparent/5 border-black w-full outline-none">
            <button type="submit" class="border-black border-2 h-14 font-medium text-2xl px-10 transition-all hover:bg-transparent/5">ПОИСК</button>
        </form>
        <ul class="grid grid-cols-3 gap-14 gap-y-24">
            <li>
                <a href="#!" class="text-2xl w-full h-20 border-b border-black flex items-center justify-center transition-all hover:bg-transparent/5">
                    Видеокарта
                </a>
            </li>
            <li>
                <a href="#!" class="text-2xl w-full h-20 border-b border-black flex items-center justify-center transition-all hover:bg-transparent/5">
                    Оперативная память
                </a>
            </li>
            <li>
                <a href="#!" class="text-2xl w-full h-20 border-b border-black flex items-center justify-center transition-all hover:bg-transparent/5">
                    Материнская плата
                </a>
            </li>
            <li>
                <a href="#!" class="text-2xl w-full h-20 border-b border-black flex items-center justify-center transition-all hover:bg-transparent/5">
                    HDD
                </a>
            </li>
            <li>
                <a href="#!" class="text-2xl w-full h-20 border-b border-black flex items-center justify-center transition-all hover:bg-transparent/5">
                    Процессор
                </a>
            </li>
            <li>
                <a href="#!" class="text-2xl w-full h-20 border-b border-black flex items-center justify-center transition-all hover:bg-transparent/5">
                    Блок питания
                </a>
            </li>
            <li>
                <a href="#!" class="text-2xl w-full h-20 border-b border-black flex items-center justify-center transition-all hover:bg-transparent/5">
                    SSD
                </a>
            </li>
            <li>
                <a href="#!" class="text-2xl w-full h-20 border-b border-black flex items-center justify-center transition-all hover:bg-transparent/5">
                    Корпус
                </a>
            </li>
            <li>
                <a href="#!" class="text-2xl w-full h-20 border-b border-black flex items-center justify-center transition-all hover:bg-transparent/5">
                    Прочее
                </a>
            </li>
        </ul>
    </div>
    <div class="max-w-7xl w-full h-auto bg-[#D0C0A5] p-20 mx-auto my-0 flex items-center gap-20">
        <img src="{{ asset('img/card-img-1.png') }}" alt="" class="w-1/2">
        <div>
            <h2 class="text-2xl font-medium">
                AMD презентовала новые процессоры с самым мощным ИИ-ускорителем
            </h2>
            <br>
            <p class="text-xl">
                Новая линейка процессоров AMD Ryzen Embedded 8000 — это фактически та же мобильная линейка APU Ryzen 8000 с похожими характеристиками. Однако фишкой чипов является увеличенная мощность встроенного XDNA NPU-кластера, отвечающего за нейровычисления.
            </p>
        </div>
    </div>
@endsection
