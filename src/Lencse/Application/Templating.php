<?php

namespace Lencse\Application;


class Templating
{

    /**
     * @var string
     */
    private $viewDir;

    /**
     * @param string $viewDir
     */
    public function __construct($viewDir)
    {
        $this->viewDir = $viewDir;
    }

    /**
     * @param $str
     */
    public static function esc($str)
    {
        echo htmlentities($str);
    }

    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     * @param $view
     * @param ResponseData $data
     * @return string
     */
    public function render($view, ResponseData $data = null)
    {
        if (!preg_match('/^[a-zA-Z0-9_.]+$/', $view)) {
            throw new \InvalidArgumentException(sprintf('Invalid view name: %s', $view));
        }
        $viewFile = sprintf($this->viewDir . '/%s.php.inc', $view);
        if (!file_exists($viewFile)) {
            throw new \RuntimeException(sprintf('Missing view: %s', $view));
        }
        ob_start();
        require $this->viewDir . '/base.php.inc';

        return ob_get_clean();
    }

}