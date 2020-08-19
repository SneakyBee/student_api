<p align="center"><a href="https://symfony.com" target="_blank">
    <img src="https://symfony.com/logos/symfony_black_02.svg">
</a></p>

# student_api
Test technique UbiTransport with API Platform

Installation
------------
* [Install Composer][0] 
* [Install Symfony][1] with Composer
* Download or Clone the project
* Add all dependencies, run in your project folder : ```composer install ```

Database configuration
------------
* In .env file, please adjust the DATABASE_URL to your configuration
* Run ```php bin/console make:migration ``` and  ```php bin/console doctrine:migrations:migrate```
* To add some data set run ```php bin/console doctrine:fixtures:load```

Run the project 
-------------
* Run ```symfony server:start ```
* In your browser, use the url using by your web server (generaly http://127.0.0.1:8000) 

Documentation
-------------
All request can be done with the api_platform interface or with those url

* Add student : 
    * Method: POST
    * Ressource
    ```Json
    {
      "name": "string",
      "firstName": "string",
      "birthDate": "2020-08-19T12:20:19.497Z",
      "grades": [
        "string"
      ]
    }
    ```
    * Url : base_url/students

* Change student information : 
    * Method: PATCH
    * Ressource
    ```Json
    {
      "name": "New_name",
      "firstName": "new_michel",
      "birthDate": "2020-08-19"
    }
    ```
    * Url : base_url/students/{id} (student_id)

* Delete a student
    * Method: DELETE
    * Url: base_url/students/{id} (student_id) 
    * Note: This request will delete all grades link to this student

* Add grade to a student 
    * Method: POST
    * Ressource:
    ```Json
    {
      "value": 18,
      "subject": "jardinage",
      "student": "/students/{id_student}"
    }
    ```
    * Url: base_url/grades

* Get average of a student 
    * Method: GET
    * Url: base_url/get_student_average/{id} (student_id)

* Get average of all student 
    * Method: GET
    * Url:  base_url/grades/global_average

[0]: https://getcomposer.org/download/
[1]: https://symfony.com/doc/current/setup.html
