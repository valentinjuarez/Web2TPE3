<?php
class Model
{
    protected $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB . ';charset=utf8', MYSQL_USER, MYSQL_PASS);
        $this->deploy();
    }

    function deploy()
    {
        // Chequear si hay tablas
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll(); // Nos devuelve todas las tablas de la db
        $aux = '$yQC';
        if (count($tables) == 0) {

            // Si no hay crearlas
            $sql = <<<END
                -- Estructura de tabla para la tabla `category_table`
                --
                
                CREATE TABLE `category_table` (
                    `id_categoria` int(11) NOT NULL,
                    `categoryName` varchar(45) NOT NULL,
                    `descripcion` varchar(300) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                
                --
                -- Volcado de datos para la tabla `category_table`
                --
                
                INSERT INTO `category_table` (`id_categoria`, `categoryName`, `descripcion`) VALUES
                (100, 'Telefono Movil', 'Dispositivo inalámbrico que permite hacer llamadas, enviar mensajes, acceder a internet y mucho más mientras estás en movimiento. '),
                (101, 'Audiovisual', 'Aparato tecnológico que integra tanto capacidades de audio como de video en un solo dispositivo. Puede incluir pantallas, altavoces, reproductores de video, cámaras, micrófonos y otros componentes diseñados para crear, reproducir, registrar o transmitir contenido tanto visual como auditivo. '),
                (103, 'Computadora Portatil', 'Dispositivo informático compacto y portátil que integra una pantalla, teclado, ratón (a través del panel táctil o touchpad) y otros componentes esenciales para realizar tareas informáticas de manera móvil. '),
                (104, 'Dispositivo Portatil', 'Aparato compacto y fácilmente transportable que integra funcionalidades tecnológicas y puede ser utilizado sobre la marcha. Estos dispositivos suelen ser ligeros, pequeños y diseñados para ser llevados consigo, permitiendo el acceso a diversas funciones y aplicaciones en cualquier lugar. '),
                (105, 'Sonido', 'Dispositivo tecnológico que tiene la capacidad de producir, registrar, reproducir o transmitir sonido. Estos dispositivos utilizan altavoces, micrófonos u otros componentes para generar ondas sonoras que pueden ser percibidas por nuestros oídos.'),
                (106, 'Audio', 'Dispositivo tecnológico que tiene la capacidad de producir, grabar, reproducir o transmitir sonidos y señales de audio. Estos dispositivos están diseñados para procesar y manipular información auditiva.'),
                (107, 'Escritorio', 'Tipo de computadora personal que se encuentra diseñada para utilizarse en un lugar fijo, como un escritorio o una mesa. A diferencia de las laptops o portátiles, no son dispositivos portátiles y generalmente no están diseñados para ser transportados con facilidad.'),
                (108, 'Telefoneishon Movileishon', 'Dispositivo inalámbrico que permite hacer llamadas, enviar mensajes, acceder a internet y mucho más mientras estás en movimiento. '),
                (109, 'Telefoneshon movileishon version dos', 'Dispositivo inalámbrico que permite hacer llamadas, enviar mensajes, acceder a internet y mucho más mientras estás en movimiento. ');
                
                -- --------------------------------------------------------
                
                --
                -- Estructura de tabla para la tabla `product_table`
                --
                
                CREATE TABLE `product_table` (
                    `id_product` int(11) NOT NULL,
                    `productName` varchar(45) NOT NULL,
                    `model` varchar(45) NOT NULL,
                    `price` float NOT NULL,
                    `weightKG` float NOT NULL,
                    `height_cm` float NOT NULL,
                    `storageGB` int(11) DEFAULT NULL,
                    `id_categoria` int(11) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                
                --
                -- Volcado de datos para la tabla `product_table`
                --
                
                INSERT INTO `product_table` (`id_product`, `productName`, `model`, `price`, `weightKG`, `height_cm`, `storageGB`, `id_categoria`) VALUES
                (2, 'Celular', 'Iphone \'11\' Pro Max', 636693, 0.35, 13.2, 128, 100),
                (5, 'Celular', 'locura', 735000, 1.7, 24.7, 280, 103),
                (6, 'Notebook', ' Lenovo Ideapad i \'5\'', 735000, 1.7, 24.7, 280, 103),
                (7, 'Microfono', 'Red Dragon B\'445\'', 243101, 0.45, 13.2, NULL, 106),
                (8, 'Auriculares', 'Red Dragon UltraSound Griffin', 47250, 0.321, 14.3, NULL, 105),
                (10, 'Celular', 'Samsung Galaxy a\'40\'', 299393, 0.239, 12.3, 128, 100),
                (16, 'Tablet', 'Samsung Tab a\'10\'', 345500, 17.7, 19.3, 64, 104),
                (17, 'Parlante', 'jejeje', 3939, 0.32, 21.3, NULL, 101),
                (18, 'Parlante', 'jejeje', 3939, 0.32, 21.3, NULL, 101),
                (19, 'Celular', 'Iphone \'11\' Pro Max', 636693, 0.35, 13.2, 128, 100),
                (20, 'Celular', 'Iphone \'11\' Pro Max', 636693, 0.35, 13.2, 128, 100),
                (21, 'Celular', 'Iphone \'11\' Pro Max', 636693, 0.35, 13.2, 128, 100),
                (22, 'Celular', 'Iphone \'11\' Pro Max', 636693, 0.35, 13.2, 128, 100),
                (23, 'Celular', 'Motorola hdr', 636693, 0.35, 13.2, 128, 100),
                (24, 'Celular', 'Motorola hdr', 2040, 45, 32, 128, 100),
                (26, 'Celular', 'Motorola hdr', 2040, 45, 32, 128, 104),
                (27, 'Celular', 'Motorola hdr', 2040, 45, 32, 128, 103),
                (28, 'Celular', 'Motorola hdr', 2040, 45, 32, 128, 105),
                (29, 'Celular', 'Samsung Galaxy a\'50\'', 200, 0.239, 12.3, 128, 100);
                
                -- --------------------------------------------------------
                
                --
                -- Estructura de tabla para la tabla `user`
                --
                
                CREATE TABLE `user` (
                    `id_user` int(11) NOT NULL,
                    `fullname` varchar(50) NOT NULL,
                    `user` varchar(25) NOT NULL,
                    `email` varchar(30) NOT NULL,
                    `password` varchar(200) NOT NULL,
                    `tipousuario` varchar(50) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                
                --
                -- Volcado de datos para la tabla `user`
                --
                
                INSERT INTO `user` (`id_user`, `fullname`, `user`, `email`, `password`, `tipousuario`) VALUES
                (15, 'webadmin', 'webadmin', 'webadmin@gmail.com', '$2y$10$aux . 5UtSWBvbVkC76T4Dk2eimUhex8AE4pAULpijKyEWgKLRzpdfpu', 'administrador');
                
                --
                -- Índices para tablas volcadas
                --
                
                --
                -- Indices de la tabla `category_table`
                --
                ALTER TABLE `category_table`
                    ADD PRIMARY KEY (`id_categoria`);
                
                --
                -- Indices de la tabla `product_table`
                --
                ALTER TABLE `product_table`
                    ADD PRIMARY KEY (`id_product`),
                    ADD KEY `idCategoriafk` (`id_categoria`);
                
                --
                -- Indices de la tabla `user`
                --
                ALTER TABLE `user`
                    ADD PRIMARY KEY (`id_user`);
                
                --
                -- AUTO_INCREMENT de las tablas volcadas
                --
                
                --
                -- AUTO_INCREMENT de la tabla `category_table`
                --
                ALTER TABLE `category_table`
                    MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
                
                --
                -- AUTO_INCREMENT de la tabla `product_table`
                --
                ALTER TABLE `product_table`
                    MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
                
                --
                -- AUTO_INCREMENT de la tabla `user`
                --
                ALTER TABLE `user`
                    MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
                
                --
                -- Restricciones para tablas volcadas
                --
                
                --
                -- Filtros para la tabla `product_table`
                --
                ALTER TABLE `product_table`
                    ADD CONSTRAINT `idCategoriafk` FOREIGN KEY (`id_categoria`) REFERENCES `category_table` (`id_categoria`);
                COMMIT;
                END;
            $this->db->query($sql);
        }
    }
}
