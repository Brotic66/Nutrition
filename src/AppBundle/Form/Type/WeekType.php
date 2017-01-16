<?php

namespace AppBundle\Form\Type;

use AppBundle\Entity\User;
use AppBundle\Entity\Week;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class      WeekType
 *
 * @package   AppBundle\Form\Type
 * @category  AppBundle
 * @author    Brice VICO <brice.vico@orange.fr>
 * @copyright 2017
 */
class WeekType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'user',
                EntityType::class,
                array(
                    'class' => User::class,
                    'choice_label' => 'username'
                )
            )
            ->add('number')
            ->add(
                'days',
                CollectionType::class,
                array(
                    'entry_type' => DayType::class,
                    'allow_add' => true,
                    'allow_delete' => true,
                )
            );
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Week::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_week';
    }


}
