@extends('layouts.app')

@section('content')
    <div class="max-w-7xl w-full mx-auto my-0">
        <h1 class="text-2xl max-w-80 h-20 border-b border-black flex items-center justify-center mx-auto my-0 mb-20">
            Корзина
        </h1>
        <ul class="flex flex-col gap-10">
            @if ($basketItems && $basketItems->count() > 0)
                @foreach ($basketItems as $basketItem)
                    @if ($basketItem->product)
                        <li>
                            <div class="w-full p-4 border border-black flex gap-8">
                                <img src="{{ asset('/storage/' . $basketItem->product->image) }}" alt=""
                                    class="w-64 flex-1">
                                <div class="flex flex-col justify-between py-10 gap-10">
                                    <div class="flex flex-col gap-3">
                                        <h3 class="text-2xl">
                                            {{ $basketItem->product->name }}
                                        </h3>
                                        <p class="text-xl text-right">
                                            {{ $basketItem->product->price }} руб.
                                        </p>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <p class="text-2xl">
                                            #{{ $basketItem->product->article ?? 'N/A' }}
                                        </p>
                                        <div class="flex gap-5">
                                            <form action="{{ route('basket.destroy') }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="text" name="product" id="product" class="hidden"
                                                    value="{{ $basketItem->id }}">
                                                <button
                                                    class="py-5 px-16 text-xl bg-[#D0C0A5] transition-all hover:bg-[#E98074]">
                                                    Удалить
                                                </button>
                                            </form>
                                            <a href="{{ route('product.show', ['article' => $basketItem->product->article ?? 'default']) }}"
                                                class="py-5 px-16 text-xl bg-[#E98074] transition-all hover:bg-[#d67165]">
                                                Купить
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endif
                @endforeach
            @else
                <p>Корзина пуста</p>
            @endif
        </ul>

        <div class="w-1/2 border border-black mt-10 py-16 mx-auto my-0 flex flex-col items-center gap-9">
            <h3 class="text-2xl">
                Общая цена: {{ $totalPrice }} руб.
            </h3>
            <button class="py-5 px-24 text-xl bg-[#E98074] transition-all hover:bg-[#d67165]">
                Купить
            </button>
        </div>
    </div>
@endsection
