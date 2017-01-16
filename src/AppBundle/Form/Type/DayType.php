<?php

namespace AppBundle\Form\Type;

use AppBundle\Entity\Cook;
use AppBundle\Entity\Day;
use AppBundle\Entity\User;
use AppBundle\Repository\CookRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class      DayType
 *
 * @package   AppBundle\Form\Type
 * @category  AppBundle
 * @author    Brice VICO <brice.vico@orange.fr>
 * @copyright 2017
 */
class DayType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'day',
                ChoiceType::class,
                array(
                    'choices' => array(
                        'Monday' => 1,
                        'Tuesday' => 2,
                        'Wednesday' => 3,
                        'Thirday' => 4,
                        'Friday' => 5,
                        'Saturday' => 6,
                        'Sunday' => 7
                    ),
                    'disabled' => true,
                )
            )
            ->add(
                'breakfast',
                EntityType::class,
                array(
                    'class' => Cook::class,
                    'query_builder' => function (CookRepository $er) {
                        return $er->findBreakfastCook();
                    },
                    'choice_label' => 'name',
                    'group_by' => function (Cook $cook, $key, $index) {
                        return $cook->getPlan()->getName();
                    },
                    'multiple' => true,
                    'required' => false,
                )
            )
            ->add(
                'lunch',
                EntityType::class,
                array(
                    'class' => Cook::class,
                    'query_builder' => function (CookRepository $er) {
                        return $er->findLunchCook();
                    },
                    'choice_label' => 'name',
                    'group_by' => function (Cook $cook, $key, $index) {
                        return $cook->getPlan()->getName();
                    },
                    'multiple' => true,
                    'required' => false,
                )
            )
            ->add(
                'snack',
                EntityType::class,
                array(
                    'class' => Cook::class,
                    'query_builder' => function (CookRepository $er) {
                        return $er->findSnackCook();
                    },
                    'choice_label' => 'name',
                    'group_by' => function (Cook $cook, $key, $index) {
                        return $cook->getPlan()->getName();
                    },
                    'multiple' => true,
                    'required' => false,
                )
            )
            ->add(
                'dinner',
                EntityType::class,
                array(
                    'class' => Cook::class,
                    'query_builder' => function (CookRepository $er) {
                        return $er->findDinnerCook();
                    },
                    'choice_label' => 'name',
                    'group_by' => function (Cook $cook, $key, $index) {
                        return $cook->getPlan()->getName();
                    },
                    'multiple' => true,
                    'required' => false,
                )
            );

    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Day::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_day';
    }


}
