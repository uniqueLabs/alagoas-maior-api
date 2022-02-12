<?php

declare(strict_types=1);

$app->get('/', 'App\Controller\Home:getHelp');
$app->get('/status', 'App\Controller\Home:getStatus');

$app->get('/produtor', App\Controller\Produtor\GetAll::class);
$app->post('/produtor', App\Controller\Produtor\Create::class);
$app->get('/produtor/{id}', App\Controller\Produtor\GetOne::class);
$app->put('/produtor/{id}', App\Controller\Produtor\Update::class);
$app->delete('/produtor/{id}', App\Controller\Produtor\Delete::class);

$app->get('/produto', App\Controller\Produto\GetAll::class);
$app->post('/produto', App\Controller\Produto\Create::class);
$app->get('/produto/{id}', App\Controller\Produto\GetOne::class);
$app->put('/produto/{id}', App\Controller\Produto\Update::class);
$app->delete('/produto/{id}', App\Controller\Produto\Delete::class);

$app->get('/regiao', App\Controller\Regiao\GetAll::class);
$app->post('/regiao', App\Controller\Regiao\Create::class);
$app->get('/regiao/{id}', App\Controller\Regiao\GetOne::class);
$app->put('/regiao/{id}', App\Controller\Regiao\Update::class);
$app->delete('/regiao/{id}', App\Controller\Regiao\Delete::class);

$app->get('/selo', App\Controller\Selo\GetAll::class);
$app->post('/selo', App\Controller\Selo\Create::class);
$app->get('/selo/{id}', App\Controller\Selo\GetOne::class);
$app->put('/selo/{id}', App\Controller\Selo\Update::class);
$app->delete('/selo/{id}', App\Controller\Selo\Delete::class);

$app->get('/categoria', App\Controller\Categoria\GetAll::class);
$app->post('/categoria', App\Controller\Categoria\Create::class);
$app->get('/categoria/{id}', App\Controller\Categoria\GetOne::class);
$app->put('/categoria/{id}', App\Controller\Categoria\Update::class);
$app->delete('/categoria/{id}', App\Controller\Categoria\Delete::class);
