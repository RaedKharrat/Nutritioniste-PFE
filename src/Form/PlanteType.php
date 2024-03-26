<?php

namespace App\Form;

use App\Entity\Plante;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class PlanteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class) // Change to text type
            ->add('Description', TextareaType::class) // Change to textarea type
            ->add('Picture', FileType::class, [
                'mapped' => false, // This tells Symfony not to try to map this field to any entity property
                'required' => false, // Make the file upload optional
            ])
            ->add('disponibilite', ChoiceType::class, [
                'choices' => [
                    'Disponible' => 'Disponible',
                    'Non disponible' => 'Non Disponible',
                ],
                'label' => 'Disponibilité',
                'attr' => ['class' => 'custom-select'], // Optionally, you can add a class
            ])
            ->add('vitamine')
            ->add('enzymes')
            ->add('mineraux')
            ->add('antioxydants');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Plante::class,
        ]);
    }
}
