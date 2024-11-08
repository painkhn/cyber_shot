@extends('layouts.app')

@section('content')
    <div class="max-w-7xl w-full h-auto mx-auto my-0 flex justify-between gap-16">
        <div class="max-w-80 w-full flex flex-col gap-12">
            <div class="p-16 border border-black w-full flex flex-col gap-12">
                @if ($user->photo)
                    <img src="{{ asset('/storage/' . $user->photo) }}" alt="" class="rounded-full">
                @else
                    <img src="{{ asset('img/avatar.png') }}" alt="" class="rounded-full">
                @endif
                <p class="text-center border-b border-black py-2 text-xl">
                    {{ $user->name }}
                </p>
                <p class="text-center border-b border-black py-2 text-xl">
                    Всего покупок: 2
                </p>
            </div>
            <h2 class="text-2xl text-center">
                Редактирование
            </h2>
            <div class="border border-black w-full h-auto py-16 px-8">
                <form class="flex flex-col gap-10" method="post" action="{{ route('profile.update') }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <!-- <button class="w-full bg-[#D0C0A5] py-5 text-2xl transition-all hover:bg-[#E98074]">Изменить фото</button> -->
                    <label
                        class="flex items-center justify-center bg-transparent py-2 border-b border-black text-center text-2xl cursor-pointer outline-none text-black/50">
                        Изменить фото
                        <input type="file" class="hidden" id="photo" name="photo" />
                    </label>
                    <input type="text" placeholder="Изменить имя" id="name" name="name"
                        value="{{ $user->name }}"
                        class="bg-transparent transition-all focus:bg-transparent/5 py-2 border-b border-black text-center text-2xl placeholder:text-black/50 outline-none"
                        required>
                    <button type="submit"
                        class="w-full bg-[#D0C0A5] py-5 text-2xl transition-all hover:bg-[#E98074]">Применить</button>
                </form>
            </div>
        </div>
        <div class="w-full h-auto">
            <!-- <div class="w-3/4">

                                                                                                                                                                                                                                                                                                                                    </div> -->
            <h2 class="text-2xl text-center mb-9">
                История покупок
            </h2>
            <ul class="flex flex-col gap-8">
                <li class="flex gap-5">
                    <div class="w-full p-4 border border-black flex gap-4 items-center">
                        <img src="{{ asset('img/product.png') }}" alt="" class="w-44">
                        <div>
                            <h3 class="mb-5 text-xl">
                                Видеокарта ASUS GeForce RTX 4080 ProArt OC edition [PROART-RTX4080-O16G]
                            </h3>
                            <div class="flex justify-between">
                                <p class="text-xl">
                                    #000000
                                </p>
                                <p class="text-xl">
                                    165.999 руб.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="px-8 w-1/3 flex items-center border-l border-black">
                        <p class="text-2xl text-[#E98074]">
                            Доставлен
                        </p>
                    </div>
                </li>
                <li class="flex gap-5">
                    <div class="w-full p-4 border border-black flex gap-4 items-center">
                        <img src="{{ asset('img/product.png') }}" alt="" class="w-44">
                        <div>
                            <h3 class="mb-5 text-xl">
                                Видеокарта ASUS GeForce RTX 4080 ProArt OC edition [PROART-RTX4080-O16G]
                            </h3>
                            <div class="flex justify-between">
                                <p class="text-xl">
                                    #000000
                                </p>
                                <p class="text-xl">
                                    165.999 руб.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="px-8 w-1/3 flex items-center border-l border-black">
                        <p class="text-2xl text-[#8E8D89]">
                            Не доставлен
                        </p>
                    </div>
                </li>
                <li class="flex gap-5">
                    <div class="w-full p-4 border border-black flex gap-4 items-center">
                        <img src="{{ asset('img/product.png') }}" alt="" class="w-44">
                        <div>
                            <h3 class="mb-5 text-xl">
                                Видеокарта ASUS GeForce RTX 4080 ProArt OC edition [PROART-RTX4080-O16G]
                            </h3>
                            <div class="flex justify-between">
                                <p class="text-xl">
                                    #000000
                                </p>
                                <p class="text-xl">
                                    165.999 руб.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="px-8 w-1/3 flex items-center border-l border-black">
                        <p class="text-2xl text-[#8E8D89]">
                            Не доставлен
                        </p>
                    </div>
                </li>
                <li class="flex gap-5">
                    <div class="w-full p-4 border border-black flex gap-4 items-center">
                        <img src="{{ asset('img/product.png') }}" alt="" class="w-44">
                        <div>
                            <h3 class="mb-5 text-xl">
                                Видеокарта ASUS GeForce RTX 4080 ProArt OC edition [PROART-RTX4080-O16G]
                            </h3>
                            <div class="flex justify-between">
                                <p class="text-xl">
                                    #000000
                                </p>
                                <p class="text-xl">
                                    165.999 руб.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="px-8 w-1/3 flex items-center border-l border-black">
                        <p class="text-2xl text-[#8E8D89]">
                            Не доставлен
                        </p>
                    </div>
                </li>
                <li class="flex gap-5">
                    <div class="w-full p-4 border border-black flex gap-4 items-center">
                        <img src="{{ asset('img/product.png') }}" alt="" class="w-44">
                        <div>
                            <h3 class="mb-5 text-xl">
                                Видеокарта ASUS GeForce RTX 4080 ProArt OC edition [PROART-RTX4080-O16G]
                            </h3>
                            <div class="flex justify-between">
                                <p class="text-xl">
                                    #000000
                                </p>
                                <p class="text-xl">
                                    165.999 руб.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="px-8 w-1/3 flex items-center border-l border-black">
                        <p class="text-2xl text-[#8E8D89]">
                            Не доставлен
                        </p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
@endsection
