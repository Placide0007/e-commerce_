<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Commande #{{ $order->id }}</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 25px;
        }

        .header h1 {
            margin: 0;
            font-size: 20px;
        }

        .info {
            width: 100%;
            margin-bottom: 20px;
        }

        .info td {
            padding: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th {
            background: #1e293b;
            color: white;
            padding: 8px;
            text-align: left;
        }

        td {
            border-bottom: 1px solid #ddd;
            padding: 8px;
        }

        .total {
            text-align: right;
            font-size: 16px;
            font-weight: bold;
            margin-top: 20px;
        }

        .status {
            color: green;
            font-weight: bold;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            font-size: 10px;
            color: #777;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>REÇU DE COMMANDE</h1>
        <p>Commande #{{ $order->id }}</p>
    </div>

    <table class="info">
        <tr>
            <td><strong>Client :</strong> {{ Str::ucfirst($order->user->name) }}</td>
            <td><strong>Date :</strong> {{ $order->created_at->format('d/m/Y H:i') }}</td>
        </tr>

        <tr>
            <td><strong>Email :</strong> {{ $order->user->email }}</td>
            <td><strong>Statut :</strong> <span class="status">{{ ucfirst($order->status) }}</span></td>
        </tr>
    </table>

    <table>

        <thead>
            <tr>
                <th>Produit</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Sous-total</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($order->items as $item)

                <tr>
                    <td>{{ Str::ucfirst($item->product->name) }}</td>
                    <td>{{ number_format($item->price, 0, ',', '.') }} Ar</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->subtotal, 0, ',', '.') }} Ar</td>
                </tr>

            @endforeach

        </tbody>

    </table>

    <div class="total">
        Total : {{ number_format($order->total, 0, ',', '.') }} Ar
    </div>

    <div class="footer">
        Merci pour votre commande.
    </div>

</body>

</html>

