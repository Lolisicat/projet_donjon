<?php

class DelecteModel {

    function removePost($reponse,$comments) {
        $database = new Database();
        $query = "
        BEGIN;
        DELETE FROM posts WHERE posts.id = ?;
        DELETE FROM comments WHERE comments.post_id = ?;
        COMMIT;";
        return $database->executeSql($query,[$reponse,$comments]);
    }


}