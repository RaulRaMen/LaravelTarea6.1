<!-- Usamos, como plantilla, la vista layouts.app (/resources/views/layouts/app.blade.php) -->
@extends('layouts.app')         

<!-- Inyectamos el texto que contiene el título en el yield "title" -->
@section("title", "Productos")

<!-- Inyectamos el texto que contiene el título en el yield "subtitle" -->
@section("subtitle", "Listado productos")

<!-- Inyectamos el texto con el contenido de la página en el yield "content" -->
@section('content') 

    <div class="row">
    @foreach ($products as $product)
        <div class="col-md-6 col-lg-4 mb-2">
            <img src="{{ asset($product['imagen']) }}" class="img-fluid rounded">
            <a href="">{{ $product['nombre'] }}</a>
        </div>
    @endforeach
    </div>
@endsection