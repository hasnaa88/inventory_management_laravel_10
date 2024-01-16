<!-- resources/views/invoices/print.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        /* Add your styling here */
        body {
            font-family: Arial, sans-serif;
        }

        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .invoice-details {
            margin-bottom: 20px;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .invoice-table th, .invoice-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .total-amount {
            margin-top: 20px;
            text-align: right;
        }
    </style>
</head>
<body>

    <div class="invoice-header">
        <h1>Invoice</h1>
    </div>

    <div class="invoice-details">
        <h2>Customer Details</h2>
        <p>Name: {{ $customer->name }}</p>
        <p>Email: {{ $customer->email }}</p>
    </div>

    <h2>Orders</h2>
    @if($orders->isEmpty())
        <p>No orders found for this customer.</p>
    @else
        <table class="invoice-table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Total Amount</th>
                    <th>Products</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>${{ $order->total_amount }}</td>
                        <td>
                            <ul>
                                @foreach($order->products as $product)
                                    <li>{{ $product->title }} - Quantity: {{ $product->pivot->quantity }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>{{ $order->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="total-amount">
            <p>Total Amount: ${{ $totalAmount }}</p>
        </div>
    @endif

</body>
</html>
