<?php
/**
 * Created by PhpStorm.
 * User: rkamdemkouam
 * Date: 16/03/2015
 * Time: 10:07
 */

namespace FriendbookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UsersController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('FriendbookBundle:Layout:index.html.twig', array('name' => $name));
    }
}
