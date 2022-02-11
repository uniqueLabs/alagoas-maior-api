<?php

declare(strict_types=1);

$app->get('/', 'App\Controller\Home:getHelp');
$app->get('/status', 'App\Controller\Home:getStatus');
$app->get('/produtor', App\Controller\Produtor\GetAll::class);
$app->post('/produtor', App\Controller\Produtor\Create::class);
$app->get('/produtor/{id}', App\Controller\Produtor\GetOne::class);
$app->put('/produtor/{id}', App\Controller\Produtor\Update::class);
$app->delete('/produtor/{id}', App\Controller\Produtor\Delete::class);
