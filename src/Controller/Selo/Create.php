<?php

declare(strict_types=1);

namespace App\Controller\Selo;

use App\Helper\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class Create extends Base
{
    public function __invoke(Request $request, Response $response): Response
    {
        $input = (array) $request->getParsedBody();
        $selo = $this->getSeloService()->create($input);

        return JsonResponse::withJson($response, (string) json_encode($selo), 201);
    }
}
