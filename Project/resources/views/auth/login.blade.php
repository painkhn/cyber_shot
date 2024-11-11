@extends('layouts.app')

@section('content')
    <h1 class="text-2xl max-w-80 h-20 border-b border-black flex items-center justify-center mx-auto my-0 mb-20">
        Вход
    </h1>
    @if (session('error'))
        <div class="alert alert-danger text-center">
            {{ session('error') }}
        </div>
    @endif
    <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-10 max-w-xl w-full mx-auto my-0 mb-24">
        @csrf
        <input type="text" id="email" name="email" placeholder="Электронная почта"
            class="w-full text-center border-b border-black bg-transparent py-3 outline-none text-xl transition-all focus:bg-transparent/5"
            required>
        <input type="password" id="password" name="password" placeholder="Пароль"
            class="w-full text-center border-b border-black bg-transparent py-3 outline-none text-xl transition-all focus:bg-transparent/5"
            required>
        <div class="flex items-center gap-10">
            <a href="{{ route('register') }}"
                class="w-full py-3 bg-[#E98074] text-xl transition-all hover:bg-[#d67165] text-center">
                Регистрация
            </a>
            <button type="submit" class="w-full py-3 bg-[#E98074] text-xl transition-all hover:bg-[#d67165]">
                Вход
            </button>
        </div>
        <a href="{{ route('login.yandex') }}"
            class="w-full py-3 bg-[#E98074] text-xl transition-all hover:bg-[#d67165] text-center">
            Войти с Яндекс ID
        </a>
    </form>
    <div class="max-w-7xl w-full h-auto bg-[#D0C0A5] p-20 mx-auto my-0 flex items-center gap-20">
        <img src="{{ asset('img/card-img-2.png') }}" alt="" class="w-1/2">
        <div>
            <h2 class="text-2xl font-medium">
                Проведите тест-драйв бета-версии NVIDIA app
            </h2>
            <br>
            <p class="text-xl">
                Ранняя бета-версия NVIDIA app включает многие полезные функции из других приложений NVIDIA и упрощает их
                использование. Для активации бандлов и бонусов предусмотрена опциональная регистрация. Также приложение
                предлагает новые RTX-возможности, улучшающие игры и творчество.
            </p>
        </div>
    </div>
@endsection
