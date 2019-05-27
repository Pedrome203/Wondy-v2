## Brandon Manuel Diaz Flores.

## Pedro Morales Enriquez.

# Wondy
Wondy es una plataforma para vender ropa, los usuarios podran crear un perfil con sus prendas y ponerlas en venta.
Tambien podran subir sus diseños o crearlos en la pagina y por un cierto precio podran comprar esos diseños.

## Herramientas

Usaremos las  siguientes herramientas

#### Laragon

Laragon es una opción relativamente nueva para la creación de lo que llamamos el entorno de desarrollo, es decir, todo un conjunto de programas necesarios para desarrollar aplicaciones. Sirve para trabajar con PHP, pero también con otros lenguajes del lado del servidor, como Node, Python o Ruby. 

#### Composer

Es un software de gestion de los paquetes del leguanje de programcion PHP, ademas proporciona un formato estandar para la gestion de dependencias y bibliotecas requeridas por el software PHP.
Composer se utilizo para facilitar el manejo del lenguaje php y sus dependecias.

#### Sublime text u cualquier otro editor 
Es un editor de texto con soporte para codificar.
El motivo por el que se utilizo sublime text es la facilidad que otorga a la hora de programar, ademas de ser muy ligero y rapido.

## Instalacion

Nuestro proyecto usa Laravel (framework de PHP); para poderlo usar necesitaremos instalar PHP, composer, XAMPP y laragon. 
Al instalar la version mas actual de XAMPP se descarga automaticamente php 7.* por lo tanto matamos dos pajaros de un tiro.
Para instalar XAMPP en windows y linux simplemente se entra a la pagina y se descarga el ejecutable.
Para instalar composer se teclearan una serie de comandos en la consola. Para esto seguiremos las intrucciones de su pagina web. https://getcomposer.org/download/ 

Lo mismo haremos con laragon, aqui esta su pagina web 
https://laragon.org/

El siguiente paso seria crear una base de datos en mysql 
  
Una vez que se tiene la base de datos, se descarga el proyecto de github

Una vez que tenemos los servicios y programas antes mencionados nuestro proyecto ya está descargado.

## Configuración

Ya que tienes tu proyecto descargado tienes que copiar el archivo .env.example y renombrarlo como “ .env ” dentro de este archivo modificaras las configuraciones de tu BD, para configurarlo pones el nombre de usuario con el que tienes permisos, tambien pones el password, recuerda poner tambien el nombre de la base de datos.  


Despues abre una consola, vas al lugar donde se descargó el proyecto y haces el comando:  
“  composer install "  
para descargar todas las dependencias de tu proyecto, tambien el comando:  
artisan key:generate  
para generar una llave. 
para tener archivos  
php artisan storage:link  
Por ultimo con se usa el siguiente comando para poblar la base de datos  
php artisan db:seed   
Una vez que hicimos esto nuestro proyecto esta listo para usarse completamente localmente.   

Brandon Manuel Diaz Flores.

Pedro Morales Enriquez.
