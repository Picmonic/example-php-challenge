<?php


namespace Tests\Unit\Controllers;


use JeremyGiberson\Controllers\MvcTopCommits;
use JeremyGiberson\Models\Commit;
use JeremyGiberson\Services\CommitsServiceInterface;
use Prophecy\Prophecy\ObjectProphecy;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\PhpRenderer;

class MvcTopCommitsTest extends \PHPUnit_Framework_TestCase
{
    /** @var  ObjectProphecy */
    private $rendererProphecy;
    /** @var  ObjectProphecy */
    private $serviceProphecy;
    /** @var  MvcTopCommits */
    private $sut;
    public function setUp()
    {
        parent::setUp();

        $this->serviceProphecy = $this->prophesize(CommitsServiceInterface::class);
        $this->rendererProphecy = $this->prophesize(PhpRenderer::class);
        /** @var CommitsServiceInterface $service */
        $service = $this->serviceProphecy->reveal();
        /** @var PhpRenderer $renderer */
        $renderer = $this->rendererProphecy->reveal();

        $this->sut = new MvcTopCommits($renderer, $service);
    }

    public function testRenderedResponseIsReturned()
    {
        $requestMock = $this->getMockBuilder(ServerRequestInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
        $responseMock = $this->getMockBuilder(ResponseInterface::class)->getMock();
        $renderedResponseMock = $this->getMockBuilder(ResponseInterface::class)->getMock();

        $this->serviceProphecy->getLatestCommits()->willReturn(
            $commits = [new Commit()]);

        $this->rendererProphecy->render(
            $responseMock,
            MvcTopCommits::VIEW,
            ['commits' => $commits])
        ->shouldBeCalled()
        ->willReturn($renderedResponseMock);

        $returnedResponse = $this->sut->__invoke($requestMock, $responseMock);
        self::assertEquals($renderedResponseMock, $returnedResponse);
    }
}
