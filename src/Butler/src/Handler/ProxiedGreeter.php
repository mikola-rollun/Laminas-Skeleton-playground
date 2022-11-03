<?php
/**
 * @copyright Copyright © 2014 Rollun LC (http://rollun.com/)
 * @license LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Butler\Handler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Laminas\Diactoros\Response;
use rollun\dic\InsideConstruct;
use Butler\OpenAPI\V1\Client\Rest\Buttler;
use OpenAPI\Client\Rest\ClientInterface;

class ProxiedGreeter implements RequestHandlerInterface
{
    private Buttler $rest;

    public function __construct(Buttler $rest = null)
    {
        InsideConstruct::init(['rest' => Buttler::class]);
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        $this->rest->setHostIndex(1);
        $query = $request->getQueryParams();
        if (!isset($query['name'])) {
            return new Response\JsonResponse([]);
        }
        $result = $this->rest->greetRequester($query['name']);

        $result->data->message = $result->data->message . " Why didn't you greet me yourself?";

        return new Response\JsonResponse($result);
    }
}
