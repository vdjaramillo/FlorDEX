### Pasos para funcionamiento 
1. Descargar y descomprimir el proyecto
2. Desde la consola de linux (o laragon https://laragon.org/download/ u otro similar), navegar hasta la carpeta en la que se descomprimió el proyecto 
3. Ejecutar el comando "composer install" para que se instalen las librerías relacionadas
4. modificar en el archivo de variables de entorno (.env) las líneas 
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
según sea el caso de su servidor de bases de datos.
4. Crear en su servidor de bases de datos una base de datos con el mismo nombre que digitó en la variable de entorno 
DB_DATABASE=
5. Ejecutar, desde la consola, el comando "php artisan migrate:refresh --seed". Para crear las tablas en el sistema.
6. Ejecutar el comando "php artisan serve --port 80". Para que el proyecto se ejecute en la dirección 127.0.0.1 
7. Navegar por el proyecto.

Nota: 
El proyecto trae por defecto 4 usuarios: un administrador (102931), un Encargado de Logística (1), un tesorero (2), y un contador (3), en todos los casos la cédula es la denotada entre paréntesis y la contraseña es 123.
