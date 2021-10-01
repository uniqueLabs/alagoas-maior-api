<?php

declare(strict_types=1);

$container['book_service'] = static function (Pimple\Container $container): App\Service\BookService {
    return new App\Service\BookService($container['book_repository']);
};

$container['cd_service'] = static function (Pimple\Container $container): App\Service\CdService {
    return new App\Service\CdService($container['cd_repository']);
};

$container['contact_service'] = static function (Pimple\Container $container): App\Service\ContactService {
    return new App\Service\ContactService($container['contact_repository']);
};

$container['dvd_service'] = static function (Pimple\Container $container): App\Service\DvdService {
    return new App\Service\DvdService($container['dvd_repository']);
};
