@extends('layout')

@section('title', 'Index')

@section('content')
    <div class="flex items-center justify-center min-h-full">
        <div class="bg-gray-200 p-8 rounded-lg shadow-lg max-w-4xl w-full">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-gray-800">TU PRESUPUESTO <span class="text-orange-500">DE PANELES
                        SOLARES</span></h2>
                <p class="text-gray-600 mt-2">
                    <em>Este presupuesto se ha calculado en base a las características de una <strong>vivienda
                            {{ $data['tipo_casa'] }} conectada a la red eléctrica con tipo {{ $data['tipo_electricidad'] }}</strong>. Los precios que aparecen son
                        válidos en toda la <strong>Comunidad Valenciana</strong></em>
                </p>
            </div>
            <div class="border-t border-gray-300 my-4"></div>
            <div class="flex flex-wrap -mx-4">
                <div class="w-full md:w-1/2 px-4 mb-8 md:mb-0 flex justify-center">
                    <img src="/assets/img/house.png" alt="Paneles Solares" class="object-cover w-full h-auto rounded-lg">
                </div>
                <div class="w-full md:w-1/2 px-4 flex items-center">
                    <div class="text-center md:text-left">
                        <h2 class="text-4xl font-bold text-gray-800 mb-4">{{ $data['precio'] }}€ + IVA</h2>
                        <div class="flex justify-between items-center mb-4">
                            <div>
                                <span class="block text-2xl font-semibold text-gray-800">{{ $data['num_paneles'] }}</span>
                                <span class="block text-gray-600">nº de paneles</span>
                            </div>
                            <div>
                                <span class="block text-2xl font-semibold text-gray-800">{{ $data['potencia'] }}kwp</span>
                                <span class="block text-gray-600">potencia instalación</span>
                            </div>
                        </div>
                        <div class="flex justify-between items-center mb-4 gap-4">
                            <div>
                                <span
                                    class="block text-2xl font-semibold text-gray-800">{{ $data['co2_evitar'] }}/año</span>
                                <span class="block text-gray-600">T de CO2 evitadas</span>
                            </div>
                            <div>
                                <span class="block text-2xl font-semibold text-gray-800">{{$data['ahorro_anual']}}€</span>
                                <span class="block text-gray-600">ahorro anual</span>
                            </div>
                            <div>
                                <span class="block text-2xl font-semibold text-gray-800">{{ $data['tiempo_amortizacion'] }}
                                    años</span>
                                <span class="block text-gray-600">tiempo amortización</span>
                            </div>
                        </div>
                        <div class="flex flex-row justify-between">
                            @if ($data['tipo_almacenamiento'] == 'con-al')
                                <div class="mb-4">
                                    <span class="block text-gray-600">Con baterías</span>
                                </div>
                            @endif
                            @if ($data['tipo_cargador'] == 'con-cargador')
                                <div class="mb-4">
                                    <span class="block text-gray-600">Con cargador de coche</span>
                                </div>
                            @endif
                        </div>
                        <div class="flex space-x-4 justify-between">
                            <a href="{{ route('message.create') }}"
                                class="bg-blue-500 text-white py-2 px-4 rounded-md">Contacta con nosotros</a>
                            <a href="{{ route('products.index') }}"
                                class="bg-red-500 text-white py-2 px-4 rounded-md">COMPRAR AHORA</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
