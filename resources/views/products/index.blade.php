@extends('layout')

@section('title', trans('products.title'))

@section('content')
<div class="flex justify-between items-center mx-80">
    <h1 class="text-3xl font-semibold">{{ trans('products.title') }}</h1>
    <a href="{{route('shoping-cart')}}">
        <svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="50px" height="50px" viewBox="0 0 287.755 287.755" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M134.16,279.13c-15.24,0-26.715-12.31-26.715-27.544c0-15.162,11.475-26.638,26.715-26.638 c15.162,0,27.472,11.476,27.472,26.638C161.626,266.821,149.316,279.13,134.16,279.13z"></path> <path d="M265.515,176.575c-1.682,7.085-2.275,19.503-6.762,25.244c-2.708,3.465-6.773,5.626-11.943,5.626H92.21 c-9.962,0-18.056-8.022-18.056-18.003c0-6.461-18.507-98.199-25.497-132.633c-1.453-7.146-8.551-12.995-15.834-13.061 l-14.711-0.141c-19.786,0-18.075-18.774-18.075-18.774c0.384-6.626,2.642-10.581,5.434-12.911 c5.597-4.668,18.231-3.008,25.347-3.02l12.874-0.024c22.146,0,30.883,12.661,34.317,22.929c2.312,6.917,3.495,18.735,5.05,25.857 l22.104,100.829c1.561,7.122,8.737,12.893,16.021,12.893H222.31c7.29,0,14.412-5.771,15.907-12.91l16.507-78.486 c2.132-9.217,5.566-13.627,9.086-15.501c6.425-3.444,19.882,1.63,22.416,8.455c3.759,10.157-0.595,27.37-0.595,27.37 S272.691,146.484,265.515,176.575z"></path> <path d="M224.382,279.13c-15.18,0-26.649-12.31-26.649-27.544c0-15.162,11.47-26.638,26.649-26.638 c15.162,0,27.525,11.476,27.525,26.638C251.908,266.821,239.544,279.13,224.382,279.13z"></path> <path d="M135.085,153.335c-4.984,0-9.025-4.053-9.025-9.043c0-4.978,4.042-9.031,9.025-9.031c4.996,0,9.031,4.053,9.031,9.031 C144.116,149.283,140.087,153.335,135.085,153.335z"></path> <path d="M171.209,153.335c-4.983,0-9.024-4.053-9.024-9.043c0-4.978,4.041-9.031,9.024-9.031c4.979,0,9.031,4.053,9.031,9.031 C180.241,149.283,176.188,153.335,171.209,153.335z"></path> <path d="M207.323,153.335c-4.99,0-9.031-4.053-9.031-9.043c0-4.978,4.041-9.031,9.031-9.031c4.978,0,9.025,4.053,9.025,9.031 C216.348,149.283,212.3,153.335,207.323,153.335z"></path> <path d="M117.022,117.21c-4.972,0-9.037-4.035-9.037-9.021c0-4.981,4.065-9.035,9.037-9.035c5.008,0,9.043,4.053,9.043,9.035 C126.06,113.175,122.024,117.21,117.022,117.21z"></path> <path d="M153.147,99.161c4.984,0,9.025,4.044,9.025,9.028c0,4.986-4.041,9.028-9.025,9.028c-4.989,0-9.031-4.042-9.031-9.028 C144.116,103.205,148.158,99.161,153.147,99.161z"></path> <path d="M189.266,99.161c4.984,0,9.025,4.044,9.025,9.028c0,4.986-4.041,9.028-9.025,9.028c-4.99,0-9.031-4.042-9.031-9.028 C180.235,103.205,184.276,99.161,189.266,99.161z"></path> <path d="M225.379,99.161c4.983,0,9.024,4.044,9.024,9.028c0,4.986-4.041,9.028-9.024,9.028c-4.99,0-9.031-4.042-9.031-9.028 C216.348,103.205,220.389,99.161,225.379,99.161z"></path> <path d="M207.323,81.104c-4.99,0-9.031-4.053-9.031-9.022c0-4.993,4.041-9.031,9.031-9.031c4.978,0,9.025,4.032,9.025,9.031 C216.348,77.051,212.3,81.104,207.323,81.104z"></path> <path d="M171.209,81.104c-4.983,0-9.024-4.053-9.024-9.022c0-4.993,4.041-9.031,9.024-9.031c4.979,0,9.031,4.032,9.031,9.031 C180.241,77.051,176.188,81.104,171.209,81.104z"></path> <path d="M135.085,81.104c-4.984,0-9.025-4.053-9.025-9.022c0-4.993,4.042-9.031,9.025-9.031c4.996,0,9.031,4.032,9.031,9.031 C144.116,77.051,140.087,81.104,135.085,81.104z"></path> </g> </g></svg>
    </a>
</div>0
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mx-auto max-w-7xl mb-5">
        @forelse ($products as $product)
        {{-- {{ dd(session()->all()) }} --}}
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <a href="#">
                    <div class="p-2">
                        <img class="w-full h-56 rounded-t-lg" src="{{ asset('assets/img/Products/' . $product->img) }}"
                            alt="{{ trans('products.image_alt') }} {{ $product->name }}" />
                    </div>
                </a>
                <div class="p-4">
                    <h3 class="text-xl font-semibold mb-2"><a href="#">{{ $product->name }}</a></h3>
                    <p class="text-gray-600 text-sm">{{ trans('products.provider') }}: <a href="#">{{ $product->provider->name }}</a></p>
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
                                {{trans('products.add_to_cart')}}
                            @else
                                <a href="{{ route('loginForm') }}"
                                    class="w-full text-center bg-blue-600 text-white hover:bg-blue-700 px-4 py-2 rounded-md focus:outline-none focus:ring focus:ring-blue-300">{{trans('products.add_to_cart')}}</a>
                            @endauth
                    </div>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-gray-600">No hay title actualmente.</p>
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
