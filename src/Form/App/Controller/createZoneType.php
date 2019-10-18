<?php

namespace App\Form\App\Controller;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class createZoneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('format', ChoiceType::class, [
                'choices' => [
                    "1"=>12,
                    "50:50"=>"6:6",
                    "33:66"=>"4:8",
                    "25:75"=>"3:9",
                    "66:33"=>"8:4",
                    "75:25"=>"9:3",
                    "30:30:30"=>"4:4:4",
                    "25:50:25"=>"3:6:3",
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
