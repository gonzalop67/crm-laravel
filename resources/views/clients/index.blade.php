@extends('layout.admin')

@section('content')
    <h3 class="mt-3">Clientes</h3>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row mb-3">
        <div class="col-xl-6 col-md-6">
            @permission('clientes-crear')
                <a href="{{ route('clients.create') }}" class="btn btn-primary">Nuevo</a>
            @endpermission
            <a href="{{ route('clients.deleted') }}" class="btn btn-warning">Historial</a>
            <a href="{{ route('clients.export') }}" class="btn btn-success">Exportar Excel</a>
            <a href="{{ route('clients.form-import') }}" class="btn btn-secondary">Importar Clientes</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Usuario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->email }}</td>
                            <td>{{ $client->user->name }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm"
                                    href="{{ route('clients.show', $client->id) }}">Detalles</a>
                                <a class="btn btn-warning btn-sm" href="{{ route('clients.edit', $client->id) }}">Editar</a>

                                @permission('clientes-eliminar')
                                    <form action="{{ route('clients.destroy', $client->id) }}" method="post"
                                        style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                    </form>
                                @endpermission
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $clients->links() !!}
        </div>
    </div>
@endsection
