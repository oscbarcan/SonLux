@extends('layout')

@section('title', 'Perfil')

@section('content')
    <div class="flex justify-center items-center mt-10">
        <div class="flex flex-col items-center mt-10 bg-white p-6 rounded-lg shadow-md max-w-96">
            <img src="/assets/img/ProfilePictures/profile-picture.png" alt="profile-picture"
                class="w-48 h-48 rounded-full border-2 border-black border-solid mb-4">
            <div class="text-lg font-bold mb-2">Nombre: {{ $user->name }}</div>
            <div class="mb-2">Correo: {{ $user->email }}</div>
            <div class="mb-2">Telefono: {{ $user->phone_number }}</div>
            <div class="mb-2">Cuenta creada el: {{ $user->created_at }}</div>
            <div class="mb-2">Última modificación: {{ $user->updated_at }}</div>
            <a href="{{ route('users.edit', $user) }}" class="text-blue-500 hover:underline">Editar Cuenta</a>
        </div>
    </div>
@endsection
