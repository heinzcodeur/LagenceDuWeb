<?php

namespace App\Controller;

use App\Entity\Property;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class PropertyController extends AbstractController
{
    /**
     * @Route("/property", name="property.index")
     */
    public function index()
    {

        $repo=$this->getDoctrine()->getRepository(Property::class);
        $prop = $repo->findAll();
        dump($prop);

        /*$property = new Property();
        $property->setTitle('first property')
                 ->setSurface(90)
                 ->setRooms(3)
                 ->setBedrooms(2)
                 ->setHeat(1)
                 ->setFloor(3)
                 ->setCity('neuilly sur seine')
                 ->setZipCode(92200)
                 ->setAddress("4 Rue des Poissonniers")
                 ->setPrice('750000');

        $em=$this->getDoctrine()->getManager();
        $em->persist($property);
        $em->flush();*/

        return $this->render('pages/home.html.twig', [
            'properties' => $prop
        ]);
    }
}
