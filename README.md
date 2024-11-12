<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
    </a>
</p>

<p align="center">
    <a href="https://github.com/laravel/framework/actions">
        <img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status">
    </a>
    <a href="https://packagist.org/packages/laravel/framework">
        <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
    </a>
    <a href="https://packagist.org/packages/laravel/framework">
        <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
    </a>
    <a href="https://packagist.org/packages/laravel/framework">
        <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
    </a>
</p>

## Acerca del Proyecto

Este es un proyecto basado en Laravel que incluye un sistema de gestión de reservas de salas. Los usuarios pueden registrarse, autenticarse y realizar reservas en salas específicas para bloques de horario definidos.

## Instalación

Sigue estos pasos para configurar el proyecto en tu entorno local:

1. **Clona el repositorio**:
   ```bash
   git clone https://github.com/Drenoxt/TWDesafio.git
   cd TWDesafio

2. **Instala las dependencias: Asegúrate de que tienes Composer instalado, y luego ejecuta**:
    composer install

3. **Configura el archivo .env: Copia el archivo de ejemplo .env.example y renómbralo a .env:**:
    cp .env.example .env

4. **Genera la clave de la aplicación**:
    php artisan key:generate

5. **Ejecuta las migraciones: Este comando creará las tablas necesarias en la base de datos**:
    php artisan migrate


6. **Ejecuta los seeds: Los seeds crearán datos iniciales, incluyendo usuarios y estados de reserva**:
    php artisan db:seed


## Usuarios Predefinidos

El sistema incluye usuarios predefinidos para propósitos de prueba:

| Rol          | Nombre    | Email               | Contraseña | Rol        |
|--------------|-----------|---------------------|------------|------------|
| Administrador| adminTW   | adminTW@example.com | 123        | Administrador |
| Cliente      | clienteTW | clienteTW@example.com | 123     | Cliente     |

Puedes utilizar estos usuarios para probar las funcionalidades disponibles para cada rol.
