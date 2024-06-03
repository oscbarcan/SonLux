@extends('layout')

@section('title', trans('auth.Login'))

@section('content')
@if(Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
    <div class="flex justify-center items-center h-full">
        <form action="{{ route('login') }} " method="post">
            @csrf
            <div class="grid mb-6 md:grid-cols-1">
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ trans('auth.EmailAddress') }}</label>
                    <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ trans('auth.EmailPlaceholder') }}" required />
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ trans('auth.Password') }}</label>
                    <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ trans('auth.PasswordPlaceholder') }}" required />
                </div>
                <div class="flex items-start mb-6">
                    <div class="flex items-center h-5">
                        <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" required />
                    </div>
                    <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ trans('auth.AcceptTerms') }} <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">{{ trans('auth.TermsAndConditions') }}</a>.</label>
                </div>
                @if(session('error'))
                <div class="mb-6">
                  <label for="error" class="block mb-2 text-sm font-medium text-red-700 dark:text-red-500">{{ trans('auth.Error') }}</label>
                  <input type="text" id="error" class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500" value="{{ session('error') }}" readonly>
                </div>
                @endif
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ trans('auth.Submit') }}
                </button>
            </div>
            <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ trans('auth.NoAccount') }} <a href="signup" class="text-blue-600 hover:underline dark:text-blue-500">{{ trans('auth.CreateOne') }}</a>.</label>
        </form>
    </div>
@endsection
