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
     * @var Security
     */
    private $security;

    /**
     * @param PostRepository $postRepository
     * @param MessageReader $messaging
     * @param Security $security
     */
    public function __construct(PostRepository $postRepository, MessageReader $messaging, Security $security)
    {
        $this->postRepository = $postRepository;
        $this->messaging = $messaging;
        $this->security = $security;
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
        $data->setCsrfToken($this->security->getCsrfToken());

        return Response::htmlResponse('main', 200, $data);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function createNewPost(Request $request)
    {
        if (!$this->security->validateCsrfToken($request->getPostValues()['csrfToken'])) {
            return $this->showBadRequestPage();
        }
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