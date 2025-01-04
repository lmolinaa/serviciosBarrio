-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-01-2025 a las 17:24:01
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `marketplace`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigos_postales`
--

CREATE TABLE `codigos_postales` (
  `id_codigo_postal` int(11) NOT NULL,
  `codigo_postal` varchar(5) NOT NULL,
  `municipio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `codigos_postales`
--

INSERT INTO `codigos_postales` (`id_codigo_postal`, `codigo_postal`, `municipio`) VALUES
(225, '28001', 'Madrid'),
(226, '28002', 'Madrid'),
(227, '28003', 'Madrid'),
(228, '28004', 'Madrid'),
(229, '28005', 'Madrid'),
(230, '28006', 'Madrid'),
(231, '28007', 'Madrid'),
(232, '28008', 'Madrid'),
(233, '28009', 'Madrid'),
(234, '28010', 'Madrid'),
(235, '28011', 'Madrid'),
(236, '28012', 'Madrid'),
(237, '28013', 'Madrid'),
(238, '28014', 'Madrid'),
(239, '28015', 'Madrid'),
(240, '28016', 'Madrid'),
(241, '28017', 'Madrid'),
(242, '28018', 'Madrid'),
(243, '28019', 'Madrid'),
(244, '28020', 'Madrid'),
(245, '28021', 'Madrid'),
(246, '28022', 'Madrid'),
(247, '28023', 'Madrid'),
(248, '28024', 'Madrid'),
(249, '28025', 'Madrid'),
(250, '28026', 'Madrid'),
(251, '28027', 'Madrid'),
(252, '28028', 'Madrid'),
(253, '28029', 'Madrid'),
(254, '28030', 'Madrid'),
(255, '28031', 'Madrid'),
(256, '28032', 'Madrid'),
(257, '28033', 'Madrid'),
(258, '28034', 'Madrid'),
(259, '28035', 'Madrid'),
(260, '28036', 'Madrid'),
(261, '28037', 'Madrid'),
(262, '28038', 'Madrid'),
(263, '28039', 'Madrid'),
(264, '28040', 'Madrid'),
(265, '28041', 'Madrid'),
(266, '28042', 'Madrid'),
(267, '28043', 'Madrid'),
(268, '28044', 'Madrid'),
(269, '28045', 'Madrid'),
(270, '28046', 'Madrid'),
(271, '28047', 'Madrid'),
(272, '28048', 'Madrid'),
(273, '28049', 'Madrid'),
(274, '28050', 'Madrid'),
(275, '28051', 'Madrid'),
(276, '28052', 'Madrid'),
(277, '28053', 'Madrid'),
(278, '28054', 'Madrid'),
(279, '28055', 'Madrid'),
(280, '28100', 'Alcobendas'),
(281, '28108', 'Alcobendas'),
(282, '28109', 'Alcobendas'),
(283, '28110', 'Algete'),
(284, '28119', 'Algete'),
(285, '28120', 'Algete'),
(286, '28130', 'Valdeolmos-Alalpardo'),
(287, '28140', 'Fuente el Saz de Jarama'),
(288, '28150', 'Valdetorres de Jarama'),
(289, '28160', 'Talamanca de Jarama'),
(290, '28170', 'Valdepiélagos'),
(291, '28180', 'Torrelaguna'),
(292, '28189', 'Patones'),
(293, '28190', 'Montejo de la Sierra'),
(294, '28191', 'Prádena del Rincón'),
(295, '28192', 'El Berrueco'),
(296, '28193', 'Cervera de Buitrago'),
(297, '28194', 'Robledillo de la Jara'),
(298, '28195', 'Puentes Viejas'),
(299, '28196', 'Puentes Viejas'),
(300, '28200', 'San Lorenzo de El Escorial'),
(301, '28209', 'San Lorenzo de El Escorial'),
(302, '28210', 'Valdemorillo'),
(303, '28211', 'El Escorial'),
(304, '28212', 'Navalagamella'),
(305, '28213', 'Colmenar del Arroyo'),
(306, '28214', 'Fresnedillas de la Oliva'),
(307, '28219', 'El Escorial'),
(308, '28220', 'Majadahonda'),
(309, '28221', 'Majadahonda'),
(310, '28222', 'Majadahonda'),
(311, '28223', 'Pozuelo de Alarcón'),
(312, '28224', 'Pozuelo de Alarcón'),
(313, '28229', 'Villanueva del Pardillo'),
(314, '28231', 'Las Rozas de Madrid'),
(315, '28232', 'Las Rozas de Madrid'),
(316, '28240', 'Hoyo de Manzanares'),
(317, '28248', 'Hoyo de Manzanares'),
(318, '28250', 'Torrelodones'),
(319, '28260', 'Galapagar'),
(320, '28270', 'Colmenarejo'),
(321, '28280', 'El Escorial'),
(322, '28290', 'Las Rozas de Madrid'),
(323, '28292', 'El Escorial'),
(324, '28293', 'Zarzalejo'),
(325, '28294', 'Robledo de Chavela'),
(326, '28295', 'Valdemaqueda'),
(327, '28296', 'Santa María de la Alameda'),
(328, '28297', 'Santa María de la Alameda'),
(329, '28300', 'Aranjuez'),
(330, '28310', 'Aranjuez'),
(331, '28311', 'Aranjuez'),
(332, '28312', 'Aranjuez'),
(333, '28320', 'Pinto'),
(334, '28330', 'San Martín de la Vega'),
(335, '28341', 'Valdemoro'),
(336, '28342', 'Valdemoro'),
(337, '28343', 'Valdemoro'),
(338, '28350', 'Ciempozuelos'),
(339, '28359', 'Titulcia'),
(340, '28360', 'Villaconejos'),
(341, '28370', 'Chinchón'),
(342, '28380', 'Colmenar de Oreja'),
(343, '28390', 'Belmonte de Tajo'),
(344, '28391', 'Valdelaguna'),
(345, '28400', 'Collado Villalba'),
(346, '28410', 'Manzanares el Real'),
(347, '28411', 'Moralzarzal'),
(348, '28412', 'El Boalo'),
(349, '28413', 'El Boalo'),
(350, '28420', 'Galapagar'),
(351, '28430', 'Alpedrete'),
(352, '28440', 'Guadarrama'),
(353, '28450', 'Collado Mediano'),
(354, '28460', 'Los Molinos'),
(355, '28470', 'Cercedilla'),
(356, '28479', 'Cercedilla'),
(357, '28480', 'Guadarrama'),
(358, '28490', 'Becerril de la Sierra'),
(359, '28491', 'Navacerrada'),
(360, '28492', 'El Boalo'),
(361, '28500', 'Arganda del Rey'),
(362, '28510', 'Campo Real'),
(363, '28511', 'Valdilecha'),
(364, '28512', 'Villar del Olmo'),
(365, '28514', 'Nuevo Baztán'),
(366, '28515', 'Olmeda de las Fuentes'),
(367, '28521', 'Rivas-Vaciamadrid'),
(368, '28522', 'Rivas-Vaciamadrid'),
(369, '28523', 'Rivas-Vaciamadrid'),
(370, '28524', 'Rivas-Vaciamadrid'),
(371, '28530', 'Morata de Tajuña'),
(372, '28540', 'Perales de Tajuña'),
(373, '28550', 'Tielmes'),
(374, '28560', 'Carabaña'),
(375, '28570', 'Orusco de Tajuña'),
(376, '28580', 'Ambite'),
(377, '28590', 'Villarejo de Salvanés'),
(378, '28594', 'Valdaracete'),
(379, '28595', 'Estremera'),
(380, '28596', 'Brea de Tajo'),
(381, '28597', 'Fuentidueña de Tajo'),
(382, '28598', 'Villamanrique de Tajo'),
(383, '28600', 'Navalcarnero'),
(384, '28607', 'El Álamo'),
(385, '28609', 'Sevilla la Nueva'),
(386, '28610', 'Villamanta'),
(387, '28620', 'Aldea del Fresno'),
(388, '28630', 'Villa del Prado'),
(389, '28640', 'Cadalso de los Vidrios'),
(390, '28648', 'Cadalso de los Vidrios'),
(391, '28649', 'Rozas de Puerto Real'),
(392, '28650', 'Cenicientos'),
(393, '28660', 'Boadilla del Monte'),
(394, '28668', 'Boadilla del Monte'),
(395, '28669', 'Boadilla del Monte'),
(396, '28670', 'Villaviciosa de Odón'),
(397, '28679', 'Villaviciosa de Odón'),
(398, '28680', 'San Martín de Valdeiglesias'),
(399, '28690', 'Brunete'),
(400, '28691', 'Villanueva de la Cañada'),
(401, '28692', 'Villanueva de la Cañada'),
(402, '28693', 'Quijorna'),
(403, '28694', 'Chapinería'),
(404, '28695', 'Navas del Rey'),
(405, '28696', 'Pelayos de la Presa'),
(406, '28701', 'San Sebastián de los Reyes'),
(407, '28702', 'San Sebastián de los Reyes'),
(408, '28703', 'San Sebastián de los Reyes'),
(409, '28706', 'San Sebastián de los Reyes'),
(410, '28707', 'San Sebastián de los Reyes'),
(411, '28708', 'San Sebastián de los Reyes'),
(412, '28709', 'San Sebastián de los Reyes'),
(413, '28710', 'El Molar'),
(414, '28720', 'Bustarviejo'),
(415, '28721', 'Cabanillas de la Sierra'),
(416, '28722', 'El Vellón'),
(417, '28723', 'Pedrezuela'),
(418, '28729', 'Venturada'),
(419, '28730', 'Buitrago del Lozoya'),
(420, '28737', 'Piñuécar-Gandullas'),
(421, '28739', 'Gargantilla del Lozoya y Pinilla de Buitrago'),
(422, '28740', 'Rascafría'),
(423, '28741', 'Rascafría'),
(424, '28742', 'Lozoya'),
(425, '28743', 'Canencia'),
(426, '28749', 'Alameda del Valle'),
(427, '28750', 'San Agustín del Guadalix'),
(428, '28751', 'La Cabrera'),
(429, '28752', 'Lozoyuela-Navas-Sieteiglesias'),
(430, '28753', 'Lozoyuela-Navas-Sieteiglesias'),
(431, '28754', 'Puentes Viejas'),
(432, '28755', 'Horcajo de la Sierra-Aoslos'),
(433, '28756', 'Somosierra'),
(434, '28760', 'Tres Cantos'),
(435, '28770', 'Colmenar Viejo'),
(436, '28791', 'Soto del Real'),
(437, '28792', 'Miraflores de la Sierra'),
(438, '28793', 'Miraflores de la Sierra'),
(439, '28794', 'Guadalix de la Sierra'),
(440, '28801', 'Alcalá de Henares'),
(441, '28802', 'Alcalá de Henares'),
(442, '28803', 'Alcalá de Henares'),
(443, '28804', 'Alcalá de Henares'),
(444, '28805', 'Alcalá de Henares'),
(445, '28806', 'Alcalá de Henares'),
(446, '28807', 'Alcalá de Henares'),
(447, '28810', 'Villalbilla'),
(448, '28811', 'Corpa'),
(449, '28812', 'Pezuela de las Torres'),
(450, '28813', 'Torres de la Alameda'),
(451, '28814', 'Daganzo de Arriba'),
(452, '28815', 'Fresno de Torote'),
(453, '28816', 'Camarma de Esteruelas'),
(454, '28817', 'Los Santos de la Humosa'),
(455, '28818', 'Santorcaz'),
(456, '28821', 'Coslada'),
(457, '28822', 'Coslada'),
(458, '28823', 'Coslada'),
(459, '28830', 'San Fernando de Henares'),
(460, '28840', 'Mejorada del Campo'),
(461, '28850', 'Torrejón de Ardoz'),
(462, '28860', 'Paracuellos de Jarama'),
(463, '28861', 'Paracuellos de Jarama'),
(464, '28862', 'Paracuellos de Jarama'),
(465, '28863', 'Cobeña'),
(466, '28864', 'Ajalvir'),
(467, '28880', 'Meco'),
(468, '28890', 'Loeches'),
(469, '28891', 'Velilla de San Antonio'),
(470, '28901', 'Getafe'),
(471, '28902', 'Getafe'),
(472, '28903', 'Getafe'),
(473, '28904', 'Getafe'),
(474, '28905', 'Getafe'),
(475, '28906', 'Getafe'),
(476, '28907', 'Getafe'),
(477, '28909', 'Getafe'),
(478, '28911', 'Leganés'),
(479, '28912', 'Leganés'),
(480, '28913', 'Leganés'),
(481, '28914', 'Leganés'),
(482, '28915', 'Leganés'),
(483, '28916', 'Leganés'),
(484, '28917', 'Leganés'),
(485, '28918', 'Leganés'),
(486, '28919', 'Leganés'),
(487, '28921', 'Alcorcón'),
(488, '28922', 'Alcorcón'),
(489, '28923', 'Alcorcón'),
(490, '28924', 'Alcorcón'),
(491, '28925', 'Alcorcón'),
(492, '28931', 'Móstoles'),
(493, '28932', 'Móstoles'),
(494, '28933', 'Móstoles'),
(495, '28934', 'Móstoles'),
(496, '28935', 'Móstoles'),
(497, '28936', 'Móstoles'),
(498, '28937', 'Móstoles'),
(499, '28938', 'Móstoles'),
(500, '28939', 'Arroyomolinos'),
(501, '28941', 'Fuenlabrada'),
(502, '28942', 'Fuenlabrada'),
(503, '28943', 'Fuenlabrada'),
(504, '28944', 'Fuenlabrada'),
(505, '28945', 'Fuenlabrada'),
(506, '28946', 'Fuenlabrada'),
(507, '28947', 'Fuenlabrada'),
(508, '28950', 'Moraleja de Enmedio'),
(509, '28970', 'Humanes de Madrid'),
(510, '28971', 'Griñón'),
(511, '28976', 'Batres'),
(512, '28977', 'Casarrubuelos'),
(513, '28978', 'Cubas de la Sagra'),
(514, '28979', 'Serranillos del Valle'),
(515, '28981', 'Parla'),
(516, '28982', 'Parla'),
(517, '28984', 'Parla'),
(518, '28990', 'Torrejón de Velasco'),
(519, '28991', 'Torrejón de la Calzada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `valoracion` tinyint(4) NOT NULL,
  `fecha_comentario` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrataciones`
--

CREATE TABLE `contrataciones` (
  `id_contratacion` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `fecha_contratacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` enum('pendiente','aceptado','completado','cancelado') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_personales`
--

CREATE TABLE `datos_personales` (
  `id_datos_personales` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `municipio` varchar(100) DEFAULT NULL,
  `pais` varchar(100) DEFAULT 'España',
  `codigo_postal` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datos_personales`
--

INSERT INTO `datos_personales` (`id_datos_personales`, `id_usuario`, `email`, `telefono`, `direccion`, `municipio`, `pais`, `codigo_postal`) VALUES
(7, 7, 'juan@juan.es', '910005566', 'Calle lirios 2', 'Alcorcón', 'España', '28922'),
(8, 9, 'ana@ana.es', '916665544', 'Calle mariposa 8', 'Alcorcón', 'España', '28922'),
(9, 10, 'ramon@ramon.es', '610225533', 'Calle Nardo 5', 'Alcorcón', 'España', '28922'),
(10, 11, 'jhon@jhon.es', '650232323', 'Calle Don Ramón de la Cruz 122', 'Alcorcón', 'España', '28922'),
(11, 12, 'adam@adam.com', '915223365', 'Calle de la economía S/N', 'Alcorcón', 'España', '28922'),
(12, 13, 'eva@eva.com', '655789852', 'Calle Madrid 8', 'Alcorcón', 'España', '28921'),
(13, 14, 'nadie@nadie.com', '912223344', 'Calle del olvido 8', 'Alcorcón', 'España', '28921'),
(14, 15, 'luis@luis.es', '610571180', 'Calle Madrid 8', 'Alcorcón', 'España', '28921'),
(15, 16, 'rosa@rosa.es', '912225544', 'Calle Nardo 25', 'Alcorcón', 'España', '28922'),
(16, 17, 'ramona@ramona.es', '610699669', 'Calle Porto Lisboa 50', 'Madrid', 'España', '28003'),
(17, 18, 'patricio@patricio.com', '610252428', 'Calle Fondo del mar S/N', 'Madrid', 'España', '28003'),
(18, 19, 'leo@leo.com', '652147896', 'Av. Filipinas 22', 'Madrid', 'España', '28003'),
(19, 20, 'lili@lili.es', '6235458789', 'Calle Don Ramón de la Cruz 1', 'Madrid', 'España', '28003'),
(20, 21, 'alfa@alfa.com', '915224488', 'Calle Maestro de esgrima 1', 'Madrid', 'España', '28003'),
(21, 22, 'pepe@pepe.es', '610252627', 'Calle del agua fresca 3', 'Madrid', 'España', '28015'),
(22, 23, 'rodri@rodri.es', '610252428', 'Calle Madrid 8', 'Alcorcón', 'España', '28921');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id_mensaje` int(11) NOT NULL,
  `id_emisor` int(11) NOT NULL,
  `id_receptor` int(11) NOT NULL,
  `contenido` text NOT NULL,
  `fecha_envio` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`) VALUES
(1, 'administrador'),
(2, 'usuarioOfrece'),
(3, 'usuarioBusca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id_servicio` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `ubicacion` varchar(255) DEFAULT NULL,
  `fecha_publicacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(250) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `password`, `fecha_registro`, `id_rol`) VALUES
(7, 'Juan', 'Listo la Isla', '$2y$10$St8ZWBTeFJ/YCqYEETAYy.zB5.bdeJwWaVaqgLxW5a5iBWSbR489S', '2024-12-24 10:09:09', 2),
(9, 'Ana', 'Botín', '$2y$10$3xvkoPAx7leh7BpYM4.0mu2n1HNBk6uiD6eoY/l9AJEBytc6t26Ti', '2024-12-24 10:15:04', 3),
(10, 'Ramón', 'Del Nido', '$2y$10$Zw2n5JB6WpmEJ8CGPlfnmuiSbCDu9.nh.cbeS.OmGmgdz.T4PbKlW', '2024-12-24 16:48:09', 2),
(11, 'Jhon', 'Smith', '$2y$10$4kIG80wNPx4vtOKEXcAuFOMJOGLFBb9hh1Ez0LWJHfDdGhxErsGde', '2024-12-24 17:00:03', 3),
(12, 'Adam', 'Smith', '$2y$10$8LOw71/U4N/SDnFJbf9yBOZnmuIHbTL4Q71ql2nqphTXChEQRyCgG', '2024-12-26 11:00:53', 2),
(13, 'Eva', 'De los Santos Inocentes', '$2y$10$YD301244fTcABYyx3Nwji.7rRlFwpuJjFu8AI2VRhBR8k76mSTkSu', '2024-12-26 11:30:55', 3),
(14, 'Nadie', 'Importante', '$2y$10$PZv2QVGmK1lQkF.mQ6KziemRCcn1oZV9nGAA1KGkHbvRM3F5yzXz6', '2024-12-26 19:18:38', 2),
(15, 'Luis', 'Molina Aguirre', '$2y$10$bB7UNyfRXYm2NA6f105dH.9UtlfbzBanI/QiWmZ3ivwni9rmziiyy', '2024-12-27 10:55:52', 1),
(16, 'Rosa', 'María Pérez', '$2y$10$4PGYpFIJXwXE4PThScCrmeCwp.TxjNO6c96h2DxoCuUOGEF3YlA1a', '2024-12-27 11:27:20', 2),
(17, 'Ramona', 'Pechugona', '$2y$10$7VHCZ4PcEf1PA4Imv/zzeejhYxSBHwcbwR/qf26YZ4ReKK0KP.8UO', '2024-12-27 11:41:31', 2),
(18, 'Patricio', 'Estrella', '$2y$10$m4dBjQbYkDriW2kOlSu4y.9stjt56kN1.ytN8FTKWPDTEyJ/55sSO', '2024-12-27 11:45:11', 3),
(19, 'Leo', 'Leoncio', '$2y$10$.JSNNuhSQDOI9g3BxMp79.1Z5QzA.Ge97Gw94SwH.RtTxnfx9Jyoi', '2024-12-27 11:51:26', 3),
(20, 'Lili', 'Manceba', '$2y$10$cildvJzWJMZFXbRB6gC83u8CGpoRFCdpIuOFV4FPT5T4PJh8.TxdC', '2024-12-27 11:58:05', 2),
(21, 'Alfa', 'Romeo', '$2y$10$y9UnAgjSsAG9xDoxwpwvou0SBOzR7mULy.Zt86dMbGzAxosABiGTy', '2024-12-27 12:04:41', 3),
(22, 'Pepe', 'Pótamo', '$2y$10$HMtIM2oHzMxLaTnm5iwOG.ByFW3lcba7MGM0ocaLaO1v6aJJHjEH2', '2024-12-27 14:19:18', 3),
(23, 'Rodri', 'Mol Agu', '$2y$10$VKji1mAAbwahjBz/X0GXQej8GR0HgvetRK0YIRatgoJXQ6miEcNkC', '2024-12-27 18:34:00', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_ofrece`
--

CREATE TABLE `usuario_ofrece` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `detalle` text NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `fecha` datetime DEFAULT CURRENT_TIMESTAMP,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_ofrece`
--

INSERT INTO `usuario_ofrece` (`id`, `id_usuario`, `titulo`, `detalle`, `imagen`, `fecha`, `precio`) VALUES
(1, 7, 'Limpieza a domicilio', 'Caballero se ofrece para hacer limpieza en domicilios, comunidades, oficinas... muy profesional y educado.\r\nPrecio: 20€/h', 'juan_limpia.jpg', '2024-12-28 09:43:50', '350.00'),
(2, 10, 'Reparación de electrodomésticos', 'Reparamos todo tipo de aparatos electrónicos a buen precio. Acudimos a casa.', 'imagenes/iphone12.jpg', '2024-12-28 09:43:50', '800.00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `codigos_postales`
--
ALTER TABLE `codigos_postales`
  ADD PRIMARY KEY (`id_codigo_postal`),
  ADD UNIQUE KEY `codigo_postal` (`codigo_postal`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_servicio` (`id_servicio`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `contrataciones`
--
ALTER TABLE `contrataciones`
  ADD PRIMARY KEY (`id_contratacion`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_proveedor` (`id_proveedor`),
  ADD KEY `id_servicio` (`id_servicio`);

--
-- Indices de la tabla `datos_personales`
--
ALTER TABLE `datos_personales`
  ADD PRIMARY KEY (`id_datos_personales`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id_mensaje`),
  ADD KEY `id_emisor` (`id_emisor`),
  ADD KEY `id_receptor` (`id_receptor`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id_servicio`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `usuario_ofrece`
--
ALTER TABLE `usuario_ofrece`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `codigos_postales`
--
ALTER TABLE `codigos_postales`
  MODIFY `id_codigo_postal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=520;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contrataciones`
--
ALTER TABLE `contrataciones`
  MODIFY `id_contratacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `datos_personales`
--
ALTER TABLE `datos_personales`
  MODIFY `id_datos_personales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `usuario_ofrece`
--
ALTER TABLE `usuario_ofrece`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_servicio`) REFERENCES `servicios` (`id_servicio`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `contrataciones`
--
ALTER TABLE `contrataciones`
  ADD CONSTRAINT `contrataciones_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `contrataciones_ibfk_2` FOREIGN KEY (`id_proveedor`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `contrataciones_ibfk_3` FOREIGN KEY (`id_servicio`) REFERENCES `servicios` (`id_servicio`);

--
-- Filtros para la tabla `datos_personales`
--
ALTER TABLE `datos_personales`
  ADD CONSTRAINT `datos_personales_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `mensajes_ibfk_1` FOREIGN KEY (`id_emisor`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `mensajes_ibfk_2` FOREIGN KEY (`id_receptor`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD CONSTRAINT `servicios_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `servicios_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);

--
-- Filtros para la tabla `usuario_ofrece`
--
ALTER TABLE `usuario_ofrece`
  ADD CONSTRAINT `usuario_ofrece_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
