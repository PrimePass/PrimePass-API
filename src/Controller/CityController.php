<?php

namespace App\Controller;

use GuzzleHttp\Client;
use App\Entity\City;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CityController extends AbstractController
{
    /**
     * @Route("/city", name="city")
    */
    public function City(Request $request)
    {   
        $client = new Client();

        $res = $client->request('GET','https://api-content.ingresso.com/v0/theaters');

        $arrayContent = json_decode($res->getBody());
       
        foreach ($arrayContent as $value)
        {
            $entityManager = $this->getDoctrine()->getManager();
    
            $city_name = $value->cityName;
            $city_state = $value->uf;
        
            $city = new City();
            $city->setName($city_name);
            $city->setState($city_state);

            $entityManager->persist($city);
            $entityManager->flush();

            echo 'OK!';
        }
    }
}