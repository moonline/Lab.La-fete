<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Event;

class EventController extends AbstractController
{
	/**
     * @Route("/events/{id}", name="event_show")
     */
    public function show(Event $event)
    {
        return $this->render('events/show.html.twig', [
            'event' => $event,
        ]);
    }
}
