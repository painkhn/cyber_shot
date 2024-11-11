@extends('layouts.app')

@section('content')
    <h1 class="text-2xl max-w-80 h-20 border-b border-black flex items-center justify-center mx-auto my-0 mb-20">
        Добавление карты
    </h1>
    <div class="max-w-3xl w-full h-auto mx-auto my-0 py-16 px-32 border border-black">
        <form class="flex flex-col gap-6" method="POST" action="{{ route('card.upload') }}">
            @csrf
            <input type="text" placeholder="XXXX XXXX XXXX XXXX" name="number"
                class="cardInput w-full h-10 border border-black bg-transparent outline-none px-4 text-2xl transition-all focus:bg-transparent/5">
            <div class="flex w-full gap-6">
                <input type="text" placeholder="Срок" name="date"
                    class="expiryInput w-2/3 h-10 border border-black bg-transparent outline-none px-4 text-2xl transition-all focus:bg-transparent/5">
                <input type="number" oninput="this.value = this.value.slice(0, 3)" placeholder="Код" name="cvv"
                    class="w-1/3 h-10 border border-black bg-transparent outline-none px-4 text-2xl transition-all focus:bg-transparent/5">
            </div>
            <button type="submit" class="w-full h-10 bg-[#E98074] text-xl transition-all hover:bg-[#d67165]">
                Добавить карту
            </button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cardInput = document.querySelector('.cardInput');

            cardInput.addEventListener('input', function(e) {
                let value = this.value.replace(/\D/g, '');

                let formattedValue = '';
                for (let i = 0; i < value.length; i++) {
                    if (i > 0 && i % 4 === 0) {
                        formattedValue += ' ';
                    }
                    formattedValue += value[i];

                    if (formattedValue.replace(/\s/g, '').length >= 16) {
                        break;
                    }
                }

                this.value = formattedValue;
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const expiryInput = document.querySelector('.expiryInput');

            expiryInput.addEventListener('input', function(e) {

                let value = this.value.replace(/\D/g, '');
                let formattedValue = '';

                for (let i = 0; i < value.length; i++) {
                    if (i === 2) {
                        formattedValue += '/';
                    }
                    formattedValue += value[i];
                    if (formattedValue.length >= 5) {
                        break;
                    }
                }

                this.value = formattedValue;
            });
        });
    </script>
@endsection
