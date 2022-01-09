Livewire.on('select', (el) => {
    const input = document.querySelector(el);
    input.select(); 
    input.focus();
});

Livewire.on('focus', (el) => {
    document.querySelector(el).focus(); 
});




