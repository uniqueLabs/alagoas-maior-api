<?php

declare(strict_types=1);

$container['book_service'] = static function (Pimple\Container $container): App\Service\BookService {
    return new App\Service\BookService($container['book_repository']);
};
