<?php


namespace JeremyGiberson\Repositories;


use Doctrine\ORM\EntityRepository;
use JeremyGiberson\Models\Commit;
use JeremyGiberson\Services\CommitsServiceInterface;

class CommitRepository extends EntityRepository implements CommitRepositoryInterface, CommitsServiceInterface
{

    public function addCommits(array $commits)
    {
        /** @var Commit $commit */
        foreach($commits as $commit) {
            if (! $this->find($commit->getSha())) {
                $this->getEntityManager()->persist($commit);
            }
        }
        $this->getEntityManager()->flush();
    }

    /**
     * @param int $max
     * @return Commit[]
     */
    public function getLatestCommits($max = 25)
    {
        return $this->findBy([], ['committed_date' => 'ASC', 'author' => 'ASC']);
    }
}