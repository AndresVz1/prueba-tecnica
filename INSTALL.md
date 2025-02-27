# Guía de Instalación del Proyecto

Esta guía proporciona un paso a paso para instalar y configurar el entorno necesario para ejecutar la aplicación de registro de usuarios en PHP.

## Requisitos Previos

Antes de comenzar, asegúrate de tener instalados los siguientes programas en tu sistema:

1. **PHP**: Versión 8.0 o superior.
2. **Composer**: Herramienta para la gestión de dependencias en PHP.
3. **Docker**: Plataforma para desarrollar, enviar y ejecutar aplicaciones en contenedores.
4. **Docker Compose**: Herramienta para definir y ejecutar aplicaciones Docker de múltiples contenedores.
5. **MySQL**: Sistema de gestión de bases de datos.

## Pasos de Instalación

### 1. Clonar el Repositorio

Abre una terminal y ejecuta el siguiente comando para clonar el repositorio:

```bash
git clone <url-del-repositorio>
cd <directorio-del-repositorio>
```

### 2. Instalar Dependencias con Composer

Asegúrate de que estás en el directorio del proyecto y ejecuta:

```bash
composer install
```

Esto instalará todas las dependencias necesarias para el proyecto.

### 3. Configurar Docker

#### 3.1. Crear el Archivo `.env`

Crea un archivo `.env` en la raíz del proyecto y configura las variables de entorno necesarias para la conexión a la base de datos. Un ejemplo de contenido podría ser:

```
DB_HOST=db
DB_PORT=3306
DB_DATABASE=my_database
DB_USERNAME=user
DB_PASSWORD=password
```

#### 3.2. Construir los Contenedores de Docker

Ejecuta el siguiente comando para construir los contenedores de Docker:

```bash
make build
```

### 4. Iniciar los Contenedores de Docker

Usa el siguiente comando para iniciar los contenedores en modo desatendido:

```bash
make up
```

### 5. Ejecutar Migraciones

Después de que los contenedores estén en funcionamiento, ejecuta las migraciones para configurar la base de datos:

```bash
make migrate
```

### 6. Probar la Aplicación

La aplicación debería estar corriendo en `http://localhost:8000`. Puedes probar el registro de usuarios enviando una solicitud POST al endpoint `/register`.

### 7. Detener y Eliminar Contenedores

Para detener y eliminar los contenedores, ejecuta:

```bash
make down
```

## Conclusión

Siguiendo estos pasos, deberías poder instalar y ejecutar la aplicación de registro de usuarios en tu entorno local. Si encuentras algún problema, revisa los logs de Docker o consulta la documentación de las herramientas utilizadas.
