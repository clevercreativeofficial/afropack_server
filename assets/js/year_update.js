// Copyright year auto-update script
const copyright = new Date().getFullYear();
document.getElementById( 'copyright' ).innerHTML = copyright;

// experience year auto-update script
const year_start = 2024
const current_year = new Date().getFullYear()
const difference = current_year - year_start
document.getElementById( 'years' ).innerText = `+ ${ difference } ${ difference > 1 ? 'ans' : 'an' }`