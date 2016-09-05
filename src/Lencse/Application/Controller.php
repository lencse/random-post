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
     * @var Templating
     */
    private $templating;

    /**
     * @param PostRepository $postRepository
     * @param MessageReader $messaging
     * @param Security $security
     * @param Templating $templating
     */
    public function __construct(PostRepository $postRepository, MessageReader $messaging, Security $security, Templating $templating)
    {
        $this->postRepository = $postRepository;
        $this->messaging = $messaging;
        $this->security = $security;
        $this->templating = $templating;
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

        return new HtmlResponse(200, $this->templating->render('main', $data));
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

        return new RedirectResponse('/');
    }

    /**
     * @return Response
     */
    public function showNotFoundPage()
    {
        return new HtmlResponse(404, $this->templating->render('404'));
    }

    /**
     * @return Response
     */
    public function showBadRequestPage()
    {
        return new HtmlResponse(400, $this->templating->render('400'));
    }

    /**
     * @return Response
     */
    public function showNotAllowedPage()
    {
        return new HtmlResponse(405, $this->templating->render('405'));
    }

}