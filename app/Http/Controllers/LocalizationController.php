<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;

class LocalizationController extends Controller
{
    public function setLocale($locale)
    {
        Log::info('Intentando cambiar el idioma a: ' . $locale);

        if (in_array($locale, ['en', 'es'])) {
            App::setLocale($locale);
            session()->put('locale', $locale);
            Log::info('Idioma cambiado a: ' . $locale);
        } else {
            Log::warning('Intento de cambiar a un idioma no soportado: ' . $locale);
        }

        return Redirect::back();
    }
}
