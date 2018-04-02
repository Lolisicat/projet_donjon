<?php

class DelecteModel {

    function removePost($reponse) {
        $database = new Database();
        $query = "DELETE FROM 
        posts
        WHERE
        posts.id = ?";
        return $database->executeSql($query,[$reponse]);
    }


}