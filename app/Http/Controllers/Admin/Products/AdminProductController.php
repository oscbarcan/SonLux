<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Provider;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $providers = Provider::all();
        return view('admin.products.create', compact('providers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'provider' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $product = new Product();
        $product->name = $validatedData['name'];
        $product->id_provider = $validatedData['provider'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];
        $product->stock = $request->has('stock') ? 1 : 0;

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $imgName = $img->getClientOriginalName();
            $img->move(public_path('/assets/img/Products'), $imgName);
            $product->img = $imgName;
        }

        $product->save();

        return redirect()->route('admin.product.index')->with('success', 'Producto ' . $product->name . ' creado con éxito!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $providers = Provider::all();
        return view('admin.products.edit', compact('product', 'providers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'provider' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $product->name = $validatedData['name'];
        $product->id_provider = $validatedData['provider'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];
        $product->stock = $request->has('stock') ? 1 : 0;

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $imgName = $img->getClientOriginalName();
            $img->move(public_path('/assets/img/Products'), $imgName);
            $product->img = $imgName;
        }

        $product->save();

        return redirect()->route('admin.product.index')->with('success', 'Producto ' . $product->name . ' actualizado con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.product.index')->with('success', 'El producto ha sido eliminado con éxito!');
    }
}
