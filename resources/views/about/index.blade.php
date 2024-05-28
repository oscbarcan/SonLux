@extends('layout')

@section('title', 'Contacta con nosotros')

@section('styles')
    {{-- Leaflet --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="/js/contact.js"></script>
@endsection

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-12">Sobre nosotros</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <div class="flex flex-col items-center">
                <h2 class="text-2xl font-semibold mb-4">Nuestra dirección</h2>
                <p class="text-lg mb-4 text-center">Calle Ejemplo 123, Ciudad, País</p>
                <div class="w-full h-80 rounded-lg shadow-lg overflow-hidden mb-6">
                    <div id="map" class="w-full h-full"></div>
                </div>
                <div class="flex flex-row gap-20">
                    <div class="text-center">
                        <h2 class="text-2xl font-semibold mb-4">Teléfono</h2>
                        <p class="text-lg mb-4">+34 234 567 890</p>
                    </div>
                    <div class="text-center">
                        <h2 class="text-2xl font-semibold mb-4">Correo Electrónico</h2>
                        <p class="text-lg mb-4">info@ejemplo.com</p>
                    </div>
                </div>
            </div>

            <div class="flex flex-col items-center">
                <h2 class="text-2xl font-semibold mb-4">Escanea el QR</h2>
                <p class="text-lg mb-4 text-center">Y envíanos un mensaje por whatsapp</p>
                <div class="mb-8">
                    <img src="assets/img/qr-sonlux.png" alt="Código QR" class="w-80 h-80 mx-auto">
                </div>
                <div class="text-center">
                    <h2 class="text-2xl font-semibold mb-4">Horario de atención</h2>
                    <p class="text-lg mb-2">Lunes a Viernes: 9:00 AM - 6:00 PM</p>
                    <p class="text-lg mb-2">Sábado: 10:00 AM - 2:00 PM</p>
                    <p class="text-lg">Domingo: Cerrado</p>
                </div>
            </div>
        </div>
    </div>
@endsection
