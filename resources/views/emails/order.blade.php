<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Создание нового заказа</title>
</head>
<body>
        <h2>
            ID: {{ $order->id }}
        </h2>
        @if(!empty($order->products))

            @foreach($order->products as $prod)
            <p>
                <a href="{{ url('product') . '/' . $prod->id }}">{{ ucfirst($prod->name) }}</a> <br>
            </p>
            @endforeach

        @endif
</body>
</html>
