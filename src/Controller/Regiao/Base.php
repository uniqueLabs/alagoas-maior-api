<?php

declare(strict_types=1);

namespace App\Controller\Regiao;

use App\Service\RegiaoService;
use Pimple\Psr11\Container;

abstract class Base
{
    protected Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    protected function getRegiaoService(): RegiaoService
    {
        return $this->container->get('regiao_service');
    }
}
