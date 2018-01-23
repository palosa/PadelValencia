<?php

namespace usuarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function admiAction()
    {
        return $this->render('usuarioBundle:Default:admin.html.twig');
    }
}
