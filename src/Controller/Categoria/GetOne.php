<?php

declare(strict_types=1);

namespace App\Controller\Categoria;

use App\Helper\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class GetOne extends Base
{
    /**
     * @param array<string> $args
     */
    public function __invoke(
        Request $request,
        Response $response,
        array $args
    ): Response {
        $categoria = $this->getCategoriaService()->getOne((int) $args['id']);

        return JsonResponse::withJson($response, (string) json_encode($categoria));
    }
}
