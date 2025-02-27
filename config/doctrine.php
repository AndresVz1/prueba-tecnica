<?php

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\EntityManager;

require_once __DIR__ . '/../vendor/autoload.php';

// Configuración de Doctrine
$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: [__DIR__ . '/../src/Domain/Entities'], // Carpeta donde están las entidades
    isDevMode: true
);

// Configuración de conexión con MySQL en XAMPP
$connection = DriverManager::getConnection([
    'dbname'   => 'prueba_tecnica', // Nombre de la BD
    'user'     => 'root',           // Usuario por defecto en XAMPP
    'password' => '',               // Sin contraseña en XAMPP
    'host'     => '127.0.0.1',
    'driver'   => 'pdo_mysql',
]);

// Crear el EntityManager
$entityManager = new EntityManager($connection, $config);
