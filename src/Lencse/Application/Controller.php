<?php

namespace Lencse\Application;


class Controller
{

    /**
     * @var PostRepository
     */
    private $postRepository;

    /**
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * @return Response
     */
    public function showMainPage()
    {
        $data = new ResponseData();
        $data->setPosts($this->postRepository->getAll());

        return new Response('main', 200, $data);
    }

    /**
     * @return Response
     */
    public function createNewPost()
    {
        $this->postRepository->save(Post::createRandom());
        header('Location: /');
    }

    /**
     * @return Response
     */
    public function showNotFoundPage()
    {
        return new Response('404', 404);
    }

    /**
     * @return Response
     */
    public function showBadRequestPage()
    {
        return new Response('400', 400);
    }

}