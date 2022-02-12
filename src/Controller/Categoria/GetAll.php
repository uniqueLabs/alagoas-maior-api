<?php

declare(strict_types=1);

namespace App\Controller\Categoria;

use App\Helper\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class GetAll extends Base
{
    public function __invoke(Request $request, Response $response): Response
    {
        $categorias = $this->getCategoriaService()->getAll();

        return JsonResponse::withJson($response, (string) json_encode($categorias));
    }
}
