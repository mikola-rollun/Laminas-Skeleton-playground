<?php

namespace Butler\OpenAPI\V1\Server\Rest;

use Articus\DataTransfer\Service as DataTransferService;
use OpenAPI\Server\Rest\Base7Abstract;
use Psr\Log\LoggerInterface;
use rollun\dic\InsideConstruct;

/**
 * Class ButtlerREST
 */
class ButtlerREST extends Base7Abstract
{
	public const CONTROLLER_OBJECT = \Butler\Controllers\Buttler1Controller::class;

	/** @var object */
	protected $controllerObject;

	/** @var LoggerInterface */
	protected $logger;

	/** @var DataTransferService */
	protected $dataTransfer;


	/**
	 * ButtlerREST constructor.
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

		$q = 123;
	}


	/**
	 * @param \Butler\OpenAPI\V1\DTO\PostGreet $bodyData
	 */
	public function createGreet(\Butler\OpenAPI\V1\DTO\PostGreet $bodyData)
	{
		if (method_exists($this->controllerObject, 'createGreet')) {
		    return $this->controllerObject->createGreet($bodyData);
		}

		throw new \Exception('Not implemented method');
	}


	public function deleteGreetById()
	{
		if (method_exists($this->controllerObject, 'deleteGreetById')) {
		    return $this->controllerObject->deleteGreetById();
		}

		throw new \Exception('Not implemented method');
	}


	/**
	 * @param $id
	 */
	public function getGreetById($id)
	{
		if (method_exists($this->controllerObject, 'getGreetById')) {
		    return $this->controllerObject->getGreetById($id);
		}

		throw new \Exception('Not implemented method');
	}


	/**
	 * @param \Butler\OpenAPI\V1\DTO\PostGreet $bodyData
	 */
	public function updateGreetById(\Butler\OpenAPI\V1\DTO\PostGreet $bodyData)
	{
		if (method_exists($this->controllerObject, 'updateGreetById')) {
		    return $this->controllerObject->updateGreetById($bodyData);
		}

		throw new \Exception('Not implemented method');
	}
}
