<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        // $carrito = session()->get('shopping_card', []);
        return view('products.index', compact('products'));
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

    public function addToCart(Request $request)
    {
        $productId = $request->input('productId');
        $quantity = $request->input('quantity-input-' . $productId);

        $carrito = session()->get('shopping_cart', []);

        $carrito[$productId] = $quantity;

        session(['shopping_cart' => $carrito]);

        // Puedes redirigir a donde desees después de agregar al carrito
        return redirect()->back()->with('success', 'Producto agregado al carrito');
    }

    public function indexShopingCart()
    {
        $carrito = session()->get('shopping_cart', []);
        return view('shoping_cart.index', compact('carrito'));
    }

    public function deleteShopingCart(int $id)
    {
        $carrito = session()->get('shopping_cart', []);

        if (array_key_exists($id, $carrito)) {
            unset($carrito[$id]);
            session(['shopping_cart' => $carrito]);

            return redirect()->route('shoping_cart')->with('success', 'El producto ha sido eliminado del carrito.');
        }
        return redirect()->route('shoping_cart')->with('error', 'El producto no se encontró en el carrito.');
    }
}
