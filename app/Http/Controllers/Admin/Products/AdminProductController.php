<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::where('stock', 1)->get();
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
        $product = new Product();
        $product->name = $request->get('name');
        $product->id_provider = $request->get('provider');
        $product->description = $request->get('description');
        $product->price = $request->get('price');
        $product->stock = $request->has('stock') ? 1 : 0;
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $imgName = $img->getClientOriginalName();
            $img->move(public_path('/assets/img/Products'), $imgName);
            $product->img = $imgName;
        }

        $product->save();

        return redirect()->route('admin.product.index')->with('success', 'Producto ' . $product->name . ' creado con exito!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->name = $request->get('name');
        $product->id_provider = $request->get('provider');
        $product->description = $request->get('description');
        $product->price = $request->get('price');
        $product->stock = $request->has('stock') ? 1 : 0;
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $imgName = $img->getClientOriginalName();
            $img->move(public_path('/assets/img/Products'), $imgName);
            $product->img = $imgName;
        }

        $product->save();

        return redirect()->route('admin.product.index')->with('success', 'Producto ' . $product->name . ' actualizado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product = Product::where('id', $product->id);
        $product->delete();

        return redirect()->route('admin.product.index')->with('success', 'El producto ha sido eliminado con exito!');
    }
}
