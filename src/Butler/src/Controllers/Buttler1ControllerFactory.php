<?php

namespace Butler\Controllers;

use Psr\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Log\LoggerInterface;

class Buttler1ControllerFactory implements FactoryInterface {
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $logger = $container->get(LoggerInterface::class);
        return new Buttler1Controller($logger);
    }
}
