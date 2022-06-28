<?php

namespace App\Form;

use App\Entity\Game;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;



class GameFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'row_attr' => ['class' => 'col-lg-5']
            ])
            ->add('category', EntityType::class, [
				'class' => Category::class, 
				'choice_label' => 'name',
				'row_attr' => ['class' => 'col-lg-5']
			])
			->add('public', ChoiceType::class, [
				'choices' => [
					'' => '',
					'6 ans et +' => '6+',
					'8 ans et +' => '8+',
					'10 ans et +' => '10+',
					'12 ans et +' => '12+',
				],
				'row_attr' => ['class' => 'col-lg-5']
			])
			->add('minPlayers', TextType::class, [
				'row_attr' => ['class' => 'col-lg-5']
			])
			->add('maxPlayers', TextType::class, [
				'required' => false,
				'row_attr' => ['class' => 'col-lg-5']
			])
			->add('description', TextareaType::class, [
				'row_attr' => ['class' => 'col-lg-11']
			])
			->add('image', FileType::class, [
				'row_attr' => ['class' => 'col-lg-5'],
				'label' => "Photo du jeu",
				'mapped' => true, 
				'required' => true, 
				'data_class' => null,
				'constraints' => [ 
					new File([
						'maxSize' => '2M',
						'mimeTypes' => [
							'image/jpeg',
							'image/png',
							'image/jpg',
							'image/JPEG',
							'image/PNG',
							'image/JPG',
						],
						'mimeTypesMessage' => "Types de fichiers acceptés : jpg, jpeg et png"
					])
				]
			])
			->add('save', SubmitType::class, [
				'row_attr' => ['class' => 'col-lg-10 d-flex justify-content-center']
			])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Game::class,
			'validation_groups' => ['game_registration']
        ]);
    }
}
