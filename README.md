# A Simple E-Commerce Coffee Vendor Application

Application is written in PHP/HTML5/CSS3 using the Laravel
framework.

##Install:

Download the repository:

    git clone git@github.com:MikeStotts/coffee-shop2.git

Install composer (see https://getcomposer.org/)

Install dependencies using composer
From (project directory):

    composer install

Apply migrations to build database and then seed database:
    
    php artisan migrate:install
    php artisan migrate:public
    php artisan db:seed

##Usage:

### Testing with Artisan
For simple testing, PHP's built-in web server can be used. In the project directory
enter:

    php artisan serve

Sever can be accessed at localhost:8000

### Using with Web Server
To deploy to an actual web server (i.e. Apache) URL re-writing must be supported.
The projects "public" directory contains and .htaccess file the can be used to do
the re-writing.

The application is actually served from the projects "public" directory. Therefore the "public" directory must be accessible by the server:

