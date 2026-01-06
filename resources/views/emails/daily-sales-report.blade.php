<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Low Stock Alert</title>
</head>

<body>
    <h2>Daily Sales Report</h2>
    @foreach ($items as $item)
        <p>{{ $item->product->name }} — {{ $item->quantity }} sold</p>
    @endforeach
</body>

</html>
