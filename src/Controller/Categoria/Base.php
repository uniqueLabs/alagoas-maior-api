<?php

declare(strict_types=1);

namespace App\Controller\Categoria;

use App\Service\CategoriaService;
use Pimple\Psr11\Container;

abstract class Base
{
    protected Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    protected function getCategoriaService(): CategoriaService
    {
        return $this->container->get('categoria_service');
    }
}
