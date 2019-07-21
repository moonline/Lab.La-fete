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
    private $editKey;

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


    public function __construct($title = "", $description = "", $organizer = "", $uuidService = Uuid::class)
    {
        $this->id = $uuidService::uuid4();
        $this->editKey = $uuidService::uuid4();

        $this->title = $title;
        $this->description = $description;
        $this->organizer = $organizer;
    }


    public function getId()
    {
        return $this->id;
    }
        
    public function getEditKey()
    {
        return $this->editKey;
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
