<?php

namespace App\Controller;

use GuzzleHttp\Client;
use App\Entity\Address;
use App\Entity\City;
use App\Entity\Cinema;
use App\Entity\Theater;
use App\Entity\TheaterInfo;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TheaterController extends AbstractController
{
    /**
     * @Route("/theater", name="theater")
     */
    public function newTheater(Request $request)
    {
        $client = new Client();

        $res = $client->request('GET','https://api-content.ingresso.com/v0/theaters');

        $arrayContent = json_decode($res->getBody());
       
        foreach ($arrayContent as $value)
        {   
            $entityManager = $this->getDoctrine()->getManager();

            /*Register Address*/
            $address_name = $value->address;
            $address_number = $value->number;
            $address_district = $value->neighborhood;
            $address_zipcode = $value->districtAuthorization;
            $address_lat = $value->geolocation->lat;
            $address_lng = $value->geolocation->lng;
            
            /*Register City*/
            $city_name = $value->cityName;
            $city_state = $value->uf;

            /*Register Cinema*/
            //$cinema_id = PRIMARY KEY;
            $cinema_name = $value->corporation;
            $cinema_is_active = 0;
            $cinema_created_at = new \DateTime('now');
            $cinema_updated_at = new \DateTime('now');

            /*Register Theater*/
            //$theater_id = PRIMARY KEY;
            //$cinema_id = FOREIGN KEY->cinema_id;
            $theater_booking_cinema = 'Ingresso';
            $theater_booking_id = $value->id;

            /*Register TheaterInfo*/
            //$theater_info_id = PRIMARY KEY;
            //$theater_id = FOREIGN KEY->theater_id;
            //$city_id = FOREIGN KEY->city_id;
            //$address_id = FOREIGN KEY->address_id;
            $theater_info_name = $value->name;
            $theater_info_is_active = 0;
            $theater_info_has_bombonieri = $value->properties->hasBomboniere;

            $address = new Address();
            $address->setName($address_name);
            $address->setNumber($address_number);
            $address->setDistrict($address_district);
            $address->setZipCode($address_zipcode);
            $address->setLatitude($address_lat);
            $address->setLongitude($address_lng);
            $entityManager->persist($address);

            $city = new City();
            $city->setName($city_name);
            $city->setState($city_state);
            $entityManager->persist($city);

            if($cinema_tag = $entityManager->getRepository('App:Cinema')->findOneByName($cinema_name) == null) 
            {   
                $cinema = new Cinema();
                $cinema->setName($cinema_name);
                $cinema->setIsActive($cinema_is_active);
                $cinema->setCreatedAt($cinema_created_at);
                $cinema->setUpdatedAt($cinema_updated_at);
                $entityManager->persist($cinema);

                $theater = new Theater();
                $theater->setCinema($cinema);
                $theater->setBookingCinema($theater_booking_cinema);
                $theater->setBookingId($theater_booking_id);
                $entityManager->persist($theater);
            } 
            else 
            {   
                $theater = new Theater();
                $theater->setCinema($cinema);
                $theater->setBookingCinema($theater_booking_cinema);
                $theater->setBookingId($theater_booking_id);
                $entityManager->persist($theater);
            }

            $theater_info = new TheaterInfo();
            $theater_info->setTheater($theater);
            $theater_info->setCity($city);
            $theater_info->setAddress($address);
            $theater_info->setName($theater_info_name);
            $theater_info->setIsActive($theater_info_is_active);
            $theater_info->setHasBombonieri($theater_info_has_bombonieri);
            $entityManager->persist($theater_info);

            $entityManager->flush();
        }
    }
}
