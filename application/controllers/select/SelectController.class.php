<?php

class SelectController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        /* This controller allows you to select the character you want to see. We use JSON method with AJAX*/
        $descrModel = new DescriptionModel();
        $players = $descrModel->getOne($queryFields);
        $http->sendJsonResponse($players);
    }

    public function httpPostMethod(Http $http, array $formFields)
    {

    }

}
