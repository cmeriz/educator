/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*****************************************!*\
  !*** ./resources/js/lw-input-events.js ***!
  \*****************************************/
Livewire.on('select', function (el) {
  var input = document.querySelector(el);
  input.focus();
  input.select();
});
Livewire.on('focus', function (el) {
  document.querySelector(el).focus();
});
/******/ })()
;