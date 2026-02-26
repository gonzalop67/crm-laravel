<div class="modal fade" id="deleteContactModal{{ $contact->id }}" tabindex="-1">
    <div class="modal-dialog">
        <form method="post" id="deleteContactForm{{ $contact->id }}">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Eliminar Contacto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de que deseas eliminar este contacto?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
        </form>
    </div>
</div>
