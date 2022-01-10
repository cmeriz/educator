Livewire.on('select', (el) => {
    const input = document.querySelector(el);
    input.focus();
    input.select(); 
});

Livewire.on('focus', (el) => {
    document.querySelector(el).focus(); 
});




