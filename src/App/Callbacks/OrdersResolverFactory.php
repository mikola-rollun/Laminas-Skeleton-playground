<?php

namespace App\Callbacks;

use Psr\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
// use Psr\Log\LoggerInterface;

class OrdersResolverFactory implements FactoryInterface {
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $dataStore = $container->get('dataStore');
        return new OrdersResolver($dataStore);
    }
}
