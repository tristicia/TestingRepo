<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

    /**
     * @Route("/quote")
     */
class QuotesController extends FOSRestController
{

    public function getQuoteAction(Request $request)
    {
        
        $requestParams = $request->query->all();
        
        $response = array();
          
        $response['origin'] = $this->container
          ->get('bazinga_geocoder.geocoder')
          ->using('google_maps')
          ->geocode($requestParams['origin']);
            
        $response['destination'] = $this->container
          ->get('bazinga_geocoder.geocoder')
          ->using('google_maps')
          ->geocode($requestParams['destination']);
        
        return $response;
    }
}
