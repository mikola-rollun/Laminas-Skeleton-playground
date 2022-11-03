<?php

namespace Butler\OpenAPI\V1\Client\Rest;

use OpenAPI\Client\Rest\BaseAbstract;

/**
 * Class Buttler
 */
class Buttler extends BaseAbstract
{
	public const API_NAME = '\Butler\OpenAPI\V1\Client\Api\ButtlerApi';

	/**
	 * @inheritDoc
	 */
	public function greetRequester($name)
	{
		// send request
		$data = $this->getApi()->greetRequester($name);

		// validation of response
		$result = $this->transfer((array)$data, \Butler\OpenAPI\V1\DTO\InlineResponse200::class);

		return $result;
	}


	/**
	 * @return \Butler\OpenAPI\V1\Client\Api\ButtlerApi
	 */
	protected function getApi(): \OpenAPI\Client\Api\ApiInterface
	{
		return $this->api;
	}
}
