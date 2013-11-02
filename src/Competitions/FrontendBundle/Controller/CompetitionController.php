<?php

namespace Competitions\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use JMS\Serializer\SerializerBuilder;

class CompetitionController extends Controller {

    public function listAction($filter) {
        $em = $this->getDoctrine()->getEntityManager();
        if ($filter) {
            $categories = json_decode($filter);
        } else {
            $categories = array();
        }

        $competitions = $em->getRepository('CompetitionsAdminBundle:Competition')->findByFilter($categories);

        $serializer = SerializerBuilder::create()->build();
        $jsonContent = $serializer->serialize($competitions, 'json');

        $response = new Response($jsonContent);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

}

?>
