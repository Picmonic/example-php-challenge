<?php


namespace JeremyGiberson\Models;

/**
 * Class Commit
 * @Entity
 */
class Commit
{
    /** @var  string */
    private $sha;
    /** @var  string */
    private $author;
    /** @var  \DateTime */
    private $authored_date;
    /** @var  string */
    private $committer;
    /** @var  \DateTime */
    private $committed_date;

    public static function factory($sha, $author, \DateTime $author_date, $committer, \DateTime $committer_date) {
        $instance = new self();
        $instance->sha = $sha;
        $instance->author = $author;
        $instance->authored_date = $author_date;
        $instance->committer = $committer;
        $instance->committed_date = $committer_date;
        return $instance;
    }

    /**
     * @return string
     */
    public function getSha()
    {
        return $this->sha;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return \DateTime
     */
    public function getAuthoredDate()
    {
        return $this->authored_date;
    }

    /**
     * @return string
     */
    public function getCommitter()
    {
        return $this->committer;
    }

    /**
     * @return \DateTime
     */
    public function getCommittedDate()
    {
        return $this->committed_date;
    }


}