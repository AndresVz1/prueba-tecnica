# Guía de Instalación de Dependencias

Esta guía proporciona instrucciones sobre cómo descargar e instalar las herramientas necesarias para ejecutar la aplicación de registro de usuarios en PHP.

## 1. Instalar XAMPP

XAMPP es un paquete que incluye Apache, MySQL y PHP. Para instalar XAMPP:

- Visita la página oficial de [XAMPP](https://www.apachefriends.org/index.html).
- Descarga la versión adecuada para tu sistema operativo (Windows, macOS, Linux).
- Sigue las instrucciones del instalador para completar la instalación.

### Configuración de XAMPP

1. Abre el Panel de Control de XAMPP.
2. Inicia los servicios de Apache y MySQL.

## 2. Instalar Composer

Composer es un gestor de dependencias para PHP. Para instalar Composer:

- Visita la página oficial de [Composer](https://getcomposer.org/download/).
- Sigue las instrucciones para descargar e instalar Composer en tu sistema.

### Verificar la Instalación de Composer

Abre una terminal y ejecuta el siguiente comando para verificar que Composer se haya instalado correctamente:

```bash
composer --version
```

## 3. Clonar el Repositorio

Abre una terminal y ejecuta el siguiente comando para clonar el repositorio:

```bash
git clone <url-del-repositorio>
cd <directorio-del-repositorio>
```

## 4. Instalar Dependencias con Composer

Asegúrate de que estás en el directorio del proyecto y ejecuta:

```bash
composer install
```

Esto instalará todas las dependencias necesarias para el proyecto.

## 5. Configurar el Entorno

Crea un archivo `.env` en la raíz del proyecto y configura las variables de entorno necesarias para la conexión a la base de datos. Un ejemplo de contenido podría ser:

```
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=my_database
DB_USERNAME=root
DB_PASSWORD=
```

## 6. Ejecutar la Aplicación

Puedes ejecutar la aplicación utilizando XAMPP o Docker, según la configuración que prefieras. Para usar Docker, sigue las instrucciones en el archivo `INSTALL.md`.

## Conclusión

Siguiendo estos pasos, deberías poder instalar y configurar todas las herramientas necesarias para ejecutar la aplicación de registro de usuarios en tu entorno local. Si encuentras algún problema, revisa la documentación de las herramientas utilizadas.
