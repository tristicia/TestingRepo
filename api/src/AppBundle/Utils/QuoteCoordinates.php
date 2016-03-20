<?php

namespace AppBundle\Utils;

use Symfony\Component\HttpFoundation\Request;

class QuoteCoordinates
{
     /**
     * @var array
     */
    protected $originCoordinates;
    
    /**
     * @var array
     */
    protected $destinationCoordinates;
    
    /**
     * @var Request
     */
     private $request;
     
     /**
     * @var Object
     */
     private $geocoder;


    /**
     * Get originCoordinates
     *
     * @return array
     */
    public function getOriginCoordinates()
    {
        return $this->originCoordinates;
    }
    
    /**
     * Get destinationCoordinates
     *
     * @return array
     */
    public function getDestinationCoordinates()
    {
        return $this->destinationCoordinates;
    }
    
    /**
     * Set request, geocoder
     */
    public function geocodeRequest(Request $request, $geocoder)
    {
        $this->request = $request->query->all();
        $this->geocoder = $geocoder;
        
        $this->originCoordinates = $geocoder
            ->geocode($this->request['origin'])
            ->first();
            
        $this->destinationCoordinates = $geocoder
            ->geocode($this->request['destination'])
            ->first();
        
    }    
    
}