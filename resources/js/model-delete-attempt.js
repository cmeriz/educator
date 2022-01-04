Livewire.on('modelDeleteAttempt', function($object, $event, $title = '¿Estas seguro?', $text = 'Esta acción no puede ser anulada.'){
    Swal.fire({
        title: $title,
        text: $text,
        icon: 'warning',
        showCancelButton: true,
        buttonsStyling: false,
        /* confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33', */
        confirmButtonText: 'Borrar',
        cancelButtonText: 'Cancelar',
        customClass: {
            confirmButton: 'btn--danger m-1',
            cancelButton: 'btn--gray-outlined m-1',
        }

    }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit($event, $object);
            }
    });
});