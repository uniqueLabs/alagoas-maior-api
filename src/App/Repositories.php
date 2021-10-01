<?php

declare(strict_types=1);

$container['book_repository'] = static function (Pimple\Container $container): App\Repository\BookRepository {
    return new App\Repository\BookRepository($container['db']);
};

$container['cd_repository'] = static function (Pimple\Container $container): App\Repository\CdRepository {
    return new App\Repository\CdRepository($container['db']);
};
