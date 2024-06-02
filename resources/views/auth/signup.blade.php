@extends('layout')

@section('title', trans('auth.Register'))

@section('styles')
    <link rel="stylesheet" href="/css/form.css">
@endsection

@section('content')
    <div class="flex justify-center items-center h-full">
        <form action="{{ route('signup') }} " method="post" class="max-w-md w-full">
            @csrf
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ trans('auth.Name') }}</label>
                    <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ trans('auth.NamePlaceholder') }}" required />
                </div>
                <div>
                    <label for="surname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ trans('auth.Surname') }}</label>
                    <input type="text" id="surname" name="surname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ trans('auth.SurnamePlaceholder') }}" required />
                </div>

            </div>
            <div class="mb-6">
                <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ trans('auth.PhoneNumber') }}</label>
                <input type="text" id="phone_number" name="phone_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ trans('auth.PhoneNumberPlaceholder') }}" required />
            </div>
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ trans('auth.EmailAddress') }}</label>
                <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ trans('auth.EmailPlaceholder') }}" required />
            </div>
            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ trans('auth.Password') }}</label>
                <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ trans('auth.PasswordPlaceholder') }}" required />
            </div>
            <div class="mb-6">
                <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ trans('auth.ConfirmPassword') }}</label>
                <input type="password" id="confirm_password" name="confirm_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ trans('auth.ConfirmPasswordPlaceholder') }}" required />
            </div>
            <div class="flex items-start mb-6">
                <div class="flex items-center h-5">
                    <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" required />
                </div>
                <label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ trans('auth.AcceptTerms') }} <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">{{ trans('auth.TermsAndConditions') }}</a>.</label>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ trans('auth.Submit') }}</button>
            <label class="text-sm font-medium">{{ trans('auth.NoAccount') }} <a href="login" class="text-blue-600 hover:underline dark:text-blue-500">{{ trans('auth.CreateOne') }}</a>.</label>
        </form>
    </div>
@endsection
