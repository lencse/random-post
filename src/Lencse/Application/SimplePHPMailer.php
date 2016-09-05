<?php

namespace Lencse\Application;


class SimplePHPMailer implements MailerInterface
{
    /**
     * @param string[] $toAdresses
     * @param $subject string
     * @param $body string
     */
    public function send(array $toAdresses, $subject, $body)
    {
        foreach ($toAdresses as $toAdress) {
            mail($toAdress, mb_encode_mimeheader($subject), $body);
        }
    }

}