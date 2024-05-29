<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BudgetDesignerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('budget_designser.index');
    }

    public function form_Results(Request $request)
    {
        $superficie = $request->get('superficie');
        $data = [
            'num_paneles' => $this->calcularNumeroPaneles($superficie),
            'precio' => $this->calcularPrecio($superficie, $request->get('tipo_cargador')),
            'potencia' => $this->calcularPotencia($superficie),
            'ahorro_anual' => $this->calcularAhorroAnual($superficie, $request->get('tipo_electricidad')),
            'tiempo_amortizacion' => $this->calcularTiempoAmortizacion($superficie, $request->get('tipo_cargador'), $request->get('tipo_electricidad')),
            'co2_evitar' => $this->calcularCO2Evitar($superficie),
            'tipo_casa' => $request->get('tipo_casa'),
        ];

        return view('budget_designser.results', compact('data'));
    }

    private function calcularNumeroPaneles($superficie)
    {
        return floor($superficie / 3);
    }

    private function calcularPrecio($superficie, $tipo_cargador)
    {
        // Cada panel cuesta $1400. Si el cargador es con-cargador, se le suman $3000.
        $precio_base = $this->calcularNumeroPaneles($superficie) * 1400;
        if ($tipo_cargador === "con-cargador") {
            $precio_base += 3000;
        }
        return $precio_base;
    }

    private function calcularPotencia($superficie)
    {
        // Cada panel tiene una potencia de 225 W.
        return $this->calcularNumeroPaneles($superficie) * 2.25;
    }

    private function calcularAhorroAnual($superficie, $tipo_electricidad)
    {
        // El ahorro anual es de $26 por metro cuadrado si es trifásica, y $24 si es monofásica.
        $ahorro_por_metro_cuadrado = ($tipo_electricidad === "trifasica") ? 26 : 24;
        return $superficie * $ahorro_por_metro_cuadrado;
    }

    private function calcularTiempoAmortizacion($superficie, $tipo_cargador, $tipo_electricidad)
    {
        // El tiempo de amortización es el costo inicial dividido por el ahorro anual.
        $costo_inicial = $this->calcularPrecio($superficie, $tipo_cargador);
        $ahorro_anual = $this->calcularAhorroAnual($superficie, $tipo_electricidad);

        if ($ahorro_anual <= 0) {
            return "N/A";
        }

        $tiempo_amortizacion = $costo_inicial / $ahorro_anual;
        return round($tiempo_amortizacion, 0);
    }

    private function calcularCO2Evitar($superficie)
    {
        // Se evitan 0.5 kg de CO2 por kWh de electricidad producida.
        $potencia = $this->calcularPotencia($superficie);
        $co2_evitar_por_kwh = 0.5;
        $co2_evitar = $potencia * $co2_evitar_por_kwh;
        return round($co2_evitar, 2);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
