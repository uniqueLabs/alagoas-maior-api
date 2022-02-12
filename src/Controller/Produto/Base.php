<?php

declare(strict_types=1);

namespace App\Controller\Produto;

use App\Service\ProdutoService;
use Pimple\Psr11\Container;

abstract class Base
{
    protected Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    protected function getProdutoService(): ProdutoService
    {
        return $this->container->get('produto_service');
    }
}
