<?php

declare(strict_types=1);

namespace App\Controller\Book;

use App\Service\BookService;
use Pimple\Psr11\Container;

abstract class Base
{
    protected Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    protected function getBookService(): BookService
    {
        return $this->container->get('book_service');
    }
}
