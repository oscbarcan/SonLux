<!DOCTYPE html>
<html>
<head>
    <title>{{ trans('mail.invoice_title') }}</title>
</head>
<body>
    <h1>{{ trans('mail.invoice_title') }}</h1>
    <p>{{ trans('mail.greeting', ['name' => $bill->name, 'surname' => $bill->surname]) }}</p>
    <p>{{ trans('mail.thanks') }}</p>
    <p>{{ trans('mail.order_details') }}</p>
    <ul>
        @foreach($order->products as $product)
            <li>{{ $product->name }} - {{ $product->pivot->quantity }} x {{ $product->price }}€</li>
        @endforeach
    </ul>
    <p>{{ trans('mail.total', ['total_price' => $order->total_price]) }}</p>
    <p>{{ trans('mail.shipping_info') }}</p>
    <p>{{ trans('mail.country', ['country' => $bill->country]) }}</p>
    <p>{{ trans('mail.city', ['city' => $bill->city]) }}</p>
    <p>{{ trans('mail.street', ['address' => $bill->address]) }}</p>
</body>
</html>
