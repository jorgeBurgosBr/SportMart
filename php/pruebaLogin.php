<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
</head>
<body>
<h1>Login con nombre <?php echo $_SESSION['nombre']; ?> e ID <?php echo $_SESSION['id_cliente']; ?></h1>

</body>
</html>