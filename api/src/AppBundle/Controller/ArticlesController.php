<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Article;

/**
 * @Route("/articles")
 */
class ArticlesController extends FOSRestController
{

    /**
     * return array()
     */
    public function getArticlesAction(Request $request, $id)
      {
          
          $request = $request->query->all();
          
          $origin = $this->container
            ->get('bazinga_geocoder.geocoder')
            ->using('google_maps')
            ->geocode($request['origin']);
            
          $destination = $this->container
            ->get('bazinga_geocoder.geocoder')
            ->using('google_maps')
            ->geocode($request['destination']);
            
            $originanddestination = array();
            $originanddestination['originAddress'] = $origin;
            $originanddestination['destinationAddress'] = $destination;
            
            return $originanddestination;
            
            echo 'Origin: ';
            print_r($originAddress);
            echo "\n\n\n\n\n\n\n\n\n\n";
            echo 'Destination: ';
            print_r($destinationAddress);
            die();
          
          $articles = $this
              ->getDoctrine()
              ->getRepository('AppBundle:Article')
              ->find($id);
  
          return $test;
      }
      
      public function postArticlesAction(Request $request, $id)
      {
          
          $origin = $request->query->get('origin');
          $destination = $request->query->get('destination');
          
          $test = array(
              'ArticleId:' => $id,
              'Origin:' => $origin,
              'Destination:' => $destination
              
          );
          
          $articles = $this
              ->getDoctrine()
              ->getRepository('AppBundle:Article')
              ->find($id);
  
          return $test;
      }

}