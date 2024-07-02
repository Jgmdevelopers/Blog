-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-07-2024 a las 17:04:01
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blog`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `content`, `created_at`, `deleted_at`) VALUES
(1, 1, 38, 'Mi comentario', '2024-06-29 15:07:44', NULL),
(2, 1, 38, 'Otrto Comentario\r\n', '2024-06-29 15:08:21', '2024-06-29 21:38:26'),
(3, 1, 41, 'Hola soy yo', '2024-06-29 15:19:09', NULL),
(4, 1, 36, 'Hola este es un comentario', '2024-06-29 19:47:59', NULL),
(5, 1, 41, 'cometario 2\r\n', '2024-06-29 20:42:10', NULL),
(6, 1, 41, 'tercero', '2024-06-29 20:42:22', NULL),
(7, 1, 38, 'otrooo\r\n', '2024-06-29 20:57:44', NULL),
(8, 1, 38, 'este es para borrar', '2024-06-29 21:39:47', '2024-06-29 21:39:53'),
(9, 1, 42, 'me encantaaaa', '2024-06-29 21:53:11', NULL),
(10, 9, 42, 'jajaja', '2024-06-29 21:54:16', NULL),
(11, 9, 43, 'muy bien amigo!', '2024-06-30 22:01:47', NULL),
(12, 1, 48, 'Hola man', '2024-07-01 11:36:53', NULL),
(13, 1, 48, 'otro comentario\r\n', '2024-07-01 11:37:01', NULL),
(14, 1, 48, 'tercero', '2024-07-01 11:37:14', NULL),
(15, 1, 49, 'te faltò la foto! jaja', '2024-07-01 13:59:08', NULL),
(16, 9, 49, 'ahi la subo', '2024-07-01 13:59:34', NULL),
(17, 1, 49, 'quedó genial!', '2024-07-02 13:36:39', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `friendships`
--

CREATE TABLE `friendships` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `status` enum('pending','accepted','blocked','rejected') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `friendships`
--

INSERT INTO `friendships` (`id`, `user_id`, `friend_id`, `status`, `created_at`, `updated_at`) VALUES
(123, 9, 1, 'accepted', '2024-07-01 18:42:45', '2024-07-01 18:43:33'),
(130, 1, 7, 'pending', '2024-07-02 12:12:42', '2024-07-02 12:12:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`, `created_at`) VALUES
(1, 7, 41, '2024-06-29 14:37:18'),
(3, 1, 35, '2024-06-29 15:04:56'),
(5, 1, 38, '2024-06-29 15:27:53'),
(6, 1, 36, '2024-06-29 19:47:43'),
(7, 1, 42, '2024-06-29 21:53:04'),
(8, 9, 43, '2024-06-30 22:01:34'),
(9, 1, 48, '2024-07-01 11:37:09'),
(10, 1, 49, '2024-07-01 14:00:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `visibility` enum('public','friends','private') NOT NULL DEFAULT 'public',
  `thumbnail_path` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `image_path`, `user_id`, `created_at`, `visibility`, `thumbnail_path`, `is_active`) VALUES
