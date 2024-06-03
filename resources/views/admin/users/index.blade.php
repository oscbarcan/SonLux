@extends('admin.layout')

@section('title', trans('admin.Users'))

@section('content')
    <div class="d-flex flex-column">
        <h4 class="text-lg font-bold">{{ trans('admin.Users') }}</h4>
        <ul class="flex items-center text-sm text-gray-500">
            <li><a href="#"> {{ trans('admin.Dashboard') }} </a></li>-
            <li><a href="#"> {{ trans('admin.Users') }} </a></li>-
            <li><a href="#"> {{ trans('admin.Index') }} </a></li>
        </ul>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        {{ trans('admin.Id') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ trans('admin.Name') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ trans('admin.Rol') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ trans('admin.Surname') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ trans('admin.Email') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ trans('admin.PhoneNumber') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ trans('admin.Edit') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ trans('admin.Delete') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $user->name }} {{ $user->surnames }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->rol }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->phone_number }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->phone_number }}
                        </td>
                        <td class="px-6 py-4 justify-between">
                            <a href="{{ route('admin.user.edit', ['user' => $user]) }}"
                                class="font-medium text-blue-600  hover:underline">{{ trans('admin.Edit') }}</a>
                        </td>
                        <td class="px-6 py-4 justify-between">
                            <a href="{{ route('admin.user.destroy', ['user' => $user]) }}"
                                class="font-medium text-red-600  hover:underline">{{ trans('admin.Delete') }}</a>
                        </td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
    @if (session('success'))
        <div id="toast-success"
            class="fixed flex items-center w-full max-w-96 p-2 space-x-4 text-gray-500 bg-white divide-x rtl:divide-x-reverse divide-gray-200 rounded-lg shadow top-24 right-5 dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800"
            role="alert">
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                </svg>
                <span class="sr-only">{{ trans('admin.CheckIcon') }}</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{ session('success') }}</div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                data-dismiss-target="#toast-success" aria-label="{{ trans('admin.Close') }}">
                <span class="sr-only">{{ trans('admin.Close') }}</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif
@endsection
