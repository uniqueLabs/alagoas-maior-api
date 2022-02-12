<?php

declare(strict_types=1);

namespace App\Controller\Selo;

use App\Service\SeloService;
use Pimple\Psr11\Container;

abstract class Base
{
    protected Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    protected function getSeloService(): SeloService
    {
        return $this->container->get('selo_service');
    }
}
