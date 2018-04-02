<?php

class DescriptionController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        session_start();
        $descrModel = new DescriptionModel();
        $descr = $descrModel->getDescr();
        return ["descr"=>$descr];

    }

    public function httpPostMethod(Http $http, array $formFields)
    {

    }
}