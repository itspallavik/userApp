<?php 

namespace App\Form\Type;

use App\Document\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class,[
                'label'=> 'First Name',
                'attr' => ['class' => 'form-control','placeholder'=> 'Enter First Name'],
                'label_attr'=> ['class' => 'control-label'],
            ])
            ->add('lastname', TextType::class,[
                'label'=> 'Last Name',
                'attr' => ['class' => 'form-control','placeholder'=> 'Enter Last Name'],
                'label_attr'=> ['class' => 'control-label'],
            ])
            ->add('password', TextType::class,[
                'label'=> 'Password',
                'attr' => ['class' => 'form-control','placeholder'=> 'Enter Password'],
                'label_attr'=> ['class' => 'control-label'],
            ])
            ->add('email', EmailType::class,[
                'label'=> 'Email',
                'attr' => ['class' => 'form-control','placeholder'=> 'Enter Valid Email'],
                'label_attr'=> ['class' => 'control-label'],
            ])
            ->add('phone', NumberType::class,[
                'label'=> 'Phone',
                'attr' => ['class' => 'form-control','placeholder'=> 'Enter Phone'],
                'label_attr'=> ['class' => 'control-label'],
            ])
            ->add('address', TextareaType::class,[
                'label'=> 'Address',
                'attr' => ['class' => 'form-control','placeholder'=> 'Enter Address'],
                'label_attr'=> ['class' => 'control-label'],
            ])
            
            ->add('save', SubmitType::class,[
                'attr' => ['class' => 'btn btn-lg btn-success']
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
