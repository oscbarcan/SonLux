@extends('layout')

@section('title', 'Productos')

@section('styles')
    <link rel="stylesheet" href="/css/products.css">
@endsection

@section('content')
    <h1>Productos disponibles</h1>
    <div class="flex flex-row flex-wrap gap-5 self-center justify-center mt-10">
        @forelse ($products as $product)
            {{-- {{ dd(session()->all()) }} --}}
            {{-- {{dd($product)}} --}}
            <div
                class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <div class="mx-2 my-2">
                        <img class="w-full h-[200px] object-cover rounded-t-lg" src="assets/img/{{ $product->img }}"
                            alt="product image" />
                    </div>
                </a>
                <div class="px-5">
                    <div class="flex items-center justify-between pb-5">
                        <a href="#">
                            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                {{ $product->name }}
                            </h5>
                        </a>
                        <a href="#">
                            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                {{ $product->provider->name }}</h5>
                        </a>
                    </div>
                    <form action="{{ route('add-To-Cart') }}" method="POST" id="formulario">
                        @csrf
                        <div class="flex items-center justify-between">
                            <span class="text-3xl font-bold text-gray-900 dark:text-white">{{ $product->price }}€</span>
                            <div class="relative flex items-center max-w-[8rem]">
                                <button type="button" id="decrement-button-{{ $product->id }}" data-input-counter-decrement="quantity-input-{{ $product->id }}"
                                    class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 1h16" />
                                    </svg>
                                </button>
                                <input type="text" id="quantity-input-{{ $product->id }}" name="quantity-input-{{ $product->id }}" data-input-counter
                                    aria-describedby="helper-text-explanation"
                                    class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="0" required />
                                <button type="button" id="increment-button-{{ $product->id }}" data-input-counter-increment="quantity-input-{{ $product->id }}"
                                    class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M9 1v16M1 9h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="flex justify-center mt-5">
                            @auth
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Add to cart</button>
                            @else
                                <a href="{{ route('loginForm') }}"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Add
                                    to cart</a>
                            @endauth
                        </div>
                        <input type="hidden" name="productId" value="{{ $product->id }}">
                    </form>
                </div>
            </div>
        @empty
            No hay productos actualmente
        @endforelse
        @if (session('success'))
            <div id="toast-success"
                class="fixed flex items-center w-full max-w-xs p-4 space-x-4 text-gray-500 bg-white divide-x rtl:divide-x-reverse divide-gray-200 rounded-lg shadow top-14 right-5 dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800"
                role="alert">
                <div
                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
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

{{-- @section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        const $targetEl = document.getElementById('toast-success');

        // options object
        const options = {
            transition: 'transition-opacity',
            duration: 10000,
            timing: 'ease-out',

            // callback functions
            onHide: (context, targetEl) => {
                console.log('element has been dismissed');
                console.log(targetEl);
            }
        };

        // Create a new Dismiss object
        const dismiss = new Dismiss($targetEl, null, options);

        // Trigger hide method
        dismiss.hide();
    });
    </script>
@endsection --}}
