<?php

return [
    \Articus\PathHandler\RouteInjection\Factory::class => [
        'paths' => [
            '/openapi/Butler/v1' => [
                \Butler\OpenAPI\V1\Server\Handler\Greet::class,
                \Butler\OpenAPI\V1\Server\Handler\GreetId::class,
                \Butler\OpenAPI\V1\Server\Handler\Greetings::class,
            ],
        ],
    ],
    'dependencies' => [
        'invokables' => [
            \Butler\OpenAPI\V1\Server\Rest\Buttler::class => \Butler\OpenAPI\V1\Server\Rest\Buttler::class,
            \Butler\OpenAPI\V1\Server\Rest\ButtlerREST::class => \Butler\OpenAPI\V1\Server\Rest\ButtlerREST::class,
        ],
    ],
];