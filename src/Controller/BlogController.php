<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Contact;
use App\Form\ArticleType;
use App\Form\ContactType;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index()
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
            'prenom' => 'Sullivan',
            'hasard' => \random_int(1, 100),
        ]);
    }

    /**
     * @Route("/blog/article", name="article")
     */
    public function article(ArticleRepository $repo) {
        $repo = $this->getDoctrine()->getRepository(Article::class);
        $articles = $repo->findAll();
        return $this->render('blog/articles.html.twig', [
            'articles' => $articles,
        ]);
    }
    /**
     * @Route("/blog/aide", name="aide")
     */
    public function aide() {
        return $this->render('blog/aide.html.twig', [
            'nom' => 'De Barotte',
            'prenom' => 'Damien'
        ]);
    }

    /**
     * @Route("blog/hasard/{n}", name="hasard")
     */
    public function hasard($n) {
        $hasard = \random_int(1, $n);
        return $this->render('blog/hasard.html.twig', [
            'hasard' => $hasard,
        ]);
    }

    /**
     * @Route("/blog/article/{id}", name="detail")
     */
    public function detail(Article $article) {
        // $repo = $this->getDoctrine()->getRepository(Article::class);
        // $article = $repo->find($id);
        // dump($article);
        return $this->render('blog/detail.html.twig', [
            'article' => $article,
        ]);
    }

    /**
     * @Route("/blog/creer", name="creer")
     * @Route("/blog/modifier/{id}", name="modifier")
     */
    public function creer(Request $request, EntityManagerInterface $manager, Article $article=null) {
        if(!$article) {
            $article = new Article();
        }
        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);
        
    if($form->isSubmitted() && $form->isValid()) {
        if(!$article->getId()) {
            $article->setCreatedAt(new \DateTime());
        }

        $manager->persist($article);
        $manager->flush();

        return $this->redirectToRoute('detail', ['id' => $article->getId()]);
    }

    return $this->render('blog/creer.html.twig', [
        'formArticle' => $form->createView(),
        'editMode' => $article->getId() !== null
    ]);
    }

    /**
     * @Route("/blog/contact", name="contact")
     */
    public function contact(Request $request, EntityManagerInterface $manager) {
    
            $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);
        
    if($form->isSubmitted() && $form->isValid()) {
        if(!$contact->getId()) {
            $contact->setCreeLe(new \DateTime());
        }

        $manager->persist($contact);
        $manager->flush();
    }

    return $this->render('blog/contact.html.twig', [
        'formContact' => $form->createView(),
    ]);
    }
}
