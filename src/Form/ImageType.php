<?php

namespace App\Form;

use App\Entity\Priduits;
//add this 
use Vich\UploaderBundle\Form\Type\VichImageType;
//*** end add */
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ImageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder->add('imageFile', VichImageType::class, [
            'required' => false,
            'allow_delete' => true,
            'delete_label' => '...',
            'download_label' => '...',
            'download_uri' => true,
            'image_uri' => true,
            //'imagine_pattern' => '...',
            'asset_helper' => true,
        ])
        ->add('submit', SubmitType::class, [
            'attr' =>[
                'class' =>'btn btn-primary'  
            ],
            'label'=> 'enregistrer'
        ]);
        
            
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Priduits::class,
        ]);
    }
}
