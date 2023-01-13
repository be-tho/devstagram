const $msj = document.getElementById('msj');
const $session = document.getElementsByClassName('session');

$msj.addEventListener('click', () => {
   $session[0].classList.add('hidden');
   //agregar transition css de 2sg después de agregar la clase
});

setTimeout(() => {
   $session[0].classList.add('hidden');
} , 4000);

