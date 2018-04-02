<?php

class DescriptionModel {

    function getDescr() {
        $database = new Database();
        $query = "SELECT * FROM players_details";
        return $database->query($query);
    }

    function getOne($queryFields) {
        $id = [$queryFields["id"]];
        $database = new Database();
        $query = "SELECT * FROM players_details WHERE id = ?";
        return $database->queryOne($query,$id);
    }

}