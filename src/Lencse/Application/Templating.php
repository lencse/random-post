<?php

namespace Lencse\Application;


class Templating
{

    /**
     * @param $view
     * @return string
     */
    public function render($view)
    {
        if (!preg_match('/^[a-zA-Z0-9_.]+$/', $view)) {
            throw new \InvalidArgumentException(sprintf('Invalid view name: %s', $view));
        }
        $viewFile = sprintf(__DIR__ . '/views/%s.php', $view);
        if (!file_exists($viewFile)) {
            throw new \RuntimeException(sprintf('Missing view: %s', $view));
        }
        ob_start();
        require __DIR__ . '/views/base.php';

        return ob_get_clean();
    }

}