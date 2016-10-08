<?php


namespace JeremyGiberson\Services;


use Github\Api\Repository\Commits;
use Github\ResultPager;
use JeremyGiberson\Models\Commit;

class GithubRepoCommitsService implements CommitsServiceInterface
{
    /** @var  string */
    private $userOrOrg;
    /** @var  string */
    private $repository;
    /** @var  string */
    private $branch;
    /** @var  Commits */
    private $api;
    /** @var  ResultPager */
    private $pager;

    /**
     * GithubRepoCommitsService constructor.
     * @param string $userOrOrg
     * @param string $repository
     * @param string $branch
     * @param Commits $api
     * @param ResultPager $pager
     */
    public function __construct($userOrOrg, $repository, $branch, Commits $api, ResultPager $pager)
    {
        $this->userOrOrg = $userOrOrg;
        $this->repository = $repository;
        $this->branch = $branch;
        $this->api = $api;
        $this->pager = $pager;
    }


    /**
     * @param int $max
     * @return Commit[]
     */
    public function getLatestCommits($max = 25)
    {

        $commits = [];

        do {
            $result = $this->pager->fetch($this->api, 'all', [
                $this->userOrOrg,
                $this->repository,
                ['sha' => $this->branch]
            ]);

            foreach($result as $commitData) {
                $commits[] = Commit::factory($commitData['sha'],
                    $commitData['commit']['author']['name'],
                    new \DateTime($commitData['commit']['author']['date']),
                    $commitData['commit']['committer']['name'],
                    new \DateTime($commitData['commit']['committer']['date'])
                    );

                if (count($commits) >= $max) {
                    return $commits;
                }
            }

        } while ($this->pager->hasNext());
        return $commits;
    }
}