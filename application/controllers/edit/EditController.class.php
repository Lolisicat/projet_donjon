<?php

class EditController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        session_start();
        if(isset($_SESSION["connected"])) {
            $reponse = $queryFields["productId"];
            $editModel = new EditModel();
            $edit = $editModel->editPost($reponse);
            return ["edit" => $edit];
        }
        else {
            $http->redirectTo("/");
        }

    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        session_start();

        $last_image = $formFields["hidden"];

            /*Upload file with file conditions in file class*/
            $file = new File();
            $fileUploaded = $file->upload("file", $_FILES["file"]["size"], array('jpg', 'jpeg', 'gif', 'png'));


            /* If upload is success, injection in SQL. Else give null value*/
            if ($fileUploaded == true) {
                $file_root = "http://localhost/projet_donjon/application/www/images/" . $_SESSION["nom"] . $_SESSION["prenom"] . "/" . $_FILES["file"]["name"];
            } else {
                $file_root = $last_image;
            }

        $titre = $formFields["titre"];
        $content = $formFields["content"];
        $reponse = $_GET["productId"];
        $article = new EditModel();
        $user = $article->updatePost($titre, $content,$file_root,$reponse);
        $http->redirectTo("/members");
    }
}