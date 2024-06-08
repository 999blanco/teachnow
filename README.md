<p align="center"><a href="https://teachnow.es" target="_blank"><img src="https://teachnow.es/storage/logos/logo.png" width="150" alt="Teachnow Logo"></a></p>

# Teachnow

Teachnow es una plataforma que facilita la conexión entre profesores particulares y estudiantes que buscan clases presenciales. Esta aplicación web permite a los estudiantes buscar y reservar clases con profesores valorados por otros usuarios, proporcionando así una experiencia de aprendizaje confiable y de calidad.

## Tabla de Contenidos

- [Características](#características)
- [Tecnologías Utilizadas](#tecnologías-utilizadas)
- [Instalación](#instalación)
- [Uso](#uso)
- [Contribuir](#contribuir)
- [Licencia](#licencia)
- [Contacto](#contacto)

## Características

- **Búsqueda de Profesores:** Los estudiantes pueden buscar profesores basados en la materia, ubicación y valoraciones de otros usuarios.
- **Localización dinámica:** Los resultados de las búsquedas se aplican a la localización de los estudiantes.
- **Valoraciones y Comentarios:** Los estudiantes pueden dejar valoraciones y comentarios sobre las clases recibidas.
- **Perfil de Usuario:** Gestión de perfiles tanto para estudiantes como para profesores.
- **Panel de Administración:** Gestión de la página web de forma dinámica.

## Tecnologías Utilizadas

- **Frontend:**
  - HTML
  - CSS (Bootstrap 5)
  - JavaScript

- **Backend:**
  - PHP (Laravel)
  - Livewire

- **Base de Datos:**
  - MySQL

- **Otros:**
  - Composer
  - npm
  - Vite

## Instalación

### Requisitos Previos

- PHP >= 8.1
- Composer
- npm
- MySQL
- Servidor web (Apache, Nginx)

### Pasos para la Instalación

1. Clona el repositorio:

   ```bash
   git clone https://github.com/tu-usuario/teachnow.git
   cd teachnow

2. Instala las dependencias de PHP:

   ```bash
   composer install

3. Instala las dependencias de JavaScript:

    ```bash
   npm install

4. Copia el archivo de configuración y ajusta los parámetros necesarios:

   ```bash
   cp .env.example .env
   php artisan key:generate

5. Configura la base de datos en el archivo .env y luego ejecuta las migraciones:

   ```bash
   php artisan migrate

6. Compila los assets:

   ```bash
   npm run build

7. Inicia el servidor de desarrollo:

   ```bash
   php artisan serve

### Uso

- Accede a http://localhost:8000 en tu navegador para ver la aplicación en funcionamiento.
- Regístrate como profesor o estudiante para empezar a usar la plataforma.

### Contribuir

¡Contribuciones son bienvenidas! Por favor, sigue los siguientes pasos para contribuir:

1. Haz un fork del proyecto.
2. Crea una rama para tu nueva funcionalidad (git checkout -b feature/nueva-funcionalidad).
3. Haz commit de tus cambios (git commit -am 'Añadir nueva funcionalidad').
4. Sube tu rama (git push origin feature/nueva-funcionalidad).
5. Crea un Pull Request.


### Licencia

Este proyecto está licenciado bajo la Licencia MIT. Consulta el archivo LICENSE para más detalles.

### Contacto

Para más información o preguntas sobre el proyecto, puedes contactarme en:

- Nombre: David Blanco Martínez
- Correo: davidblanco2705@gmail.com
