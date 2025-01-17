

<!-- TABLE OF CONTENTS -->

# Alagoas Maior 

- [Sobre o Projeto](#sobre-o-projeto)
- [Desenvolvimento](#desenvolvimento)
- [Começando](#começando)
  - [Pré-requisitos](#pr%C3%A9-requisitos)
  - [Rodando o projeto](#rodando-o-projeto)
      - [Com Docker](#com-docker)
      - [Sem Docker](#sem-docker)

<!-- ABOUT THE PROJECT -->

# Sobre o Projeto

O repositório atual contempla todo o escopo do back-end.

Read this in other language: [English](readme.en.md) 
# Desenvolvimento

Abaixo segue o que foi utilizado no desenvolvimento deste projeto:

- [PHP](https://www.php.net/) - PHP é uma linguagem interpretada livre, usada originalmente apenas para o desenvolvimento de aplicações presentes e atuantes no lado do servidor;
- [SLIM](https://www.slimframework.com/) - Slim é uma micro estrutura de PHP que ajuda você a escrever rapidamente aplicativos e APIs da web simples, mas poderosos;
- [Docker](https://www.docker.com/) - Docker é um conjunto de produtos de plataforma como serviço que usam virtualização de nível de sistema operacional para entregar software em pacotes chamados contêineres;
- [Mysql](https://www.mysql.com/) - O MySQL é um sistema de gerenciamento de banco de dados, que utiliza a linguagem SQL como interface;

<!-- GETTING STARTED -->

# Começando

## Pré-requisitos
Para rodar o projeto é necessário ter o [docker](https://www.docker.com/) instalado, ou caso queria rodar sem um container o [PHP](https://www.php.net/) será necessário.

## Rodando o projeto
### 1. Com Docker
Para executar a aplicação utilizando docker basta navegar até a pasta raiz e executar os seguintes comandos:

```shell=
    docker-compose build
```

```shell=
   docker-compose up

```

### 2. Sem Docker

### Execução
Para executar a aplicação é necessário ter o php e composer instalados. Após a instalação de ambos, basta navegar até a pasta raiz e executar os seguintes comandos:

```shell=
composer install
composer start
```
Caso opte por executar sem docker, o script inicial do banco de dados está localizado em: docker/db-dump/alagoasmaior.sql

### Testes
Para executar os testes da aplicação basta navegar até a pasta raiz e executar o seguinte comando:

```shell=
    composer test
```

    
