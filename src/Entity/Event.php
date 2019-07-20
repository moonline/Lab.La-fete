<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EventRepository")
 */
class Event
{
    /**
     * @ORM\Id
     * @ORM\Column(length=255)
     */
    private $id;
    
    /**
     * @ORM\Column(length=255, nullable=true)
     */
    private $publicId;

    /**
     * @ORM\Column(length=255, nullable=true)
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;
    
    /**
     * @ORM\Column(length=255, nullable=true)
     */
    private $organizer;


    public function __construct($title, $description, $organizer)
    {
        $this->id = Uuid::uuid4();
        $this->publicId = Uuid::uuid4();

        $this->title = $title;
        $this->description = $description;
        $this->organizer = $organizer;
    }


    public function getId()
    {
        return $this->id;
    }
        
    public function getPublicId()
    {
        return $this->publicId;
    }
    
    public function getTitle()
    {
        return $this->title;
    }
    
    public function setTitle($title)
    {
        $this->title = $title;
    }


    public function getDescription()
    {
        return $this->description;
    }
    
    public function setDescription($description)
    {
        $this->description = $description;
    }
    

    public function getOrganizer()
    {
        return $this->organizer;
    }
    
    public function setOrganizer($organizer)
    {
        $this->organizer = $organizer;
    }
}
