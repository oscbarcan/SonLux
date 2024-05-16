@extends('admin.layout')

@section('title', 'Proveedor')

@section('styles')
    <link rel="stylesheet" href="/css/index.css">
@endsection

@section('content')
    <div class="d-flex flex-column">
        <h4 class="text-lg font-bold">Usuarios</h4>
        <ul class="flex items-center text-sm text-gray-500">
            <li><a href="#"> Dashborad </a></li>-
            <li><a href="#"> Proveedor </a></li>-
            <li><a href="#"> Create </a></li>
        </ul>
    </div>
    <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Crear Proveedor</h2>
        <form action="{{ route('admin.provider.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <div><label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" name="name" id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Descripcion</label>
                <textarea name="description" id="description" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full h-28 shadow-sm sm:text-sm border-gray-300 rounded-md" required></textarea>
            </div>
            <div class="flex justify-between">
                <a href="{{route('admin.provider.index')}}">
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
