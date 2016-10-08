<?php


namespace Tests\Unit\Services;


use Github\Api\Repository\Commits;
use Github\ResultPager;
use JeremyGiberson\Models\Commit;
use JeremyGiberson\Services\GithubRepoCommitsService;
use Prophecy\Prophecy\ObjectProphecy;
use Prophecy\Argument;

class GithubRepoCommitsServiceTest extends \PHPUnit_Framework_TestCase
{
    const ORG = 'owner';
    const REPO = 'repository';
    const BRANCH = 'master';

    /** @var  GithubRepoCommitsService */
    private $sut;
    /** @var  ObjectProphecy */
    private $commitsProphecy;
    /** @var  ObjectProphecy */
    private $pagerProphecy;

    public function setUp()
    {
        parent::setUp();

        $this->commitsProphecy = $this->prophesize(Commits::class);
        $this->pagerProphecy = $this->prophesize(ResultPager::class);

        $commits = $this->commitsProphecy->reveal();
        $pager = $this->pagerProphecy->reveal();

        $this->sut = new GithubRepoCommitsService(
            self::ORG,
            self::REPO,
            self::BRANCH, $commits, $pager);
    }

    public function testReturnsArrayOfMarshalledCommits()
    {
        $this->pagerProphecy->fetch(
            Argument::any(),
            'all',
            [self::ORG, self::REPO, ['sha' => self::BRANCH]]
        )->willReturn([
            [
                'sha' => $sha = 'a1',
                'commit' => [
                    'author' => [
                        'name' => $author = 'Jeremy',
                        'date' => $authorDate = '2016-10-05 11:00:00'
                    ],
                    'committer' => [
                        'name' => $committer = 'Giberson',
                        'date' => $committerDate = '2016-10-07 13:43:00'
                    ]
                ]
            ]
        ]);

        $this->pagerProphecy->hasNext()->willReturn(false);

        $commits = $this->sut->getLatestCommits();
        self::assertEquals([
            Commit::factory($sha,
                $author,
                new \DateTime($authorDate),
                $committer,
                new \DateTime($committerDate))
        ], $commits);
    }

    public function testPagesResultsUntilMaxIsReached()
    {
        $this->pagerProphecy->fetch(
            Argument::any(),
            'all',
            [self::ORG, self::REPO, ['sha' => self::BRANCH]]
        )->willReturn([
            [
                'sha' => 'a1',
                'commit' => [
                    'author' => [
                        'name' => 'Jeremy',
                        'date' => '2016-10-05 11:00:00'
                    ],
                    'committer' => [
                        'name' => 'Giberson',
                        'date' => '2016-10-07 13:43:00'
                    ]
                ]
            ]
        ]);

        $this->pagerProphecy->hasNext()->willReturn(true);

        $commits = $this->sut->getLatestCommits($max = 3);
        self::assertCount($max, $commits);
    }

    public function testDoesNotPageResultIfMaxIsReached()
    {
        $this->pagerProphecy->fetch(
            Argument::any(),
            'all',
            [self::ORG, self::REPO, ['sha' => self::BRANCH]]
        )->willReturn([
            [
                'sha' => $sha = 'a1',
                'commit' => [
                    'author' => [
                        'name' => $author = 'Jeremy',
                        'date' => $authorDate = '2016-10-05 11:00:00'
                    ],
                    'committer' => [
                        'name' => $committer = 'Giberson',
                        'date' => $committerDate = '2016-10-07 13:43:00'
                    ]
                ]
            ],
            [
                'sha' => $sha = 'a2',
                'commit' => [
                    'author' => [
                        'name' => $author = 'Jeremy',
                        'date' => $authorDate = '2016-10-06 11:00:00'
                    ],
                    'committer' => [
                        'name' => $committer = 'Giberson',
                        'date' => $committerDate = '2016-10-08 13:43:00'
                    ]
                ]
            ]
        ]);

        $this->pagerProphecy->hasNext()->shouldNotBeCalled();

        $commits = $this->sut->getLatestCommits(1);
        self::assertCount(1, $commits);
    }

}
