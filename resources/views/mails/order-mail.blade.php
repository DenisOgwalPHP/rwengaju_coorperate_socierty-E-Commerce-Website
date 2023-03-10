<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Confirmation</title>
</head>
<body>
    <p>Hi {{ $order->firstname }} {{ $order->lastname }}</p>
    <p>Your order has been successfully placed.</p>
    <br/>
    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->orderItems as $item)
                <tr>
                    <td><img src="{{ asset('images/products') }}/{{ $item->product->image }}" width="100" alt="{{ $item->product->name }}"></td>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>UGx{{ $item->price * $item->quantity }}</td>
                </tr>
                <tr>
                    <td colspan="3" style="border-top: 1px solid #ccc;"></td>
                    <td style="font-size: 15px;font-weight:bold;border-top: 1px solid #ccc;">Subtotal : UGx{{ $order->subtotal }}</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td style="font-size: 15px;font-weight:bold;">Tax : UGx{{ $order->tax }}</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td style="font-size: 15px;font-weight:bold;">Shipping : Free Shipping</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td style="font-size: 15px;font-weight:bold;">Total : UGx{{ $order->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
