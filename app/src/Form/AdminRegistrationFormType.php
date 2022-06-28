<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class AdminRegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('roles', CollectionType::class, [
                'row_attr' => ['class' => 'col-10 col-sm-7 col-md-5 col-xl-4 col-xxl-2'],
                'label_format' => "Rôle", 
                'entry_type' => ChoiceType::class,
                'entry_options' => [
                    "choices" => [
                        "Utilisateur" => "ROLE_USER",
                        "Admnistrateur" => "ROLE_ADMIN"
                    ]
                ]
            ])
			->add('save', SubmitType::class, [
				'row_attr' => ['class' => 'col-md-12 d-flex justify-content-center']
			])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
