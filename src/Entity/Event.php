<?php
namespace App\Entity;

class Event
{
	private $id;
	private $publicId;
	private $title;
	private $description;
	private $organizer;

	public function __construct($title, $description, $organizer) {
		$this->id = uniqid("event");		
		$this->publicId = uniqid();
		$this->title = $title;
		$this->description = $description;
		$this->organizer = $organizer;
	}

    public function getPublicId () {
        return $this->publicId;
	}
	
    public function getTitle () {
        return $this->title;
	}

    public function getDescription () {
        return $this->description;
	}
	
    public function getOrganizer () {
        return $this->organizer;
	}
}
