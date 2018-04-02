<?php

class LoginController
{

    public function httpGetMethod(Http $http, array $formFields)
    {

    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        $log = $formFields["login"];
        $password = $formFields["password"];
        $MembersModel = new MembersModel();
        $member = $MembersModel->logUser($log, $password);

        /*temporary error message condition before plugin installation */

        if($member == false) {
            echo $message = "Hum... Essaie encore";

        }
        else {
            session_start();

            /*Several ranks exist in this project, so we need the rank in sql to make our conditions in views.*/

            $_SESSION["connected"] = true;
            $_SESSION["rank"] = $member["rank_id"];
            $_SESSION["id"] = $member["id"];
            $_SESSION["pseudo"] = $member["pseudo"];
            $_SESSION["email"] = $member["mail"];

            /*
            this condition allows you to edit an account (password, username, email)
            because the account creation is not open.
            So I create temporary accounts that will be transmitted to each users.
            Once the first edition is done, the condition is over.
             */

            if ($member["first_connected"] == "1") {
                $http->redirectTo("/firstime");
            }
            else {
                $http->redirectTo("/members");
            }
        }
    }
}