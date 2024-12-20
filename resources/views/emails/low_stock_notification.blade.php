<!-- resources/views/emails/low_stock_notification.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Low Stock Notification</title>
</head>
<body>
    <h2>Low Stock Notification</h2>

    <p>The inventory is running low on stock for the following product:</p>

    <strong>Product Name:</strong> {{ $product->name }}<br>
    <strong>Current Quantity:</strong> {{ $product->quantity }}<br>

    <p>
        <a href="{{ route('products.index') }}">View Product</a>
    </p>

    <p>Thank you for using our application!</p>
</body>
</html>
