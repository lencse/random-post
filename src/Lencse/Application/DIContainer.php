<?php

namespace Lencse\Application;


class DIContainer
{

    /**
     * @var array
     */
    private $config;

    /**
     * @var Controller
     */
    private $controller;

    /**
     * @var Router
     */
    private $router;

    /**
     * @var Templating
     */
    private $templating;

    /**
     * @var DB
     */
    private $db;

    /**
     * @var Messaging
     */
    private $messaging;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var MailerInterface
     */
    private $mailer;

    /**
     * @var PostRepository
     */
    private $postRepository;

    /**
     * @var Security
     */
    private $security;

    /**
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * @return Router
     */
    public function getRouter()
    {
        if (!isset($this->router)) {
            $this->router = new Router($this->getController());
        }

        return $this->router;
    }

    /**
     * @return Templating
     */
    public function getTemplating()
    {
        if (!isset($this->templating)) {
            $this->templating = new Templating($this->config['viewPath']);
        }

        return $this->templating;
    }

    /**
     * @return Controller
     */
    private function getController()
    {
        if (!isset($this->controller)) {
            $this->controller = new Controller($this->getPostRepository(), $this->getMessaging(), $this->getSecurity(), $this->getTemplating());
        }

        return $this->controller;
    }

    /**
     * @return Messaging
     */
    public function getMessaging()
    {
        if (!isset($this->messaging)) {
            $this->messaging = new Messaging($this->getSession(), $this->getMailer(), $this->config['notificationList']);
        }

        return $this->messaging;
    }

    /**
     * @return PostRepository
     */
    private function getPostRepository()
    {
        if (!isset($this->postRepository)) {
            if ($this->config['postRepository'] == 'risky' && rand(0, 1) == 1) {
                $this->postRepository = new FailingPostRepository($this->getDB(), $this->getMessaging());
            }
            else {
                $this->postRepository = new PostRepository($this->getDB(), $this->getMessaging());
            }
        }

        return $this->postRepository;
    }

    /**
     * @return Security
     */
    private function getSecurity()
    {
        if (!isset($this->security)) {
            $this->security = new Security($this->getSession());
        }

        return $this->security;
    }

    /**
     * @return DB
     */
    private function getDB()
    {
        if (!isset($this->db)) {
            $dbConf = $this->config['db'];
            if ($dbConf == 'demo') {
                $this->db = new DemoDB();
            } elseif (is_array($dbConf['mongo'])) {
                $this->db = new MongoDB($dbConf['mongo']['connectionString'], $dbConf['mongo']['collection']);
            }
        }

        return $this->db;
    }

    /**
     * @return MailerInterface
     */
    private function getMailer()
    {
        if (!isset($this->mailer)) {
            $mailerConf = $this->config['mailer'];
            if ($mailerConf == 'dummy') {
                $this->mailer = new DummyMailer();
            } elseif ($mailerConf == 'simplephpmailer') {
                $this->mailer = new SimplePHPMailer();
            }
        }

        return $this->mailer;
    }

    /**
     * @return SessionInterface
     */
    private function getSession()
    {
        if (!isset($this->session)) {
            $sessionConf = $this->config['session'];
            if ($sessionConf == 'in-memory') {
                $this->session = new InMemorySession();
            } elseif ($sessionConf == 'session') {
                $this->session = new Session();
            }
        }

        return $this->session;
    }

}