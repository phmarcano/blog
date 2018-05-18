<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MediaMonks\RestApi\Response\Response;
use App\Entity\Post;

/**
 * @Route("/api/")
 */
class ApiController extends Controller {

    /**
     * @Route("blogs/")
     */
    public function listPostAction() {
        $posts = $this->getDoctrine()->getRepository(Post::class)->findAll();
        $response = array_map(function($post) {
            return [
                'id' => $post->getId(),
                'title' => $post->getTitle(),
            ];
        }, $posts);
        
        return $response;
    }

    /**
     * @Route("blogs/{id}",requirements={"id" = "\d+"})
     */
    public function viewPostAction($id) {
        $post = $this->getDoctrine()->getRepository(Post::class)->find($id);
        if (is_null($post)) {
            return new Response('Post not found', Response::HTTP_BAD_REQUEST);
        }
        $response = [
            'title' => $post->getTitle(),
            'body' => $post->getBody()
        ];
        
        return $response;
    }

    /**
     * @Route("blogs/{id}/detail",requirements={"id" = "\d+"})
     */
    public function detailPostAction($id) {
        $post = $this->getDoctrine()->getRepository(Post::class)->find($id);
        if (is_null($post)) {
            return new Response('Post not found', Response::HTTP_BAD_REQUEST);
        }
        $response = [
            'id' => $post->getId(),
            'title' => $post->getTitle(),
            'body' => $post->getBody(),
            'tags' => $post->getTags(),
        ];
        
        return $response;
    }

}
