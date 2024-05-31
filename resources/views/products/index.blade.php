@extends('layout')

@section('title', 'Productos')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">
@endsection

@section('content')
    <h1 class="text-3xl font-semibold mb-8">Productos disponibles</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mx-auto max-w-7xl mb-5">
        @forelse ($products as $product)
        {{-- {{ dd(session()->all()) }} --}}
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <a href="#">
                    <div class="p-2">
                        <img class="w-full h-56 rounded-t-lg" src="{{ asset('assets/img/Products/' . $product->img) }}"
                            alt="Imagen del producto {{ $product->name }}" />
                    </div>
                </a>
                <div class="p-4">
                    <h3 class="text-xl font-semibold mb-2"><a href="#">{{ $product->name }}</a></h3>
                    <p class="text-gray-600 text-sm">Proveedor: <a href="#">{{ $product->provider->name }}</a></p>
                    <div class="flex justify-between items-center mt-4">
                        <span class="text-xl font-bold text-gray-900">{{ $product->price }}€</span>
                        <div class="flex items-center space-x-2">
                            <form action="{{ route('add-To-Cart') }}" method="POST" id="formulario">
                                @csrf
                                <button type="button" id="decrement-button-{{ $product->id }}"
                                    data-input-counter-decrement="quantity-input-{{ $product->id }}"
                                    class="text-gray-500 hover:text-gray-700 focus:outline-none"
                                    aria-label="Decrementar cantidad">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M20 12H4" />
                                    </svg>
                                </button>
                                <input type="text" id="quantity-input-{{ $product->id }}"
                                    name="quantity-input-{{ $product->id }}" data-input-counter
                                    aria-describedby="helper-text-explanation"
                                    class="w-16 border border-gray-300 rounded text-center focus:outline-none"
                                    value="0">
                                <button type="button" id="increment-button-{{ $product->id }}"
                                    data-input-counter-increment="quantity-input-{{ $product->id }}"
                                    class="text-gray-500 hover:text-gray-700 focus:outline-none"
                                    aria-label="Incrementar cantidad">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                </button>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2 mt-4">
                        @auth
                            <input type="hidden" name="productId" value="{{ $product->id }}">
                            <button type="submit"
                                class="w-full bg-blue-600 text-white hover:bg-blue-700 px-4 py-2 rounded-md focus:outline-none focus:ring focus:ring-blue-300">
                                Añadir al carrito
                            @else
                                <a href="{{ route('loginForm') }}"
                                    class="w-full text-center bg-blue-600 text-white hover:bg-blue-700 px-4 py-2 rounded-md focus:outline-none focus:ring focus:ring-blue-300">Añadir al carrito</a>
                            @endauth
                    </div>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-gray-600">No hay productos disponibles actualmente.</p>
        @endforelse
    </div>

    @if (session('success'))
        <div id="toast-success"
            class="fixed flex items-center w-full max-w-xs p-2 space-x-4 text-gray-500 bg-white divide-x rtl:divide-x-reverse divide-gray-200 rounded-lg shadow top-16 right-5 dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800"
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
@endsection
