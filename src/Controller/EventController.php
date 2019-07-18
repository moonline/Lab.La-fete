<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Entity\Event;

class EventController extends AbstractController
{
	/**
	 * @Route("/events/1")
	 */
    public function detail()
    {
		$event = new Event("James Bond Movie Night", "Watch James Bond - Die another day!", "Moonlight");

		return $this->render('events/detail.html.twig', [
            'event' => $event,
        ]);
    }
}
