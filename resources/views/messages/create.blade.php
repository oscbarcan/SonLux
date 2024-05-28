@extends('layout')

@section('title', 'About Us')

@section('content')
    <div class="bg-gray-100 min-h-full flex">
        <div class="container mx-auto px-4 self-center grid">
            <div class="bg-white shadow-md rounded-lg p-8 max-w-2xl justify-self-center">
                <h2 class="text-3xl font-bold mb-4">Contáctanos</h2>
                <form action="{{route('message.store')}}" method="POST" id="formulario">
                    @csrf
                    <div class="grid grid-cols-1 gap-6 mb-6">
                        <div>
                            @if (auth()->check())
                                <div class="flex flex-row gap-10">
                                    <div>
                                        <label for="name" class="block text-gray-700 font-medium">Nombre</label>
                                        <input type="text" id="name" name="name"
                                            value="{{ auth()->user()->name }}"
                                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-300"
                                            required>
                                    </div>
                                    <div>
                                        <label for="surname" class="block text-gray-700 font-medium">Apellidos</label>
                                        <input type="text" id="surname" name="surname"
                                            value="{{ auth()->user()->surnames }}"
                                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-300"
                                            required>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <label for="email" class="block text-gray-700 font-medium">Correo Electrónico</label>
                                    <input type="email" id="email" name="email" value="{{ auth()->user()->email }}"
                                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-300"
                                        required>
                                </div>
                            @else
                                <div class="flex flex-row gap-10">
                                    <div>
                                        <label for="name" class="block text-gray-700 font-medium">Nombre</label>
                                        <input type="text" id="name" name="name"
                                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-300"
                                            required>
                                    </div>
                                    <div>
                                        <label for="surname" class="block text-gray-700 font-medium">Apellidos</label>
                                        <input type="text" id="surname" name="surname"
                                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-300"
                                            required>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <label for="email" class="block text-gray-700 font-medium">Correo Electrónico</label>
                                    <input type="email" id="email" name="email"
                                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-300"
                                        required>
                                </div>
                            @endif
                        </div>
                        <div>
                            <label for="text" class="block text-gray-700 font-medium">Mensaje</label>
                            <textarea id="text" name="text" rows="12"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-300"
                                required></textarea>
                        </div>
                    </div>
                    <div class="flex justify-start">
                        <button type="submit"
                            class="bg-indigo-500 text-white px-6 py-2 rounded-md shadow-md hover:bg-indigo-600 focus:outline-none focus:ring focus:ring-indigo-200">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