(29, 'soy el user 2', 'teams java', '../Public/uploads/1718202292_6669afb4426f4.png', 2, '2024-06-12 14:24:52', 'friends', 'Public/thumb/thumb_1718202292_6669afb4426f4.png', 1),
(30, 'soy el user 1', 'aca codeando', '../Public/uploads/1718202353_6669aff1b90a4.png', 1, '2024-06-12 14:25:53', 'friends', 'Public/thumb/thumb_1718202353_6669aff1b90a4.png', 0),
(31, 'user 1', 'esto es publico', '../Public/uploads/1718202440_6669b0481e7e9.jpg', 1, '2024-06-12 14:27:20', 'public', 'Public/thumb/thumb_1718202440_6669b0481e7e9.jpg', 0),
(32, 'user 1', 'segundo post', '../Public/uploads/1718203040_6669b2a0a91e4.png', 1, '2024-06-12 14:37:20', 'public', 'Public/thumb/thumb_1718203040_6669b2a0a91e4.png', 0),
(33, 'soy el 2 esto es publico', 'adsad', '../Public/uploads/1718206446_6669bfee3eec8.jpg', 2, '2024-06-12 15:34:06', 'public', 'Public/thumb/thumb_1718206446_6669bfee3eec8.jpg', 1),
(34, 'papa noeeel!!', 'quien será ?', '../Public/uploads/1718216585_6669e789da462.jpg', 2, '2024-06-12 18:23:05', 'private', 'Public/thumb/thumb_1718216585_6669e789da462.jpg', 1),
(35, 'Soy el usuario 2', 'Hola a mis amigos', '../Public/uploads/1719237790_66797c9e12421.jpg', 6, '2024-06-24 14:03:11', 'friends', 'Public/thumb/thumb_1719237790_66797c9e12421.jpg', 1),
(36, 'JAVA <3', 'teams java', '../Public/uploads/1719526651_667de4fbaeeb7.png', 1, '2024-06-27 22:17:31', 'friends', 'Public/thumb/thumb_1719526651_667de4fbaeeb7.png', 0),
(37, 'Teams JAVA', 'JAVA JAVA JAVA', '../Public/uploads/1719527560_667de888e5037.jpg', 1, '2024-06-27 22:32:40', 'public', 'Public/thumb/thumb_1719527560_667de888e5037.jpg', 0),
(38, 'Ultimo post del dia!', 'gama de colores', 'Public/uploads/1719667956_66800cf4210f6.png', 1, '2024-06-28 00:07:56', 'public', 'Public/thumb/thumb_1719667956_66800cf4210f6.png', 0),
(41, 'Montañas!!!', 'contenido nuevo, ahora es solo para amigos!!!', 'Public/uploads/1719667967_66800cffc075a.jpg', 1, '2024-06-29 12:56:06', 'friends', 'Public/thumb/thumb_1719667967_66800cffc075a.jpg', 0),
(42, 'lohan', 'mi bebe y sus dibujos', '../Public/uploads/1719697869_668081cde457e.jpeg', 9, '2024-06-29 21:51:10', 'friends', 'Public/thumb/thumb_1719697869_668081cde457e.jpeg', 1),
(43, 'Primer Post', 'Solo para amigos', '../Public/uploads/1719784868_6681d5a4c2093.jpg', 1, '2024-06-30 22:01:09', 'friends', 'Public/thumb/thumb_1719784868_6681d5a4c2093.jpg', 1),
(44, 'Segundo Post', 'Este es public', '../Public/uploads/1719786660_6681dca475ad9.jpg', 1, '2024-06-30 22:31:01', 'public', 'Public/thumb/thumb_1719786660_6681dca475ad9.jpg', 0),
(45, 'tercer post', 'este tambien es publico', '../Public/uploads/1719786988_6681ddec4d6de.jpg', 1, '2024-06-30 22:36:29', 'public', 'Public/thumb/thumb_1719786988_6681ddec4d6de.jpg', 1),
(46, 'Stop', 'si pasas por aqui comentá!', '../Public/uploads/1719787025_6681de1190549.png', 1, '2024-06-30 22:37:05', 'friends', 'Public/thumb/thumb_1719787025_6681de1190549.png', 1),
(47, 'Mi foto con IA', 'salio muy buena, la recomiendo', '../Public/uploads/1719787748_6681e0e45cbe2.png', 1, '2024-06-30 22:49:08', 'public', 'Public/thumb/thumb_1719787748_6681e0e45cbe2.png', 1),
(48, 'mi primer post', 'hola', '../Public/uploads/1719788732_6681e4bc7f4e9.png', 8, '2024-06-30 23:05:32', 'public', 'Public/thumb/thumb_1719788732_6681e4bc7f4e9.png', 1),
(49, 'nuevo post ', 'solo para amigos', 'Public/uploads/1719842397_6682b65d77111.jpg', 9, '2024-07-01 13:50:59', 'public', 'Public/thumb/thumb_1719842397_6682b65d77111.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'gabrielmolinalp', 'gabrielmolinalp@gmail.com', '$2y$10$U4Kp.jDNTjmkgNIpe.MTwusd/j.IBPafIcZtXrubi/9Ttq5fBqPZm', '2024-06-10 16:56:24'),
(2, 'gabrielMolina2', 'gabrielmolina.ush@gmail.com', '$2y$10$BuwGv4SikascNqiolcsHiurHcnSLFnkyJ1Bt9bUH32fqiUFXNM7dW', '2024-06-12 13:29:05'),
(5, 'juanRamirez2', 'juanRamirez2@mail.com', '$2y$10$/K56ySR7LLrQF2odC1mUV.idgxGGVxLko7xHrtdo5bzyzaSHaXn6i', '2024-06-23 23:17:39'),
(6, 'Usuario2', 'usuario2@gmail.com', '$2y$10$Vx4CCwPlKcDW/0XELoGEGOKirWjHgKD9x5r0FaJpjzUTHVMMN2YjO', '2024-06-24 14:02:10'),
(7, 'usuario3', 'usuario3@gmail.com', '$2y$10$0GhWnsy7sEyCDZytxMVSFe72UYzJoIWG7u0Hg2/jGOoALVS0xcG.u', '2024-06-24 18:06:39'),
(8, 'usuario4', 'usuario4@gmail.com', '$2y$10$Vh3.18PvAvAqkazpMjczOuK/3ER927adUv4mp4FXoZyDwui3WEPRa', '2024-06-24 18:07:22'),
(9, 'pamealmafuerte', 'pame@gmail.com', '$2y$10$SLii1SsGN5wOCwFNrm8hv.G/DIToHUIZ6lPD2nmZIJdRQGUEbICbu', '2024-06-29 21:44:39');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indices de la tabla `friendships`
--
ALTER TABLE `friendships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `friend_id` (`friend_id`);

--
-- Indices de la tabla `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`post_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `friendships`
--
ALTER TABLE `friendships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT de la tabla `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `friendships`
--
ALTER TABLE `friendships`
  ADD CONSTRAINT `friendships_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `friendships_ibfk_2` FOREIGN KEY (`friend_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
