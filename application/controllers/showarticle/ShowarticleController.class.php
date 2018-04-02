<?php

class ShowarticleController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        /*This controller is use to display the selected article */
        session_start();
        $id =  $queryFields["productId"];
        $viewModel = new ShowarticleModel();

        /*For show this article*/
        $article = $viewModel->getViewArticle($id);

        /*For show all comments in this article*/
        $comments =  $viewModel->getViewComment($id);
        $article['comments'] = $comments;

        return ["article" => $article];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        $pseudo = $formFields["pseudo"];
        $mail = $formFields["mail"];
        $contents = $formFields["comment"];
        $articleId = $_GET["productId"];

        $insertComment = new CommentsArticleModel();
        $insert = $insertComment->insertComment($pseudo, $mail, $contents, $articleId);

        $http->redirectTo("/showarticle?productId=".$articleId);

    }
}