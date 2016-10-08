<?php
// DIC configuration

use Slim\Container;

$container = $app->getContainer();

// view renderer
$container['renderer'] = function (Container $c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function (Container $c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

// controllers
$container[\JeremyGiberson\Controllers\MvcTopCommits::class] = function (Container $c) {
    $renderer = $c->get('renderer');
    $service = new \JeremyGiberson\Services\CommitsStub();
    return new \JeremyGiberson\Controllers\MvcTopCommits($renderer, $service);
};
