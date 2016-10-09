<?php


namespace JeremyGiberson\Controllers;


use JeremyGiberson\Services\CommitsServiceInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\PhpRenderer;

class MvcTopCommits
{
    /** @var  PhpRenderer */
    private $renderer;
    /** @var  CommitsServiceInterface */
    private $commitsService;

    const VIEW = 'commits.phtml';
    /**
     * MvcTopCommits constructor.
     * @param PhpRenderer $renderer
     * @param CommitsServiceInterface $commitsService
     */
    public function __construct(PhpRenderer $renderer, CommitsServiceInterface $commitsService)
    {
        $this->renderer = $renderer;
        $this->commitsService = $commitsService;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response)
    {
        $commits = $this->commitsService->getLatestCommits();

        return $this->renderer->render($response, self::VIEW, ['commits' => $commits]);
    }
}