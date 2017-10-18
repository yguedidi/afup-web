<?php


namespace AppBundle\Event\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SpeakerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('civility', ChoiceType::class, ['choices' => ['M' => 'M', 'Mlle' => 'Mlle', 'Mme' => 'Mme']])
            ->add('firstname', TextType::class)
            ->add('lastname', TextType::class)
            ->add('email', EmailType::class)
            ->add('company', TextType::class, ['required' => false])
            ->add('biography', TextareaType::class)
            ->add('twitter', TextType::class, ['required' => false])
            ->add('photo', FileType::class, ['label' => 'Photo de profil', 'data_class' => null, 'required' => $options['photo_required']])
            ->add('save', SubmitType::class, ['label' => 'Sauvegarder'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'photo_required' => true
        ]);
    }
}
