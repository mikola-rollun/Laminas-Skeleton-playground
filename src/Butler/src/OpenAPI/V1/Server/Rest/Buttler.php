<?php

namespace Butler\OpenAPI\V1\Server\Rest;

use Articus\DataTransfer\Service as DataTransferService;
use OpenAPI\Server\Rest\Base7Abstract;
use Psr\Log\LoggerInterface;
use rollun\dic\InsideConstruct;

/**
 * Class Buttler
 */
class Buttler extends Base7Abstract
{
	public const CONTROLLER_OBJECT = \Butler\Controllers\Buttler1Controller::class;

	/** @var object */
	protected $controllerObject;

	/** @var LoggerInterface */
	protected $logger;

	/** @var DataTransferService */
	protected $dataTransfer;


	/**
	 * Buttler constructor.
	 *
	 * @param mixed $controllerObject
	 * @param LoggerInterface|null logger
	 * @param DataTransferService|null dataTransfer
	 *
	 * @throws \ReflectionException
	 */
	public function __construct($controllerObject = null, $logger = null, $dataTransfer = null)
	{
		InsideConstruct::init([
		    'controllerObject' => static::CONTROLLER_OBJECT,
		    'logger' => LoggerInterface::class,
		    'dataTransfer' => DataTransferService::class
		]);
	}


	/**
	 * @param \Butler\OpenAPI\V1\DTO\GreetRequesterQueryData $queryData
	 */
	public function greetRequester(\Butler\OpenAPI\V1\DTO\GreetRequesterQueryData $queryData)
	{
		if (method_exists($this->controllerObject, 'greetRequester')) {
		    return $this->controllerObject->greetRequester($queryData);
		}

		throw new \Exception('Not implemented method');
	}
}
