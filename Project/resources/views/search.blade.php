@extends('layouts.app')

@section('content')
    <div class="max-w-7xl w-full mx-auto my-0">
        <h1 class="text-2xl max-w-80 h-20 border-b border-black flex items-center justify-center mx-auto my-0 mb-20">
            Результаты поиска
        </h1>
        <ul class="flex flex-col gap-10">
            @foreach ($products as $product)
                <li>
                    <div class="w-full p-4 border border-black flex gap-8">
                        <img src="{{ asset('/storage/' . $product->image) }}" alt="" class="w-64 flex-1">
                        <div class="flex flex-col justify-between py-10 gap-10">
                            <div class="flex flex-col gap-3">
                                <h3 class="text-2xl">
                                    {{ $product->name }}
                                </h3>
                                <p class="text-xl text-right">
                                    {{ $product->price }} руб.
                                </p>
                            </div>
                            <div class="flex justify-between items-center">
                                <p class="text-2xl">
                                    #{{ $product->article }}
                                </p>
                                <div class="flex gap-5">
                                    <a href="{{ route('product.show', ['article' => $product->article]) }}"
                                        class="py-5 px-16 text-xl bg-[#D0C0A5] transition-all hover:bg-[#E98074]">
                                        Подробнее
                                    </a>
                                    <form action="{{ route('basket.upload') }}" method="POST">
                                        @csrf
                                        <input name="product" class="hidden" value="{{ $product->article }}">
                                        <button class="py-5 px-16 text-xl bg-[#E98074] transition-all hover:bg-[#d67165]">
                                            В корзину
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
