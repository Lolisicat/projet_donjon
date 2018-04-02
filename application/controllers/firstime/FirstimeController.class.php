<?php

/*This controller firstime is only intended to allow temporary account editing. It will therefore be used only once for the user.
Next editions will be done with another similar controller*/

class FirstimeController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        session_start();
        $id =  $_SESSION["id"];
        $memberModel = new MembersModel();
        $user = $memberModel->getUser($id);
        return ["userEdit"=>$user];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        session_start();
        $mail = $formFields["login"];
        $password = $formFields["password"];
        $pseudo = $formFields["pseudo"];
        $id = $_GET["productId"];
        $first = 2;
        $member = new MembersModel();
        $user = $member->updateUser($mail,$password,$pseudo,$first, $id);
        $http->redirectTo("/members");
    }
}