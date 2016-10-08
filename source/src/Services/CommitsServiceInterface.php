<?php


namespace JeremyGiberson\Services;


use JeremyGiberson\Models\Commit;

interface CommitsServiceInterface
{
    /**
     * @param int $max
     * @return Commit[]
     */
    public function getLatestCommits($max = 25);
}