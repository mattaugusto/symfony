<?php

namespace App\Controller;

use App\Entity\Author;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AuthorController extends AbstractController
{
    /**
     * @Route("/authors", name="authors")
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $doctrine = $this->getDoctrine()->getManager();
        $authors = $doctrine->getRepository(Author::class)->findAll();

        $author = new Author();

        $form = $this->createFormBuilder($author)
            ->add('name', TextType::class)
            ->add('description', TextareaType::class)
            ->add('save', SubmitType::class, ['label' => 'Save'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $author = $form->getData();

            $doctrine->persist($author);
            $doctrine->flush();

            return $this->redirectToRoute('authors');
        }

        $data = [
            'authors' => $authors,
            'form' => $form->createView()
        ];

        return $this->render('author/author_index.html.twig', [
            'data' => $data,
        ]);

    }
}
