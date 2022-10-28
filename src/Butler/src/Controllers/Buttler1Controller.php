<?php

namespace Butler\Controllers;

use Laminas\Diactoros\Response\HtmlResponse;

class Buttler1Controller {
    public function greetRequester(\Butler\OpenAPI\V1\DTO\GreetRequesterQueryData $queryData) {
        // Todo VALIDATE
        return [
            'data' => [
                "message" => "Hello, " . $queryData->name . "! It's a nice day outside!"
            ]
        ];
    }
}
