<?php

namespace Butler\Controllers;

use Psr\Log\LoggerInterface;

class Buttler1Controller {

    private $logger;

    function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function greetRequester(\Butler\OpenAPI\V1\DTO\GreetRequesterQueryData $queryData) {
        // Todo VALIDATE
        $this->logger->info("$queryData->name greeted us. So polite :D");

        return [
            'data' => [
                "message" => "Hello, " . $queryData->name . "! It's a nice day outside!"
            ]
        ];
    }
}
