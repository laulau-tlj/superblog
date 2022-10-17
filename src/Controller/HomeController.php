<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController{

/**
 * Une méthode de controller doit obligatoirement retourner une Response pour afficher une page
 * @return Response
 */

    public function hello(): Response
    {
        return new Response('<h1>Hello!</h1>');
    }

    /**
 * Une méthode de controller doit obligatoirement retourner une Response pour afficher une page
 * Documentation d'une méthode à partir de symfony 4
 * La route et d'autres éléments sont ajoutés au bloc de documentation
 * et le système d'annotation de php est utilisé pour charger le composant Routing
 * 
 * 
 * @return Response
 * @Route(path="/bye", name="bye")
 */

#[Route(path:"/bye", name:"bye", methods:["GET"])]
    public function bye(): Response
    {
        return new Response('<h1>Aurevoir!</h1>');
    }

#[Route("/", name:"app_home", methods:["GET"])]
public function home(): Response
{
    $categories = [
        [
            'name' => "catégorie 1"
        ],
        [
            'name' => "catégorie 2"
        ],
        [
            'name' => "catégorie 3"
        ],
    ];
    return $this->render("home.html.twig", [
        'categories' => $categories
    ]);
}
}
