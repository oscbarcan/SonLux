@extends('layout')

@section('title', 'Index')

@section('styles')
    <link rel="stylesheet" href="/css/index.css">
@endsection

@section('content')
<div class="main-container">
    <h1>Bof</h1>
    <form action="/formulario" method="POST" id="formulario">
        @csrf
        <div id="div1">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre"><br><br>

            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido"><br><br>

        </div>

        <div id="div2" style="display: none;">
            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="edad"><br><br>

            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono"><br><br>
        </div>

        <div id="div3" style="display: none;">
            <label for="edad">Correo:</label>
            <input type="number" id="edad" name="edad"><br><br>

            <label for="telefono">DNI:</label>
            <input type="text" id="telefono" name="telefono"><br><br>
        </div>

        <button type="button" id="atras" style="display: none;">Atrás</button>
        <button type="button" id="continuar">Continuar</button>
        <button type="submit" id="enviar" style="display: none;">Enviar</button>
    </form>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    var divActual = 1;
    var botonContinuar = document.getElementById('continuar');
    var botonAtras = document.getElementById('atras');

    botonContinuar.addEventListener('click', function () {
        document.getElementById('div' + divActual).style.display = 'none';
        divActual++;
        document.getElementById('div' + divActual).style.display = 'block';

        if (divActual > 1) {
            botonAtras.style.display = 'inline-block';
        }
        if (divActual == 3) {
            botonContinuar.style.display = 'none';
            document.getElementById('enviar').style.display = 'inline-block';
        }
    });

    botonAtras.addEventListener('click', function () {
        document.getElementById('div' + divActual).style.display = 'none';
        divActual--;
        document.getElementById('div' + divActual).style.display = 'block';

        if (divActual == 1) {
            botonAtras.style.display = 'none';
        }
        if (divActual < 3) {
            botonContinuar.style.display = 'inline-block';
            document.getElementById('enviar').style.display = 'none';
        }
    });
});


</script>
@endsection
