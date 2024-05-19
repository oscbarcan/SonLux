@extends('layout')

@section('title', 'Index')

@section('styles')
    <link rel="stylesheet" href="/css/index.css">
@endsection

@section('content')
    <div class="main-container">
        <div class="container-1">
            <div class="text-white pl-72 pt-40 max-w-6xl">
                <div class="text-xl">Placas Solares SonLux</div>
                <div class="text-5xl">Instala ya tus placas solares para empezar a ahorrar en la factura de la luz</div>
                <div class="text-xl">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et
                    dolore magna aliqua. </div>
            </div>
        </div>
        <div class="container-2 flex items-center justify-between">
            <img src="assets/img/Products/placasolar-JASolar.jpg" alt="img" class="image-solar-panel">
            <div class="text-blue-900 pl-10">
                <div class="text-5xl pt-10">Instala ya tus placas solares para empezar a ahorrar en la factura de la luz
                </div>
                <div class="text-xl mt-7">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et
                    dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et
                    dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et
                    dolore magna aliqua.</div>
                <div class="mt-7 flex flex-col gap-4">
                    <hr>
                    <div class="text-xl">Energía sostenible y renovable</div>
                    <hr>
                    <div class="text-xl">Ahorro económico a largo plazo</div>
                    <hr>
                    <div class="text-xl">Reducción de la huella de carbono</div>
                    <hr>
                    <div class="text-xl">Independencia energética</div>
                    <hr>
                    <div class="text-xl">Incentivos y beneficios fiscales</div>
                    <hr>
                </div>
            </div>
        </div>
        <div class="container-3 bg-[#F8F8F8] min-h-[550px] flex items-center justify-center">
            <div class="bg-white w-1/2 h-1/2 min-h-[350px] min-w-[1700px] flex items-center justify-center flex-col rounded-xl">
                <div class="text-3xl pt-10">¿No tienes claro el espacio y las placas que necesitas?</div>
                <div class="text-xl mt-7">Prueba nuestro diseñador de espacio y calculador de presupuesto para ayudarte a saber lo que de verdad necesitas.</div>
                <a href="{{route('budget_designer.index')}}"><button class="bg-[#A2C2EC] p-3 rounded-xl mt-7">Ver Diseñador</button></a>
            </div>
        </div>
    </div>
@endsection
