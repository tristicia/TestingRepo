<?php

namespace AppBundle\Utils;

use Symfony\Component\HttpFoundation\Request;

class Quote
{
     /**
     * @var integer
     */
    protected $id;
    
    /**
     * @var datetime
     */
    protected $created_datetime;

    /**
     * @var string
     */
    protected $origin;

    /**
     * @var string
     */
    protected $destination;
    
    /**
     * @var float
     */
    protected $quote_amount;
    
    /**
     * @var float
     */
    protected $quote_tax;


    /**
     * 
     */
    public function __construct()
    {
        $this->created_datetime = new \DateTime();
    }


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set origin
     *
     * @param string $origin
     *
     * @return Quote
     */
    public function setOrigin($origin)
    {
        $this->origin = $origin;

        return $this;
    }

    /**
     * Get origin
     *
     * @return string
     */
    public function getOrigin()
    {
        return $this->origin;
    }

    /**
     * Set destination
     *
     * @param string $destination
     *
     * @return Quote
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;

        return $this;
    }

    /**
     * Get destination
     *
     * @return string
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * Set createdDatetime
     *
     * @param \DateTime $createdDatetime
     *
     * @return Quote
     */
    public function setCreatedDatetime($createdDatetime)
    {
        $this->created_datetime = $createdDatetime;

        return $this;
    }

    /**
     * Get created_datetime
     *
     * @return \DateTime
     */
    public function getCreatedDatetime()
    {
        return $this->created_datetime;
    }
    
    /**
     * Get quote_amount
     *
     * @return Quote
     */
    public function getQuoteAmount()
    {

        return $this->quote_amount;
    }
    
    /**
     * Get quote_amount
     *
     * @return Quote
     */
    public function getQuoteTax()
    {

        return $this->quote_tax;
    }
}