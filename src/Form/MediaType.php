<?php

namespace App\Form;

use App\Entity\Media;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MediaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('path', TextType::class, [
                'label' => "Entrer l'adresse Url de l'image ou cliquer droit sur la vidéo, puis sur 'copy embed code' et ne mettre que ce qu'il y dans 'src=' sans les guillements",
            ])
            ->add('description', TextType::class)
            ->add('type', ChoiceType::class, [
                'choices'  => ['image' => 'image', 'video' => 'video'],
            ]);
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Media::class,
        ]);
    }
}
