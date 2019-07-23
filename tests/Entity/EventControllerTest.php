<?php
namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class EventControllerTest extends WebTestCase
{	
    public function testShowEvent()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/events/19541686-a35f');

		$this->assertEquals(200, $client->getResponse()->getStatusCode());
		$this->assertSelectorTextContains('.content-article .panel-heading h2', 'Test title');
		$this->assertSelectorTextContains('.content-article .panel-body p', 'Test description');
		$this->assertSelectorTextContains('.content-article .panel-footer p', 'Test organizer');
    }
}