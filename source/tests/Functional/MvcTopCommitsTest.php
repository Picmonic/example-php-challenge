<?php

namespace Tests\Functional;

class MvcTopCommitsTest extends BaseTestCase
{
    /**
     * Test that the index route returns a rendered response containing the text 'SlimFramework' but not a greeting
     */
    public function testGetTopCommits()
    {
        $response = $this->runApp('GET', '/');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains('Top 25 Commits', (string)$response->getBody());
    }
}