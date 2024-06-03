@extends('admin.layout')

@section('title', trans('admin.Providers'))

@section('content')
    <div class="d-flex flex-column">
        <h4 class="text-lg font-bold">{{ trans('admin.Providers') }}</h4>
        <ul class="flex items-center text-sm text-gray-500">
            <li><a href="#"> {{ trans('admin.Dashborad') }} </a></li>-
            <li><a href="#"> {{ trans('admin.Providers') }} </a></li>-
            <li><a href="#"> {{ trans('admin.Edit') }} </a></li>
        </ul>
    </div>
    <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">{{ trans('admin.Edit') }} {{ trans('admin.Provider') }}</h2>

        <form action="{{ route('admin.provider.update', ['provider' => $provider]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">{{ trans('admin.Name') }}</label>
                <input type="text" name="name" id="name" value="{{ $provider->name }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">{{ trans('admin.Description') }}</label>
                <textarea name="description" id="description" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full h-28 shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $provider->description }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">{{ trans('admin.Image') }}</label>
                <input name="image" id="image" type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                @error('image')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-between">
                <a href="{{route('admin.provider.index')}}">
                    <div class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ trans('admin.Back') }}
                    </div>
                </a>
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ trans('admin.SaveChanges') }}
                </button>
            </div>
        </form>
    </div>
@endsection
