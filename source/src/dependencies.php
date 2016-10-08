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

// github commits service
$container['github_commits_service'] = function (Container $c) {
    $client = new \Github\Client();
    $client->authenticate(getenv('GITHUB_TOKEN'), null, \Github\Client::AUTH_URL_TOKEN);

    $api = $client->api('repo')->commits();
    $paginator  = new \Github\ResultPager( $client );

    return new \JeremyGiberson\Services\GithubRepoCommitsService('nodejs', 'node', 'master', $api, $paginator);
};

// controllers
$container[\JeremyGiberson\Controllers\MvcTopCommits::class] = function (Container $c) {
    $renderer = $c->get('renderer');
    $service = $c->get('github_commits_service');
    return new \JeremyGiberson\Controllers\MvcTopCommits($renderer, $service);
};
