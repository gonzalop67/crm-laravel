<div class="modal fade" id="createContactModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('clients.contacts.store', $client) }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Contacto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    @include('clients.contacts.form')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
        </form>
    </div>
</div>
