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
            
            print_r($origin);
            print_r($destination);
            die();
          
          $test = array(
              'ArticleId:' => $id,
              'Origin:' => $request['origin'],
              'Destination:' => $request['destination']
          );
          
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