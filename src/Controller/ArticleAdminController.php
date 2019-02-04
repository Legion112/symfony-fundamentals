<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 02.02.2019
 * Time: 14:30
 */

namespace App\Controller;


use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleAdminController extends AbstractController
{
    /**
     * @Route("/admin/article/new")
     */
    public function new(EntityManagerInterface $em)
    {
        die('todo');

        return new Response(sprintf('Hey! New article id: #%d slug: %s',
            $article->getId(),
            $article->getSlug()
        ));
    }
}