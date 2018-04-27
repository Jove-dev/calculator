<?php

namespace App\Controller;

use App\Form\Type\CalculatorType;
use App\Services\CalculatorFormHandler;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="app_home")
     * @Template("base.html.twig")
     */
    public function __invoke(Request $request, CalculatorFormHandler $calculatorFormHandler): array
    {

        $form = $this->createForm(CalculatorType::class,
            [
                'number1'  => $request->get('number1', null),
                'number2'  => $request->get('number1', null),
                'operator' => $request->get('operator', null),
            ]
        );
        $form->handleRequest($request);

        if (!$form->isSubmitted() || !$form->isValid()) {
            return [
                'form'   => $form->createView(),
                'result' => null,
            ];
        };

        $result = $calculatorFormHandler->result($form);

        return [
            'form'   => $form->createView(),
            'result' => $result,
        ];
    }
}
