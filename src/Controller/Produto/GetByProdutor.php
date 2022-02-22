<?php

declare(strict_types=1);

namespace App\Controller\Produto;

use App\Helper\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class GetByProdutor extends Base
{
    /**
     * @param array<string> $args
     */
    public function __invoke(
        Request $request,
        Response $response,
        array $args
    ): Response {
        $produtoByProdutor = $this->getProdutoService()->getByProdutor((int) $args['id']);

        return JsonResponse::withJson($response, (string) json_encode($produtoByProdutor));
    }
}
