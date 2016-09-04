<?php

namespace Lencse\Application;


class PHPMailerMailer implements MailerInterface
{

    /**
     * @var string
     */
    private $gmailUsername;

    /**
     * @var string
     */
    private $gmailPassword;

    /**
     * @param string $gmailUsername
     * @param string $gmailPassword
     */
    public function __construct($gmailUsername, $gmailPassword)
    {
        $this->gmailUsername = $gmailUsername;
        $this->gmailPassword = $gmailPassword;
    }

    /**
     * @param string[] $toAdresses
     * @param $subject string
     * @param $body string
     */
    public function send(array $toAdresses, $subject, $body)
    {
        $mail = new \PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->isHTML(true);
        $mail->Username = $this->gmailUsername;
        $mail->Password = $this->gmailPassword;
        $mail->setFrom($this->gmailUsername);
        $mail->Subject = mb_encode_mimeheader($subject);
        $mail->Body = $body;
        foreach ($toAdresses as $toAdress) {
            $mail->addAddress($toAdress);
        }

        $mail->send();
    }

}