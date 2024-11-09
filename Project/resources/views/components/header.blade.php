<header class="w-full bg-[#D0C0A5] py-9">
    <div class="max-w-7xl w-full h-auto mx-auto my-0 flex items-center justify-between">
        <div>
            <a href="/">
                <img src="{{ asset('img/logo.png') }}" alt="">
            </a>
        </div>
        <nav>
            <ul class="flex items-center gap-16">
                @if (Auth::user() && Auth::user()->is_admin == 1)
                    <li>
                        <a href="{{ route('admin.index') }}"
                            class="text-2xl font-medium transition-all py-2 px-4 rounded-md hover:bg-transparent/5">Админка</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.orders') }}"
                            class="text-2xl font-medium transition-all py-2 px-4 rounded-md hover:bg-transparent/5">Заказы</a>
                    </li>
                @endif
                <li>
                    <a href="{{ route('basket.index') }}"
                        class="text-2xl font-medium transition-all py-2 px-4 rounded-md hover:bg-transparent/5">Корзина</a>
                </li>
                @auth
                    <li>
                        <a href="{{ route('profile.index') }}"
                            class="text-2xl font-medium transition-all py-2 px-4 rounded-md hover:bg-transparent/5">Профиль</a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login') }}"
                            class="text-2xl font-medium transition-all py-2 px-4 rounded-md hover:bg-transparent/5">Вход</a>
                    <li>
                    @endauth
            </ul>
        </nav>
    </div>
</header>
