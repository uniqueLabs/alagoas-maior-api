<?php

declare(strict_types=1);

$container['book_repository'] = static function (Pimple\Container $container): App\Repository\BookRepository {
    return new App\Repository\BookRepository($container['db']);
};

$container['cd_repository'] = static function (Pimple\Container $container): App\Repository\CdRepository {
    return new App\Repository\CdRepository($container['db']);
};

$container['contact_repository'] = static function (Pimple\Container $container): App\Repository\ContactRepository {
    return new App\Repository\ContactRepository($container['db']);
};
