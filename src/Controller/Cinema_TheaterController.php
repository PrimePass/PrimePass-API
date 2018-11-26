<?php

namespace App\Controller;

use GuzzleHttp\Client;
use App\Entity\Cinema;
use App\Entity\Theater;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class Cinema_TheaterController extends AbstractController
{
    /**
     * @Route("/cinema_theater", name="cinema_theater")
    */
    public function Cinema_Theater(Request $request)
    {   
        $client = new Client();

        $res = $client->request('GET','https://api-content.ingresso.com/v0/theaters');

        $arrayContent = json_decode($res->getBody());
       
        foreach ($arrayContent as $value)
        {
            $entityManager = $this->getDoctrine()->getManager();

            $cinema_name = $value->corporation;
            $cinema_is_active = 0;

            $theater_booking_cinema = 'ingresso';
            $theater_booking_id = $value->id;
            
            if($cinema_tag = $entityManager->getRepository('App:Cinema')->findOneByName($cinema_name) == null) {
                $cinema = new cinema();
                $cinema->setName($cinema_name);
                $cinema->setIsActive($cinema_is_active);
                $cinema->setCreatedAt(new \DateTime('now'));
                $cinema->setUpdatedAt(new \DateTime('now'));
                $entityManager->persist($cinema);

                $theater = new theater();
                $theater->setCinema($cinema);
                $theater->setBookingCinema($theater_booking_cinema);
                $theater->setBookingId($theater_booking_id);
                $entityManager->persist($theater);

                $entityManager->flush();
                
            } else {
                $theater = new theater();
                $theater->setCinema($cinema);
                $theater->setBookingCinema($theater_booking_cinema);
                $theater->setBookingId($theater_booking_id);
                $entityManager->persist($theater);
                
                $entityManager->flush();
            }

        }
        echo 'OK!';
    }
}