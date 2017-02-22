<?php
namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Date;

class AppointmentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('employee', EntityType::class, [
                'class' => 'AppBundle\Entity\Employee'
            ])
            ->add('boardroom', EntityType::class, [
                'class' => 'AppBundle\Entity\Boardroom'
            ])
            ->add('specifics', TextType::class)
            ->add('bookedDate', DateTimeType::class, [
                'widget' => 'single_text',
                'format' => 'Y-m-d H:m'
            ])
            ->add('bookedDateFrom', DateTimeType::class,[
                'widget' => 'single_text',
                'format' => 'Y-m-d H:m'
            ])
            ->add('bookedDateTo', DateTimeType::class, [
                'widget' => 'single_text',
                'format' => 'Y-m-d H:m'
            ])
            ->add('recuming')
            ->add('recumingType')
            ->add('recumingWeekOrMonthNumber')
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Appointment'
        ));
    }
}