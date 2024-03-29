@extends('layouts.main')
@section('contenido')
<div class="container"></br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Listado de productos
                    @auth
                    <a href="{{ route('products.create') }}" class="btn btn-success btn-sm float-right">Nuevo producto</a>
                    @endauth
                </div>
                <div class="card-body">
                    @if(session('info'))
                        <div class="alert alert-success">
                            {{ session('info') }}
                        </div>
                    @endif
                    <table class="table table-hover table-sm">
                        <thead>
                            <th>Descripcion</th>
                            <th>Precio</th>
                            @auth
                            <th>Accion</th>
                            @endauth
                        </thead>
                        <tbody>
                            @foreach ($products as $product )
                                <tr>
                                    <td>
                                        {{$product->description}}
                                    </td>
                                    <td>
                                        {{$product->price}}
                                    </td>
                                    @auth
                                    <td>
                                    <a href="{{ route('products.edit', $product->id)}}" class="btn btn-warning btn-sm">Editar</a>
                                        <a href="javascript:document.getElementById('delete-{{$product->id}}').submit()" class="btn btn-danger btn-sm">Eliminar</a>
                                    <form id="delete-{{$product->id}}" action="{{ route('products.destroy',$product->id)}}" method="POST">
                                            @method('delete')
                                            @csrf
                                        </form>
                                    </td>
                                    @endauth
                                </tr>  
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
                @auth
                <div class="card-footer">
                    
                        Bienvenido {{auth()->user()->name}}
                    
                    <a class="btn btn-danger btn-sm float-right" href="javascript: document.getElementById('logout').submit()">Cerrar sesion</a>
                    <form action="{{route('logout')}}" id="logout" style="display:none" method="post">
                    @csrf
                     </form>
                </div>
                @endauth
            </div>
        </div>
    </div>
</div>  
@endsection
    
