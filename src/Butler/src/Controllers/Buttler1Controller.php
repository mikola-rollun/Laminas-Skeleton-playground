<?php

namespace Butler\Controllers;

use Psr\Log\LoggerInterface;
use Butler\OpenAPI\V1\DTO;

class Buttler1Controller {

    protected $logger;

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

    public function getGreetById($queryData) {
        $data = [
            "name" => "Mikola (" . $queryData . ")",
            "date_greeted" => "Just now"
        ];
		return $data;
    }

    public function createGreet(DTO\PostGreet $queryData) {
        $data = [
            "name" => $queryData->name,
            "date_greeted" => "Just now"
        ];
		return $data;
    }

    public function UpdateGreetById(DTO\PostGreet $queryData) {
        $data = [
            "name" => $queryData->name,
            "date_greeted" => "Just now"
        ];
		return $data;
    }

    public function DeleteGreetById($queryData) {
        $data = [
            "name" => "Mikola (" . $queryData . ")",
            "date_greeted" => "Just now"
        ];
		return $data;
    }
}
