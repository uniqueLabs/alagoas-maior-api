<?php

declare(strict_types=1);

namespace App\Controller\Dvd;

use App\Service\DvdService;
use Pimple\Psr11\Container;

abstract class Base
{
    protected Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    protected function getDvdService(): DvdService
    {
        return $this->container->get('dvd_service');
    }
}
