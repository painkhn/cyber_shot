@extends('layouts.app')

@section('content')
    <h1 class="text-2xl max-w-80 h-20 border-b border-black flex items-center justify-center mx-auto my-0 mb-20">
        Регистрация
    </h1>
    <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-10 max-w-xl w-full mx-auto my-0 mb-24">
        @csrf
        <input type="text" id="name" name="name" placeholder="Имя" class="w-full text-center border-b border-black bg-transparent py-3 outline-none text-xl transition-all focus:bg-transparent/5" required>
        <input type="text" id="email" name="email" placeholder="Электронная почта" class="w-full text-center border-b border-black bg-transparent py-3 outline-none text-xl transition-all focus:bg-transparent/5" required>
        <input type="password" id="password" name="password" placeholder="Пароль" class="w-full text-center border-b border-black bg-transparent py-3 outline-none text-xl transition-all focus:bg-transparent/5" required>
        <input type="password"  id="password_confirmation" name="password_confirmation" placeholder="Повторите пароль" class="w-full text-center border-b border-black bg-transparent py-3 outline-none text-xl transition-all focus:bg-transparent/5" required autocomplete="new-password">
        <div class="flex items-center gap-10">
            <a href="{{ route('login') }}" class="w-full py-3 bg-[#E98074] text-xl transition-all hover:bg-[#d67165] text-center">
                Вход
            </a>
            <button type="submit" class="w-full py-3 bg-[#E98074] text-xl transition-all hover:bg-[#d67165]">
                Регистрация
            </button>
        </div>
    </form>
    <div class="max-w-7xl w-full h-auto bg-[#D0C0A5] p-20 mx-auto my-0 flex items-center gap-20">
        <img src="{{ asset('img/card-img-3.png') }}" alt="" class="w-1/2">
        <div>
            <h2 class="text-2xl font-medium">
                Новые процессоры Intel Core Ultra: Более 500 моделей с искусственным интеллектом
            </h2>
            <br>
            <p class="text-xl">
                Компания Intel объявила о выпуске более 500 моделей с искусственным интеллектом, работающих на новых процессорах Intel Cor Ultra - лучшем в отрасли процессоре для ПК с искусственным интеллектом, доступном на сегодняшний день на рынке.
            </p>
        </div>
    </div>
@endsection
