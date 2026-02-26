@extends('layout.admin')

@section('content')
<h4>Cliente no encontrado</h4>
<a href="{{ route('clients.index') }}" class="btn btn-primary">Volver</a>
@endsection
