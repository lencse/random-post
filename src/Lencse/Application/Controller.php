<?php

namespace Lencse\Application;


class Controller
{

    /**
     * @return Response
     */
    public function showMainPage()
    {
        return new Response('main', 200);
    }

    /**
     * @return Response
     */
    public function showNotFoundPage()
    {
        return new Response('404', 404  );
    }

}