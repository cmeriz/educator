/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***************************************!*\
  !*** ./resources/js/default-alert.js ***!
  \***************************************/
Livewire.on('alert', function (icon, message) {
  Swal.fire({
    position: 'center',
    icon: icon,
    title: message,
    showConfirmButton: false,
    timer: 1500
  });
});
/******/ })()
;