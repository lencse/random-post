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
     * @return ResponsePresentation
     */
    public function run(Request $request)
    {
        $response =  $this->dic->getRouter()->route($request);

        return $this->dic->getResponseHandler()->handle($response);
    }

}