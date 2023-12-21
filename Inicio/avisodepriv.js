const botonAceptaraviso = document.getElementById('btn-aceptar-priv');
const avisodepriv = document.getElementById('aviso-priv');
const fondoavisopriv = document.getElementById('fondo-avisopriv');

if(!localStorage.getItem('aviso-aceptado')){
    avisodepriv.classList.add('activo');
    fondoavisopriv.classList.add('activo');
}



botonAceptaraviso.addEventListener('click', () =>{
    avisodepriv.classList.remove('activo');
    fondoavisopriv.classList.remove('activo');

    localStorage.setItem('aviso-aceptado', true);
});



