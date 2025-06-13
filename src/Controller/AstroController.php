<?php

namespace App\Controller;

use App\Agent\AstroAgent;
use App\Form\Form;
use NeuronAI\Chat\Messages\UserMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AstroController extends AbstractController
{
    #[Route('/', name: 'app_astro')]
    public function index(Request $request): Response
    {
        $response = null;
        $form = $this->createForm(Form::class);
        $form->handleRequest($request);
        if( $form->isSubmitted() && $form->isValid()) {
            // Handle the form submission, e.g., process the data
            $data = $form->getData();
            $message = new UserMessage($data['nom_de_lastre']);
            $agent = AstroAgent::make();
            $response = $agent->chat($message)->getContent();
        }
        return $this->render('astro/index.html.twig', [
            'form' => $form->createView(),
            'response' => $response
        ]);
    }
}
