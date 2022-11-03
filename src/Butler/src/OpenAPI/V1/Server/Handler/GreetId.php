<?php
declare(strict_types=1);


namespace Butler\OpenAPI\V1\Server\Handler;

use Articus\PathHandler\Annotation as PHA;
use Articus\PathHandler\Consumer as PHConsumer;
use Articus\PathHandler\Producer as PHProducer;
use Articus\PathHandler\Attribute as PHAttribute;
use Articus\PathHandler\Exception as PHException;
use OpenAPI\Server\Producer\Transfer;
use OpenAPI\Server\Handler\AbstractHandler;
use OpenAPI\Server\Rest\RestInterface;
use Psr\Http\Message\ServerRequestInterface;
use rollun\dic\InsideConstruct;

/**
 * @PHA\Route(pattern="/greet/{id:0|(?:-?[1-9][0-9]*)}")
 */
class GreetId extends AbstractHandler
{
    /**
     * ATTENTION! REST_OBJECT should be declared in service manager
     */
    public const REST_OBJECT = \Butler\OpenAPI\V1\Server\Rest\ButtlerREST::class;

    /**
     * GreetId constructor.
     *
     * @param RestInterface|null $restObject
     *
     * @throws \ReflectionException
     */
    public function __construct(RestInterface $restObject = null)
    {
        InsideConstruct::init(['restObject' => self::REST_OBJECT]);
    }

    /**
     * @PHA\Delete()
     * @PHA\Producer(name=Transfer::class, mediaType="application/json", options={"responseType":\Butler\OpenAPI\V1\DTO\Greet::class})
     * @param ServerRequestInterface $request
     *
     * @return array
     */
    public function deleteGreetById(ServerRequestInterface $request)
    {
        return $this->runAction($request, 'Delete()', 'deleteGreetById');
    }
    /**
     * @PHA\Get()
     * @PHA\Producer(name=Transfer::class, mediaType="application/json", options={"responseType":\Butler\OpenAPI\V1\DTO\Greet::class})
     * @param ServerRequestInterface $request
     *
     * @return array
     */
    public function getGreetById(ServerRequestInterface $request)
    {
        return $this->runAction($request, 'Get()', 'getGreetById');
    }
    /**
     * @PHA\Put()
     * @PHA\Consumer(name=PHConsumer\Json::class, mediaRange="application/json")
     * @PHA\Attribute(name=PHAttribute\Transfer::class, options={"type":\Butler\OpenAPI\V1\DTO\PostGreet::class,"objectAttr":"bodyData", "errorAttr":"errors"})
     * @PHA\Producer(name=Transfer::class, mediaType="application/json", options={"responseType":\Butler\OpenAPI\V1\DTO\Greet::class})
     * @param ServerRequestInterface $request
     *
     * @return array
     */
    public function updateGreetById(ServerRequestInterface $request)
    {
        return $this->runAction($request, 'Put()', 'updateGreetById');
    }
}
