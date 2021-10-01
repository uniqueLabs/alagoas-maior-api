<?php

declare(strict_types=1);

namespace App\Controller\Contact;

use App\Service\ContactService;
use Pimple\Psr11\Container;

abstract class Base
{
    protected Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    protected function getContactService(): ContactService
    {
        return $this->container->get('contact_service');
    }
}
