<?php

declare(strict_types=1);

$container['produtor_service'] = static function (Pimple\Container $container): App\Service\ProdutorService {
    return new App\Service\ProdutorService($container['produtor_repository']);
};

$container['produto_service'] = static function (Pimple\Container $container): App\Service\ProdutoService {
    return new App\Service\ProdutoService($container['produto_repository']);
};

$container['regiao_service'] = static function (Pimple\Container $container): App\Service\RegiaoService {
    return new App\Service\RegiaoService($container['regiao_repository']);
};

$container['selo_service'] = static function (Pimple\Container $container): App\Service\SeloService {
    return new App\Service\SeloService($container['selo_repository']);
};

$container['categoria_service'] = static function (Pimple\Container $container): App\Service\CategoriaService {
    return new App\Service\CategoriaService($container['categoria_repository']);
};
