<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Продажа новых автомобилей {{$brand->name ?? ''}} {{$carModel->name ?? ''}} в Санкт-Петербурге</title>
</head>
<body>
<h1>Продажа новых автомобилей {{$brand->name ?? ''}} {{$carModel->name ?? ''}} в Санкт-Петербурге</h1>
<br>
@foreach($products as $product)
    <h3>{{$product->name}}</h3>
@endforeach

</body>
</html>
