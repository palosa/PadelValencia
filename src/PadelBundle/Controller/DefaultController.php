<?php

namespace PadelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PadelBundle:Default:index.html.twig');
    }
    public function partidasAction()
    {
        return $this->render('PadelBundle:Default:partidas.html.twig');
    }
    public function torneosAction()
    {
        return $this->render('PadelBundle:Default:torneos.html.twig');
    }
}
