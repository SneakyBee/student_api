<p align="center"><a href="https://symfony.com" target="_blank">
    <img src="https://symfony.com/logos/symfony_black_02.svg">
</a></p>

# student_api
Test technique UbiTransport

Installation
------------
* [Install Composer][0] 
* [Install Symfony][1] with Composer
* Download or Clone the project
* Add all dependencies, run in your project folder : ```composer install ```

Database
------------
* In .env file, please adjust the DATABASE_URL to your configuration
* Run ```php bin/console make:migration ``` and  ```php bin/console doctrine:migrations:migrate```
* To add some data set run ```php bin/console doctrine:fixtures:load```


Documentation
-------------


[0]: https://getcomposer.org/download/
[1]: https://symfony.com/doc/current/setup.html
