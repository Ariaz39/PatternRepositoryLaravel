@extends('product.layout')
@section('title', 'Listado Productos')
@section('content')
    <div>
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>DESCRIPCION</th>
                <th>FECHA CREACION</th>
                <th>FECHA ACTUALIZACION</th>
                <th>ACCIONES</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $key)
                <tr>
                    <td>{{ $key->id }}</td>
                    <td>{{ $key->name }}</td>
                    <td>{{ $key->description }}</td>
                    <td>{{ $key->created_at }}</td>
                    <td>{{ $key->updated_at }}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('edit', $key->id) }}">Editar</a>
                        <form method="POST" action="{{ route('delete', $key->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
