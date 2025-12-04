<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>{{ $product->name }}</h1>

    <h3>Pilihan Varian:</h3>
    <ul>
        @foreach ($product->variants as $v)
            <li>
                {{ $v->nama_varian }} - Stok: {{ $v->stok }}
            </li>
        @endforeach
    </ul>
</body>

</html>
