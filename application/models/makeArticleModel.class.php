<?php

class MakearticleModel {

    function getCategories() {
        $database = new Database();
        $query = "SELECT 
        *
        FROM 
        category";
        return $database->query($query);
    }

    function makeArticle($titre, $category, $content, $id, $file_root) {
        $database = new Database();
        $query = "INSERT INTO posts (title, category_id, contents, user_id, creation_date, picture) VALUES(?,?,?,?,NOW(),?)";
        return $database->executeSql($query,[$titre, $category, $content, $id, $file_root]);
    }

}