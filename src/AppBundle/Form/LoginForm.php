<?php
/**
 * Created by PhpStorm.
 * User: zrt1992
 * Date: 2/23/2019
 * Time: 9:13 AM
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;

class LoginForm extends  AbstractType
{
    public  function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('_username')
            ->add('_password',PasswordType::class);
    }

}