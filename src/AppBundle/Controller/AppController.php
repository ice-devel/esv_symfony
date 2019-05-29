<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Competence;
use AppBundle\Entity\Stagiaire;
use AppBundle\Form\CompetenceType;
use AppBundle\Form\StagiaireType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends Controller
{
    /**
     * @Route("/form/competence", name="form_competence")
     */
    public function formCompetenceAction(Request $request)
    {
        // 1- créer une instance de Competence
        $competence = new Competence();

        // 2- à partir du service "form.factory", créer un "formBuilder" qui va nous servir à créer
        // un objet formulaire.
        // On appelle la méthode createBuilder du form.factory en lui passant deux paramètres :
        //    1- la classe formulaire créée auparavant : CompetenceType::class
        //    2- puis l'objet à lier à ce formulaire : $competence
        $formBuilder = $this->get('form.factory')->createBuilder(CompetenceType::class, $competence);

        // 3- à partir du formBuilder, on génère l'objet formulaire
        $form = $formBuilder->getForm();

        // 4- récupérer les données envoyées pour hydrater l'objet
        $form->handleRequest($request);

        // 5-
        // si le formulaire a été soumis, alors enregistrer l'objet $competence
        // dont les propriétés ont été automatiquement settées
        // par le composant formulaire lors du "handleRequest"
        if ($form->isSubmitted()) {
            // vérifier si le formulaire est valide
            // isValid() va aller chercher dans la configuration de l'entité les contraintes
            // et automatiquement faire les vérifcations PHP adéquates$
            // toutes les contraintes ici :
            // https://symfony.com/doc/3.4/reference/constraints.html
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($competence);
                $em->flush();
                $this->addFlash('danger', "La compétence a bien été enregistrée.");
            }
            else {
                $this->addFlash('danger', "Le formulaire n'est pas valide.");
            }
        }

        // 6- générer le template twig en lui passant la vue de l'objet formulaire
        // dans le template twig "app/form_stagiaire.html.twig", on aura ainsi accès à la variable fomrStagiaire
        return $this->render('app/form_competence.html.twig', ['formCompetence' => $form->createView()]);
    }

    /**
     * @Route("/form/stagiaire", name="form_stagiaire")
     */
    public function formStagiaireAction(Request $request)
    {
        // 1- créer une instance de Stagiaire
        $stagiaire = new Stagiaire();

        // 2- à partir du service "form.factory", créer un "formBuilder" qui va nous servir à créer
        // un objet formulaire.
        // On appelle la méthode createBuilder du form.factory en lui passant deux paramètres :
        //    1- la classe formulaire créée auparavant : StagiaireType::class
        //    2- puis l'objet à lier à ce formulaire : $stagiaire
        $formBuilder = $this->get('form.factory')->createBuilder(StagiaireType::class, $stagiaire);

        // 3- à partir du formBuilder, on génère l'objet formulaire
        $form = $formBuilder->getForm();

        // 4- récupérer les données envoyées pour hydrater l'objet
        $form->handleRequest($request);

        // 5-
        // si le formulaire a été soumis, alors enregistrer l'objet $stagiaire
        // dont les propriétés ont été automatiquement settées
        // par le composant formulaire lors du "handleRequest"
        if ($form->isSubmitted()) {
            // vérifier si le formulaire est valide
            // isValid() va aller chercher dans la configuration de l'entité les contraintes
            // et automatiquement faire les vérifcations PHP adéquates$
            // toutes les contraintes ici :
            // https://symfony.com/doc/3.4/reference/constraints.html
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($stagiaire);
                $em->flush();
                $this->addFlash('danger', "Le stagiaire a bien été enregistrée.");
            }
            else {
                $this->addFlash('danger', "Le formulaire n'est pas valide.");
            }
        }

        // 6- générer le template twig en lui passant la vue de l'objet formulaire
        // dans le template twig "app/form_stagiaire.html.twig", on aura ainsi accès à la variable fomrStagiaire
        return $this->render('app/form_stagiaire.html.twig', ['formStagiaire' => $form->createView()]);
    }


    // le controller pour se connecter au firewall form
    /**
     * @Route("/form/login", name="form_login")
     */
    public function loginAction() {
        // https://openclassrooms.com/fr/courses/3619856-developpez-votre-site-web-avec-le-framework-symfony/3624755-securite-et-gestion-des-utilisateurs
        // Le service authentication_utils permet de récupérer le nom d'utilisateur
        // et l'erreur dans le cas où le formulaire a déjà été soumis mais était invalide
        // (mauvais mot de passe par exemple)
        $authenticationUtils = $this->get('security.authentication_utils');

        return $this->render('app/form_login.html.twig', [
            'error' => $authenticationUtils->getLastAuthenticationError()
        ]);
    }

    /**
     * @Route("/form/login-check", name="form_login_check")
     */
    public function loginCheckAction() {
    }
    /**
     * @Route("/form/logout", name="form_logout")
     */
    public function logoutAction() {
    }
}
