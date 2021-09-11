<p align="center">
  <a href="https://game-app-store.herokuapp.com/">
    <img src="https://github.com/jordirocha/CRUD/blob/main/src/public/img/crud.png" alt="Logo" width="140" height="140">
  </a>

  <h3 align="center">CRUD</h3>

  <p align="center">
    Just a simple minimalistic CRUD made it with PHP and database used MongoDB
    <br />
    <br />
  </p>
</p>

## Table of Contents

* [About the Project](#about-the-project)
  * [Built With](#built-with)
  * [Project Directories](#project-directories)
* [Getting Started](#getting-started)
  * [Prerequisites](#prerequisites)
  * [Run app](#run-app)
  * [Configuration](#configuration)
* [Contact](#contact)


### About the Project
<div align="center">
  <img src="https://github.com/jordirocha/CRUD/blob/main/demo.gif" />
</div>
With this project I joined PHP and MongoDB, making a CRUD applying basic operations: create, read, update and delete.

### Built With
* PHP
* MongoDB
* JavaScript
* HTML
* CSS
* Bootstrap 5

### Project Directories
        .
        │   .gitattributes
        │   .gitignore
        │   composer.json
        │   composer.lock
        │   conf.php
        │   demo.gif
        │   index.php
        │   README.md
        │
        ├───src
            ├───app
            │       delete.php
            │       departments.php
            │       insert.php
            │       jobs.php
            │       select.php
            │       update.php
            │
            └───public
                ├───css
                │       index.css
                │
                ├───img
                │       icon.png
                │
                └───js
                        index.js

## Getting Started
To get a local copy up and running follow these simple example steps.

### Prerequisites
Must install these packages/software to run it perfectly:
* [XAMPP](https://www.apachefriends.org/index.html)
* [Composer](https://getcomposer.org/)
* [MongoDB](https://www.mongodb.com/es)
* [MongoDB driver for PHP](https://pecl.php.net/package/mongodb)

### Configuration
Download MongoDB driver for PHP, then copy and pasted on this location:
       
    C:\xampp\php\ext   
    
Have to include extension `mongodb` on your PHP.
Example on Windows, file `php.ini`:

    extension=php_mongodb.dll
### Run app
Download the project on `htdocs` folder.

    git clone https://github.com/jordirocha/CRUD.git
    cd CRUD-main/
    composer install

After that open your web browser and paste: `http://localhost/crud-main/index.php`.

## Contact

Jordi Rocha - [LinkedIn](https://es.linkedin.com/in/jordirocharocha) - jordirocharocha@gmail.com

Project Link: [https://github.com/jordirocha/GameApp](https://github.com/jordirocha/GameApp/)
