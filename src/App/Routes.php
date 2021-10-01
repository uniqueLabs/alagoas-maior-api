<?php

declare(strict_types=1);

$app->get('/', 'App\Controller\Home:getHelp');
$app->get('/status', 'App\Controller\Home:getStatus');

$app->get('/book', App\Controller\Book\GetAll::class);
$app->post('/book', App\Controller\Book\Create::class);
$app->get('/book/{id}', App\Controller\Book\GetOne::class);
$app->put('/book/{id}', App\Controller\Book\Update::class);
$app->delete('/book/{id}', App\Controller\Book\Delete::class);

$app->get('/cd', App\Controller\Cd\GetAll::class);
$app->post('/cd', App\Controller\Cd\Create::class);
$app->get('/cd/{id}', App\Controller\Cd\GetOne::class);
$app->put('/cd/{id}', App\Controller\Cd\Update::class);
$app->delete('/cd/{id}', App\Controller\Cd\Delete::class);
