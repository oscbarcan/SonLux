@extends('layout')

@section('title', 'Index')

@section('styles')
    <link rel="stylesheet" href="/css/budget_designer.css">
    {{-- Leaflet --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="/js/app.js" defer></script>
    {{-- Leaflet draw --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.2/leaflet.draw.js"></script>
@endsection

@section('content')
    <form action="{{route('form-Results')}}" method="POST" id="formulario">
        @csrf
        @method('POST')
        <div class="main-container">
            <div id="div1">
                <div class="text-4xl font-bold">Encuentra tu casa y dibuja tu tejado</div>
                <br>
                <div class="div-num">
                    <div class="container-mapa">
                        <div id="map" class="map"></div>
                    </div>
                    <div class="container-info-mapa">

                        <div class="text-3xl p-5">Superficie disponible</div>
                        <div class="p-4">1. Selecciona la superficie de tu tejado en el mapa.</div>
                        <input type="text" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 m-6"
                            id="superficie" name="superficie" placeholder="0" style="text-align: center;" required></input>
                        <div class="p-12">2. Selecciona tu tipo de casa</div>
                        <div class="tipo-casa">

                            <input type="radio" id="unifamiliar" name="tipo_casa" value="unifamiliar" class="hidden peer" required />
                            <label for="unifamiliar">
                                <div class="card" id="unifamiliar">
                                    <div class="p-3">Unifamiliar</div>
                                    <svg width="64px" height="64px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> <style>.cls-1{fill:#ccc;}.cls-2{fill:#f2f2f2;}.cls-3{fill:#849eb4;}.cls-4{fill:#b0d3f0;}.cls-5{fill:#98856e;}.cls-6{fill:#cbb292;}.cls-7{fill:#5f443e;}.cls-8{fill:#7f5b53;}.cls-9{fill:#e64c3c;}.cls-10{fill:#b49313;}.cls-11{fill:#f0c419;}.cls-12{fill:none;stroke:#000000;stroke-linejoin:round;stroke-width:2px;}</style> </defs> <title></title> <g data-name="Layer 10" id="Layer_10"> <polygon class="cls-1" points="18 38 32 24 46 38 46 58 18 58 18 38"></polygon> <polygon class="cls-2" points="30.5 25.5 18 38 18 58 43 58 43 38 30.5 25.5"></polygon> <rect class="cls-3" height="4" width="6" x="35" y="38"></rect> <rect class="cls-4" height="4" width="3" x="35" y="38"></rect> <rect class="cls-3" height="4" width="6" x="23" y="38"></rect> <rect class="cls-4" height="4" width="3" x="23" y="38"></rect> <polyline class="cls-5" points="28 58 28 46 36 46 36 58"></polyline> <rect class="cls-6" height="12" width="5" x="28" y="46"></rect> <rect class="cls-5" height="12" width="14" x="46" y="46"></rect> <rect class="cls-6" height="12" width="11" x="46" y="46"></rect> <rect class="cls-5" height="12" width="14" x="4" y="46"></rect> <rect class="cls-6" height="12" width="11" x="4" y="46"></rect> <rect class="cls-7" height="4" width="60" x="2" y="58"></rect> <rect class="cls-8" height="4" width="57" x="2" y="58"></rect> <polygon class="cls-9" points="12 38 32 18 52 38 46 38 32 24 18 38 12 38"></polygon> <circle class="cls-10" cx="32" cy="8" r="6"></circle> <ellipse class="cls-11" cx="30.5" cy="8" rx="4.5" ry="5.8"></ellipse> <path class="cls-3" d="M38,10a3.94,3.94,0,0,1,1.09.17A4,4,0,0,1,43,7a3.93,3.93,0,0,1,2.48.89A5,5,0,0,1,55,10c0,.05,0,.1,0,.15A3.74,3.74,0,0,1,56,10a4,4,0,1,1-2.58,7,4,4,0,0,1-6.84,0A3.95,3.95,0,0,1,41,16.62,4,4,0,1,1,38,10Z"></path> <path class="cls-4" d="M58.29,17.27A4,4,0,0,0,54.7,15a3.74,3.74,0,0,0-1,.15c0-.05,0-.1,0-.15a5,5,0,0,0-9.51-2.11A4,4,0,0,0,41.7,12a4,4,0,0,0-3.91,3.17,3.83,3.83,0,0,0-3.38.56,4,4,0,0,0,6.59.89,3.95,3.95,0,0,0,5.58.42,4,4,0,0,0,6.84,0,4,4,0,0,0,4.87.23Z"></path> <path class="cls-3" d="M26,7a3.94,3.94,0,0,0-1.09.17A4,4,0,0,0,21,4a3.93,3.93,0,0,0-2.48.89A5,5,0,0,0,9,7s0,.1,0,.15A3.74,3.74,0,0,0,8,7a4,4,0,1,0,2.58,7,4,4,0,0,0,6.84,0A3.95,3.95,0,0,0,23,13.62,4,4,0,1,0,26,7Z"></path> <path class="cls-4" d="M5.71,14.27A4,4,0,0,1,9.3,12a3.74,3.74,0,0,1,1,.15c0-.05,0-.1,0-.15a5,5,0,0,1,9.51-2.11A4,4,0,0,1,22.3,9a4,4,0,0,1,3.91,3.17,3.83,3.83,0,0,1,3.38.56,4,4,0,0,1-6.59.89,3.95,3.95,0,0,1-5.58.42,4,4,0,0,1-6.84,0,4,4,0,0,1-4.87.23Z"></path> <rect class="cls-12" height="4" width="60" x="2" y="58"></rect> <polyline class="cls-12" points="46 38 46 58 18 58 18 38"></polyline> <polygon class="cls-12" points="12 38 32 18 52 38 46 38 32 24 18 38 12 38"></polygon> <polyline class="cls-12" points="46 46 60 46 60 58"></polyline> <polyline class="cls-12" points="18 46 4 46 4 58"></polyline> <line class="cls-12" x1="4" x2="18" y1="50" y2="50"></line> <line class="cls-12" x1="46" x2="60" y1="50" y2="50"></line> <polyline class="cls-12" points="28 58 28 46 36 46 36 58"></polyline> <rect class="cls-12" height="4" width="6" x="23" y="38"></rect> <rect class="cls-12" height="4" width="6" x="35" y="38"></rect> <path class="cls-12" d="M26,7a3.94,3.94,0,0,0-1.09.17A4,4,0,0,0,21,4a3.93,3.93,0,0,0-2.48.89A5,5,0,0,0,9,7s0,.1,0,.15A3.74,3.74,0,0,0,8,7a4,4,0,1,0,2.58,7,4,4,0,0,0,6.84,0A3.95,3.95,0,0,0,23,13.62,4,4,0,1,0,26,7Z"></path> <path class="cls-12" d="M38,10a3.94,3.94,0,0,1,1.09.17A4,4,0,0,1,43,7a3.93,3.93,0,0,1,2.48.89A5,5,0,0,1,55,10c0,.05,0,.1,0,.15A3.74,3.74,0,0,1,56,10a4,4,0,1,1-2.58,7,4,4,0,0,1-6.84,0A3.95,3.95,0,0,1,41,16.62,4,4,0,1,1,38,10Z"></path> <path class="cls-12" d="M34.12,13.62A6.18,6.18,0,0,1,32,14a5.91,5.91,0,0,1-2.75-.67"></path> <path class="cls-12" d="M26.08,7A6,6,0,0,1,38,8a5.87,5.87,0,0,1-.35,2"></path> </g> </g></svg>
                                </div>
                            </label>

                            <input type="radio" id="comunidad" name="tipo_casa" value="comunidad" class="hidden peer" required />
                            <label for="comunidad">
                                <div class="card" id="comunidad">
                                    <div class="p-3">Comunidad</div>
                                    <svg width="64px" height="64px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> <style>.cls-1{fill:#559264;}.cls-2{fill:#71c285;}.cls-3{fill:#98856e;}.cls-4{fill:#cbb292;}.cls-5{fill:#ccc;}.cls-6{fill:#f2f2f2;}.cls-7{fill:#849eb4;}.cls-8{fill:#b0d3f0;}.cls-9{fill:#5f443e;}.cls-10{fill:#7f5b53;}.cls-11{fill:none;stroke:#000000;stroke-linejoin:round;stroke-width:2px;}</style> </defs> <title></title> <g data-name="Layer 11" id="Layer_11"> <rect class="cls-1" height="6" width="18" x="38" y="12"></rect> <rect class="cls-2" height="6" width="15" x="38" y="12"></rect> <rect class="cls-3" height="36" width="24" x="34" y="22"></rect> <rect class="cls-4" height="36" width="21" x="34" y="22"></rect> <rect class="cls-5" height="11" width="8" x="38" y="47"></rect> <rect class="cls-6" height="11" width="5" x="38" y="47"></rect> <rect class="cls-5" height="11" width="8" x="46" y="47"></rect> <rect class="cls-6" height="11" width="5" x="46" y="47"></rect> <rect class="cls-7" height="6" width="6" x="48" y="36"></rect> <rect class="cls-8" height="6" width="3" x="48" y="36"></rect> <rect class="cls-7" height="6" width="6" x="48" y="26"></rect> <rect class="cls-8" height="6" width="3" x="48" y="26"></rect> <rect class="cls-7" height="6" width="6" x="38" y="26"></rect> <rect class="cls-8" height="6" width="3" x="38" y="26"></rect> <rect class="cls-7" height="6" width="6" x="38" y="36"></rect> <rect class="cls-8" height="6" width="3" x="38" y="36"></rect> <rect class="cls-9" height="4" width="60" x="2" y="58"></rect> <rect class="cls-10" height="4" width="57" x="2" y="58"></rect> <rect class="cls-3" height="16" width="30" x="4" y="42"></rect> <rect class="cls-4" height="16" width="27" x="4" y="42"></rect> <path class="cls-5" d="M14,58V53a5,5,0,0,1,5-5h0a5,5,0,0,1,5,5v5"></path> <path class="cls-6" d="M17.5,48.25A5,5,0,0,0,14,53v5h7V53A5,5,0,0,0,17.5,48.25Z"></path> <rect class="cls-7" height="10" width="15" x="4" y="2"></rect> <rect class="cls-8" height="10" width="12" x="4" y="2"></rect> <rect class="cls-7" height="10" width="15" x="19" y="2"></rect> <rect class="cls-8" height="10" width="12" x="19" y="2"></rect> <rect class="cls-7" height="10" width="15" x="19" y="12"></rect> <rect class="cls-8" height="10" width="12" x="19" y="12"></rect> <rect class="cls-7" height="10" width="15" x="19" y="22"></rect> <rect class="cls-8" height="10" width="12" x="19" y="22"></rect> <rect class="cls-7" height="10" width="15" x="19" y="32"></rect> <rect class="cls-8" height="10" width="12" x="19" y="32"></rect> <rect class="cls-7" height="10" width="15" x="4" y="32"></rect> <rect class="cls-8" height="10" width="12" x="4" y="32"></rect> <rect class="cls-7" height="10" width="15" x="4" y="22"></rect> <rect class="cls-8" height="10" width="12" x="4" y="22"></rect> <rect class="cls-7" height="10" width="15" x="4" y="12"></rect> <rect class="cls-8" height="10" width="12" x="4" y="12"></rect> <rect class="cls-11" height="4" width="60" x="2" y="58"></rect> <polyline class="cls-11" points="4 58 4 2 34 2 34 58"></polyline> <line class="cls-11" x1="4" x2="34" y1="12" y2="12"></line> <line class="cls-11" x1="19" x2="19" y1="2" y2="12"></line> <line class="cls-11" x1="4" x2="34" y1="22" y2="22"></line> <line class="cls-11" x1="19" x2="19" y1="12" y2="22"></line> <line class="cls-11" x1="4" x2="34" y1="32" y2="32"></line> <line class="cls-11" x1="19" x2="19" y1="22" y2="32"></line> <path class="cls-11" d="M14,58V53a5,5,0,0,1,5-5h0a5,5,0,0,1,5,5v5"></path> <line class="cls-11" x1="7" x2="11" y1="9" y2="5"></line> <line class="cls-11" x1="12" x2="16" y1="9" y2="5"></line> <line class="cls-11" x1="27" x2="31" y1="9" y2="5"></line> <line class="cls-11" x1="27" x2="31" y1="19" y2="15"></line> <line class="cls-11" x1="27" x2="31" y1="29" y2="25"></line> <line class="cls-11" x1="22" x2="26" y1="9" y2="5"></line> <line class="cls-11" x1="22" x2="26" y1="19" y2="15"></line> <line class="cls-11" x1="22" x2="26" y1="29" y2="25"></line> <line class="cls-11" x1="7" x2="11" y1="29" y2="25"></line> <line class="cls-11" x1="12" x2="16" y1="29" y2="25"></line> <line class="cls-11" x1="4" x2="34" y1="42" y2="42"></line> <line class="cls-11" x1="19" x2="19" y1="32" y2="42"></line> <line class="cls-11" x1="27" x2="31" y1="39" y2="35"></line> <line class="cls-11" x1="22" x2="26" y1="39" y2="35"></line> <line class="cls-11" x1="7" x2="11" y1="39" y2="35"></line> <line class="cls-11" x1="12" x2="16" y1="39" y2="35"></line> <line class="cls-11" x1="7" x2="11" y1="19" y2="15"></line> <line class="cls-11" x1="12" x2="16" y1="19" y2="15"></line> <rect class="cls-11" height="36" width="24" x="34" y="22"></rect> <rect class="cls-11" height="6" width="6" x="38" y="26"></rect> <rect class="cls-11" height="6" width="6" x="48" y="26"></rect> <rect class="cls-11" height="6" width="6" x="38" y="36"></rect> <rect class="cls-11" height="6" width="6" x="48" y="36"></rect> <polyline class="cls-11" points="38 58 38 47 54 47 54 58"></polyline> <line class="cls-11" x1="46" x2="46" y1="47" y2="58"></line> <rect class="cls-11" height="6" width="18" x="38" y="12"></rect> <line class="cls-11" x1="40" x2="40" y1="18" y2="22"></line> <line class="cls-11" x1="54" x2="54" y1="18" y2="22"></line> </g> </g></svg>
                                </div>
                            </label>

                            <input type="radio" id="empresa" name="tipo_casa" value="empresa" class="hidden peer" required />
                            <label for="empresa">
                                <div class="card" id="empresa">
                                    <div class="p-3">Empresa</div>
                                    <svg width="64px" height="64px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> <style>.cls-1{fill:#999;}.cls-2{fill:#ccc;}.cls-3{fill:#5f443e;}.cls-4{fill:#7f5b53;}.cls-5{fill:#71c285;}.cls-6{fill:#f2f2f2;}.cls-7{fill:#cbb292;}.cls-8{fill:#559264;}.cls-9{fill:none;stroke:#000000;stroke-linejoin:round;stroke-width:2px;}</style> </defs> <title></title> <g data-name="Layer 5" id="Layer_5"> <path class="cls-1" d="M57,2a5,5,0,0,0-5,5,4.94,4.94,0,0,0,.13,1.1A4,4,0,0,0,49,12a4,4,0,0,0,.73,2.29,3,3,0,1,0,4.06,1.63A4,4,0,0,0,57,12,5,5,0,0,0,57,2Z"></path> <path class="cls-2" d="M52,7a4.94,4.94,0,0,0,.13,1.1A4,4,0,0,0,49,12a4,4,0,0,0,.73,2.29A3,3,0,0,0,48,17a2.89,2.89,0,0,0,.18,1,3,3,0,0,0,2.61-4.06A4,4,0,0,0,54,10a5,5,0,0,0,4.08-7.88A5.5,5.5,0,0,0,57,2,5,5,0,0,0,52,7Z"></path> <rect class="cls-3" height="18" width="6" x="48" y="24"></rect> <rect class="cls-4" height="18" width="3" x="48" y="24"></rect> <polygon class="cls-5" points="60 58 32 58 32 32 60 42 60 58"></polygon> <polyline class="cls-2" points="36 58 36 48 44 48 44 58"></polyline> <rect class="cls-6" height="10" width="5" x="36" y="48"></rect> <polyline class="cls-2" points="48 58 48 48 56 48 56 58"></polyline> <rect class="cls-6" height="10" width="5" x="48" y="48"></rect> <polyline class="cls-7" points="4 58 4 10 32 10 32 58"></polyline> <rect class="cls-6" height="12" width="4" x="4" y="46"></rect> <rect class="cls-2" height="12" width="4" x="8" y="46"></rect> <rect class="cls-6" height="12" width="4" x="12" y="46"></rect> <rect class="cls-2" height="12" width="4" x="16" y="46"></rect> <rect class="cls-6" height="12" width="4" x="20" y="46"></rect> <rect class="cls-2" height="12" width="4" x="24" y="46"></rect> <rect class="cls-6" height="12" width="4" x="28" y="46"></rect> <rect class="cls-2" height="4" width="20" x="8" y="14"></rect> <rect class="cls-6" height="4" width="17" x="8" y="14"></rect> <rect class="cls-2" height="4" width="20" x="8" y="22"></rect> <rect class="cls-6" height="4" width="17" x="8" y="22"></rect> <rect class="cls-2" height="4" width="20" x="8" y="30"></rect> <rect class="cls-6" height="4" width="17" x="8" y="30"></rect> <rect class="cls-2" height="4" width="20" x="8" y="38"></rect> <rect class="cls-6" height="4" width="17" x="8" y="38"></rect> <polyline class="cls-8" points="6 10 6 2 30 2 30 10"></polyline> <rect class="cls-5" height="8" width="21" x="6" y="2"></rect> <rect class="cls-3" height="4" width="60" x="2" y="58"></rect> <rect class="cls-4" height="4" width="57" x="2" y="58"></rect> <rect class="cls-9" height="4" width="60" x="2" y="58"></rect> <polyline class="cls-9" points="4 58 4 10 32 10 32 58"></polyline> <polygon class="cls-9" points="60 58 32 58 32 32 60 42 60 58"></polygon> <polyline class="cls-9" points="54 39.86 54 24 48 24 48 37.71"></polyline> <path class="cls-9" d="M57,2a5,5,0,0,0-5,5,4.94,4.94,0,0,0,.13,1.1A4,4,0,0,0,49,12a4,4,0,0,0,.73,2.29,3,3,0,1,0,4.06,1.63A4,4,0,0,0,57,12,5,5,0,0,0,57,2Z"></path> <line class="cls-9" x1="48" x2="54" y1="28" y2="28"></line> <polyline class="cls-9" points="6 10 6 2 30 2 30 10"></polyline> <polyline class="cls-9" points="36 58 36 48 44 48 44 58"></polyline> <polyline class="cls-9" points="48 58 48 48 56 48 56 58"></polyline> <rect class="cls-9" height="4" width="20" x="8" y="14"></rect> <rect class="cls-9" height="4" width="20" x="8" y="22"></rect> <rect class="cls-9" height="4" width="20" x="8" y="30"></rect> <rect class="cls-9" height="4" width="20" x="8" y="38"></rect> <line class="cls-9" x1="4" x2="32" y1="46" y2="46"></line> <line class="cls-9" x1="8" x2="8" y1="58" y2="46"></line> <line class="cls-9" x1="12" x2="12" y1="58" y2="46"></line> <line class="cls-9" x1="16" x2="16" y1="58" y2="46"></line> <line class="cls-9" x1="20" x2="20" y1="58" y2="46"></line> <line class="cls-9" x1="24" x2="24" y1="58" y2="46"></line> <line class="cls-9" x1="28" x2="28" y1="58" y2="46"></line> <line class="cls-9" x1="9" x2="11" y1="6" y2="6"></line> <line class="cls-9" x1="13" x2="15" y1="6" y2="6"></line> <line class="cls-9" x1="17" x2="19" y1="6" y2="6"></line> <line class="cls-9" x1="21" x2="23" y1="6" y2="6"></line> <line class="cls-9" x1="25" x2="27" y1="6" y2="6"></line> </g> </g></svg>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div id="div2" style="display: none;">
                <div class="text-4xl font-bold text-center">Elije tu tipo de almacienamienro de energia</div>
                    <div class="div-num">
                        <div class="container-general tipo-almacenamiento">
                            <input type="radio" id="con-al" name="tipo_almacenamiento" value="con-al" class="hidden peer" required />
                            <label for="con-al">
                                <div class="card" id="con-al">
                                    <div class="p-3">Con almacenamiento</div>
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" width="64px" height="64px" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <polygon style="fill:#EFEFEF;" points="482.909,445.091 482.909,165.818 29.091,165.818 29.091,445.091 11.636,445.091 11.636,491.636 500.364,491.636 500.364,445.091 "></polygon> <path style="fill:#0EDDF0;" d="M157.091,241.455L157.091,241.455c35.347,0,64,28.653,64,64l0,0c0,35.347-28.653,64-64,64l0,0 c-35.347,0-64-28.653-64-64l0,0C93.091,270.108,121.744,241.455,157.091,241.455z"></path> <path style="fill:#F15A29;" d="M354.909,241.455L354.909,241.455c35.347,0,64,28.653,64,64l0,0c0,35.347-28.653,64-64,64l0,0 c-35.347,0-64-28.653-64-64l0,0C290.909,270.108,319.562,241.455,354.909,241.455z"></path> <g> <rect x="11.636" y="119.273" style="fill:#A7A9AC;" width="488.727" height="46.545"></rect> <rect x="162.909" y="20.364" style="fill:#A7A9AC;" width="186.182" height="46.545"></rect> </g> <rect x="40.727" y="72.727" style="fill:#0EDDF0;" width="52.364" height="46.545"></rect> <rect x="418.909" y="72.727" style="fill:#F15A29;" width="52.364" height="46.545"></rect> <g> <path style="fill:#231F20;" d="M157.091,381.091c41.706,0,75.636-33.93,75.636-75.636s-33.93-75.636-75.636-75.636 s-75.636,33.93-75.636,75.636S115.385,381.091,157.091,381.091z M157.091,253.091c28.873,0,52.364,23.49,52.364,52.364 s-23.49,52.364-52.364,52.364s-52.364-23.49-52.364-52.364S128.218,253.091,157.091,253.091z"></path> <path style="fill:#231F20;" d="M354.909,381.091c41.706,0,75.636-33.93,75.636-75.636s-33.93-75.636-75.636-75.636 s-75.636,33.93-75.636,75.636S313.203,381.091,354.909,381.091z M354.909,253.091c28.873,0,52.364,23.49,52.364,52.364 s-23.49,52.364-52.364,52.364s-52.364-23.49-52.364-52.364S326.036,253.091,354.909,253.091z"></path> <path style="fill:#231F20;" d="M130.909,317.091h14.545v14.545c0,6.426,5.21,11.636,11.636,11.636 c6.427,0,11.636-5.211,11.636-11.636v-14.545h14.545c6.427,0,11.636-5.211,11.636-11.636s-5.21-11.636-11.636-11.636h-14.545 v-14.545c0-6.426-5.21-11.636-11.636-11.636c-6.427,0-11.636,5.211-11.636,11.636v14.545h-14.545 c-6.427,0-11.636,5.211-11.636,11.636S124.482,317.091,130.909,317.091z"></path> <path style="fill:#231F20;" d="M328.727,317.091h52.364c6.427,0,11.636-5.211,11.636-11.636s-5.21-11.636-11.636-11.636h-52.364 c-6.427,0-11.636,5.211-11.636,11.636S322.3,317.091,328.727,317.091z"></path> <path style="fill:#231F20;" d="M500.364,177.455c6.427,0,11.636-5.211,11.636-11.636v-46.545c0-6.426-5.21-11.636-11.636-11.636 h-17.455V72.727c0-6.426-5.21-11.636-11.636-11.636h-52.364c-6.427,0-11.636,5.211-11.636,11.636v34.909h-46.545V20.364 c0-6.426-5.21-11.636-11.636-11.636H162.909c-6.427,0-11.636,5.211-11.636,11.636v87.273h-46.545V72.727 c0-6.426-5.21-11.636-11.636-11.636H40.727c-6.427,0-11.636,5.211-11.636,11.636v34.909H11.636C5.21,107.636,0,112.847,0,119.273 v46.545c0,6.426,5.21,11.636,11.636,11.636h5.818v256h-5.818C5.21,433.455,0,438.665,0,445.091v46.545 c0,6.426,5.21,11.636,11.636,11.636h488.727c6.427,0,11.636-5.211,11.636-11.636v-46.545c0-6.426-5.21-11.636-11.636-11.636h-5.818 v-256H500.364z M430.545,84.364h29.091v23.273h-29.091V84.364z M174.545,32h162.909v23.273H174.545V32z M174.545,78.545h162.909 v29.091H174.545V78.545z M52.364,84.364h29.091v23.273H52.364V84.364z M23.273,130.909h465.455v23.273H23.273V130.909z M471.273,433.455h-71.564c-6.427,0-11.636,5.211-11.636,11.636c0,6.426,5.21,11.636,11.636,11.636h89.018V480H23.273v-23.273 h267.636c6.427,0,11.636-5.211,11.636-11.636c0-6.426-5.21-11.636-11.636-11.636H40.727v-256h430.545V433.455z"></path> <path style="fill:#231F20;" d="M346.764,433.455H345.6c-6.427,0-11.636,5.211-11.636,11.636c0,6.426,5.21,11.636,11.636,11.636 h1.164c6.427,0,11.636-5.211,11.636-11.636C358.4,438.665,353.19,433.455,346.764,433.455z"></path> </g> </g></svg>
                                </div>
                            </label>

                            <input type="radio" id="sin-al" name="tipo_almacenamiento" value="sin-al" class="hidden peer" required />
                            <label for="sin-al">
                                <div class="card" id="sin-al">
                                    <div class="p-3">Sin almacenamiento</div>
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" xml:space="preserve" width="64px" height="64px" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{fill:#E0E0D1;} .st1{opacity:0.2;} .st2{fill:#231F20;} .st3{fill:#C75C5C;} </style> <g id="Layer_1"> <g> <circle class="st0" cx="32" cy="32" r="32"></circle> </g> <g class="st1"> <path class="st2" d="M32,12c-12.2,0-22,9.8-22,22s9.8,22,22,22s22-9.8,22-22S44.2,12,32,12z M48,34c0,3.3-1,6.4-2.8,9L23,20.8 c2.6-1.7,5.7-2.8,9-2.8C40.8,18,48,25.2,48,34z M16,34c0-3.3,1-6.4,2.8-9L41,47.2C38.4,49,35.3,50,32,50C23.2,50,16,42.8,16,34z"></path> </g> <g> <path class="st3" d="M32,16c8.8,0,16,7.2,16,16s-7.2,16-16,16s-16-7.2-16-16S23.2,16,32,16 M32,10c-12.2,0-22,9.8-22,22 s9.8,22,22,22s22-9.8,22-22S44.2,10,32,10L32,10z"></path> </g> <g> <rect x="12.2" y="29" transform="matrix(0.7071 0.7071 -0.7071 0.7071 32 -13.2548)" class="st3" width="39.6" height="6"></rect> </g> </g> <g id="Layer_2"> </g> </g></svg>
                                </div>
                            </label>

                        </div>
                </div>
            </div>

            <div id="div3" style="display: none;">
                <div class="text-4xl font-bold text-center">Elije la orientación de tu tejado</div>
                    <div class="div-num">
                        <div class="container-general">
                            <div class="puntos-cardinales">
                                <div class="separador">
                                    <input type="radio" id="norte" name="tipo_direcion" value="norte" class="hidden peer" required />
                                    <label for="norte">
                                        <div class="card" id="norte">
                                            <div class="p-3">Orientación Norte</div>
                                            <svg width="64px" height="64px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M192 938.666667V298.666667L512 85.333333l320 213.333334v640z" fill="#CFD8DC"></path><path d="M192 448v-149.333333L512 85.333333l320 213.333334v149.333333L512 234.666667z" fill="#FF3D00"></path><path d="M405.333333 789.333333V490.666667h72.149334l43.584 118.058666c10.858667 22.016 22.741333 62.570667 33.6 88.362667V490.666667h64v298.666666h-68.544l-47.189334-114.282666c-10.944-25.792-26.346667-62.656-33.6-88.512v202.816h-64z" fill="#455A64"></path></g></svg>
                                        </div>
                                    </label>

                                    <input type="radio" id="sur" name="tipo_direcion" value="sur" class="hidden peer" required />
                                    <label for="sur">
                                        <div class="card" id="sur">
                                            <div class="p-3">Orientación Sur</div>
                                            <svg width="64px" height="64px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M832 85.333333v640L512 938.666667 192 725.333333V85.333333z" fill="#CFD8DC"></path><path d="M192 576v149.333333l320 213.333334 320-213.333334v-149.333333L512 789.333333z" fill="#FF3D00"></path><path d="M455.125333 475.114667c10.666667 7.253333 31.978667 10.965333 46.208 10.965333 24.896 0 39.104-14.613333 39.104-32.874667 0-21.781333-14.208-32.682667-35.498666-47.274666-39.125333-25.472-53.312-58.304-53.312-83.797334 0-47.424 31.957333-87.488 88.789333-87.488 17.834667 0 35.562667 3.712 46.186667 10.922667l-10.624 51.114667c-7.104-3.712-21.333333-10.965333-35.562667-10.965334-24.853333 0-35.498667 14.485333-35.498667 29.034667 0 18.218667 7.104 25.621333 39.104 47.424C583.125333 384 597.333333 416.853333 597.333333 446.016 597.333333 500.650667 558.250667 533.333333 501.333333 533.333333c-21.333333 0-46.208-7.232-53.333333-10.922666l7.125333-47.296z" fill="#455A64"></path></g></svg>
                                        </div>
                                    </label>
                                </div>
                                <div class="separador">
                                    <input type="radio" id="este" name="tipo_direcion" value="este" class="hidden peer" required />
                                    <label for="este">
                                        <div class="card" id="este">
                                            <div class="p-3">Orientación Este</div>
                                            <svg width="64px" height="64px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M85.333333 192h640l213.333334 320-213.333334 320H85.333333z" fill="#CFD8DC"></path><path d="M725.333333 192h-149.333333l213.333333 320-213.333333 320h149.333333l213.333334-320z" fill="#FF3D00"></path><path d="M426.666667 533.333333h-64v85.333334h85.333333v42.666666h-149.333333V362.666667h149.333333v42.666666h-85.333333v85.333334h64v42.666666z" fill="#455A64"></path></g></svg>
                                        </div>
                                    </label>

                                    <input type="radio" id="oeste" name="tipo_direcion" value="oeste" class="hidden peer" required />
                                    <label for="oeste">
                                        <div class="card" id="oeste">
                                            <div class="p-3">Orientación Oeste</div>
                                            <svg width="64px" height="64px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M938.666667 832H298.666667L85.333333 512 298.666667 192h640z" fill="#CFD8DC"></path><path d="M536.704 661.333333l-49.770667-298.666666h61.226667l15.338667 118.037333c3.818667 33.088 7.658667 66.325333 11.456 103.146667 3.882667-36.821333 11.541333-70.058667 19.2-103.146667L617.130667 362.666667h49.792l19.136 118.037333c3.776 33.088 11.434667 66.325333 15.317333 106.88 3.797333-40.533333 7.658667-70.058667 11.456-106.88L728.170667 362.666667h57.429333l-53.610667 298.666666h-61.290666l-19.114667-99.498666c-7.616-25.834667-11.541333-59.072-15.296-95.872-3.925333 36.821333-11.541333 70.037333-15.36 99.456L601.834667 661.333333h-65.130667z" fill="#455A64"></path><path d="M448 192h-149.333333L85.333333 512l213.333334 320h149.333333L234.666667 512z" fill="#FF3D00"></path></g></svg>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                </div>
            </div>

            <div id="div4" style="display: none;">
                    <div class="div-num">
                        <div class="container-general flex flex-col">
                            <div class="text-4xl font-bold text-center">Que tipo de fase utilizas?</div>
                            <div class="flex flex-row">
                                <input type="radio" id="monofasica" name="tipo_electricidad" value="monofasica" class="hidden peer" required />
                                <label for="monofasica" class="min-w-40">
                                    <div class="card" id="card-monofasica">
                                        <div class="p-3">Monofasica</div>
                                        <svg width="64px" height="64px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M85.333333 192h640l213.333334 320-213.333334 320H85.333333z" fill="#CFD8DC"></path><path d="M725.333333 192h-149.333333l213.333333 320-213.333333 320h149.333333l213.333334-320z" fill="#FF3D00"></path><path d="M426.666667 533.333333h-64v85.333334h85.333333v42.666666h-149.333333V362.666667h149.333333v42.666666h-85.333333v85.333334h64v42.666666z" fill="#455A64"></path></g></svg>
                                    </div>
                                </label>
                                <input type="radio" id="trifasica" name="tipo_electricidad" value="trifasica" class="hidden peer" required />
                                <label for="trifasica" class="min-w-40">
                                    <div class="card" id="trifasica">
                                        <div class="p-3">Trifasica</div>
                                        <svg width="64px" height="64px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M938.666667 832H298.666667L85.333333 512 298.666667 192h640z" fill="#CFD8DC"></path><path d="M536.704 661.333333l-49.770667-298.666666h61.226667l15.338667 118.037333c3.818667 33.088 7.658667 66.325333 11.456 103.146667 3.882667-36.821333 11.541333-70.058667 19.2-103.146667L617.130667 362.666667h49.792l19.136 118.037333c3.776 33.088 11.434667 66.325333 15.317333 106.88 3.797333-40.533333 7.658667-70.058667 11.456-106.88L728.170667 362.666667h57.429333l-53.610667 298.666666h-61.290666l-19.114667-99.498666c-7.616-25.834667-11.541333-59.072-15.296-95.872-3.925333 36.821333-11.541333 70.037333-15.36 99.456L601.834667 661.333333h-65.130667z" fill="#455A64"></path><path d="M448 192h-149.333333L85.333333 512l213.333334 320h149.333333L234.666667 512z" fill="#FF3D00"></path></g></svg>
                                    </div>
                                </label>
                            </div>

                            <div class="text-4xl font-bold text-center">Quieres cargador de coche?</div>
                            <div class="flex flex-row">
                                <input type="radio" id="con-cargador" name="tipo_cargador" value="con-cargador" class="hidden peer" required />
                                <label for="con-cargador" class="min-w-40">
                                    <div class="card" id="con-cargador">
                                        <div class="">Con cargador</div>
                                    </div>
                                </label>
                                <input type="radio" id="sin-cargador" name="tipo_cargador" value="sin-cargador" class="hidden peer" required />
                                <label for="sin-cargador" class="min-w-40">
                                    <div class="card" id="sin-cargador">
                                        <div class="">Sin Cargador</div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="container-botones mt-5">
                <button type="button" id="atras" disabled class="boton-desactivado focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Atrás</button>
                <button type="button" id="continuar" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Continuar</button>
                <button type="submit" id="enviar" style="display: none;" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Enviar</button>
            </div>
        </div>
    </form>

@endsection
