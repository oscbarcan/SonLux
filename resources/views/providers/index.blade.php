@extends('layout')

@section('title', 'Index')

@section('content')
<div style="display: flex; flex-wrap: wrap; justify-content: space-around; margin: 20px;">
    <div style="flex: 0 0 48%; border: 1px solid black; margin-bottom: 10px; padding: 10px;">
        <h2>Marca Generica</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a.</p>
    </div>
    <div style="flex: 0 0 48%; border: 1px solid black; margin-bottom: 10px; padding: 10px;">
        <h2>Baterias Recicladas</h2>
        <p>Baterias recicladas de coches sin uso en buen estado</p>
    </div>
    <div style="flex: 0 0 48%; border: 1px solid black; margin-bottom: 10px; padding: 10px;">
        <h2>Victron</h2>
        <p>Marca para las instalaciones</p>
    </div>
    <div style="flex: 0 0 48%; border: 1px solid black; margin-bottom: 10px; padding: 10px;">
        <h2>Imagen de Baterias</h2>
        <img src="{{ asset('path_to_image/baterias.jpg') }}" alt="Imagen de Baterias" style="width: 100%;">
    </div>
    <div style="flex: 0 0 48%; border: 1px solid black; margin-bottom: 10px; padding: 10px;">
        <h2>Icono de Victron</h2>
        <img src="{{ asset('path_to_image/victron_icon.jpg') }}" alt="Icono de Victron" style="width: 100%;">
    </div>
</div>
@endsection
