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
                <th>ACCIONES</th>
            </tr>
            </thead>
            <tbody>
            @if(!is_array($data))
                <tr>
                    <td colspan="5" class="text-center alert alert-danger"><h1>{{ $data }}</h1></td>
                </tr>
            @else
                @foreach($data as $key)
                    <tr>
                        <td>{{ $key['id'] }}</td>
                        <td>{{ $key['name'] }}</td>
                        <td>{{ $key['description'] }}</td>
                        <td>{{ $key['created_at'] }}</td>
                        <td>
                            <a class="btn btn-sm btn-primary"
                               href="{{ route('edit', $key['id']) }}">Editar</a>
                            <form method="POST" action="{{ route('delete', $key['id']) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>

@endsection
