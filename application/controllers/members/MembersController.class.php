<?php

class MembersController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        session_start();
        if(isset($_SESSION["connected"])) {
            $homeModel = new HomeModel();
            $article = $homeModel->getAll();
            return ["article" => $article];
        }
        else {
            $http->redirectTo("/");
        }
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        session_start();
    }
}