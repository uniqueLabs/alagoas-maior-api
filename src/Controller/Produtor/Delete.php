<?php

declare(strict_types=1);

namespace App\Controller\Produtor;

use App\Helper\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class Delete extends Base
{
    /**
     * @param array<string> $args
     */
    public function __invoke(
        Request $request,
        Response $response,
        array $args
    ): Response {
        $this->getProdutorService()->delete((int) $args['id']);

        return JsonResponse::withJson($response, '', 204);
    }
}
