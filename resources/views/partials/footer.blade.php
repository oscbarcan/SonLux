<footer class="bg-white border border-slate-200 shadow dark:bg-gray-800 shrink-0 w-full">
    <div class="w-full max-w-screen-xl mx-auto p-4 md:flex md:items-center md:justify-between">
        <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 Oscar Barber Canet</span>
        <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
            <li>
                <a href="{{ route('policy') }}" class="hover:underline me-4 md:me-6">{{ trans('partials.Privacy Policy') }}</a>
            </li>
            <li>
                <a href="{{ route('about') }}" class="hover:underline me-4 md:me-6">{{ trans('partials.Sobre Nosotros') }}</a>
            </li>
            <li>
                <a href="{{ route('message.create') }}" class="hover:underline">{{ trans('partials.Contactanos') }}</a>
            </li>
            <li class="ml-6">
                <button id="mega-menu-dropdown-button" data-dropdown-toggle="mega-menu-dropdown" class="flex items-center justify-between w-full py-2 px-3 font-medium text-gray-900 border-b border-gray-100 md:w-auto hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">
                    {{ trans('partials.Idioma') }}
                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <div id="mega-menu-dropdown" class="absolute z-10 flex hidden w-auto grid-cols-2 text-sm bg-white border border-gray-100 rounded-lg shadow-md dark:border-gray-700 md:grid-cols-3 dark:bg-gray-700">
                    <div class="p-4 pb-0 text-gray-900 md:pb-4 dark:text-white">
                        <ul class="space-y-4" aria-labelledby="mega-menu-dropdown-button">
                            <li><a href="{{ route('lang.switch', 'en') }}">{{ trans('partials.English') }}</a></li>
                            <li><a href="{{ route('lang.switch', 'es') }}">{{ trans('partials.Español') }}</a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</footer>
