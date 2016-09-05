<?php

namespace Lencse\Application;


class Security
{
    const SESSION_KEY = 'csrf-token';

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
     * @return string
     */
    public function getCsrfToken()
    {
        if ($this->session->has(self::SESSION_KEY)) {
            return substr($this->session->get(self::SESSION_KEY), 0, 100);
        }
        $token = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
        $this->session->set(self::SESSION_KEY, $token);

        return $this->getCsrfToken();
    }

    /**
     * @param $token
     * @return bool
     */
    public function validateCsrfToken($token)
    {
        return hash_equals($this->getCsrfToken(), $token);
    }

}