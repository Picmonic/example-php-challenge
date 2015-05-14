<?php

/*
 * This file is part of Laravel GitHub.
 *
 * (c) Graham Campbell <graham@mineuk.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GrahamCampbell\GitHub\Factories;

use Github\Client;
use Github\HttpClient\CachedHttpClient;
use GrahamCampbell\GitHub\Authenticators\AuthenticatorFactory;

/**
 * This is the github factory class.
 *
 * @author Graham Campbell <graham@mineuk.com>
 */
class GitHubFactory
{
    /**
     * The authenticator factory instance.
     *
     * @var \GrahamCampbell\GitHub\Authenticators\AuthenticatorFactory
     */
    protected $auth;

    /**
     * The cache path.
     *
     * @var string
     */
    protected $path;

    /**
     * Create a new github factory instance.
     *
     * @param string $path
     *
     * @return void
     */
    public function __construct(AuthenticatorFactory $auth, $path)
    {
        $this->auth = $auth;
        $this->path = $path;
    }

    /**
     * Make a new github client.
     *
     * @param string[] $config
     *
     * @return \Github\Client
     */
    public function make(array $config)
    {
        $http = $this->getHttpClient();

        return $this->getClient($http, $config);
    }

    /**
     * Get the http client.
     *
     * @return \Github\HttpClient\CachedHttpClient
     */
    protected function getHttpClient()
    {
        return new CachedHttpClient(['cache_dir' => $this->path]);
    }

    /**
     * Get the main client.
     *
     * @param \Github\HttpClient\CachedHttpClient $http
     * @param string[]                            $config
     *
     * @return \Github\Client
     */
    protected function getClient(CachedHttpClient $http, array $config)
    {
        $client = new Client($http);

        return $this->auth->make(array_get($config, 'method'))->with($client)->authenticate($config);
    }
}
