@extends('admin.layout')

@section('title', 'Usuarios')

@section('content')
    <div class="d-flex flex-column">
        <h4 class="text-lg font-bold">{{ trans('admin.Users') }}</h4>
        <ul class="flex items-center text-sm text-gray-500">
            <li><a href="#"> {{ trans('admin.Dashboard') }} </a></li>-
            <li><a href="#"> {{ trans('admin.Users') }} </a></li>-
            <li><a href="#"> {{ trans('admin.Edit') }} </a></li>
        </ul>
    </div>
    <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">{{ trans('admin.EditProfile') }}</h2>
        <form action="{{ route('admin.user.update', ['user' => $user]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">{{ trans('admin.Name') }}</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                    required>
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="surnames" class="block text-sm font-medium text-gray-700">{{ trans('admin.Surname') }}</label>
                <input type="text" name="surnames" id="surnames" value="{{ old('surnames', $user->surnames) }}"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                    required>
                @error('surnames')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="rol" class="block text-sm font-medium text-gray-700">{{ trans('admin.Rol') }}</label>
                <select name="rol" id="rol"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                    required>
                    <option value="admin" {{ old('rol', $user->rol) === 'admin' ? 'selected' : '' }}>
                        {{ trans('admin.Admin') }}</option>
                    <option value="user" {{ old('rol', $user->rol) === 'user' ? 'selected' : '' }}>
                        {{ trans('admin.User') }}</option>
                </select>
                @error('rol')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">{{ trans('admin.Email') }}</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                    required>
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="phone_number"
                    class="block text-sm font-medium text-gray-700">{{ trans('admin.PhoneNumber') }}</label>
                <input type="text" name="phone_number" id="phone_number"
                    value="{{ old('phone_number', $user->phone_number) }}"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                    required>
                @error('phone_number')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">{{ trans('admin.Password') }}</label>
                <input type="password" name="password" id="password"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password_confirmation"
                    class="block text-sm font-medium text-gray-700">{{ trans('admin.ConfirmPassword') }}</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-between">
                <a href="{{ route('admin.user.index', $user) }}">
                    <div
                        class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ trans('admin.Back') }}
                    </div>
                </a>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ trans('admin.SaveChanges') }}
                </button>
            </div>
        </form>
    </div>
@endsection
