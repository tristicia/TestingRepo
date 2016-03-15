<?php

namespace Appbundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Quote;

/**
 *@Route("/quotes")
 */
 class QuotesController extends FOSRestController
 {
     
     /**
      *return array()
      */
      public function getQuotesAction(Request $request)
        {
            
            $request = $request->query->all();
            
            $quote = new Quote($request);
            
            return $quote;
            
        }
 }