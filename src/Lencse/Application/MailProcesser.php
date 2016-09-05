<?php

namespace Lencse\Application;


class MailProcesser
{

    /**
     * @var MailerInterface
     */
    private $mailer;

    /**
     * @var DB
     */
    private $db;

    /**
     * @param MailerInterface $mailer
     * @param DB $db
     */
    public function __construct(MailerInterface $mailer, DB $db)
    {
        $this->mailer = $mailer;
        $this->db = $db;
    }

    public function processMails()
    {
        $mails = [];
        $queryOptions = [
            'projection' => ['_id' => 0]
        ];
        foreach ($this->db->query($queryOptions) as $doc) {
            $mails[] = $doc;
        }
        foreach ($mails as $mail) {
            $this->mailer->send($mail->emails, $mail->subject, $mail->body);
        }
    }

}