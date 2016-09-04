<?php

namespace Lencse\Application;


class Controller
{

    /**
     * @var PostRepository
     */
    private $postRepository;

    /**
     * @var MessageReader
     */
    private $messaging;

    /**
     * @param PostRepository $postRepository
     * @param MessageReader $messaging
     */
    public function __construct(PostRepository $postRepository, MessageReader $messaging)
    {
        $this->postRepository = $postRepository;
        $this->messaging = $messaging;
    }

    /**
     * @return Response
     */
    public function showMainPage()
    {
        $data = new ResponseData();
        $data->setPosts($this->postRepository->getAll());
        if ($this->messaging->hasMessage()) {
            $data->setMessage($this->messaging->readAndDeleteMessage());
        }

        return Response::htmlResponse('main', 200, $data);
    }

    /**
     * @return Response
     */
    public function createNewPost()
    {
        $this->postRepository->save(Post::createRandom());

        return Response::redirectResponse('/', 201);
    }

    /**
     * @return Response
     */
    public function showNotFoundPage()
    {
        return Response::htmlResponse('404', 404);
    }

    /**
     * @return Response
     */
    public function showBadRequestPage()
    {
        return Response::htmlResponse('400', 400);
    }

}