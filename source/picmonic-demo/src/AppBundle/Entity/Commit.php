<?php // src/AppBundle/Entity/Commit.php
namespace AppBundle\Entity;

class Commit {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $sha;

    /**
     * @var string
     */
    private $author_name;

    /**
     * @var string
     */
    private $author_email;

    /**
     * @var integer
     */
    private $author_id;

    /**
     * @var string
     */
    private $committer_name;

    /**
     * @var string
     */
    private $committer_email;

    /**
     * @var integer
     */
    private $committer_id;

    /**
     * @var string
     */
    private $tree_sha;

    /**
     * @var string
     */
    private $tree_url;

    /**
     * @var string
     */
    private $message;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $html_url;

    /**
     * @var integer
     */
    private $comments;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set sha
     *
     * @param string $sha
     *
     * @return Commit
     */
    public function setSha($sha)
    {
        $this->sha = $sha;

        return $this;
    }

    /**
     * Get sha
     *
     * @return string
     */
    public function getSha()
    {
        return $this->sha;
    }

    /**
     * Set authorName
     *
     * @param string $authorName
     *
     * @return Commit
     */
    public function setAuthorName($authorName)
    {
        $this->author_name = $authorName;

        return $this;
    }

    /**
     * Get authorName
     *
     * @return string
     */
    public function getAuthorName()
    {
        return $this->author_name;
    }

    /**
     * Set authorEmail
     *
     * @param string $authorEmail
     *
     * @return Commit
     */
    public function setAuthorEmail($authorEmail)
    {
        $this->author_email = $authorEmail;

        return $this;
    }

    /**
     * Get authorEmail
     *
     * @return string
     */
    public function getAuthorEmail()
    {
        return $this->author_email;
    }

    /**
     * Set authorId
     *
     * @param integer $authorId
     *
     * @return Commit
     */
    public function setAuthorId($authorId)
    {
        $this->author_id = $authorId;

        return $this;
    }

    /**
     * Get authorId
     *
     * @return integer
     */
    public function getAuthorId()
    {
        return $this->author_id;
    }

    /**
     * Set committerName
     *
     * @param string $committerName
     *
     * @return Commit
     */
    public function setCommitterName($committerName)
    {
        $this->committer_name = $committerName;

        return $this;
    }

    /**
     * Get committerName
     *
     * @return string
     */
    public function getCommitterName()
    {
        return $this->committer_name;
    }

    /**
     * Set committerEmail
     *
     * @param string $committerEmail
     *
     * @return Commit
     */
    public function setCommitterEmail($committerEmail)
    {
        $this->committer_email = $committerEmail;

        return $this;
    }

    /**
     * Get committerEmail
     *
     * @return string
     */
    public function getCommitterEmail()
    {
        return $this->committer_email;
    }

    /**
     * Set committerId
     *
     * @param integer $committerId
     *
     * @return Commit
     */
    public function setCommitterId($committerId)
    {
        $this->committer_id = $committerId;

        return $this;
    }

    /**
     * Get committerId
     *
     * @return integer
     */
    public function getCommitterId()
    {
        return $this->committer_id;
    }

    /**
     * Set treeSha
     *
     * @param string $treeSha
     *
     * @return Commit
     */
    public function setTreeSha($treeSha)
    {
        $this->tree_sha = $treeSha;

        return $this;
    }

    /**
     * Get treeSha
     *
     * @return string
     */
    public function getTreeSha()
    {
        return $this->tree_sha;
    }

    /**
     * Set treeUrl
     *
     * @param string $treeUrl
     *
     * @return Commit
     */
    public function setTreeUrl($treeUrl)
    {
        $this->tree_url = $treeUrl;

        return $this;
    }

    /**
     * Get treeUrl
     *
     * @return string
     */
    public function getTreeUrl()
    {
        return $this->tree_url;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return Commit
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Commit
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set htmlUrl
     *
     * @param string $htmlUrl
     *
     * @return Commit
     */
    public function setHtmlUrl($htmlUrl)
    {
        $this->html_url = $htmlUrl;

        return $this;
    }

    /**
     * Get htmlUrl
     *
     * @return string
     */
    public function getHtmlUrl()
    {
        return $this->html_url;
    }

    /**
     * Set comments
     *
     * @param integer $comments
     *
     * @return Commit
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return integer
     */
    public function getComments()
    {
        return $this->comments;
    }
    /**
     * @var \DateTime
     */
    private $commit_date;


    /**
     * Set commitDate
     *
     * @param \DateTime $commitDate
     *
     * @return Commit
     */
    public function setCommitDate($commitDate)
    {
        $this->commit_date = $commitDate;

        return $this;
    }

    /**
     * Get commitDate
     *
     * @return \DateTime
     */
    public function getCommitDate()
    {
        return $this->commit_date;
    }
    /**
     * @var string
     */
    private $committer_avatar;


    /**
     * Set committerAvatar
     *
     * @param string $committerAvatar
     *
     * @return Commit
     */
    public function setCommitterAvatar($committerAvatar)
    {
        $this->committer_avatar = $committerAvatar;

        return $this;
    }

    /**
     * Get committerAvatar
     *
     * @return string
     */
    public function getCommitterAvatar()
    {
        return $this->committer_avatar;
    }
    /**
     * @var string
     */
    private $committer_login;


    /**
     * Set committerLogin
     *
     * @param string $committerLogin
     *
     * @return Commit
     */
    public function setCommitterLogin($committerLogin)
    {
        $this->committer_login = $committerLogin;

        return $this;
    }

    /**
     * Get committerLogin
     *
     * @return string
     */
    public function getCommitterLogin()
    {
        return $this->committer_login;
    }
    /**
     * @var string
     */
    private $author_avatar;

    /**
     * @var string
     */
    private $author_login;


    /**
     * Set authorAvatar
     *
     * @param string $authorAvatar
     *
     * @return Commit
     */
    public function setAuthorAvatar($authorAvatar)
    {
        $this->author_avatar = $authorAvatar;

        return $this;
    }

    /**
     * Get authorAvatar
     *
     * @return string
     */
    public function getAuthorAvatar()
    {
        return $this->author_avatar;
    }

    /**
     * Set authorLogin
     *
     * @param string $authorLogin
     *
     * @return Commit
     */
    public function setAuthorLogin($authorLogin)
    {
        $this->author_login = $authorLogin;

        return $this;
    }

    /**
     * Get authorLogin
     *
     * @return string
     */
    public function getAuthorLogin()
    {
        return $this->author_login;
    }
}
