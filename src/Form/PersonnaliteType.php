<?php

namespace App\Form;

use App\Entity\Riasec;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonnaliteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('R')
            ->add('I')
            ->add('A')
            ->add('S')
            ->add('E')
            ->add('C')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Riasec::class,
        ]);
    }
}
