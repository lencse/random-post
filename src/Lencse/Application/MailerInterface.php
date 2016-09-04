<?php

namespace Lencse\Application;


interface MailerInterface
{

    /**
     * @param string[] $toAdresses
     * @param $subject string
     * @param $body string
     */
    public function send(array $toAdresses, $subject, $body);

}