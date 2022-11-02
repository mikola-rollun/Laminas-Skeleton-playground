<?php
use Psr\Container\ContainerInterface;
use Laminas\Db\Adapter\Adapter;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

// Миграции которые нужно запустить
$migrations = [
    'migrations/01.11.2022-init.sql',
];

/** @var ContainerInterface $container */
$container = require 'config/container.php';

/** @var Adapter $db */
$db = $container->get('db');

$db->query('DROP DATABASE butler;', Adapter::QUERY_MODE_EXECUTE);
$db->query('CREATE DATABASE butler;', Adapter::QUERY_MODE_EXECUTE);

foreach ($migrations as $migration) {

    $db->query(file_get_contents($migration), Adapter::QUERY_MODE_EXECUTE);
}