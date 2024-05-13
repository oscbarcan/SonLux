@extends('layout')

@section('title', 'Productos')

@section('styles')
    <link rel="stylesheet" href="/css/products.css">
@endsection

@section('content')
    <div class="flex flex-row flex-wrap gap-5 self-center justify-center mt-10">
        <div
            class="w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Productos en el carrito</h5>
                <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                    Pagar
                </a>
            </div>
            <div class="flow-root">
                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse ($carrito as $productId => $quantity)
                        <?php
                        $product = App\Models\Product::find($productId);
                        ?>
                        @if ($product)
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <img class="w-8 h-8 rounded-full" src="assets\img\{{$product->img}}"
                                            alt="Neil image">
                                    </div>
                                    <div class="flex-1 min-w-0 ms-4">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            {{ $product->name }} x{{ $quantity }}
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            {{ $product->provider->name }}
                                        </p>
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        {{ $product->price * $quantity}}€
                                    </div>
                                    <a href="{{route('delete-Shoping-Cart', ['id' => $product->id])}}" class="cursor-pointer">
                                        <svg class="ml-3" width="15px" height="15px" viewBox="0 0 128 128" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--noto" preserveAspectRatio="xMidYMid meet" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M58.9 78.6l-41.3 41.9c-1.5 1.5-3.2 2.5-5 3c4.1 1.2 8.6.2 11.8-3l38.2-38.1c.8-.8 2.1-.8 2.8 0l-3.7-3.8c-.7-.8-2-.8-2.8 0z" fill="#c33"> </path> <path d="M82.3 65.4c-.8-.8-.8-2 0-2.8l38.2-38.1c4.7-4.7 4.7-12.3 0-17s-12.2-4.7-16.9 0L65.4 45.6c-.8.8-2 .8-2.8 0L24.5 7.5c-4.7-4.7-12.3-4.7-17 0c-.4.4-.7.8-1 1.2c.2-.3.4-.5.6-.7c4.7-4.6 10.1-2.5 14.8 2.2l37.6 38.5c.8.8 2 .8 2.8 0l39.3-39.2c4.7-4.7 9.4-5.1 14.1-.4s3.9 9.6-.8 14.3L75.6 62.6c-.8.8-.8 2 0 2.8c0 0 38.1 38.2 38 38.2c4.7 4.7 6.5 10 1.8 14.7s-10.6 3.5-15.3-1.1l3.4 3.4c4.7 4.7 12.3 4.7 17 0s4.7-12.2 0-16.9c0-.1-38.2-38.3-38.2-38.3z" fill="#c33"> </path> <path d="M115.4 118.3c4.7-4.7 2.9-10-1.8-14.7c.1 0-38-38.2-38-38.2c-.8-.8-.8-2 0-2.8l39.3-39.2c4.7-4.7 5.5-9.6.8-14.3s-9.4-4.3-14.1.4L62.3 48.7c-.8.8-2 .8-2.8 0L21.9 10.2C17.2 5.5 11.8 3.4 7.1 8c-.2.2-.4.4-.6.7c-3.7 4.7-3.3 11.4 1 15.7l38.1 38.2c.8.8.8 2.1 0 2.8L7.5 103.5c-4.7 4.7-4.7 12.3 0 17c1.5 1.5 3.2 2.5 5 3c1.8-.6 3.6-1.6 5-3l41.3-41.9c.8-.8 2.1-.8 2.8 0l3.7 3.8l34.7 34.8c4.8 4.6 10.7 5.8 15.4 1.1z" fill="#f44336"> </path> <g fill="#ffffff"> <path d="M55 56.4c-1.1-1.6-32.3-33.1-32.3-33.1s-2.3-2.6-4.7-.8c-2.2 1.7-1.1 4.3.1 5.6s29 29.7 30.4 30.9c1.3 1.2 3.9 1.4 5.5.6s1.8-2.1 1-3.2z" opacity=".2"> </path> <circle cx="12.2" cy="19" r="3.3" opacity=".2"> </circle> </g> <path d="M72.1 81.8c1.1 1.6 32.8 32.6 32.8 32.6s2.3 2.6 4.7.7c2.2-1.7 1-4.3-.2-5.6c-1.2-1.3-29.4-29.3-30.8-30.5c-1.3-1.2-3.9-1.3-5.5-.5s-1.8 2.2-1 3.3z" opacity=".2" fill="#ffffff"> </path> </g></svg>
                                    </a>
                                </div>
                            </li>
                        @endif
                    @empty
                        No hay productos actualmente
                    @endforelse
                </ul>
            </div>
        </div>

    @endsection
