<?php

declare(strict_types=1);

$container['produtor_repository'] = static function (Pimple\Container $container): App\Repository\ProdutorRepository {
    return new App\Repository\ProdutorRepository($container['db']);
};
