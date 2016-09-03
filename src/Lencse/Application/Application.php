<?php

namespace Lencse\Application;


class Application
{

    /**
     * @var DIContainer
     */
    private $dic;

    /**
     * @param DIContainer $dic
     */
    public function __construct(DIContainer $dic)
    {
        $this->dic = $dic;
    }

    /**
     * @param Request $request
     */
    public function run(Request $request)
    {
        return $this->dic->getRouter()->route($request);
    }

}