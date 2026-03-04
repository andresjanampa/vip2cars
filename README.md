# Sistema de Gestión de Vehículos

## Requisitos del entorno

- PHP: 8.2.12
- Laravel: v12.11.2
- Base de datos: MySQL/MariaDB 10.4.32
- Extensiones PHP: bcmath, ctype, json, mbstring, openssl, PDO, pdo_mysql, tokenizer
- Servidor web: Apache

## Instalación y configuración

1. Clonar el proyecto desde Github:

    git clone https://github.com/andresjanampa/vip2cars.git
    cd vip2cars

2. Instalar dependencias de PHP (Laravel):

    composer install

3. Configurar variables de entorno:

    . Copiar .env.example y renombrarlo a .env:
        cp .env.example .env

    . Editar las variables según tu entorno local (XAMPP).

4. Generar la clave de Laravel:

    php artisan key:generate

## Puesta en marcha

1. Asegúrate de que MySQL (XAMPP) esté corriendo.

2. Crear la base de datos vip2cars_db.

3. Ejecutar migraciones para crear las tablas:

    php artisan migrate

4. Levantar el servidor local:

    php artisan serve

    La aplicación estará disponible en:
    http://127.0.0.1:8000/vehicles

## Estructura de la Base de Datos

El proyecto utiliza una base de datos MySQL (MariaDB 10.4.32).

Tabla principal: vehicles

    CREATE TABLE `vehicles` (
    `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    `plate` varchar(255) NOT NULL,
    `brand` varchar(255) NOT NULL,
    `model` varchar(255) NOT NULL,
    `manufacturing_year` year(4) NOT NULL,
    `client_name` varchar(255) NOT NULL,
    `client_lastname` varchar(255) NOT NULL,
    `client_document` varchar(255) NOT NULL,
    `client_email` varchar(255) NOT NULL,
    `client_phone` varchar(255) NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `vehicles_plate_unique` (`plate`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

Nota: El volcado completo con los datos se encuentra en el archivo:

    database/vehicles.sql

## Usuario Demo

No se requiere login.

Para pruebas, puedes crear vehículos directamente desde el formulario de registro.