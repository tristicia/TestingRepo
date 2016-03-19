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
        
        //return $this->render($map);
        
        return $this->render('AppBundle:Map:MapView.html.twig', array(
            'map' => $map
        ));
    }
    
}