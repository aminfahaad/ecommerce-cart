<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Low Stock Alert</title>
</head>

<body>
    <h2>Low Stock Alert</h2>

    <p>The following product is running low on stock:</p>

    <ul>
        <li><strong>Name:</strong> {{ $product->name }}</li>
        <li><strong>Price:</strong> ${{ number_format($product->price, 2) }}</li>
        <li><strong>Remaining Stock:</strong> {{ $product->stock_quantity }}</li>
    </ul>

    <p>Please restock this item soon.</p>
</body>

</html>
