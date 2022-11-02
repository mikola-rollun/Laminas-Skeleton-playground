<?php

use rollun\callback\Callback\Factory\SerializedCallbackAbstractFactory;
use App\Callbacks\OrdersResolver;
use App\Callbacks\OrdersResolverFactory;
use rollun\callback\Callback\Interrupter\Factory\InterruptAbstractFactoryAbstract;
use rollun\callback\Callback\Interrupter\Factory\ProcessAbstractFactory;
use rollun\callback\Callback\Factory\CallbackAbstractFactoryAbstract;
use rollun\callback\Callback\Factory\MultiplexerAbstractFactory;
use rollun\callback\Callback\Multiplexer;
use rollun\callback\Callback\Interrupter\Process;

return [
    'dependencies' => [
        'factories' => [
            OrdersResolver::class => OrdersResolverFactory::class
        ],
    ],
    SerializedCallbackAbstractFactory::class => [
        'resolve5Orders' => [OrdersResolver::class, 'resolve5Orders'],
    ],
    InterruptAbstractFactoryAbstract::KEY => [
        'resolve5OrdersProcessInterrupter' => [
            ProcessAbstractFactory::KEY_CLASS => Process::class,
            ProcessAbstractFactory::KEY_CALLBACK_SERVICE => 'resolve5Orders',
        ],
    ],
    CallbackAbstractFactoryAbstract::KEY => [
        // 'multiplexer' - имя мультиплексера
        'resolve5Orders5Times' => [
            MultiplexerAbstractFactory::KEY_CLASS => Multiplexer::class,
            MultiplexerAbstractFactory::KEY_CALLBACKS_SERVICES => [
                'resolve5OrdersProcessInterrupter',
                'resolve5OrdersProcessInterrupter',
                'resolve5OrdersProcessInterrupter',
                'resolve5OrdersProcessInterrupter',
                'resolve5OrdersProcessInterrupter'
            ]
        ]
    ]
];