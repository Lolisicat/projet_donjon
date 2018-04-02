<?php

class CommentsArticleModel {

    function insertComment($pseudo, $mail, $contents, $articleId) {
        $database = new Database();
        $query = "INSERT INTO 
        comments 
        (pseudo, mail, contents, creation_date, post_id) 
        VALUES(?,?,?,NOW(),?)";
        return  $database->executeSql($query,[$pseudo,$mail,$contents, $articleId]);
    }

}