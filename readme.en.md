<!-- TABLE OF CONTENTS -->

# Alagoas Maior  

- [About the Project](#about-the-project)
- [Development](#development)
- [Starting](#starting)
  - [Prerequisites](#pr%C3%A9-requirements)
  - [Running the project](#running-the-project)
      - [With Docker](#with-docker)
      - [No Docker](#no-Docker)

<!-- ABOUT THE PROJECT -->

# About the project

The current repository covers the entire scope of the backend.

# Development

Below is what was used in the development of this project:

- [PHP](https://www.php.net/) - PHP is a free interpreted language, originally used only for the development of present and active applications on the server side;
- [SLIM](https://www.slimframework.com/) - Slim is a PHP micro framework that helps you quickly write simple but powerful web applications and APIs;
- [Docker](https://www.docker.com/) - Docker is a set of platform-as-a-service products that use OS-level virtualization to deliver software in packages called containers;
- [Mysql](https://www.mysql.com/) - MySQL is a database management system, which uses the SQL language as an interface;

<!-- GETTING STARTED -->

# Starting

## Prerequisites
To run the project you need to have [docker](https://www.docker.com/) installed, or if you want to run without a container [PHP](https://www.php.net/) will be needed.

## Running the project
### 1. With Docker
To run the application using docker just navigate to the root folder and execute the following commands:

```shell=
    docker-compose build
```

```shell=
   docker-compose up

```

### 2. No Docker

### Execution
To run the application it is necessary to have php and composer installed. After installing both, just navigate to the root folder and run the following commands:

```shell=
composer install
composer start
```
If you choose to run without docker, the database start script is located at: docker/db-dump/alagoasmaior.sql

### Tests
To run the application tests, simply navigate to the root folder and execute the following command:

```shell=
    composer test
```