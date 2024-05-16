@extends('admin.layout')

@section('title', 'Products')

@section('styles')
    <link rel="stylesheet" href="/css/index.css">
@endsection

@section('content')
    <div class="d-flex flex-column">
        <h4 class="text-lg font-bold">Usuarios</h4>
        <ul class="flex items-center text-sm text-gray-500">
            <li><a href="#"> Dashborad </a></li>-
            <li><a href="#"> Products </a></li>-
            <li><a href="#"> Edit </a></li>
        </ul>
    </div>
    <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Editar Producto</h2>
        <form action="{{ route('admin.product.update', ['product' => $product]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" name="name" id="name" value="{{ $product->name }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="provider" class="block text-sm font-medium text-gray-700">Proveedor</label>
                <select name="provider" id="provider" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @php
                        $providers = App\Models\Provider::all();
                    @endphp
                    @foreach ($providers as $provider)
                    <option value="{{$provider->id}}" {{ $provider->name === $product->provider->name ? 'selected' : '' }}>{{$provider->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Descripcion</label>
                <textarea name="description" id="description" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full h-28 shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $product->description }}</textarea>
            </div>
            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Precio</label>
                <input type="number" name="price" id="price" value="{{ $product->price }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Imagen</label>
                <input name="image" id="image" type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
            </div>
            <div class="mb-4">
                <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                <input type="checkbox" name="stock" id="stock" {{ $product->stock === 1 ? 'checked' : '' }} class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="flex justify-between">
                <a href="{{route('admin.product.index')}}">
                    <div class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Volver
                    </div>
                </a>
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Guardar Cambios
                </button>
            </div>
        </form>
    </div>

@endsection
