@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4">
  <div class="card-header">
    Crear producto
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
    <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Nombre:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="name" value="" type="text" class="form-control">
            </div>
          </div>
        </div>
        <div class="col">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Precio:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="price" value="" type="number" class="form-control">
            </div>
          </div>
        </div>
      </div>
      <div class="mb-3 row">
        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Imagen:</label>
        <div class="col-lg-10 col-md-6 col-sm-12">
          <input type="file" name="image">
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label">Descripción</label>
        <textarea class="form-control" name="description" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
  </div>
</div>

<div class="card">
  <div class="card-header">
    Mantenimiento de productos
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nombre</th>
          <th scope="col">Editar</th>
          <th scope="col">Eliminar</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($viewData['products'] as $product)
          <tr>
            
            <td>{{$product['id']}}</td>
            <td>{{ $product['nombre'] }}</td>
            
            <td><a href="{{route('admin.products.edit' , $product['id'] ) }}">Editar</a></td>

            <form action="{{route('admin.products.delete' , $product['id'] ) }}" method="post">
              @method('DELETE')
              @csrf
              <td><button type="submit" class="btn btn-danger">Eliminar</button></td>
            </form>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
