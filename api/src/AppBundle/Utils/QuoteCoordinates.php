<?php

namespace AppBundle\Utils;

use Symfony\Component\HttpFoundation\Request;

class QuoteCoordinates
{
     /**
     * 
     */
    protected $coordinates;
    
    /**
     * @var Request
     */
     private $request;
     
     /**
     * @var Object
     */
     private $geocoder;


    /**
     * Get coordinates
     *
     * @return array
     */
    public function getcoordinates()
    {
        return $this->coordinates;
    }
    
    /**
     * Set request, geocoder
     */
    public function geocodeRequest(Request $request, $geocoder)
    {
        $this->request = $request->query->all();
        $this->geocoder = $geocoder;
        
        $origin = $geocoder->geocode($this->request['origin'])
                      ->first();
        $destination = $geocoder->geocode($this->request['destination'])
                      ->first();
        
        $this->coordinates['origin']['latitude'] = $origin
            ->getLatitude();
            
        $this->coordinates['origin']['longitude'] = $origin
            ->getLongitude();
            
        $this->coordinates['destination']['latitude'] = $destination
            ->getLatitude();
            
        $this->coordinates['destination']['longitude'] = $destination
            ->getLongitude();
    }
    
}