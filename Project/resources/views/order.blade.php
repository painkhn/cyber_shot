@extends('layouts.app')

@section('content')
    <h1 class="text-2xl max-w-80 h-20 border-b border-black flex items-center justify-center mx-auto my-0 mb-20">
        Подтверждение товаров
    </h1>
    <div class="max-w-7xl w-full mx-auto my-0">
        <div class="flex justify-between gap-10">
            <div class="max-w-80 w-full">
                <div class="p-16 border border-black w-full flex flex-col gap-12">
                    @if (Auth::user()->photo)
                        <img src="{{ asset('/storage/' . Auth::user()->photo) }}" alt="" class="rounded-full">
                    @else
                        <img src="{{ asset('img/avatar.png') }}" alt="" class="rounded-full">
                    @endif
                    <p class="text-center border-b border-black py-2 text-xl">
                        {{ Auth::user()->name }}
                    </p>
                </div>
            </div>
            <ul class="flex flex-col gap-8">
                @foreach ($orders as $order)
                    <li class="flex gap-5">
                        <div class="w-full p-4 border border-black flex flex-col gap-4">
                            <img src="{{ $order->product->photo }}" alt="" class="w-44">
                            <div>
                                <h3 class="mb-5 text-xl">
                                    {{ $order->product->name }}
                                </h3>
                                <div class="flex justify-between mb-5">
                                    <p class="text-xl">
                                        #{{ $order->product->article }}
                                    </p>
                                    <p class="text-xl">
                                        {{ $order->product->price }} руб.
                                    </p>
                                </div>
                                <div class="flex items-center justify-end gap-5">
                                    <form action="{{ route('order.update', [$order->id]) }}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <input type="text" name="status" id="status" value="rejected" class="hidden">
                                        <button class="py-2 px-6 text-xl bg-white transition-all hover:bg-black/10">
                                            Отменить
                                        </button>
                                    </form>
                                    <form action="{{ route('order.update', [$order->id]) }}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <input type="text" name="status" id="status" value="confirmed"
                                            class="hidden">
                                        <button class="py-2 px-6 text-xl bg-[#E98074] transition-all hover:bg-[#d67165]">
                                            Подтвердить
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
            <div class="max-w-80 w-full">
                <div class="py-12 px-11 border border-black w-full flex flex-col gap-12">
                    <a href="{{ route('admin.exel') }}"
                        class="w-full py-5 text-center bg-[#D0C0A5] text-xl transition-all hover:bg-[#E98074]">
                        Отчет по продажам
                    </a>
                </div>

                <div class="max-w-sm w-full rounded-lg p-4 md:p-6">

                    <div class="flex justify-between items-start w-full">
                        <div class="flex-col items-center">
                            <div class="flex items-center mb-1">
                                <h5 class="text-xl font-bold leading-none text-gray-900 me-1">Статистика заказов за все
                                    время</h5>
                            </div>
                        </div>
                    </div>

                    <!-- Line Chart -->
                    <div class="py-6" id="pie-chart"></div>
                </div>


            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


    <script>
        const rejected = {{ $rejected }};
        const confirmed = {{ $confirmed }};
        const total = {{ $total }};

        const getChartOptions = () => {
            return {
                series: [
                    total > 0 ? (rejected / total) * 100 : 0,
                    total > 0 ? (confirmed / total) * 100 : 0
                ],
                colors: ["#AB2323", "#6BD356"],
                chart: {
                    height: 420,
                    width: "100%",
                    type: "pie",
                },
                stroke: {
                    colors: ["white"],
                    lineCap: "",
                },
                plotOptions: {
                    pie: {
                        labels: {
                            show: true,
                        },
                        size: "100%",
                        dataLabels: {
                            offset: -25
                        }
                    },
                },
                labels: ["Отменено", "Продано"],
                dataLabels: {
                    enabled: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                    },
                },
                legend: {
                    position: "bottom",
                    fontFamily: "Inter, sans-serif",
                },
                yaxis: {
                    labels: {
                        formatter: function(value) {
                            return value + "%"
                        },
                    },
                },
                xaxis: {
                    labels: {
                        formatter: function(value) {
                            return value + "%"
                        },
                    },
                    axisTicks: {
                        show: false,
                    },
                    axisBorder: {
                        show: false,
                    },
                },
            }
        }

        if (document.getElementById("pie-chart") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("pie-chart"), getChartOptions());
            chart.render();
        }
    </script>
@endsection
