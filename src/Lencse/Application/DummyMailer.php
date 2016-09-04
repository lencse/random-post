<?php

namespace Lencse\Application;


class DummyMailer implements MailerInterface
{
    /**
     * @param string[] $toAdresses
     * @param $subject string
     * @param $body string
     * @throws \phpmailerException
     */
    public function send(array $toAdresses, $subject, $body)
    {
    }

}