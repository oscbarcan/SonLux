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
                                        <img class="w-8 h-8 rounded-full" src="/assets/img/Products/{{$product->img}}"
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
        @if (session('success'))
            <div id="toast-success"
                class="fixed flex items-center w-full max-w-xs p-2 space-x-4 text-gray-500 bg-white divide-x rtl:divide-x-reverse divide-gray-200 rounded-lg shadow top-16 right-5 dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800"
                role="alert">
                <div
                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8">
                    <svg height="24px" width="24px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 511.998 511.998" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <polygon style="fill:#F4B2B0;" points="178.652,462.067 110.276,462.067 82.918,106.177 178.652,106.177 "></polygon> <path style="fill:#B3404A;" d="M311.198,70.475c-8.484,0-15.365-6.88-15.365-15.365V30.73H189.232V55.11 c0,8.484-6.88,15.365-15.365,15.365s-15.365-6.88-15.365-15.365V15.365C158.503,6.88,165.383,0,173.867,0h137.331 c8.484,0,15.365,6.88,15.365,15.365V55.11C326.563,63.596,319.684,70.475,311.198,70.475z"></path> <path style="fill:#F4B2B0;" d="M380.052,319.948l16.391-213.769H300.71v267.369C313.965,342.592,344.435,320.72,380.052,319.948z"></path> <g> <path style="fill:#B3404A;" d="M470.304,392.923c-8.484,0-15.365,6.88-15.365,15.365c0,40.242-32.741,72.983-72.983,72.983 c-40.243,0-72.984-32.741-72.984-72.983c0-34.479,24.522-63.845,57.028-71.208c0.011-0.002,0.02-0.005,0.031-0.006 c2.303-0.521,4.645-0.93,7.022-1.223c0.048-0.006,0.095-0.011,0.143-0.017c1.119-0.135,2.245-0.244,3.377-0.329 c0.081-0.006,0.164-0.014,0.246-0.018c1.183-0.083,2.374-0.14,3.571-0.166c8.077-0.171,14.554-6.544,15.005-14.475l15.282-199.302 h26.991c8.484,0,15.365-6.88,15.365-15.365s-6.88-15.365-15.365-15.365h-41.224h-95.735H178.652H82.918H41.695 c-8.484,0-15.365,6.88-15.365,15.365s6.88,15.365,15.365,15.365h26.994l26.268,341.704c0.615,8.005,7.291,14.186,15.32,14.186 h68.376h47.866c8.484,0,15.365-6.88,15.365-15.365c0-8.484-6.88-15.365-15.365-15.365h-32.501V121.542h91.327v248.965 c-4.648,11.891-7.103,24.653-7.103,37.779c0,57.188,46.526,103.712,103.714,103.712s103.712-46.525,103.712-103.712 C485.669,399.802,478.788,392.923,470.304,392.923z M316.075,121.542h63.782l-14.131,184.302c-0.069,0.011-0.137,0.026-0.206,0.035 c-0.931,0.147-1.856,0.32-2.781,0.492c-0.273,0.052-0.545,0.103-0.817,0.158c-16.835,3.283-32.529,10.675-45.846,21.666V121.542 H316.075z M163.287,446.703h-38.782L99.509,121.542h63.779v325.161H163.287z"></path> <path style="fill:#B3404A;" d="M403.685,408.297l7.968-7.968c6-6,6-15.729,0-21.73c-6.001-5.998-15.727-5.998-21.73,0l-7.968,7.968 l-7.968-7.968c-5.998-5.995-15.724-5.998-21.73,0c-6,6-6,15.729,0,21.73l7.968,7.968l-7.968,7.968c-6,6-6,15.729,0,21.73 c3.001,2.999,6.933,4.5,10.864,4.5c3.932,0,7.864-1.501,10.864-4.5l7.968-7.968l7.968,7.968c3.001,2.999,6.933,4.5,10.864,4.5 c3.932,0,7.864-1.501,10.864-4.5c6-6,6-15.729,0-21.73L403.685,408.297z"></path> </g> </g></svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ms-3 text-sm font-normal">{{ session('success') }}</div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                    data-dismiss-target="#toast-success" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif
    </div>
    @endsection
