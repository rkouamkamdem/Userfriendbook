<?php

namespace FriendbookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction() //indexAction($name)
    {

       // Retourne un repository géré par le gestionnaire « default »
       $users = $this->getDoctrine()->getManager()->getRepository('UserBundle:User')->findAll();

       // Manière explicite de traiter avec le gestionnaire « default », ici default est le nom de la connexion qui se trouve dans le fichier: app/config.yml
        //$users = $this->get('doctrine')->getRepository('FriendbookBundle:Users', 'default')->findAll();

       // Retourne un repository géré par le gestionnaire « customer »
        //$users = $this->get('doctrine')->getRepository('FriendbookBundle:Users', 'customer')->findAll();

        return $this->render('FriendbookBundle:Layout:index.html.twig', array('users' => $users));
    }
}
