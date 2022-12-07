## Introducción 
este proyecto base es creado utilizando los comandos que fueron obtenidos de la documentacion oficial de laravel y de mysql inicialmente.

**Requisitos minimos**
composer 
php 8 
extensiones de php que pueden faltar:

mysql : apt-get install php-mysql

**crear proyecto**
para crear el proyecto se debe tener composer y php8 instalados. 

> composer create-project laravel/laravel **nombreDelProyecto**

si utilizan este proyecto base, pueden clonarlo y para instalar las librerias necesarias deben ejecutar el comando 

> composer install

una vez creado el proyecto se procede con los siguientes comandos:

1.- 
> cd/**nombreDelProyecto** 

esto para entrar el la carpeta del proyecto.

2.-
> cp .env.example .env 

esto para crear un archivo con las variables de entorno. es necesario para darle al sistema las configuraciones basicas de base de datos, ambiente en que se encuentra etc. se recomienda de forma extrema no subir sus archivos .env a sus repositorios ya que ese archivo cuenta con información sensible de su proyecto.

3.- 
> php artisan key:generate 

para generar una key del sistema tenga una key de encriptación. 

4.- al abrir el archivo .env podemos ver las configuraciones de nuestro sistema, las mas usadas en nuestro caso seran: 

LOG_CHANNEL=stack < -- nos dirá como se almacenarán los logs que hagamos en sistema. se recomienda usar el canal "daily"

DB_CONNECTION=mysql <-- motor de bd a utilizar
DB_HOST=127.0.0.1 <-- donde está la bd, en este caso será nuestro equipo local
DB_PORT=3306 <-- puerto al cual acceder a la bd. se mantiene valor por defecto.
DB_DATABASE=laravel <-- nombre de la bd a la cual accederemos. en este caso crearemos una bd laravel en local
DB_USERNAME=root <-- nombre del usuario de mysql con el cual accederemos a la bd. nosotros la modificaremos mas abajo
DB_PASSWORD= <-- aqui va la password del user de mysql, por defecto viene vacio, si uds setearon una clave deben incluirla aqui, si lleva caracteres especiales tipo # o similar, se recomienda usar comillas dobles "" para definir este parametro.

este grupo de configuraciones son para la base de datos, nosotros utilizaremos mysql. 
 
**para la bd** 

ingresamos a mysql por consola escribiendo:
sudo mysql -u root -p 
(le decimos que inicie mysql con el -u le indicamos el usuario y -p para decir que lleva password, la cual pedirá después).

creamos un usuario: 
> CREATE USER '**usuario**'@'localhost' IDENTIFIED BY 'password';
(donde **usuario** será el nombre que le demos) 

> SET PASSWORD FOR '**usuario**'@'localhost' = **laclave**;
(aca le damos una contraseña al usuario)

> GRANT ALL ON *.* TO '**usuario**'@'localhost';
o
> GRANT ALL PRIVILEGES ON *.* TO '**usuario**'@'localhost' WITH GRANT OPTION;

con esto le damos los permisos a nuestro usuario para acceder a las bases de datos de nuestro equipo local.
( ojo no es lo mas recomendable darle permisos completos, pero en este caso como estamos iniciando haremos algo basico sin limitaciones)

> create database **nombreBD** ; 
creamos la base de datos en nuestro equipo finalmente.


con esto en mente podemos modificar nuestro .env para darle usuario, contraseña y bd.


## primeros pasos ##

el patron a utilizar en cuanto a desarrollo es el patron repositorio. para ello debemos crear nuestros controladores, los cuales van a recibir las peticiones y llamaran a los repositorios locales que serán los encargados de entregar información.


para crear un controlador utilizaremos el comando
 > php artisan make:controller **NombreController** 
 
 se recomienda usar CamelCase para nombrar los archivos de controladores e indicar en el final del nombre que son de este tipo. ejemplo: 
 **ContactoController** o **ComentarioController** 

 una vez creado el controller podemos crear los modelos y las migraciones para consultar información; en este caso crearemos el modelo "Libro" y "Comentario" 
 el modelo es nuestro "puente" entre el sistema y la base de datos, las migraciones son las encargadas de crear las tablas en la bd. 

 > php artisan make:model Libro -m
 > php artisan make:model Comentario -m

el flag -m le indica que debe crear también la migración de esta tabla.

con esto tenemos la base para crear nuestros modelos y migraciones.

en los archivos  Libro y Comentario estarán las explicaciones de cada caso. 

**Comandos utiles para cada caso**
>php artisan make:migration add_fk_**nombre_tabla_original**_table 

para agregar una foreign key a una migracion ya creada

>php artisan make:migration add_fields_**nombre_tabla_original**_table

para agregar campos olvidados a una migracion ya creada



**Seeders**

para poblar nuestra bd y hacer pruebas crearemos uno o varios seeders. 
con el comando

> php artisan make:factory LibroFactory --model=Libro 


le indicamos que cree un factory. 
factory se encarga de crear nuestros datos falsos, seeder se encarga de cargar estos datos en bd. 
reutilizaremos el archivo DatabaseSeeder.php que viene por defecto para hacer la carga de la información. 
https://github.com/FakerPHP/Faker
https://laravel.com/docs/8.x/database-testing#defining-model-factories


**Validacion de Request**

https://laravel.com/docs/8.x/validation#available-validation-rules

**Jobs**

>sudo apt install redis-server 

 instalacion de redis

>sudo systemctl status redis

chequeo de status


https://laravel.com/docs/8.x/horizon


> composer require predis/predis

REDIS_CLIENT= predis <-- incluir en .env

> php artisan horizon 

activa redis para pruebas
