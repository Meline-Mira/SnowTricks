<?php

namespace App\Form;

use App\Entity\Group;
use App\Entity\Trick;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TrickType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('medias', CollectionType::class, [
                'entry_type' => MediaType::class,
                'entry_options' => [
                    'attr' => ['class' => 'border border-cyan-800 p-3']
                ],
                'allow_add' => true,
                'by_reference' => false,
                'allow_delete' => true,
                'label' => false,
            ])
            ->add('name', TextType::class, ['label' => 'Nom de la figure'])
            ->add('description', TextareaType::class, ['label' => 'Description de la figure'])
            ->add('groupTrick', EntityType::class, [
                'class' => Group::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
                'label' => 'Groupe de la figure'
            ])
            ->add('Enregistrer', SubmitType::class)
        ;
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Trick::class,
        ]);
    }
}