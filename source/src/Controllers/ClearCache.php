<?php


namespace JeremyGiberson\Controllers;


use JeremyGiberson\Repositories\CommitRepositoryInterface;
use JeremyGiberson\Services\GithubRepoCommitsService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ClearCache
{
    /** @var  CommitRepositoryInterface */
    private $commitsRepository;
    /** @var  GithubRepoCommitsService */
    private $commitsService;

    /**
     * ClearCache constructor.
     * @param CommitRepositoryInterface $commitsRepository
     * @param GithubRepoCommitsService $commitsService
     */
    public function __construct(CommitRepositoryInterface $commitsRepository, GithubRepoCommitsService $commitsService)
    {
        $this->commitsRepository = $commitsRepository;
        $this->commitsService = $commitsService;
    }


    public function __invoke(ServerRequestInterface $request, ResponseInterface $response)
    {
        $commits = $this->commitsService->getLatestCommits();
        $this->commitsRepository->addCommits($commits);

        return $response->withStatus(302, 'cache has been cleared')
            ->withAddedHeader('Location', '/');
    }
}