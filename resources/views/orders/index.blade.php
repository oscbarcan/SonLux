@extends('layout')

@section('title', trans('orders.payment_gateway'))

@section('content')
    <style>
        ::-webkit-scrollbar {
            width: 8px;
            height: 10px;
        }

        ::-webkit-scrollbar-thumb {
            border-radius: 8px;
            background: #c2c9d2;
        }

        .purchase-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 255, 0.3);
            border-radius: 8px;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1;
        }

        .purchase-text {
            color: white;
            font-size: 2rem;
            font-weight: bold;
            transform: rotate(-45deg);
            white-space: nowrap;
        }

        .order-container {
            position: relative;
        }
    </style>

    <div class="min-h-full flex flex-row justify-center items-center mx-1">
        <div class="w-full flex justify-center items-center gap-9 flex-wrap mx-2">
            @forelse ($orders as $general_order)
            <div class="order-container min-w-96 w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                @if ($general_order->paid == 1)
                <div class="purchase-overlay">
                    <span class="purchase-text">{{ trans('orders.purchase_completed') }}</span>
                </div>
                @endif
                <div class="flex items-center justify-between mb-4">
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">{{ trans('orders.order_summary') }}</h5>
                    <div class="text-blue-500 hover:text-blue-700 cursor-pointer">
                        <a href="{{ route('payment-gateway-index', ['carrito' => json_encode($general_order->order_product->pluck('quantity', 'id_product')->toArray()), 'order' => $general_order->id]) }}">{{ trans('orders.pay') }}</a>
                    </div>
                    <div class="text-red-500 hover:text-red-700 cursor-pointer">
                        <a href="{{route('orders-destroy', ['id' => $general_order->id])}}">{{ trans('orders.discard') }}</a>
                    </div>
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
                            {{ trans('orders.no_products') }}
                        @endforelse
                    </ul>
                </div>
                <!-- Fin del contenedor con scrollbar -->
                <hr>
                <div class="flex justify-between mt-5">
                    <div class="font-semibold">{{ trans('orders.total') }}:</div>
                    <div class="font-semibold">{{$general_order->total_price}}€</div>
                </div>
            </div>
            @empty
                <div class="text-gray-600">{{ trans('orders.no_orders') }}</div>
            @endforelse
        </div>
    </div>
@endsection
