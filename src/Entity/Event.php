<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Michelf\Markdown;

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
     * @ORM\Column(length=255)
     */
    private $editKey;

    /**
     * @ORM\Column(length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $description;
    
    /**
     * @ORM\Column(length=255)
     */
    private $organizer;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comment", mappedBy="event")
     */
    private $comments;


    public function __construct($title = "", $description = "", $organizer = "", $uuidService = Uuid::class)
    {
        $this->id = $uuidService::uuid4();
        $this->editKey = $uuidService::uuid4();

        $this->title = $title;
        $this->description = $description;
        $this->organizer = $organizer;
        $this->comments = new ArrayCollection();
    }


    public function getId(): ?string
    {
        return $this->id;
    }
        
    public function getEditKey(): ?string
    {
        return $this->editKey;
    }
    
    public function getTitle(): ?string
    {
        return $this->title;
    }
    
    public function setTitle($title): self
    {
        $this->title = $title;
    }


    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getFormattedDescription(): ?string
    {
        return Markdown::defaultTransform($this->description);
    }
    
    public function setDescription($description): self
    {
        $this->description = $description;
    }
    

    public function getOrganizer(): ?string
    {
        return $this->organizer;
    }
    
    public function setOrganizer($organizer): self
    {
        $this->organizer = $organizer;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setEvent($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->contains($comment)) {
            $this->comments->removeElement($comment);
            // set the owning side to null (unless already changed)
            if ($comment->getEvent() === $this) {
                $comment->setEvent(null);
            }
        }

        return $this;
    }
}
