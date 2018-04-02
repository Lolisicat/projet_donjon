<?php

class HomeModel {

    function getAll() {
        $database = new Database();
        $query = "SELECT
        posts.id, 
        title,
        contents,
        creation_date,
        pseudo,
        picture,
        category_name,
        user_id,
        category_id
        FROM
        posts
        INNER JOIN 
        users 
        ON user_id = users.id 
        INNER JOIN 
        category
        ON category_id = category.id
        ORDER BY 
        posts.id 
        DESC";
        return $database->query($query);
    }


}