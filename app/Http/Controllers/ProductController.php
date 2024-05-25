<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Order;
use App\Models\Order_Product;
use App\Models\Product;
use Carbon\Carbon;
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

            return redirect()->route('shoping_cart')->with('success', 'El producto ha sido eliminado.');
        }
        return redirect()->route('shoping_cart')->with('error', 'El producto no se encontró en el carrito.');
    }

    public function payment_gateway()
    {
        $carrito = session()->get('shopping_cart', []);

        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $order = new Order();
        $order->id_user = auth()->id();
        $order->total_price = 0;
        foreach ($carrito as $productId => $quantity) {
            $product = Product::find($productId);
            $order->total_price += $product->price * $quantity;
        }
        $order->save();

        $order->save();

        foreach ($carrito as $productId => $quantity) {
            $orderProduct = Order_Product::where('id_order', $order->id)
                ->where('id_product', $productId)
                ->first();

            if ($orderProduct) {
                $orderProduct->quantity += $quantity;
            } else {
                $orderProduct = new Order_Product();
                $orderProduct->id_order = $order->id;
                $orderProduct->id_product = $productId;
                $orderProduct->quantity = $quantity;
                $orderProduct->price = Product::find($productId)->price;
                $orderProduct->save();
            }
        }
        session()->forget('shopping_cart');

        return view('payment_gateway.index', compact('carrito'), compact('order'));
    }


    public function payment_gateway_buy(Request $request)
    {
        $bill = new Bill();
        $bill->id_order = Order::latest()->first()->id;
        $bill->name = $request->input('first_name');
        $bill->surname = $request->input('last_name');
        $bill->card_number = $request->input('card_number');
        $bill->country = $request->input('country');
        $bill->city = $request->input('city');
        $bill->address = $request->input('address');
        $bill->province = $request->input('province');
        $bill->postal_code = $request->input('postal_code');
        $bill->payment_date = Carbon::now();

        $bill->save();

        Order::latest()->first()->update(['paid' => true, 'bill_date' => Carbon::now()]);

        return redirect()->route('products.index')->with('success', 'La compra se ha realizado con éxito.');
    }

    public function orders_index()
    {
        $orders = Order::where('id_user', auth()->id())->get();
        // dd($orders);
        return view('orders.index', compact('orders'));
    }
}
