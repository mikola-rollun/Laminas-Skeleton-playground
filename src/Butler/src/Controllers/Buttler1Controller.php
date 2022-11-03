<?php

namespace Butler\Controllers;

use Psr\Log\LoggerInterface;
use Butler\OpenAPI\V1\DTO;

class Buttler1Controller {

    private $logger;

    function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function greetRequester(DTO\GreetRequesterQueryData $queryData) {
        // Todo VALIDATE
        $this->logger->info("$queryData->name greeted us. So polite :D");

        return [
            'data' => [
                "message" => "Hello, " . $queryData->name . "! It's a nice day outside!"
            ]
        ];
    }

    public function getGreetById() {
        // echo 123;
        // die();
    }

    public function createGreet(DTO\PostGreet $queryData) {
        $q = $queryData;

        // echo 123;
        // die();
    }

    public function UpdateGreetById(DTO\PostGreet $queryData) {
        // echo 123;
        // die();
    }

    public function DeleteGreetById($queryData) {
        // echo 123;
        // die();
    }
}
