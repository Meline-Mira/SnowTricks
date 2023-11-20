<?php

namespace App\Form;

use App\Form\DTO\CreateAccountDTO;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class CreateAccountType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, ['label' => 'Adresse email'])
            ->add('password', PasswordType::class, ['label' => 'Mot de passe'])
            ->add('username', TextType::class, ['label' => 'Nom d\'utilisateur'])
            ->add('pictureUrl', UrlType::class, [
                'label' => 'Adresse URL de votre photo',
                'required' => false,
                ])
            ->add('pictureFile', FileType::class, [
                'label' => 'Ou enregistrer votre photo de moins de 100ko (en .jpg ou en .png)',
                'required' => false,
            ])
            ->add('Enregistrer', SubmitType::class)
        ;
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CreateAccountDTO::class,
        ]);
    }
}
