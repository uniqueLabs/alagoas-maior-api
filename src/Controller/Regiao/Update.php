<?php

declare(strict_types=1);

namespace App\Controller\Regiao;

use App\Helper\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class Update extends Base
{
    /**
     * @param array<string> $args
     */
    public function __invoke(
        Request $request,
        Response $response,
        array $args
    ): Response {
        $input = (array) $request->getParsedBody();
        $regiao = $this->getRegiaoService()->update($input, (int) $args['id']);

        return JsonResponse::withJson($response, (string) json_encode($regiao));
    }
}
