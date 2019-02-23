<?php
/**
 * Created by PhpStorm.
 * User: zrt1992
 * Date: 2/23/2019
 * Time: 1:44 AM
 */

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\LoginForm;
use AppBundle\Form\RegisterForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login_route")
     */
    public function loginAction()
    {

        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        $form = $this->createForm(LoginForm::class,
            [
                '_username' => $lastUsername
            ]);

        return $this->render(
            'security/login.html.twig',
            array(
                // last username entered by the user
                'form' => $form->createView(),
                'error' => $error,
            )
        );
    }

    /**
     * @Route("/logout", name="security_logout")
     */
    public function logoutAction()
    {

        throw  new \Exception('Cant be reached');

    }


    /**
     * @Route("/register", name="register")
     */
    public function registerAction(Request $request)
    { $user = new User();
        $form = $this->createForm(RegisterForm::class);
        $form->handleRequest($request);

        if($form->isValid()){
            /** @var User $user */
            $user=$form->getData();
            $em= $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
        }
        return $this->render(
            'security/register.html.twig',
            array('form' => $form->createView())
        );

    }


}