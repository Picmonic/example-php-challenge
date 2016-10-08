<?php


namespace JeremyGiberson\Models;

/**
 * Class Commit
 * @Entity(repositoryClass="JeremyGiberson\Repositories\CommitRepository")
 * @Table(name="commits")
 */
class Commit
{
    /**
     * @Id @Column(type="string", length=40)
     * @var  string */
    private $sha;
    /**
     * @Column(type="string", length=120)
     * @var  string */
    private $author;
    /**
     * @Column(type="datetime")
     * @var  \DateTime */
    private $authored_date;
    /**
     * @Column(type="string", length=120)
     * @var  string */
    private $committer;
    /**
     * @Column(type="datetime")
     * @var  \DateTime */
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