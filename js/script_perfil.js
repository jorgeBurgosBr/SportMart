document.addEventListener('DOMContentLoaded', function() {
   obtenerPerfilUsuario();
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
