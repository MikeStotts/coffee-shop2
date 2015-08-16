# A Simple E-Commerce Coffee Venddr Application

Appllication is written in PHP/HTML5/CSS3 uwing the Laravel
framework.

##Install:

Download the repository:

    git clone git@github.com:MikeStotts/coffee-shop2.git

Install composer (see https://getcomposer.org/)

Install dependencoes using composer
From (project directory):

    composer install

Apply migratios to build database abd then seed database:
    
    php artisan migrate:install
    php artisan migrate:public
    php artisan db:seed

##Usage:

For simple testing, PHP's built-in webserver can be used. In the project diecory
enter:

    php artisan serve

Sever can be accessed at localhost:8000

To deploy to an actual webserver (i.e. Apache) URL re-writing must be supported.
The projects "public" directory contains and .htaccess file the can be used to do
the re-writing.
