<?php

declare(strict_types=1);

namespace Tests\integration;

class CategoriaTest extends TestCase
{
    private static $id;

    public function testCreate(): void
    {
        $params = [
            '' => '',
            'categoria_id' => 1,
            'categoria_nome' => 'aaa'
        ];
        $req = $this->createRequest('POST', '/categoria');
        $request = $req->withParsedBody($params);
        $response = $this->getAppInstance()->handle($request);

        $result = (string) $response->getBody();

        self::$id = json_decode($result)->id;

        $this->assertEquals(201, $response->getStatusCode());
        $this->assertStringContainsString('id', $result);
        $this->assertStringNotContainsString('error', $result);
    }

    public function testGetAll(): void
    {
        $request = $this->createRequest('GET', '/categoria');
        $response = $this->getAppInstance()->handle($request);

        $result = (string) $response->getBody();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertStringContainsString('id', $result);
        $this->assertStringNotContainsString('error', $result);
    }

    public function testGetOne(): void
    {
        $request = $this->createRequest('GET', '/categoria/' . self::$id);
        $response = $this->getAppInstance()->handle($request);

        $result = (string) $response->getBody();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertStringContainsString('id', $result);
        $this->assertStringNotContainsString('error', $result);
    }

    public function testGetOneNotFound(): void
    {
        $request = $this->createRequest('GET', '/categoria/123456789');
        $response = $this->getAppInstance()->handle($request);

        $result = (string) $response->getBody();

        $this->assertEquals(404, $response->getStatusCode());
        $this->assertStringContainsString('error', $result);
    }

    public function testUpdate(): void
    {
        $req = $this->createRequest('PUT', '/categoria/' . self::$id);
        $request = $req->withParsedBody(['' => '']);
        $response = $this->getAppInstance()->handle($request);

        $result = (string) $response->getBody();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertStringContainsString('id', $result);
        $this->assertStringNotContainsString('error', $result);
    }

    public function testDelete(): void
    {
        $request = $this->createRequest('DELETE', '/categoria/' . self::$id);
        $response = $this->getAppInstance()->handle($request);

        $result = (string) $response->getBody();

        $this->assertEquals(204, $response->getStatusCode());
        $this->assertStringNotContainsString('error', $result);
    }
}
