<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Responses\PrepareForResponse;
use App\Services\LunchService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
class LunchController extends AbstractController
{
    /**
     * API lunch recipe
     *
     * @Route("/lunch")
     *
     * @param Request $request
     * @param ApiResponse $response
     * @return string JSON recipe lists
     */
    public function index(Request $request, PrepareForResponse $response)
    {
        $args = $request->query->all();
        $lunchService = new LunchService();
        
        $ingredientData = $lunchService->getIngredients()
            ->filters($args)
            ->getResultTitle();

        $recipeData = $lunchService->getRecipes()
            ->getRecipeByIngredients($ingredientData)
            ->getResult();

        return $response->setData($recipeData)
            ->reponseToJson();
    }
}