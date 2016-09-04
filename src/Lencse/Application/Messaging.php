<?php

namespace Lencse\Application;


class Messaging
{

    const SESSION_KEY = 'post-message';

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @param SessionInterface $session
     */
    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
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
        $this->session->clear();

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
     * @throws \phpmailerException
     */
    private function sendNotificationMails(\Exception $exception)
    {
        $mail = new \PHPMailer(); // create a new object
        $mail->IsSMTP(); // enable SMTP
        $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587; // or 587
        $mail->IsHTML(true);
        $mail->Username = "lencsetest@gmail.com";
        $mail->Password = "T3stingM4il";
        $mail->SetFrom("lencsetest@gmail.com");
        $mail->Subject = mb_encode_mimeheader("Hiba a Random Post alkalmazásban");
        $mail->Body = $exception->getMessage() . "\n" . $exception->getTraceAsString();
        $mail->AddAddress("leventeloki@gmail.com");
        $mail->AddAddress("lokilevente@yahoo.com");

        !$mail->Send();
    }

}