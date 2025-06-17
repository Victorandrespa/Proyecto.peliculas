const btn_editar = document.getElementById("btn_editar_pelicula");
const formulario = document.querySelectorAll('#formulario_pelicula input');
const btn_guardar = document.getElementById("btn_guardar_edicion");

btn_editar.addEventListener("click", () => {
    const estaActivo = btn_editar.classList.contains('active');

    if (estaActivo) {
        // Si está activo, habilita edición
        formulario.forEach(input => input.removeAttribute('readonly'));
        btn_guardar.classList.remove('d-none');
    } else {
        // Si está desactivado, vuelve a bloquear
        formulario.forEach(input => input.setAttribute('readonly', true));
        btn_guardar.classList.add('d-none');
    }
});

