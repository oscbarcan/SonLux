<?php

namespace App\Http\Controllers\Admin\Providers;

use App\Http\Controllers\Controller;
use App\Models\Provider;
use Illuminate\Http\Request;

class AdminProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $providers = Provider::all();
        return view('admin.providers.index', compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.providers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $provider = new Provider();
        $provider->name = $request->get('name');
        $provider->description = $request->get('description');

        $provider->save();

        return redirect()->route('admin.provider.index')->with('success', 'Proveedor ' . $provider->name . ' creado con exito!');
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
    public function edit(Provider $provider)
    {
        return view('admin.providers.edit', compact('provider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Provider $provider)
    {
        $provider->name = $request->get('name');
        $provider->description = $request->get('description');

        $provider->save();

        return redirect()->route('admin.provider.index')->with('success', 'Producto ' . $provider->name . ' actualizado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Provider $provider)
    {
        $provider = Provider::where('id', $provider->id);
        $provider->delete();

        return redirect()->route('admin.provider.index')->with('success', 'El proveedor ha sido eliminado con exito!');
    }
}
