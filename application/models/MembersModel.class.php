<?php

class MembersModel {

    function logUser($log, $pass) {
        $database = new Database();
        $query = "SELECT * FROM users WHERE mail = ? AND password = ?";
        return $database->queryOne($query,[$log,$pass]);
    }

    function getUser($id) {
        $database = new Database();
        $query = "SELECT * FROM users WHERE id = ?";
        return $database->queryOne($query,[$id]);
    }

    function updateUser($mail, $password, $pseudo, $first, $id) {
        $database = new Database();
        $query = "UPDATE 
        users 
        SET 
        mail = ?, 
        password = ?,
        pseudo = ?,
        first_connected = ?
        WHERE 
        id = ?";
        return  $database->executeSql($query,[$mail,$password,$pseudo,$first, $id]);
    }

}