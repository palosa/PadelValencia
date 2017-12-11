<?php

namespace PadelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PadelBundle\Entity\jugador;
use PadelBundle\Form\jugadorType;
use Symfony\Component\HttpFoundation\Request;


class JugadorController extends Controller
{

    public function jugadoresAction()
    {
          $repository = $this->getDoctrine()->getRepository('PadelBundle:jugador');

          $jugadores = $repository->findAll();

        return $this->render('PadelBundle:Carpeta_jugador:jugadoresClub.html.twig',array('tablaJugador'=>$jugadores));
    }


    public function crearJugadorAction(Request $request)
    {
        $jugador = new jugador();

        $form= $this->createForm(jugadorType::class,$jugador);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $jugador = $form->getData();


             $DB = $this->getDoctrine()->getManager();
             $DB->persist($jugador);
             $DB->flush();

            return $this->redirectToRoute('padel_torneos');
        }
        return $this->render('PadelBundle:Carpeta_jugador:insertarJugador.html.twig',array('form' => $form->createView() ));
    }
    public function actualizarJugadoresAction(Request $request,$id)
    {
        $jugador = $this->getDoctrine()->getRepository('PadelBundle:jugador')->find($id);
          if (!$jugador){
            return $this->redirectToRoute('padel_formMod');
          }
        $form = $this->createForm(\PadelBundle\Form\jugadorType::class, $jugador);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $DB = $this->getDoctrine()->getManager();
            $DB->persist($jugador);
            $DB->flush();
            return $this->redirectToRoute('padel_torneos', ["id" => $id]);
        }
        return $this->render('PadelBundle:Carpeta_jugador:insertarJugador.html.twig', array('form'=>$form->createView() ));
    }
    public function eliminarJugadorAction($id)
    {
            $DB = $this->getDoctrine()->getManager();

            $jugadores = $DB->getRepository('PadelBundle:jugador')->find($id);

            $DB->remove($jugadores);
            $DB->flush();

        return $this->redirectToRoute('padel_torneos');
    }


}
