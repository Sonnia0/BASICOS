-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-06-2024 a las 04:51:13
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `logincrud2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_productos`
--

CREATE TABLE `categoria_productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categoria_productos`
--

INSERT INTO `categoria_productos` (`id`, `nombre`) VALUES
(2, 'Hogar'),
(3, 'Jardín'),
(4, 'Ropa'),
(5, 'Calzado'),
(6, 'Deportes'),
(7, 'Juguetes'),
(8, 'Belleza'),
(9, 'Alimentos'),
(10, 'Bebidas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `categoria_id`) VALUES
(1, 'Smartphone Samsung Galaxy S21', 'Teléfono inteligente con pantalla de 6.2 pulgadas, 8 GB de RAM y 128 GB de almacenamiento interno', 999.99, 1),
(2, 'Laptop HP Pavilion 15', 'Laptop con pantalla de 15.6 pulgadas, procesador Intel Core i5, 8 GB de RAM y 512 GB de almacenamiento SSD', 899.99, 1),
(3, 'Smartwatch Apple Watch Series 6', 'Reloj inteligente con pantalla Retina siempre activa, GPS integrado y sensor de oxígeno en sangre', 399.99, 1),
(4, 'Cámara Canon EOS Rebel T7', 'Cámara réflex digital con sensor CMOS de 24.1 megapíxeles y grabación de video Full HD', 599.99, 1),
(5, 'Auriculares inalámbricos Sony WH-1000XM4', 'Auriculares con cancelación de ruido, batería de larga duración y calidad de sonido de alta resolución', 349.99, 1),
(6, 'Sofá de tres plazas', 'Sofá de tela con estructura de madera maciza y cojines de espuma de alta densidad', 799.99, 2),
(7, 'Mesa de comedor extensible', 'Mesa de comedor de madera maciza con capacidad para 6 personas, extensible a 8 personas', 599.99, 2),
(8, 'Juego de sábanas de algodón', 'Juego de sábanas de algodón egipcio de 400 hilos, incluye sábana bajera, sábana encimera y fundas de almohada', 149.99, 2),
(9, 'Aspiradora sin bolsa', 'Aspiradora sin bolsa con tecnología ciclónica y filtro HEPA, ideal para alérgicos', 199.99, 2),
(10, 'Set de ollas y sartenes antiadherentes', 'Set de 10 piezas de ollas y sartenes antiadherentes con tapas de vidrio templado', 299.99, 2),
(11, 'Cortacésped eléctrico', 'Cortacésped eléctrico con cuchillas de acero y ajuste de altura de corte', 299.99, 3),
(12, 'Juego de sábanas de seda', 'Juego de sábanas de seda de 1000 hilos, incluye sábana bajera, sábana encimera y fundas de almohada', 399.99, 4),
(13, 'Zapatillas deportivas Nike Air Max', 'Zapatillas deportivas con tecnología Air Max para una mayor amortiguación y comodidad', 149.99, 5),
(14, 'Balón de fútbol Adidas Tango', 'Balón de fútbol con diseño clásico Tango y tecnología de paneles sin costuras', 39.99, 6),
(15, 'Set de construcción de bloques de colores', 'Set de construcción de bloques de colores para niños, incluye 500 piezas', 49.99, 7),
(16, 'Manguera de jardín extensible', 'Manguera de jardín extensible de 50 pies con boquilla ajustable y soporte de pared', 29.99, 3),
(17, 'Vestido de noche largo', 'Vestido de noche largo de encaje con escote en V y espalda descubierta', 199.99, 4),
(18, 'Tenis de mesa profesional', 'Mesa de tenis de mesa profesional con red y soportes para raquetas y pelotas', 499.99, 6),
(19, 'Bicicleta de montaña Trek', 'Bicicleta de montaña con cuadro de aluminio y suspensión delantera, ideal para terrenos difíciles', 899.99, 5),
(20, 'Muñeca Barbie Dreamhouse', 'Casa de muñecas Barbie Dreamhouse con tres pisos, ocho habitaciones y accesorios', 199.99, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nom` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nom`, `correo`, `pass`) VALUES
('Ayovi Naisha', 'naisha@gmail.com', 'naisha2002'),
('Juan Pérez', 'juanperez@gmail.com', '123456'),
('Ana García', 'anagarcia@hotmail.com', 'abc123'),
('Luis Hernández', 'luishernandez@yahoo.com', 'qwerty'),
('María Rodríguez', 'mariarodriguez@gmail.com', '987654'),
('Carlos Chidori', 'carloschidori@hotmail.com', 'asdfgh'),
('Sasuke Martínez', 'sasukimartinez@yahoo.com', 'zxcvbn'),
('Alenka Gómez', 'alendgomez@gmail.com', '111111'),
('Sofía Torres', 'sofiatorres@hotmail.com', '222222'),
('Pablo Ramírez', 'pabloramirez@yahoo.com', '333333'),
('Andrea Castro', 'andreacastro@gmail.com', '444444'),
('Ruth Reyes', 'ruthireyes@gmail.com', 'zxcasd');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria_productos`
--
ALTER TABLE `categoria_productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria_productos`
--
ALTER TABLE `categoria_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
