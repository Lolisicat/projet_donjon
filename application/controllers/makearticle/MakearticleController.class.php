<?php

class MakearticleController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        session_start();
        /*first secure page*/
        if(isset($_SESSION["connected"])) {
            $articleModel = new makeArticleModel();
            $article = $articleModel->getCategories();
            return ["article" => $article];
        }
        else {
            $http->redirectTo("/");
        }

    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        session_start();

        /*Upload file with file conditions in file class*/
        $file = new File();
        $fileUploaded = $file->upload("fileToUpload", $_FILES["fileToUpload"]["size"], array( 'jpg' , 'jpeg' , 'gif' , 'png' ));

        /* If upload is success, injection in SQL. Else give null value*/
        if($fileUploaded == true) {
            $file_root = "http://localhost/projet_donjon/application/www/images/" . $_SESSION["pseudo"] . "/" . $_FILES["fileToUpload"]["name"];
        }
        else {
            $file_root = NULL;
        }

          $titre = $formFields["titre"];
          $category = $formFields["category"];
          $content = $formFields["content"];
          $id = $_SESSION["id"];
          $article = new makeArticleModel();
          $user = $article->makeArticle($titre, $category, $content, $id, $file_root);
          $http->redirectTo("/");
    }
}