<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

     /**
     * @Route("/map")
     */
class MapController extends Controller
{
    
    public function indexAction(Request $request)
    {
        $map = $this->get('ivory_google_map.map');
        
        $geocoder = $this->container
          ->get('bazinga_geocoder.geocoder')
          ->using('google_maps');
        
        $coordinates = $this->get('quote_coordinates');
        $coordinates->geocodeRequest($request, $geocoder);
        
        $polyline = $this->get('polyline_generator');
        $polyline->createPolyline($coordinates);
        
        $map->addPolyline($polyline->getPolyline());
        
        return $this->render('AppBundle:Map:MapView.html.twig', array(
            'map' => $map
        ));
    }
    
}