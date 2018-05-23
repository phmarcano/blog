<?php

namespace App\Controller;

use App\Entity\Post;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MediaMonks\RestApi\Response\Response;

/**
 * @Route("/api")
 */
class ApiController extends Controller {

      /**  
     * @Route("/blogs/", methods="GET")
     */
    public function listPostAction(): Response {
           
        $posts = $this->getDoctrine()->getRepository(Post::class)->findAll(); 
        $response = array_map(function($post) {
            return [
                'id' => $post->getId(),
                'title' => $post->getTitle(),
            ];
        }, $posts);
        
        return new Response($response);
    }

    /**
     * @Route("/blogs/{id}",requirements={"id" = "\d+"}, methods="GET")
     */
    public function viewPostAction(Post $post): Response  {
        
        $response = [
            'title' => $post->getTitle(),
            'body' => $post->getBody()
        ];
        
        return new Response($response);
    }

    /**
     * @Route("/blogs/{id}/detail",requirements={"id" = "\d+"}, methods="GET")
     */
    public function detailPostAction(Post $post): Response  {
        
        $response = [
            'id' => $post->getId(),
            'title' => $post->getTitle(),
            'body' => $post->getBody(),
            'tags' => $post->getTags(),
        ];
        
        return new Response($response);
    }

}
