<?php

declare(strict_types=1);

namespace App\Controller\Regiao;

use App\Helper\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class GetAll extends Base
{
    public function __invoke(Request $request, Response $response): Response
    {
        $regiaos = $this->getRegiaoService()->getAll();

        return JsonResponse::withJson($response, (string) json_encode($regiaos));
    }
}
