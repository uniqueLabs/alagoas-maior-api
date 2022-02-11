<?php

declare(strict_types=1);

$container['produtor_service'] = static function (Pimple\Container $container): App\Service\ProdutorService {
    return new App\Service\ProdutorService($container['produtor_repository']);
};
