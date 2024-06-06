@extends('layout')

@section('title', 'Políticas y Privacidad y Términos y Condiciones')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold text-center mb-8">Políticas de Privacidad y Términos y Condiciones</h1>

    <div class="flex flex-col lg:flex-row lg:space-x-8">
        <!-- Políticas de Privacidad -->
        <div class="bg-white shadow-lg rounded-lg p-6 mb-8 lg:mb-0 flex-1">
            <h2 class="text-3xl font-bold mb-4">Políticas de Privacidad</h2>
            <p class="mb-4">
                En SonLux, nos comprometemos a proteger su privacidad. Esta política de privacidad explica cómo recopilamos, usamos y protegemos su información personal.
            </p>
            <h3 class="text-2xl font-semibold mb-2">Información que Recopilamos</h3>
            <p class="mb-4">
                Recopilamos información que usted nos proporciona directamente, como cuando crea una cuenta, realiza una compra o se comunica con nuestro equipo de soporte. Esta información puede incluir su nombre, dirección de correo electrónico, dirección de envío y facturación, y detalles de pago.
            </p>
            <h3 class="text-2xl font-semibold mb-2">Uso de la Información</h3>
            <p class="mb-4">
                Utilizamos la información recopilada para procesar sus pedidos, personalizar su experiencia en nuestro sitio, mejorar nuestros servicios y comunicarnos con usted. También podemos utilizar su información para enviarle ofertas y promociones especiales que creemos que pueden ser de su interés.
            </p>
            <h3 class="text-2xl font-semibold mb-2">Protección de la Información</h3>
            <p class="mb-4">
                Implementamos una variedad de medidas de seguridad para mantener la seguridad de su información personal. Sin embargo, no podemos garantizar la seguridad absoluta de la información transmitida a través de Internet.
            </p>
        </div>

        <!-- Términos y Condiciones -->
        <div class="bg-white shadow-lg rounded-lg p-6 flex-1">
            <h2 class="text-3xl font-bold mb-4">Términos y Condiciones</h2>
            <h3 class="text-2xl font-semibold mb-2">Aceptación de los Términos</h3>
            <p class="mb-4">
                Al utilizar nuestro sitio web, usted acepta cumplir con estos términos y condiciones. Si no está de acuerdo con alguna parte de estos términos, no debe usar nuestro sitio.
            </p>
            <h3 class="text-2xl font-semibold mb-2">Uso del Sitio</h3>
            <p class="mb-4">
                SonLux le concede una licencia limitada para acceder y hacer uso personal de este sitio, pero no para descargarlo (aparte del almacenamiento en caché de la página) o modificarlo, excepto con el consentimiento expreso por escrito de SonLux.
            </p>
            <h3 class="text-2xl font-semibold mb-2">Cuentas de Usuario</h3>
            <p class="mb-4">
                Usted es responsable de mantener la confidencialidad de su cuenta y contraseña y de restringir el acceso a su computadora, y acepta la responsabilidad de todas las actividades que ocurran bajo su cuenta o contraseña.
            </p>
            <h3 class="text-2xl font-semibold mb-2">Limitación de Responsabilidad</h3>
            <p class="mb-4">
                SonLux no será responsable por ningún daño que surja del uso de este sitio o de los productos adquiridos en él, incluyendo, pero no limitado a, daños directos, indirectos, incidentales, punitivos y consecuentes.
            </p>
            <h3 class="text-2xl font-semibold mb-2">Modificaciones a los Términos</h3>
            <p class="mb-4">
                Nos reservamos el derecho de hacer cambios a nuestro sitio, políticas y estos términos y condiciones en cualquier momento. Si alguna de estas condiciones se considera inválida, nula o por cualquier razón inaplicable, dicha condición se considerará separable y no afectará la validez y aplicabilidad de cualquier condición restante.
            </p>
        </div>
    </div>
</div>
@endsection
