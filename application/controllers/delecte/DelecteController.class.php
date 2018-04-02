<?php

class DelecteController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        /*This controller is use to display the selected article */
        session_start();
        $id =  $queryFields["productId"];
        $viewModel = new ShowarticleModel();

        /*For show this article*/
        $article = $viewModel->getViewArticle($id);

        return ["article" => $article];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        session_start();
        if(isset($_SESSION["connected"])) {
            $reponse = $_GET["productId"];
            $editModel = new DelecteModel();
            $edit = $editModel->removePost($reponse);
            $http->redirectTo("/");
        }
        else {
            $http->redirectTo("/");
        }

    }
}