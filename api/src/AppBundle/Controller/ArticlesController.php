<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use AppBundle\Entity\Article;

class ArticlesController extends FOSRestController
{

    /**
     * Note: here the name is important
     * get => the action is restricted to GET HTTP method
     * Article => (without s) generate /articles/SOMETHING
     * Action => standard things for symfony for a controller method which
     *           generate an output
     *
     * it generates so the route GET .../articles/{id}
     */
    public function getArticleAction($id)
    {
        $article = new Article("title $id", "body $id");
  
          $manager = $this->getDoctrine()->getManager();
          // persist ONLY add the object to the list of object to
          // save
          $manager->persist($article);
          // only flush will actually save in database, this in order
          // to make it possible to save a lot of object in only one flush
          // (which is a LOT faster than flushing one by one
          $manager->flush();
  
          return $article;  
    }

}