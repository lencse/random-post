<?php

namespace Lencse\Application;


class Messaging implements MessageWriter, MessageReader
{

    const SESSION_KEY = 'post-message';

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var MailerInterface
     */
    private $mailer;

    /**
     * @var string[]
     */
    private $notificationList;

    /**
     * @param SessionInterface $session
     * @param MailerInterface $mailer
     * @param \string[] $notificationList
     */
    public function __construct(SessionInterface $session, MailerInterface $mailer, array $notificationList)
    {
        $this->session = $session;
        $this->mailer = $mailer;
        $this->notificationList = $notificationList;
    }

    /**
     * @param $text string
     */
    public function msg($text)
    {
        $msg = new Message($text, 'message');
        $this->session->set(self::SESSION_KEY, $msg);
    }

    /**
     * @param \Exception $exception
     */
    public function error(\Exception $exception)
    {
        $this->saveErrorMessageToSession($exception);
        $this->saveErrorMessageToSyslog($exception);
        $this->sendNotificationMails($exception);
    }

    /**
     * @return boolean
     */
    public function hasMessage()
    {
        return $this->session->has(self::SESSION_KEY);
    }

    /**
     * @return Message
     */
    public function readAndDeleteMessage()
    {
        $msg = $this->session->get(self::SESSION_KEY);
        if (!$msg instanceof Message) {
            throw new \RuntimeException('Something bad happened');
        }
        $this->session->unsetField(self::SESSION_KEY);

        return $msg;
    }

    /**
     * @param \Exception $exception
     */
    private function saveErrorMessageToSession(\Exception $exception)
    {
        $msg = new Message($exception->getMessage(), 'error');
        $this->session->set(self::SESSION_KEY, $msg);
    }

    /**
     * @param \Exception $exception
     */
    private function saveErrorMessageToSyslog(\Exception $exception)
    {
        syslog(LOG_ERR, $exception->getMessage());
    }

    /**
     * @param $exception
     */
    private function sendNotificationMails(\Exception $exception)
    {
        $this->mailer->send($this->notificationList, 'Hiba a Random Post alkalmazásban', $exception->getMessage());
    }

}