<?php

namespace Lencse\Application;


class Application
{

    /**
     * @var Router
     */
    private $router;

    /**
     * @var ResponseHandler
     */
    private $responseHandler;

    /**
     * @param Router $router
     * @param ResponseHandler $responseHandler
     */
    public function __construct(Router $router, ResponseHandler $responseHandler)
    {
        $this->router = $router;
        $this->responseHandler = $responseHandler;
    }

    /**
     * @param Request $request
     * @return ResponsePresentation
     */
    public function run(Request $request)
    {
        try {
            $response = $this->router->route($request);
            return $this->responseHandler->handle($response);
        } catch (\Exception $e) {
            syslog(LOG_ERR, $e->getMessage());

            if (session_status() !== PHP_SESSION_ACTIVE) {
                session_start();
            }
            $_SESSION['post-message'] = $e->getMessage();
            $_SESSION['type'] = 'error';

            // EZ A TUTI KOD
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
            $mail->Body = $e->getMessage() . "\n" . $e->getTraceAsString();
            $mail->AddAddress("leventeloki@gmail.com");
            $mail->AddAddress("lokilevente@yahoo.com");

            !$mail->Send();

            header('Location: /');
        }
    }

}