<?php
/**
 * Created by PhpStorm.
 * User: rkamdemkouam
 * Date: 16/03/2015
 * Time: 10:10
 */

namespace FriendbookBundle\Controller;

use UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class FriendbookController extends Controller
{
    public function afficherAction($id)
    {

        // On récupère le repository
        $repository = $this->getDoctrine()->getManager()->getRepository('UserBundle:User');

        // On récupère l'entité correspondante à l'id $id
        $users = $repository->find($id);
        // $advert est donc une instance de OC\PlatformBundle\Entity\Advert
        // ou null si l'id $id  n'existe pas, d'où ce if :

        if(null === $users) {
            throw new NotFoundHttpException("L'utilisateur d'id ".$id." n'existe pas.");
        }

        // Le render ne change pas, on passait avant un tableau, maintenant un objet
        return $this->render('FriendbookBundle:Layout:afficher.html.twig', array('users' => $users));
    }

    //On vérifie que l'utilisateur dispose bien du rôle ROLE_AUTEUR

    public function ajoutAction()
    {
        $request = Request::createFromGlobals();

        // Création de l'entité
        $users = new User();

        /*
        $users->setId("rkouamkamdem@yahoo.fr");
        $users->setNom("KOUAM");
        $users->setPrenom("Roméo");
        $users->setMail1("rkouamkamdem@yahoo.fr");
        $users->setMail2("rkamdemkouam@gmail.com");
        $users->setAdresse("81 rue jean mermoz");
        $users->setCp(78370);
        $users->setTelephone("0676214014");
        $users->setSiteWeb("https://www.telesoft.fr");
        $users->setLogin("rko");
        $users->setMdp("rko");

        $users2 = new Users();
        $users2->setId("kouamkamdem@yahoo.fr");
        $users2->setNom("user2");
        $users2->setPrenom("user2");
        $users2->setMail1("rkouamkamdem@yahoo.fr");
        $users2->setMail2("rkamdemkouam@gmail.com");
        $users2->setAdresse("81 rue jean mermoz");
        $users2->setCp(78370);
        $users2->setTelephone("0676214014");
        $users2->setSiteWeb("https://www.telesoft.fr");
        $users2->setLogin("user2");
        $users2->setMdp("user2");

        $users3 = new Users();
        $users3->setId("ouamkamdem@yahoo.fr");
        $users3->setNom("user3");
        $users3->setPrenom("user3");
        $users3->setMail1("rkouamkamdem@yahoo.fr");
        $users3->setMail2("rkamdemkouam@gmail.com");
        $users3->setAdresse("81 rue jean mermoz");
        $users3->setCp(78370);
        $users3->setTelephone("0676214014");
        $users3->setSiteWeb("https://www.telesoft.fr");
        $users3->setLogin("user3");
        $users3->setMdp("user3");

        $users4 = new Users();
        $users4->setId("uamkamdem@yahoo.fr");
        $users4->setNom("user4");
        $users4->setPrenom("user4");
        $users4->setMail1("rkouamkamdem@yahoo.fr");
        $users4->setMail2("rkamdemkouam@gmail.com");
        $users4->setAdresse("81 rue jean mermoz");
        $users4->setCp(78370);
        $users4->setTelephone("0676214014");
        $users4->setSiteWeb("https://www.telesoft.fr");
        $users4->setLogin("user4");
        $users4->setMdp("user4");

        $users5 = new Users();
        $users5->setId("amkamdem@yahoo.fr");
        $users5->setNom("user5");
        $users5->setPrenom("user5");
        $users5->setMail1("rkouamkamdem@yahoo.fr");
        $users5->setMail2("rkamdemkouam@gmail.com");
        $users5->setAdresse("81 rue jean mermoz");
        $users5->setCp(78370);
        $users5->setTelephone("0676214014");
        $users5->setSiteWeb("https://www.telesoft.fr");
        $users5->setLogin("user5");
        $users5->setMdp("user5");

        $users6 = new Users();
        $users6->setId("kamdem@yahoo.fr");
        $users6->setNom("user6");
        $users6->setPrenom("user6");
        $users6->setMail1("rkouamkamdem@yahoo.fr");
        $users6->setMail2("rkamdemkouam@gmail.com");
        $users6->setAdresse("81 rue jean mermoz");
        $users6->setCp(78370);
        $users6->setTelephone("0676214014");
        $users6->setSiteWeb("https://www.telesoft.fr");
        $users6->setLogin("user6");
        $users6->setMdp("user6");

        $users->setId("amdem@yahoo.fr");
        $users->setNom("user7");
        $users->setPrenom("user7");
        $users->setMail1("rkouamkamdem@yahoo.fr");
        $users->setMail2("rkamdemkouam@gmail.com");
        $users->setAdresse("81 rue jean mermoz");
        $users->setCp(78370);
        $users->setTelephone("0676214014");
        $users->setSiteWeb("https://www.telesoft.fr");
        $users->setLogin("user7");
        $users->setMdp("user7");
        $users->setGrade("user_user");

        $em = $this->getDoctrine()->getManager();
        // Étape 1 : On « persiste » l'entité

        $em->persist($users);
        $em->persist($users2);
        $em->persist($users3);
        $em->persist($users4);
        $em->persist($users5);
        $em->persist($users6);

        // Étape 2 : On « flush » tout ce qui a été persisté avant
        $em->flush();
        */
        // Reste de la méthode qu'on avait déjà écrit

        if ($request->isMethod('POST')) {
            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');
            return $this->redirect($this->generateUrl('friendbook_homepage', array('id' => $users->getId())));
        }

        return $this->render('FriendbookBundle:Layout:ajout.html.twig');
    }

    //Je liste le carnet d'amis d'un utlisateur
    public function listerAction($iduser)
    {
        /*
        // Retourne un repository géré par le gestionnaire « default »
        $products = $this->get('doctrine')->getRepository('AcmeStoreBundle:Product')->findAll();

        // Manière explicite de traiter avec le gestionnaire « default », ici default est le nom de la connexion qui se trouve dans le fichier: app/config.yml
        $products = $this->get('doctrine')->getRepository('AcmeStoreBundle:Product', 'default')->findAll();

        // Retourne un repository géré par le gestionnaire « customer »
        $customers = $this->get('doctrine')->getRepository('AcmeCustomerBundle:Customer', 'customer')->findAll();
        */
        return $this->render('FriendbookBundle:Layout:lister.html.twig', array('iduser' => $iduser));
        //return $this->render('FriendbookBundle:Layout:lister.html.twig');
    }

    //Je modifie le carnet d'amis d'un utlisateur
    public function modifierAction($iduser)
    {
        /*
        // Retourne un repository géré par le gestionnaire « default »
        $products = $this->get('doctrine')->getRepository('AcmeStoreBundle:Product')->findAll();

        // Manière explicite de traiter avec le gestionnaire « default », ici default est le nom de la connexion qui se trouve dans le fichier: app/config.yml
        $products = $this->get('doctrine')->getRepository('AcmeStoreBundle:Product', 'default')->findAll();

        // Retourne un repository géré par le gestionnaire « customer »
        $customers = $this->get('doctrine')->getRepository('AcmeCustomerBundle:Customer', 'customer')->findAll();
        */
        return $this->render('FriendbookBundle:Layout:modifier.html.twig', array('iduser' => $iduser));
        //return $this->render('FriendbookBundle:Layout:lister.html.twig');
    }

    public function supprimerAction($id)
    {
        // On récupère le repository
        $repository = $this->getDoctrine()->getRepository('UserBundle:User');

        // On récupère l'entité correspondante à l'id $id
        $users = $repository->find($id);
        $str_del = "L'utilisateur nommé : ".$users->getNom()." ".$users->getPrenom()." d'identifiant ".$users->getId()." a belet bien été supprimé !!! ";
        $em = $this->getDoctrine()->getManager();
        $em->remove($users);

        $em->flush(); // Exécute un DELETE sur $advert
        return $this->render('FriendbookBundle:Layout:supprimer.html.twig', array('str_del' => $str_del));
    }
}
