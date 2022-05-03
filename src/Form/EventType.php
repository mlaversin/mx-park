<?php

namespace App\Form;

use App\Entity\Event;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date', DateTimeType::class, [
                'date_widget' => 'single_text',
            ])
            ->add('name', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'Nom de la session',
                ],
            ])
            ->add('type', ChoiceType::class, [
                'label' => 'Type',
                'choices'  => [
                    'Adulte' => true,
                    'Kids' => false,
                ],
            ])
            ->add('startMemberSubs', IntegerType::class, [
                'label' => 'Inscription Membres',
                'attr' => [
                    'placeholder' => 'Nombre de jours entre l\'ouverture des inscriptions et l\'entraînement',
                ],
            ])
            ->add('startAllSubs', IntegerType::class, [
                'label' => 'Inscription (autres)',
                'attr' => [
                    'placeholder' => 'Nombre de jours entre l\'ouverture des inscriptions et l\'entraînement',
                ],
            ])
            ->add('endSubs', IntegerType::class, [
                'label' => 'Fermeture Inscriptions',
                'attr' => [
                    'placeholder' => 'Nombre de jours entre la fermeture des inscriptions et l\'entraînement',
                ],
            ])
            ->add('googleCalendarUrl', TextType::class, [
                'label' => 'Lien Google Calendar',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Url du lien',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
