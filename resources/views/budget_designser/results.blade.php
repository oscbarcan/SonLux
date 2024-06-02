@extends('layout')

@section('title', trans('budget.Results'))

@section('content')
    <div class="flex items-center justify-center min-h-full">
        <div class="bg-gray-200 p-8 rounded-lg shadow-lg max-w-4xl w-full">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-gray-800">{{ trans('budget.YourBudget') }} <span class="text-orange-500">{{ trans('budget.ForSolarPanels') }}</span></h2>
                <p class="text-gray-600 mt-2">
                    <em>{{ trans('budget.CalculatedBasedOn') }} <strong>{{ $data['tipo_casa'] }} {{ trans('budget.ConnectedToGrid') }} {{ $data['tipo_electricidad'] }}</strong>. {{ trans('budget.ValidInValencia') }}</em>
                </p>
            </div>
            <div class="border-t border-gray-300 my-4"></div>
            <div class="flex flex-wrap -mx-4">
                <div class="w-full md:w-1/2 px-4 mb-8 md:mb-0 flex justify-center">
                    <img src="/assets/img/house.png" alt="Paneles Solares" class="object-cover w-full h-auto rounded-lg">
                </div>
                <div class="w-full md:w-1/2 px-4 flex items-center">
                    <div class="text-center md:text-left">
                        <div class="flex flex-col justify-between">
                            <span class="block text-gray-600 text-3xl mb-3">{{ trans('budget.TotalPrice') }}</span>
                            <h2 class="text-4xl font-bold text-gray-800 mb-4">{{ $data['precio'] }}€ + IVA</h2>
                        </div>
                        <div class="flex justify-between items-center mb-4">
                            <div>
                                <span class="block text-2xl font-semibold text-gray-800">{{ $data['num_paneles'] }}</span>
                                <span class="block text-gray-600">{{ trans('budget.NumPanels') }}</span>
                            </div>
                            <div>
                                <span class="block text-2xl font-semibold text-gray-800">{{ $data['potencia'] }}kwp</span>
                                <span class="block text-gray-600">{{ trans('budget.InstallationPower') }}</span>
                            </div>
                        </div>
                        <div class="flex justify-between items-center mb-4 gap-4">
                            <div>
                                <span class="block text-2xl font-semibold text-gray-800">{{ $data['co2_evitar'] }}/año</span>
                                <span class="block text-gray-600">{{ trans('budget.CO2Avoided') }}</span>
                            </div>
                            <div>
                                <span class="block text-2xl font-semibold text-gray-800">{{ $data['ahorro_anual'] }}€</span>
                                <span class="block text-gray-600">{{ trans('budget.AnnualSavings') }}</span>
                            </div>
                            <div>
                                <span class="block text-2xl font-semibold text-gray-800">{{ $data['tiempo_amortizacion'] }} años</span>
                                <span class="block text-gray-600">{{ trans('budget.PaybackTime') }}</span>
                            </div>
                        </div>
                        <div class="flex flex-row justify-between">
                            @if ($data['tipo_almacenamiento'] == 'con-al')
                                <div class="mb-4">
                                    <span class="block text-gray-600">{{ trans('budget.WithBatteries') }}</span>
                                </div>
                            @endif
                            @if ($data['tipo_cargador'] == 'con-cargador')
                                <div class="mb-4">
                                    <span class="block text-gray-600">{{ trans('budget.WithCarCharger') }}</span>
                                </div>
                            @endif
                        </div>
                        <div class="flex space-x-4 justify-between">
                            <a href="{{ route('message.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded-md">{{ trans('budget.ContactUs') }}</a>
                            <a href="{{ route('products.index') }}" class="bg-red-500 text-white py-2 px-4 rounded-md">{{ trans('budget.BuyNow') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
