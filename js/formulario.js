document.addEventListener("DOMContentLoaded", function() {
    const formulario = document.querySelector('.contacto-formulario');
    const emailInput = document.querySelector('#emailInput');
    const nombreInput = document.querySelector('#nameInput');
    const motivoInput = document.querySelector('#motivoInput');
    const errorEmail = document.querySelector('.contenedor-email');
    const errorName = document.querySelector('.contenedor-name');
    const errorTextarea = document.querySelector('.contenedor-textarea');

    emailInput.addEventListener('blur', function() {
        validarMail();
    });

    nombreInput.addEventListener('blur', function() {
        validarName();
    });

    motivoInput.addEventListener('blur', function() {
        validarMotivo();
    });

    formulario.addEventListener('submit', function(event) {
        const errorEmail = validarMail();
        const errorNombre = validarName();
        const errorMotivo = validarMotivo();

        if (errorEmail || errorNombre || errorMotivo) {
            event.preventDefault();
        }
    });

    function validarMail() {
        // Código de validación del correo electrónico
    }

    function validarName() {
        // Código de validación del nombre
    }

    function validarMotivo() {
        // Código de validación del motivo
    }
});
