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
               sexo ENUM('Hombre', 'Mujer') NOT NULL,
               PRIMARY KEY (id_producto)
               );",
            "CREATE TABLE VARIANTE (
               id_variante INT AUTO_INCREMENT,
               id_producto INT,
               talla VARCHAR(50),
               PRIMARY KEY (id_variante),
               FOREIGN KEY (id_producto) REFERENCES PRODUCTO(id_producto)
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
               id_carrito INT AUTO_INCREMENT PRIMARY KEY,
               id_cliente INT,
               id_producto INT,
               cantidad INT NOT NULL,
               FOREIGN KEY (id_cliente) REFERENCES CLIENTE(id_cliente),
               FOREIGN KEY (id_producto) REFERENCES PRODUCTO(id_producto)
            );",
            "CREATE TABLE CATEGORIA (
               id_categoria INT AUTO_INCREMENT, 
               categoria VARCHAR(150) UNIQUE,
               PRIMARY KEY (id_categoria)
            );",
            "CREATE TABLE PRODUCTO_CATEGORIA (
               id_producto INT,
               id_categoria INT,
               PRIMARY KEY (id_producto, id_categoria),
               FOREIGN KEY (id_producto) REFERENCES PRODUCTO(id_producto),
               FOREIGN KEY (id_categoria) REFERENCES CATEGORIA(id_categoria)
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
            "INSERT INTO PRODUCTO (nombre, descripcion, precio, imagen, sexo) VALUES
               ('Camiseta deportiva', 'Camiseta de algodón transpirable', 25.99, './img/logo_hoka.png', 'Hombre'),
               ('Zapatillas running', 'Zapatillas para correr con suela amortiguada', 89.99, './img/logo_hoka.png', 'Hombre'),
               ('Leggings deportivos', 'Leggings ajustados para entrenamiento', 19.99, './img/logo_hoka.png', 'Mujer'),
               ('Balón de fútbol', 'Balón oficial de tamaño 5', 14.99, './img/logo_hoka.png', 'Hombre');",
            "INSERT INTO VARIANTE (id_producto, talla) VALUES
               (1, 'S'),
               (1, 'M'),
               (1, 'L'),
               (2, '40'),
               (2, '42'),
               (2, '44'),
               (3, 'S'),
               (3, 'M'),
               (3, 'L'),
               (4, NULL);",
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
            "INSERT INTO CATEGORIA (categoria) VALUES
    ('Ropa deportiva'),
    ('Calzado'),
    ('Ropa'),
    ('Accesorios');",

            // Insertar datos en la tabla PRODUCTO_CATEGORIA
            "INSERT INTO PRODUCTO_CATEGORIA (id_producto, id_categoria) VALUES
    (1, 1),  -- Camiseta deportiva -> Ropa deportiva
    (2, 2),  -- Zapatillas running -> Calzado
    (3, 1),  -- Leggings deportivos -> Ropa deportiva
    (3, 3),  -- Leggings deportivos -> Ropa
    (4, 4);  -- Balón de fútbol -> Accesorios",

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

// Crea tablas e inserta datos solo si no existe sportmart
if (!existeBBDD()) {
   crearBD();
}
