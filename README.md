<p align="center"><a href="#" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Acerca de este proyecto

Este proyecto es una solicitud de una prueba técnica de la empresa ADN Digital. A continuación se colocan ciertas configuraciones que se deberian tener en su ambiente para que el proyecto funcione correctamente:

- Antes de iniciar el proyecto, ejecutar en la raíz:

        composer install

- Configurar la base de datos correspondientes en el archivo .env, en la seccion siguiente (reemplazar los valores correspondientes a la BBDD creada en su equipo):

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=adndigital
DB_USERNAME=root
DB_PASSWORD=

- Por ultimo, ejecutar las migrations de las tablas con el siguiente comando:

        php artisan migrate
        
- En caso de pedir key de encriptación, se debe ejecutar el siguiente comando:
        
        php artisan key:generate

- Listo! Con eso ya deberia ser capaz de poder ejecutar el CRUD con Laravel!
