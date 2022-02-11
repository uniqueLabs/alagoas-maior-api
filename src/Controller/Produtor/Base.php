<?php

declare(strict_types=1);

namespace App\Controller\Produtor;

use App\Service\ProdutorService;
use Pimple\Psr11\Container;

abstract class Base
{
    protected Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    protected function getProdutorService(): ProdutorService
    {
        return $this->container->get('produtor_service');
    }
}
