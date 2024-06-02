@extends('layout')

@section('title', trans('about.AboutUs'))

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
        <h1 class="text-4xl font-bold text-center mb-12">{{ trans('about.AboutUs') }}</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <div class="flex flex-col items-center">
                <h2 class="text-2xl font-semibold mb-4">{{ trans('about.OurAddress') }} </h2>
                <p class="text-lg mb-4 text-center">{{ trans('about.Address') }} Paco 24, Valencia, España</p>
                <div class="w-full h-80 rounded-lg shadow-lg overflow-hidden mb-6">
                    <div id="map" class="w-full h-full"></div>
                </div>
                <div class="flex flex-row gap-20">
                    <div class="text-center">
                        <h2 class="text-2xl font-semibold mb-4">{{ trans('about.Phone') }}</h2>
                        <p class="text-lg mb-4">+34 642679482</p>
                    </div>
                    <div class="text-center">
                        <h2 class="text-2xl font-semibold mb-4">{{ trans('about.Email') }}</h2>
                        <p class="text-lg mb-4">sonlux@gmail.com</p>
                    </div>
                </div>
            </div>

            <div class="flex flex-col items-center">
                <h2 class="text-2xl font-semibold mb-4">{{ trans('about.ScanQR') }}</h2>
                <p class="text-lg mb-4 text-center">{{ trans('about.SendWhatsApp') }}</p>
                <div class="mb-8">
                    <img src="assets/img/qr-sonlux.png" alt="{{ trans('about.QRCode') }}" class="w-80 h-80 mx-auto">
                </div>
                <div class="text-center">
                    <h2 class="text-2xl font-semibold mb-4">{{ trans('about.BusinessHours') }}</h2>
                    <p class="text-lg mb-2">{{ trans('about.MonToFri') }}</p>
                    <p class="text-lg mb-2">{{ trans('about.Saturday') }}</p>
                    <p class="text-lg">{{ trans('about.Sunday') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
