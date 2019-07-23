<?php
namespace App\Tests\Util;

use PHPUnit\Framework\TestCase;

use App\Tests\Stubs\UuidStub;
use App\Entity\Event;


class EntityTest extends TestCase
{
	protected function setUp() {
		UuidStub::$index = 1000;
	}

    public function testCreate()
    {
		$event = new Event("A title", "A description", "An organizer", UuidStub::class);

        $this->assertEquals(1001, $event->getId());
        $this->assertEquals(1002, $event->getEditKey());
        $this->assertEquals("A title", $event->getTitle());
        $this->assertEquals("A description", $event->getDescription());
        $this->assertEquals("An organizer", $event->getOrganizer());
    }
}
