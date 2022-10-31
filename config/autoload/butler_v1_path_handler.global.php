<?php

return [
    \Articus\PathHandler\RouteInjection\Factory::class => [
        'paths' => [
            '/openapi/Butler/v1' => [
                \Butler\OpenAPI\V1\Server\Handler\Greetings::class,
            ],
        ],
    ],
    'dependencies' => [
        'factories' => [
            \Butler\Controllers\Buttler1Controller::class => \Butler\Controllers\Buttler1ControllerFactory::class
        ],
        'invokables' => [
            \Butler\OpenAPI\V1\Server\Rest\Buttler::class => \Butler\OpenAPI\V1\Server\Rest\Buttler::class,
        ],
    ],
];