## Introducción 
este proyecto base es creado utilizando los comandos que fueron obtenidos de la documentacion oficial de laravel y de mysql inicialmente.

**Requisitos minimos**
composer 
php 8

apt-get install php-mysql

**crear proyecto**

composer create-project laravel/laravel **nombreDelProyecto**

una vez creado el proyecto se procede con los siguientes comandos:

1.- cd/**nombreDelProyecto**
2.- cp .env.example .env --> esto para crear un archivo con las variables de entorno. es necesario para darle al sistema las configuraciones basicas de base de datos, ambiente en que se encuentra etc.

3.- php artisan key:generate --> para generar una key del sistema tenga una key de encriptación. 

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
o GRANT ALL PRIVILEGES ON *.* TO '**usuario**'@'localhost' WITH GRANT OPTION;

> create database **nombreBD** ; 

(y le damos permiso de acceso a todos los permisos de mysql y las bd, ojo no es lo mas recomendable darle permisos completos, pero en este caso como estamos iniciando haremos algo basico sin limitaciones)

con esto en mente podemos modificar nuestro .env para darle usuario, contraseña y bd.


##primeros pasos##

el patron a utilizar en cuanto a desarrollo es el patron repositorio. para ello debemos crear nuestros controladores, los cuales van a recibir las peticiones y llamaran a los repositorios locales que serán los encargados de entregar información.

para crear un controlador utilizaremos el comando
 > php artisan make:controller **NombreController** 
 
 se recomienda usar CamelCase para nombrar los archivos de controladores e indicar en el final del nombre que son de este tipo. ejemplo: 
 **ContactoController** o **ComentarioController** 

 una vez creado el controller podemos crear los modelos y las migraciones para consultar información; en este caso crearemos el modelo "Libro" y "Comentario" 

 > php artisan make:model Libro -m
 > php artisan make:model Comentario -m

el flag -m le indica que debe crear también la migración de esta tabla.


con esto tenemos la base para crear nuestros modelos y migraciones. 


para agregar una foreign key a una migracion ya creada

php artisan make:migration add_fk_**nombre_tabla_original**_table 

para agregar campos olvidados a una migracion ya creada

php artisan make:migration add_fields_**nombre_tabla_original**_table