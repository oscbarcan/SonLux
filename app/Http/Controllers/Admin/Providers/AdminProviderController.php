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
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $provider = new Provider();
        $provider->name = $request->get('name');
        $provider->description = $request->get('description');
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $imgName = 'provider_' . $provider->name . '.' . $img->getClientOriginalExtension() ?? 'png';
            $img->move(public_path('/assets/img/Providers'), $imgName);
            $provider->img = $imgName;
        }

        $provider->save();

        return redirect()->route('admin.provider.index')->with('success', 'Proveedor ' . $provider->name . ' creado con éxito!');
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
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $provider->name = $request->get('name');
        $provider->description = $request->get('description');
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $imgName = 'provider_' . $provider->name . '.' . $img->getClientOriginalExtension() ?? 'png';
            $img->move(public_path('/assets/img/Providers'), $imgName);
            $provider->img = $imgName;
        }

        $provider->save();

        return redirect()->route('admin.provider.index')->with('success', 'Proveedor ' . $provider->name . ' actualizado con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Provider $provider)
    {
        $provider = Provider::where('id', $provider->id);
        $provider->delete();

        return redirect()->route('admin.provider.index')->with('success', 'El proveedor ha sido eliminado con éxito!');
    }
}
