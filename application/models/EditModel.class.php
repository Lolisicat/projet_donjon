<?php

class EditModel {

    function editPost($reponse) {
        $database = new Database();
        $query = "SELECT
        posts.id, 
        title,
        contents,
        creation_date,
        picture,
        pseudo,
        category_name
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
        return $database->query($query,[$reponse]);
    }

    function updatePost($titre, $content, $file_root, $reponse) {
        $database = new Database();
        $query = "UPDATE 
        posts 
        SET 
        title = ?, 
        contents = ?,
        picture = ?
        WHERE 
        posts.id = ?";
        return  $database->executeSql($query,[$titre, $content, $file_root, $reponse]);
    }

}