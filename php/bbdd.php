<?php

require_once 'conecta.php';

function existeBBDD()
{
   $bd = new BaseDeDatos();
   $flag = false;
   try {
      if ($bd->conectar()) {
         $conexion = $bd->getConexion();
         $sql = "SHOW DATABASES LIKE 'sportmart'";
         $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
         if (mysqli_num_rows($result) > 0) {
            $flag = true;
         }
      }
   } catch (Exception $e) {
      // echo $e->getMessage();
   }
   $bd->cerrar();
   return $flag;
}

function crearBD()
{
   $bd = new BaseDeDatos();
   try {
      if ($bd->conectar()) {
         $conexion =  $bd->getConexion();
         $createSql = [
            "CREATE DATABASE sportmart;",
            "USE sportmart;",
            "CREATE TABLE CLIENTE (
               id_cliente INT AUTO_INCREMENT,
               nombre VARCHAR(255) NOT NULL,
               apellidos VARCHAR(255) NOT NULL,
               correo VARCHAR(255) NOT NULL,
               telefono VARCHAR(255) NOT NULL,
               password VARCHAR(255) NOT NULL,
               PRIMARY KEY (id_cliente)
               );",
            "CREATE TABLE PRODUCTO (
               id_producto INT AUTO_INCREMENT,
               nombre VARCHAR(255) NOT NULL,
               descripcion TEXT,
               precio DECIMAL(10, 2) NOT NULL,
               imagen VARCHAR(255),
               talla VARCHAR(255),
               sexo ENUM('Hombre', 'Mujer') NOT NULL,
               PRIMARY KEY (id_producto)
               );",
            "CREATE TABLE FAVORITOS (
               id_favorito INT AUTO_INCREMENT,
               id_cliente INT,
               id_producto INT,
               PRIMARY KEY (id_favorito),
               FOREIGN KEY (id_cliente) REFERENCES CLIENTE(id_cliente),
               FOREIGN KEY (id_producto) REFERENCES PRODUCTO(id_producto)
                  );",
            "CREATE TABLE CARRITO (
               id_cliente INT PRIMARY KEY,
               id_producto INT,
               cantidad INT NOT NULL,
               FOREIGN KEY (id_producto) REFERENCES PRODUCTO(id_producto),
               FOREIGN KEY (id_cliente) REFERENCES CLIENTE(id_cliente)
               );",
            "CREATE TABLE CATEGORIA (
               id_categoria INT  AUTO_INCREMENT, 
               categoria VARCHAR(150) UNIQUE,
               id_producto INT,
               PRIMARY KEY (id_categoria),
               FOREIGN KEY (id_producto) REFERENCES PRODUCTO(id_producto)
               );",
            "CREATE TABLE DETALLES_PEDIDO (
               id_pedido INT AUTO_INCREMENT,
               id_producto INT NOT NULL,
               cantidad INT  NOT NULL,
               PRIMARY KEY (id_pedido)
            );",
            "CREATE TABLE DIRECCION_ENVIO (
               id_pedido INT PRIMARY KEY,
               direccion TEXT NOT NULL,
               FOREIGN KEY (id_pedido) REFERENCES DETALLES_PEDIDO(id_pedido)
               );",
            "CREATE TABLE METODO_PAGO (
               id_pedido INT PRIMARY KEY,
               n_tarjeta VARCHAR(19) NOT NULL,
               fecha DATE NOT NULL,
               nombre VARCHAR(225) NOT NULL,
               FOREIGN KEY (id_pedido) REFERENCES DETALLES_PEDIDO(id_pedido)
               );"
         ];
         $insertSql = [
            // Insertar datos en la tabla CLIENTE
            "INSERT INTO CLIENTE (nombre, apellidos, correo, telefono) VALUES
    ('Juan', 'González', 'juan@example.com', '123456789'),
    ('María', 'Martínez', 'maria@example.com', '987654321'),
    ('Pedro', 'Sánchez', 'pedro@example.com', '456789123'),
    ('Laura', 'López', 'laura@example.com', '789123456');",

            // Insertar datos en la tabla PRODUCTO
            "INSERT INTO PRODUCTO (nombre, descripcion, precio, imagen, talla, sexo) VALUES
   ('Camiseta Everlast', 'Camiseta de algodón transpirable', 25.99, 'camiseta_everlast.jpg', NULL, NULL),
   ('Zapatillas nike', 'Zapatillas para correr con suela amortiguada', 89.99, 'zapatillas_nike.jpg', NULL, NULL),
   ('Leggings deportivos', 'Leggings ajustados para entrenamiento', 19.99, 'leggings.jpg', NULL, NULL),
   ('Guantes CHARLIE', 'Guantes de cuero para entrenamiento de boxeo', 69.99, './img/accesorios/guantes_charlie.webp', NULL, NULL),
   ('Guantes EVERLAST', 'Guantes para entrenamiento de boxeo', 35.99, './img/accesorios/guantes_everlast.webp', NULL, NULL),
   ('Protector bucal', 'Protector bucal para boxeo con funda', 9.99, './img/accesorios/protector_bucal.webp', NULL, NULL),
   ('Nike Hyperko 2', 'Zapatillas de boxeo', 129.99, './img/accesorios/zapatillas_boxeo_nike.webp', NULL, NULL),
   ('Camiseta Adidas', 'Camiseta ligera y transpirable para correr', 29.99, 'camiseta_running.jpg', NULL, NULL),
   ('Reloj Garmin', 'Reloj GPS con monitor de frecuencia cardíaca', 199.99, 'reloj_gps.jpg', NULL, NULL),
   ('Mancuernas ajustables', 'Mancuernas con peso ajustable de 2 a 20 kg', 75.99, 'mancuernas.jpg', NULL, NULL),
   ('Straps', 'Straps ajustables', 25.99, 'straps.jpg', NULL, NULL);",

            // Insertar datos en la tabla FAVORITOS
            "INSERT INTO FAVORITOS (id_cliente, id_producto) VALUES
    (1, 1),
    (1, 3),
    (2, 2),
    (3, 4);",

            // Insertar datos en la tabla CARRITO
            "INSERT INTO CARRITO (id_cliente, id_producto, cantidad) VALUES
    (1, 2, 2),
    (2, 3, 1),
    (3, 1, 3),
    (4, 4, 1);",

            // Insertar datos en la tabla CATEGORIA
            "INSERT INTO CATEGORIA (categoria, id_producto) VALUES
    ('Ropa deportiva', 1),
    ('Calzado', 2),
    ('Ropa', 3),
    ('Accesorios', 4);",

            // Insertar datos en la tabla DETALLES_PEDIDO
            "INSERT INTO DETALLES_PEDIDO (id_producto, cantidad) VALUES
    (1, 2),
    (2, 1),
    (3, 3),
    (4, 1);",

            // Insertar datos en la tabla DIRECCION_ENVIO
            "INSERT INTO DIRECCION_ENVIO (id_pedido, direccion) VALUES
    (1, 'Calle Principal 123, Ciudad'),
    (2, 'Avenida Central 456, Ciudad'),
    (3, 'Plaza Mayor 789, Ciudad'),
    (4, 'Calle Secundaria 321, Ciudad');",

            // Insertar datos en la tabla METODO_PAGO
            "INSERT INTO METODO_PAGO (id_pedido, n_tarjeta, fecha, nombre) VALUES
    (1, '1234-5678-9012-3456', '2024-05-02', 'Juan González'),
    (2, '2345-6789-0123-4567', '2024-05-02', 'María Martínez'),
    (3, '3456-7890-1234-5678', '2024-05-02', 'Pedro Sánchez'),
    (4, '4567-8901-2345-6789', '2024-05-02', 'Laura López');"
         ];

         // Ejecutar las consultas de inserción de datos
         ejecutarSentencias($conexion, $createSql);
         ejecutarSentencias($conexion, $insertSql);
         $bd->cerrar();
      }
   } catch (Exception $e) {
         // echo $e->getMessage();
   }
}
function ejecutarSentencias($conexion, $sentencias)
{
   foreach ($sentencias as $sql) {
      if (mysqli_multi_query($conexion, $sql)) {
         do {
            // Almacenar primer resultado set (si existe)
            if ($result = mysqli_store_result($conexion)) {
               mysqli_free_result($result);
            }
            // Verificar si hay más resultados
         } while (mysqli_next_result($conexion));
      } else {
         echo "Error ejecutando SQL: " . mysqli_error($conexion);
         break; // Salir del bucle en caso de error
      }
   }
}
// Crea tablas e inserta datos solo si no existe Ambulatorio
if (!existeBBDD()) {
   crearBD();
}
