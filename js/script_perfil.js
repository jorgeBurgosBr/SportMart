document.addEventListener('DOMContentLoaded', function() {
    obtenerPerfilUsuario();
    mostrarInformacion();
});

// Función para obtener el perfil del usuario
function obtenerPerfilUsuario() {
   // Realiza una solicitud fetch al archivo PHP que procesa la información del usuario
   fetch('./php/procesar_perfil.php',{
       method: "GET"
   })
   .then(response => {
       // Verifica si la respuesta de la red fue exitosa
       if (!response.ok) {
           throw new Error('Respuesta NO ok');
       }
       // Convierte la respuesta a formato JSON
       return response.json();
   })
   .then(data => {
       // Procesa la respuesta JSON
       console.log(data);

       // Obtiene referencias a los elementos HTML con los IDs 'user-name', 'user-mail', y 'user-role'
       const nombreSpan = document.getElementById('user-name');
       const correoSpan = document.getElementById('user-mail');

       // Verifica si la respuesta del servidor fue exitosa y si los elementos HTML existen
       if (data.success && nombreSpan && correoSpan ) {

           const nombreCompleto = data.nombre + ' ' + data.apellidos;
           // Actualiza el contenido de los elementos con los datos del paciente
           nombreSpan.textContent = nombreCompleto;
           correoSpan.textContent = data.correo;

       } else {
           // Muestra un mensaje de error si no se encontraron elementos o la respuesta fue incorrecta
           console.error('No se encontraron los elementos con los IDs proporcionados o la respuesta fue incorrecta.');
       }
   })
   .catch(error => console.error('Fetch error: ', error));
}

function mostrarInformacion() {
    // Obtener el formulario y crear un objeto FormData
    const formData = new FormData(document.getElementById('user-form-info'));
    // Realizar la solicitud fetch
    fetch('./php/procesar_info_perfil.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        // Procesar la respuesta JSON
        console.log(data);

        // Actualizar los campos del formulario con la información del servidor
        document.getElementById('birthdate').value = data.fecha_nac_cliente;
        document.getElementById('user-telefono').value = data.telefono;
        document.getElementById('hobbies').value = data.provincia;
        document.getElementById('job').value = data.localidad;
        document.getElementById('studies').value = data.direccion_envio;
        document.getElementById('expectations').value = data.codigo_postal;
    })
    .catch(error => {
        // Capturar errores y pausar la ejecución
        console.error('Fetch error: ', error);
        alert('Error en la solicitud');
    });

    return false;
}

