<?php

namespace AppBundle\Controller;

use AppBundle\DataSource\FoodToFork;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {


        $ftf = new FoodToFork();

        return $this->render('default/index.html.twig', [
            'foodItem' => $ftf->getRecipe()
        ]);
    }
}
