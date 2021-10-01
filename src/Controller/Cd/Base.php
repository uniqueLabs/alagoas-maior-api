<?php

declare(strict_types=1);

namespace App\Controller\Cd;

use App\Service\CdService;
use Pimple\Psr11\Container;

abstract class Base
{
    protected Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    protected function getCdService(): CdService
    {
        return $this->container->get('cd_service');
    }
}
