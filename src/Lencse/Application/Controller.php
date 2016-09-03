<?php

namespace Lencse\Application;


class Controller
{

    public function showMainPage()
    {
        echo '<h1>I ❤ Orbán Ráhel</h1>';
    }

    public function showNotFoundPage()
    {
//        header('HTTP/1.1 404 NOT FOUND');
//        header('Content-Type: text/html; charset=utf-8');
        echo '<h1>404 NOT FOUND</h1>';
    }

}