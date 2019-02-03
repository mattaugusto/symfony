<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 02/02/19
 * Time: 20:12
 */

namespace App\Controller;

use App\Entity\Author;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(){
        return $this->render('index/index.html.twig', []);
    }

}