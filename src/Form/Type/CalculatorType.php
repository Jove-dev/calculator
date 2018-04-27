<?php
declare(strict_types=1);

namespace App\Form\Type;

use App\Model\Operators\Operator;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class CalculatorType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('number1', NumberType::class)
            ->add('operator', ChoiceType::class, [
                'choices' => [
                    '+' => Operator::ADD,
                    '-' => Operator::SUBTRACT,
                    '/' => Operator::DIVIDE,
                    '*' => Operator::MULTIPLY,
                    '|' => Operator::OR,
                    '&' => Operator::AND,
                ],
            ])
            ->add('number2', NumberType::class)
            ->add('calculate', SubmitType::class, ['label' => 'Calculate']);
    }
}
