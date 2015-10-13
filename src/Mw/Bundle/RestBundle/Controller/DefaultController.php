<?php

namespace Mw\Bundle\RestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MwRestBundle:Default:index.html.twig', array('name' => $name));
    }

    public function getArticleAction($id){
        $article = $this->getDoctrine()->getRepository('MwRestBundle:Article')->findOneById($id);
        if(!is_object($article)){
            throw $this->createNotFoundException();
        }

        return $article;
    }
}
