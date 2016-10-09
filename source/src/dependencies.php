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
    if(getenv('GITHUB_TOKEN')){
        $client->authenticate(getenv('GITHUB_TOKEN'), null, \Github\Client::AUTH_URL_TOKEN);
    }

    $api = $client->api('repo')->commits();
    $paginator  = new \Github\ResultPager( $client );

    return new \JeremyGiberson\Services\GithubRepoCommitsService('nodejs', 'node', 'master', $api, $paginator);
};

// entity manager
$container['em'] = function (Container $c) {
    $configPath = file_exists(__DIR__ . '/../doctrine-config.php') ? __DIR__ . '/../doctrine-config.php' : __DIR__ . '/../doctrine-config.php.dist';
    $config = require $configPath;
    $metaConfig = call_user_func($config['metadata']['configCallable'], $config['metadata']['paths'], $config['metadata']['devMode']);
    return \Doctrine\ORM\EntityManager::create($config['connection'], $metaConfig);
};

// repositories
$container['commits_repository'] = function (Container $c) {
    /** @var \Doctrine\ORM\EntityManager $em */
    $em = $c->get('em');
    return $em->getRepository(\JeremyGiberson\Models\Commit::class);
};

// controllers
$container[\JeremyGiberson\Controllers\MvcTopCommits::class] = function (Container $c) {
    $renderer = $c->get('renderer');
    $service = $c->get('commits_repository');
    return new \JeremyGiberson\Controllers\MvcTopCommits($renderer, $service);
};

$container[\JeremyGiberson\Controllers\ClearCache::class] = function (Container $c) {
    $service = $c->get('github_commits_service');
    $repo = $c->get('commits_repository');
    return new \JeremyGiberson\Controllers\ClearCache($repo, $service);
};
