@extends('layout')

@section('title', trans('users.Perfil'))

@section('content')
    <div class="flex justify-center items-center mt-10">
        <div class="flex flex-col items-center mt-10 bg-white p-6 rounded-lg shadow-md max-w-96">
            <img src="/assets/img/ProfilePictures/profile-picture.png" alt="profile-picture"
                class="w-48 h-48 rounded-full border-2 border-black border-solid mb-4">
            <div class="text-lg font-bold mb-2">{{ trans('users.Nombre') }}: {{ $user->name }}</div>
            <div class="mb-2">{{ trans('users.Correo') }}: {{ $user->email }}</div>
            <div class="mb-2">{{ trans('users.Numero de telefono') }}: {{ $user->phone_number }}</div>
            <div class="mb-2">{{ trans('users.Cuenta creada el') }}: {{ $user->created_at }}</div>
            <div class="mb-2">{{ trans('users.Última modificación') }}: {{ $user->updated_at }}</div>
            <a href="{{ route('users.edit', $user) }}" class="text-blue-500 hover:underline">{{ trans('users.Editar Cuenta') }}</a>
        </div>
    </div>
@endsection
