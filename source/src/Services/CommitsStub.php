<?php


namespace JeremyGiberson\Services;


use JeremyGiberson\Models\Commit;

class CommitsStub implements CommitsServiceInterface
{

    /**
     * @param int $max
     * @return Commit[]
     */
    public function getLatestCommits($max = 25)
    {
        return [];
    }
}