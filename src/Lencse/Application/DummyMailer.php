<?php

namespace Lencse\Application;


class DummyMailer implements MailerInterface
{

    /**
     * @var array
     */
    private $mails = [];

    /**
     * @param string[] $toAdresses
     * @param $subject string
     * @param $body string
     */
    public function send(array $toAdresses, $subject, $body)
    {
        $this->mails[] = [$toAdresses, $subject, $body];
    }

    /**
     * @return array
     */
    public function getMails()
    {
        return $this->mails;
    }

}