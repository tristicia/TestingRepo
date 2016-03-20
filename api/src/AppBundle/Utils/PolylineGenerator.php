<?php

namespace AppBundle\Utils;

use Symfony\Component\HttpFoundation\Request;

use Ivory\GoogleMap\Overlays\Polyline;

class PolylineGenerator
{
     /**
     * @var object
     */
    protected $polyline;
    
    /**
     * Set request, geocoder
     */
    public function createPolyline($coordinates)
    {
        $polyline = new Polyline();

        // Configure your polyline options
        $polyline->setPrefixJavascriptVariable('polyline_');
        $polyline->setOptions(array(
            'geodesic'    => true,
            'strokeColor' => '#FF8000',
            'strokeWeight'=> 2
        ));
        
        // Add coordinates to your polyline
        $polyline->addCoordinate(
            $coordinates->getOriginCoordinates()->getLatitude(),
            $coordinates->getOriginCoordinates()->getLongitude(),
            true
        );
        
        $polyline->addCoordinate(
            $coordinates->getDestinationCoordinates()->getLatitude(),
            $coordinates->getDestinationCoordinates()->getLongitude(),
            true
        );
        
        $this->polyline = $polyline;
        
    }
    
    /**
     * Get Polyline
     */
     public function getPolyline()
     {
         return $this->polyline;
     }
    
}