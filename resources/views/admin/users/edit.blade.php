@extends('admin.layout')

@section('title', 'Users')

@section('styles')
    <link rel="stylesheet" href="/css/index.css">
@endsection

@section('content')
    <div class="d-flex flex-column">
        <h4 class="text-lg font-bold">Usuarios</h4>
        <ul class="flex items-center text-sm text-gray-500">
            <li><a href="#"> Dashborad </a></li>-
            <li><a href="#"> Users </a></li>-
            <li><a href="#"> Edit </a></li>
        </ul>
    </div>
    <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Editar Perfil</h2>
        <form action="{{ route('admin.user.update', ['user' => $user]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="surnames" class="block text-sm font-medium text-gray-700">Apellidos</label>
                <input type="text" name="surnames" id="surnames" value="{{ $user->surnames }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="rol" class="block text-sm font-medium text-gray-700">Rol</label>
                <select name="rol" id="rol" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    <option value="admin" {{ $user->rol === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ $user->rol === 'member' ? 'selected' : '' }}>User</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Correo</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="phone_number" class="block text-sm font-medium text-gray-700">Numero de telefono</label>
                <input type="text" name="phone_number" id="phone_number" value="{{ $user->phone_number }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="flex justify-between">
                <a href="{{route('admin.user.index', $user)}}">
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
