<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
//ajout de contrainte au formulaire, ajouté le 05-05-2023 
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class InscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'required' => true,
            ])
            ->add('password',PasswordType::class)
            ->add('type',TextType::class)
            ->add('name',TextType::class)
            ->add('firstname',TextType::class)
            ->add('birth_date',DateType::class)
            ->add('reason',TextType::class)
            ;

        //champs a masquer 15-05-2023
        $builder->remove('roles');
        $builder->remove('modify_by');
        $builder->remove('created_at');
        $builder->remove('last_modification');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
