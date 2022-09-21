<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(PostRepository $productRepository): Response
    {
        $posts = $productRepository->findAll();
        
        // $posts->setTitre('Mon premier post');
        // $post->setContenu('Contenu de mon premier post');
        // $post->setAuteur('Jean Dupont');
        // $post->setDate(new \DateTime());
        // dd($post);
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            "posts" => $posts,
            
        ]);
    }

    #[Route('post/{id}', name: 'show_post')]
    public function show(int $id, PostRepository $productRepository): Response {
        $post = $productRepository->find($id);


        return $this->render('home/post.html.twig', [
            'controller_name' => 'HomeController',
            "post" => $post,]);
    }
}
