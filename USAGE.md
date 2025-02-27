# Instructivo de Uso de la Aplicación de Registro de Usuarios

Este documento proporciona un instructivo sobre cómo utilizar la aplicación de registro de usuarios desarrollada en PHP.

## 1. Acceso a la Aplicación

Una vez que hayas seguido los pasos de instalación y la aplicación esté en funcionamiento, puedes acceder a ella a través de tu navegador web en la siguiente dirección:

```
http://localhost:8000
```

## 2. Registro de un Nuevo Usuario

Para registrar un nuevo usuario, debes enviar una solicitud POST al endpoint `/register` con los siguientes datos en formato JSON:

### Payload de Registro
```json
{
    "name": "Nombre del Usuario",
    "email": "correo@ejemplo.com",
    "password": "ContraseñaSegura123!"
}
```

### Ejemplo de Comando cURL
Puedes utilizar cURL para enviar la solicitud de registro. Abre una terminal y ejecuta el siguiente comando:

```bash
curl -X POST http://localhost:8000/register \
-H "Content-Type: application/json" \
-d '{"name": "Juan Pérez", "email": "juan.perez@example.com", "password": "ContraseñaSegura123!"}'
```

## 3. Respuestas de la API

### Respuesta Exitosa
Si el registro es exitoso, recibirás una respuesta en formato JSON similar a la siguiente:

```json
{
    "success": true,
    "user": {
        "name": "Juan Pérez",
        "email": "juan.perez@example.com"
    }
}
```

### Respuesta de Error
Si hay un error en la solicitud, recibirás un mensaje de error en formato JSON. Por ejemplo, si el email ya está en uso:

```json
{
    "success": false,
    "error": "El email ya está en uso."
}
```

## 4. Validaciones

La aplicación realiza las siguientes validaciones al registrar un usuario:

- **Nombre**: Debe tener entre 3 y 25 caracteres y solo puede contener letras y espacios.
- **Email**: Debe ser un formato de correo electrónico válido.
- **Contraseña**: Debe tener al menos 8 caracteres, incluir al menos una letra mayúscula, un número y un carácter especial.

## 5. Pruebas

Para ejecutar las pruebas unitarias y de integración, utiliza el siguiente comando en la terminal:

```bash
vendor/bin/phpunit
```

## Conclusión

Este instructivo proporciona una guía básica sobre cómo utilizar la aplicación de registro de usuarios. Si tienes alguna pregunta o necesitas más información, consulta la documentación adicional o contacta al desarrollador.
