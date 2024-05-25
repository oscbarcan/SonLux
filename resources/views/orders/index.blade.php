@extends('layout')

@section('title', 'Pasarela de pago')

@section('content')
    <style>
        /* Estilos personalizados para la scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 10px;
        }

        ::-webkit-scrollbar-thumb {
            border-radius: 8px;
            background: #c2c9d2;
        }
    </style>

    <div class="min-h-full flex flex-row justify-center items-center mx-1">
        <div class="w-full flex justify-center items-center gap-9 flex-wrap mx-2">
            @forelse ($orders as $general_order)
            <div class="min-w-96 w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center justify-between mb-4">
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Resumen del pedido</h5>
                </div>
                <div class="flow-root" style="height: 12rem; overflow-y: auto; padding-right: 8px;">
                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse ($general_order->order_product as $order)
                            <?php
                                $product = App\Models\Product::find($order->id_product);
                            ?>

                            @if ($product)
                                <li class="py-3 sm:py-4">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <img class="w-8 h-8 rounded-full" src="/assets/img/Products/{{ $product->img }}" alt="Product image">
                                        </div>
                                        <div class="flex-1 min-w-0 ms-4">
                                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                {{ $product->name }} x{{ $order->quantity }}
                                            </p>
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                {{ $product->provider->name }}
                                            </p>
                                        </div>
                                        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                            {{ $product->price * $order->quantity }}€
                                        </div>
                                    </div>
                                </li>
                            @endif
                        @empty
                            No hay productos actualmente
                        @endforelse
                    </ul>
                </div>
                <!-- Fin del contenedor con scrollbar -->
                <hr>
                <div class="flex justify-between mt-5">
                    <div class="font-semibold">Total:</div>
                    <div class="font-semibold">{{$general_order->total_price}}€</div>
                </div>
            </div>
            @empty
                <div class="text-gray-600">No hay pedidos actualmente.</div>
            @endforelse
        </div>
    </div>
@endsection
