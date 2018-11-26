<?php

namespace App\Controller;

use GuzzleHttp\Client;
use App\Entity\Address;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AddressController extends AbstractController
{
    /**
     * @Route("/address", name="address")
    */
    public function Address(Request $request)
    {   
        $client = new Client();

        $res = $client->request('GET','https://api-content.ingresso.com/v0/theaters');

        $arrayContent = json_decode($res->getBody());
       
        foreach ($arrayContent as $value)
        {
            $entityManager = $this->getDoctrine()->getManager();
    
            $address_name = $value->address;
            $address_number = $value->number;
            $address_district = $value->neighborhood;
            $address_zipcode = $value->districtAuthorization;
        
            $address = new Address();
            $address->setName($address_name);
            $address->setNumber($address_number);
            $address->setDistrict($address_district);
            $address->setZipCode($address_zipcode);

            $entityManager->persist($address);
            $entityManager->flush();

            echo 'OK!';
        }
    }
}