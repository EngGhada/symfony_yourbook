<?php

namespace App\Form;

use App\Entity\Genre;
use App\Entity\Livre;
use App\Entity\Auteur;
use App\Entity\Editeur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LivreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('isbn')
            ->add('description')
            ->add('archive')
            ->add('imageFile', VichImageType::class, [
                'required' => false
            ])
            ->add('auteur', EntityType::class, [
                'class' => Auteur::class,
                'choice_label' => 'nom', // ✅ much better than 'id'
                'placeholder' => 'Selectionnez un auteur',
            ])
            ->add('editeur', EntityType::class, [
                'class' => Editeur::class,
                'choice_label' => 'nom',
                'placeholder' => 'Selectionnez un editeur',
            ])
            ->add('genres', EntityType::class, [
                'class' => Genre::class,
                'choice_label' => 'nom',
                'multiple' => true,
                'expanded' => false,
                'placeholder' => 'Selectionnez genre(s)',
                'attr' => ['class' => 'form-select'], // Bootstrap 5 class
                ]) ; 
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Livre::class,
        ]);
    }
}
