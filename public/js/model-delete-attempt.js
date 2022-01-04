/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************************!*\
  !*** ./resources/js/model-delete-attempt.js ***!
  \**********************************************/
Livewire.on('modelDeleteAttempt', function ($object, $event) {
  var $title = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : '¿Estas seguro?';
  var $text = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : 'Esta acción no puede ser anulada.';
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
      cancelButton: 'btn--gray-outlined m-1'
    }
  }).then(function (result) {
    if (result.isConfirmed) {
      Livewire.emit($event, $object);
    }
  });
});
/******/ })()
;