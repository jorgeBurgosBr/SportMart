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
               sexo ENUM('Hombre', 'Mujer', 'Unisex') NOT NULL,
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
               talla VARCHAR(50), -- Columna para almacenar la talla del producto
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
               ('Camiseta técnica Nike', 'Camiseta manga larga mujer', 46.95, './img/ropa/camiseta_tecnica_nike.webp', 'Mujer'),
               ('Ultraboost light', 'Zapatillas para correr con suela amortiguada', 89.99, './img/calzado/zapatillas_adidas.webp', 'Unisex'),
               ('Leggings MyProtein', 'Leggings ajustados para entrenamiento', 19.99, './img/ropa/leggins_mp.webp', 'Mujer'),
               ('Venum Impact 2.0', 'Guantes MMA Venum', 40.99, './img/accesorios/guantes_venum.webp', 'Unisex'),
               ('Guantes Charlie', 'Guantes de cuero para entrenamiento de boxeo', 69.99, './img/accesorios/guantes_charlie.webp', 'Unisex'),
               ('Guantes Everlast', 'Guantes para entrenamiento de boxeo', 35.99, './img/accesorios/guantes_everlast.webp', 'Unisex'),
               ('Protector bucal', 'Protector bucal para boxeo con funda', 9.99, './img/accesorios/protector_bucal.webp', 'Unisex'),
               ('Nike Hyperko 2', 'Zapatillas de boxeo hombre', 129.99, './img/calzado/zapatillas_boxeo_nike.webp', 'Hombre'),
               ('Adidas Box Hog 3', 'Zapatillas de boxeo mujer', 109.99, './img/calzado/zapatillas_boxeo_adidas.webp', 'Mujer'),
               ('Camiseta Adidas', 'Camiseta ligera y transpirable para correr', 29.99, './img/ropa/camiseta_adidas.webp', 'Mujer'),
               ('Vendas Charlie', 'Vendas para deporte de contacto, 3M', 24.99, './img/accesorios/vendas-charlie.webp', 'Unisex'),
               ('Camiseta UFC', 'Camiseta para entrenamiento (Authentic Fight Week)', 44.99, './img/ropa/camiseta_ufc.webp', 'Hombre'),
               ('Garmin Forerunner 955', 'Reloj inteligente premium para carrera', 499.99, './img/accesorios/reloj_garmin.webp', 'Unisex'),
               ('Asics Gel-Cumulus 26', 'Comodidad y rendimiento en cada paso', 128.99, './img/calzado/zapatillas_asics.webp', 'Mujer'),
               ('Gafas Oakley Radar', 'Gafas polarizadas especiales para running', 205.99, './img/accesorios/gafas_oakley.webp', 'Unisex'),
               ('Leggings Nike', 'Leggings ajustados para entrenamiento', 39.99, './img/ropa/leggins_nike.webp', 'Mujer'),
               ('Camiseta Hoka', 'Camiseta 100% algodón', 32.99, './img/ropa/camiseta_hoka.webp', 'Hombre'),
               ('New Balance Fresh Foam X', 'Nueva tecnología incorporada', 119.95, './img/calzado/zapatillas_newbalance.webp', 'Hombre'),
               ('Camiseta Agongym', 'Transpirable, ideal para entrenar', 29.95, './img/ropa/camiseta_agongym.webp', 'Hombre'),
               ('Top Agongym', 'Premium top, blanco', 29.95, './img/ropa/top_agongym.webp', 'Mujer'),
               ('Pantalones Gymshark', 'Joggers cómodos para entrenar o streetwear', 50.95, './img/ropa/pantalones_gymshark.webp', 'Unisex'),
               ('Adidas The Total', 'Powerlifting, Crossfit', 88.99, './img/calzado/zapatillas_power_adidas.webp', 'Hombre'),
               ('Straps', 'Correas para levantamiento de peso', 11.99, './img/accesorios/straps_gym.webp', 'Unisex'),
               ('Botella para proteinas', 'Botella mezclador', 15.95, './img/accesorios/shaker_gym.webp', 'Unisex'),
               ('Vibram FiveFingers', 'Zapatillas para gimnasio', 139.00, './img/calzado/zapatillas_dedos.webp', 'Unisex'),
               ('Vibram FiveFingers Alpha', 'Zapatillas para gimnasio', 109.00, './img/calzado/zapatillas_dedos_1.webp', 'Unisex'),
               ('Brazalete Running iPhone', 'Brazalete para iPhone 14/15', 12.90, './img/accesorios/brazalete_running.webp', 'Unisex'),
               ('Cinturon deportivo Running', 'Cinturon ajustable para hidratacion, ', 15.99, './img/accesorios/rinonera_running.webp', 'Unisex'),
               ('Espinilleras Venum Challenger', 'Espinilleras para principiantes MMA', 59.99, './img/accesorios/espinilleras_venum.webp', 'Hombre'),
               ('Espinilleras Buddha Tubular', 'Espinilleras para principiantes Muay Thai', 39.99, './img/accesorios/espinilleras_budha.webp', 'Unisex'),
               ('Nike ZoomX Streakfly', 'Zapatillas para running', 149.90, './img/calzado/zapatillas_nike_zoomx.webp', 'Mujer'),
               ('Nike ZoomX Streakfly', 'Zapatillas para running', 149.90, './img/calzado/zapatillas_nike_zoomx_1.webp', 'Hombre'),
               ('Chandal completo Leone', 'Comodo, practico e impactante', 88.90, './img/ropa/chandal_leone.webp', 'Hombre'),
               ('Pantalones Venum Classic', 'Pantalones thai-kick', 41.99, './img/ropa/pantalones_venum.webp', 'Unisex'),
               ('Pantalones cortos Reebok', 'Pantalones para running', 30.99, './img/ropa/pantalones_reebok.webp', 'Mujer'),
               ('Pantalones Adidas Terrez Trail', 'Pantalones cortos de trail running', 30.99, './img/ropa/pantalones_adidas.webp', 'Hombre'),
               ('Camiseta Faster Wear', 'Camiseta running para trail', 27.99, './img/ropa/camiseta_running_trial.webp', 'Hombre'),
               ('Camiseta Runnek', 'Camiseta running transpirable', 14.89, './img/ropa/camiseta_runnek.webp', 'Mujer'),
               ('Camiseta Tirantes', 'Camiseta transpirable para gimnasio', 10.50, './img/ropa/camiseta_tirantes.webp', 'Hombre'),
               ('Sudadera Anti Social', 'Anti Social Lifting Club', 50.90, './img/ropa/sudadera_antisocial.webp', 'Unisex'),
               ('Botas Boxeo Everlast', 'Botas ajustables cómodas', 80.99, './img/calzado/zapatillas_everlast.webp', 'Hombre'),
               ('Botas Boxeo Everlast', 'Botas de mujer ajustables cómodas', 80.99, './img/calzado/zapatillas_everlast_mujer.webp', 'Mujer');",

            "INSERT INTO VARIANTE (id_producto, talla) VALUES
               (1, 'S'),
               (1, 'M'),
               (1, 'L'),
               (2, '37'),
               (2, '38'),
               (2, '40'),
               (2, '42'),
               (2, '44'),
               (3, 'S'),
               (3, 'M'),
               (3, 'L'),
               (4, 'M'),
               (5, 'L'),
               (6, 'M'),
               (7, 'S'),
               (8, '42'),
               (8, '44'),
               (8, '48'),
               (9, '36'),
               (9, '38'),
               (9, '40'),
               (10, 'S'),
               (10, 'M'),
               (10, 'L'),
               (11, 'M'),
               (12, 'S'),
               (12, 'M'),
               (12, 'L'),
               (13, 'L'),
               (14, '36'),
               (14, '37'),
               (14, '38'),
               (15, 'M'),
               (16, 'S'),
               (16, 'M'),
               (17, 'M'),
               (17, 'L'),
               (18, '42'),
               (18, '43'),
               (19, 'M'),
               (19, 'L'),
               (20, 'S'),
               (20, 'M'),
               (21, 'S'),
               (21, 'M'),
               (21, 'L'),
               (22, '40'),
               (22, '41'),
               (22, '42'),
               (22, '43'),
               (23, 'M'),
               (24, 'M'),
               (25, '36'),
               (25, '37'),
               (25, '38'),
               (25, '40'),
               (25, '42'),
               (25, '44'),
               (26, '36'),
               (26, '37'),
               (26, '38'),
               (26, '40'),
               (26, '42'),
               (26, '44'),
               (27, 'M'),
               (28, 'M'),
               (29, 'M'),
               (29, 'L'),
               (30, 'M'),
               (30, 'L'),
               (31, '36'),
               (31, '37'),
               (31, '38'),
               (31, '39'),
               (32, '40'),
               (32, '42'),
               (32, '44'),
               (33, 'M'),
               (33, 'L'),
               (34, 'S'),
               (34, 'M'),
               (34, 'L'),
               (35, 'S'),
               (35, 'M'),
               (36, 'M'),
               (36, 'L'),
               (37, 'S'),
               (37, 'M'),
               (37, 'L'),
               (38, 'S'),
               (38, 'M'),
               (39, 'M'),
               (39, 'L'),
               (40, 'S'),
               (40, 'M'),
               (40, 'L'),
               (41, '40'),
               (41, '42'),
               (41, '43'),
               (42, '36'),
               (42, '37'),
               (42, '38');",
            // Insertar datos en la tabla FAVORITOS
            "INSERT INTO FAVORITOS (id_cliente, id_producto) VALUES
               (1, 1),
               (1, 3),
               (2, 2),
               (3, 4);",

            // Insertar datos en la tabla CARRITO
            "INSERT INTO CARRITO (id_cliente, id_producto, cantidad, talla) VALUES
               (1, 2, 2, '42'), 
               (2, 3, 1, 'L'), 
               (3, 1, 3, 'S'),
               (4, 4, 1, 'M');",

            // Insertar datos en la tabla CATEGORIA
            "INSERT INTO CATEGORIA (categoria) VALUES
               ('Calzado'),
               ('Ropa'),
               ('Accesorios');",

            // Insertar datos en la tabla PRODUCTO_CATEGORIA
            "INSERT INTO PRODUCTO_CATEGORIA (id_producto, id_categoria) VALUES
            (1, 2), -- Camiseta tecnica nike
            (2, 1), -- Zapatillas Ultraboost
            (3, 2), -- Leggins deportivos
            (4, 3), -- Guantes MMA Venum
            (5, 3), -- Guantes charlie
            (6, 3), -- Guantes everlast
            (7, 3), -- Protector Bucal
            (8, 1), -- Nike Hyperco
            (9, 1), -- Adidas Box Hog
            (10, 2), -- Camiseta Adidas
            (11, 3), -- Vendas Charlie
            (12, 2), -- Camiseta UFC
            (13, 3), -- Garmin
            (14, 1), -- Asic Gel
            (15, 3), -- Gafas Oakley
            (16, 2), -- Leggins Nike
            (17, 2), -- Camiseta Hoka
            (18, 1), -- New Balance Fresh Foam
            (19, 2), -- Camiseta Agongym
            (20, 2), -- Top Agongym
            (21, 2), -- Pantalones gymshark
            (22, 1), -- Adidas The total
            (23, 3), -- Straps
            (24, 3), -- Botella proteínas
            (25, 1), -- Zapatillas 5 dedos
            (26, 1), -- Zapatillas 5 dedos
            (27, 3), -- Brazalete running
            (28, 3), -- Cinturon para correr
            (29, 3), -- Espinilleras MMA Venum
            (30, 3), -- Espinilleras Muay Thai
            (31, 1), -- Zapatillas running nike
            (32, 1), -- Zapatillas running nike
            (33, 2), -- Chandal Leone
            (34, 2), -- Pantalones venum
            (35, 2), -- Pantalones Reebok
            (36, 2), -- Pantalones Adidas
            (37, 2), -- Camiseta Trail
            (38, 2), -- Camiseta Runnek
            (39, 2), -- Camiseta tirantes
            (40, 2), -- Sudadera antisocial
            (41, 1), -- Botas boxeo Everlast
            (42, 1); -- Botas boxeo Everlast muujer",

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
