<?php

namespace App\Form;

use App\Entity\FormatZone;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityManagerInterface;

class CreateZoneType extends AbstractType
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager=$entityManager;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $zf=  $this->entityManager->getRepository(FormatZone::class);

        $c=[];
        foreach($zf->findAll() as $item) {
            $c[$item->getName()]=$item->getValue();
        }

        $builder
            ->add('format', ChoiceType::class, [
                'choices' => $c,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
