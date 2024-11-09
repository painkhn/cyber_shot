@extends('layouts.app')

@section('content')
    <div class="max-w-7xl w-full mx-auto my-0">
        <h1 class="text-2xl max-w-80 h-20 border-b border-black flex items-center justify-center mx-auto my-0 mb-20">
            Корзина
        </h1>
        <div class="w-full px-20 py-16 h-auto border border-black">
            <div class="flex justify-between w-full gap-10 mb-10">
                <img src="{{ asset('/storage/' . $product->image) }}" alt="" class="w-96">
                <div class="flex flex-col gap-3 text-center w-1/3 mx-auto my-0">
                    <p class="text-2xl">
                        {{ $product->price }} ₽
                    </p>
                    <button class="py-5 px-16 text-xl bg-[#E98074] transition-all hover:bg-[#d67165]">
                        Оплата по карте
                    </button>
                    <button class="py-5 px-16 text-xl bg-[#E98074] transition-all hover:bg-[#d67165]">
                        Оплата за наличные
                    </button>
                </div>
            </div>
            <div>
                <p class="text-2xl mb-5">
                    #{{ $product->article }}
                </p>
                <p class="text-2xl mb-5">
                   {{ $product->name }}
                </p>
                <h3 class="text-2xl mb-5">
                    Характеристики:
                </h3>
                <ul class="flex flex-col gap-5 pl-5">
                    <li class="text-xl">
                        {{ $product->description }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
