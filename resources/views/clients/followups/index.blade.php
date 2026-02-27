@extends('layout.admin')

@section('content')

    <h3 class="mt-3">Cliente: {{ $client->name }}</h3>

    <p><strong>Email:</strong> {{ $client->email }}</p>
    <p><strong>Teléfono:</strong> {{ $client->phone }}</p>
    <p><strong>Empresa:</strong> {{ $client->company }}</p>

    {{-- <a href="{{ route('clients.pdf', $client->id) }}" class="btn btn-secondary">Exportar PDF</a> --}}

    <hr>

    <div class="text-center">
        <div class="btn-group">
            <a href="{{ route('clients.show', $client->id) }}" class="btn btn-outline-primary ">Contactos</a>
            <a href="{{ route('clients.followups.index', $client) }}" class="btn btn-primary active">Seguimientos</a>
        </div>
    </div>

    <div class="p-3 m-4 bg-light">
        <h4>Seguimientos</h4>

        <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#createFollowUpModal">Nuevo
            seguimiento</button>

        @if ($client->followUps->isEmpty())
            <p>No hay seguimientos disponibles.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($client->followUps as $followUp)
                        <tr>
                            <td>{{ $followUp->subject }}</td>
                            <td>{{ $followUp->follow_up_date }}</td>
                            <td>
                                @if ($followUp->status == 'pendiente')
                                    <span class="badge text-bg-warning">{{ ucfirst($followUp->status) }}</span>
                                @elseif($followUp->status == 'completado')
                                    <span class="badge text-bg-success">{{ ucfirst($followUp->status) }}</span>
                                @elseif($followUp->status == 'cancelado')
                                    <span class="badge text-bg-secondary">{{ ucfirst($followUp->status) }}</span>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-warning btn-sm edit-follow-up-btn" data-id="{{ $followUp->id }}"
                                    data-url="{{ route('clients.followups.show', [$client, $followUp]) }}"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editFollowUpModal{{ $followUp->id }}">Editar</a>
                                @include('clients.followups.edit', ['followUp' => $followUp])
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    @include('clients.followups.create')

    <script>
        // Script para cargar el formulario de edición en el modal
        document.querySelectorAll('.edit-follow-up-btn').forEach(button => {
            button.addEventListener('click', function() {
                const url = this.getAttribute('data-url');
                const contactId = this.getAttribute('data-id');

                fetch(url)
                    .then(res => res.json())
                    .then(data => {
                        const form = document.getElementById(`editFormFollowUp${data.id}`);
                        form.action = url;
                        form.querySelector('[name=subject]').value = data.subject;
                        form.querySelector('[name=description]').value = data.description;
                        form.querySelector('[name=follow_up_date]').value = data.follow_up_date;
                        form.querySelector('[name=status]').value = data.status;
                    });
            });
        });
    </script>

@endsection()
