<?php

class File {

    function upload($index, $maxsize, $extensions)
{

    //Test1: correct upload
    if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0) {

    }
    else {

    //Test2: limit size
        if ($maxsize !== FALSE AND $_FILES[$index]['size'] > 2097152) {

        }
        else {

    //Test3: correct extension
        $ext = strtolower(  substr(  strrchr($_FILES[$index]['name'], '.')  ,1)  );
            if (!in_array($ext,$extensions) ) {

            }
            else {
    //Move file
                if (!file_exists(WWW_PATH."/images/".$_SESSION["pseudo"])){
                    mkdir(WWW_PATH."/images/".$_SESSION["pseudo"]);
                }
                else {
    $_FILES[$index]["name"] = uniqid().$_FILES[$index]["name"];
    return move_uploaded_file($_FILES[$index]['tmp_name'],WWW_PATH."/images/".$_SESSION["pseudo"]."/".$_FILES[$index]["name"]);

                }
}}}

}}