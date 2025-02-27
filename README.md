# Aplicación de Registro de Usuarios en PHP

## Descripción General
Esta aplicación es un sistema de registro de usuarios basado en PHP que utiliza Doctrine para la gestión de bases de datos. Sigue los principios de Diseño Orientado al Dominio (DDD) e implementa una arquitectura limpia. La aplicación está diseñada para manejar el registro de usuarios, incluyendo validación y despacho de eventos.

## Características
- Registro de usuarios con validación de email y contraseña.
- Uso de Value Objects para encapsular datos sensibles.
- Patrón de repositorio para la persistencia de datos.
- Eventos de dominio para manejar eventos de registro de usuarios.
- Configuración de Docker para un despliegue fácil.

## Requisitos
- PHP 8.0 o superior
- Composer
- Docker y Docker Compose
- MySQL

## Instalación

1. **Clonar el Repositorio**
   ```bash
   git clone <url-del-repositorio>
   cd <directorio-del-repositorio>
   ```

2. **Construir los Contenedores de Docker**
   ```bash
   make build
   ```

3. **Iniciar los Contenedores de Docker**
   ```bash
   make up
   ```

4. **Ejecutar Migraciones**
   ```bash
   make migrate
   ```

## Uso

### Registrar un Usuario
Para registrar un usuario, envía una solicitud POST al endpoint `/register` con el siguiente payload JSON:
```json
{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "securePassword123!"
}
```

### Ejemplo de Comando cURL
```bash
curl -X POST http://localhost:8000/register \
-H "Content-Type: application/json" \
-d '{"name": "John Doe", "email": "john@example.com", "password": "securePassword123!"}'
```

## Pruebas
Para ejecutar las pruebas de PHPUnit, ejecuta el siguiente comando:
```bash
vendor/bin/phpunit
```

## Comandos de Docker
- **Detener y Eliminar Contenedores**
  ```bash
  make down
  ```

## Documentación
Esta aplicación sigue los principios de Diseño Orientado al Dominio y Arquitectura Limpia, asegurando una base de código modular y mantenible. El uso de Value Objects ayuda a encapsular datos sensibles, mientras que el patrón de repositorio proporciona una interfaz clara para el acceso a datos.

## Licencia
Este proyecto está licenciado bajo la Licencia MIT.
