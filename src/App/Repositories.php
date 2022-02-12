<?php

declare(strict_types=1);


$container['produtor_repository'] = static function (Pimple\Container $container): App\Repository\ProdutorRepository {
    return new App\Repository\ProdutorRepository($container['db']);
};

$container['produto_repository'] = static function (Pimple\Container $container): App\Repository\ProdutoRepository {
    return new App\Repository\ProdutoRepository($container['db']);
};

$container['regiao_repository'] = static function (Pimple\Container $container): App\Repository\RegiaoRepository {
    return new App\Repository\RegiaoRepository($container['db']);
};

$container['selo_repository'] = static function (Pimple\Container $container): App\Repository\SeloRepository {
    return new App\Repository\SeloRepository($container['db']);
};

$container['categoria_repository'] = static function (Pimple\Container $container): App\Repository\CategoriaRepository {
    return new App\Repository\CategoriaRepository($container['db']);
};
