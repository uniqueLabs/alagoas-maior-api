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

$app->get('/contact', App\Controller\Contact\GetAll::class);
$app->post('/contact', App\Controller\Contact\Create::class);
$app->get('/contact/{id}', App\Controller\Contact\GetOne::class);
$app->put('/contact/{id}', App\Controller\Contact\Update::class);
$app->delete('/contact/{id}', App\Controller\Contact\Delete::class);

$app->get('/dvd', App\Controller\Dvd\GetAll::class);
$app->post('/dvd', App\Controller\Dvd\Create::class);
$app->get('/dvd/{id}', App\Controller\Dvd\GetOne::class);
$app->put('/dvd/{id}', App\Controller\Dvd\Update::class);
$app->delete('/dvd/{id}', App\Controller\Dvd\Delete::class);
