<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Module</title>
</head>

<body>
    <h1>Module Data</h1>
    <ul>
        @foreach($items as $item)
        <li>{{ $item->name }} - {{ $item->description }}</li>
        @endforeach
    </ul>
</body>

</html>