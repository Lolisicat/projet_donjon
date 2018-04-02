<?php

class ShowarticleModel {

    function getViewArticle($id) {
        $database = new Database();
        $query = "SELECT *,
        posts.id as postId
        FROM
        posts
        INNER JOIN 
        users 
        ON user_id = users.id 
        INNER JOIN 
        category
        ON category_id = category.id
        WHERE
        posts.id = ?";

        return $database->queryOne($query,[$id]);
    }

    function getViewComment($id) {
        $database = new Database();
        $query = "SELECT *
        FROM
        comments
        WHERE 
        post_id = ?";

        return $database->query($query,[$id]);
    }


}