<?php

class HomeController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        session_start();
        $homeModel = new HomeModel();
        $article = $homeModel->getAll();
        return ["article"=>$article];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {

    }
}