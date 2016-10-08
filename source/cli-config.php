<?php

require_once __DIR__ . "/vendor/autoload.php";

use Doctrine\ORM\EntityManager;

$configPath = file_exists(__DIR__ . '/doctrine-config.php') ? __DIR__ . '/doctrine-config.php' : __DIR__ . '/doctrine-config.php.dist';
$config = require $configPath;

$metaConfig = call_user_func($config['metadata']['configCallable'], $config['metadata']['paths'], $config['metadata']['devMode']);

$entityManager = EntityManager::create($config['connection'], $metaConfig);

return new \Symfony\Component\Console\Helper\HelperSet(array(
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($entityManager),
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($entityManager->getConnection()),
));
