<?php

class DeleteUser
{
    // Parents:
    use Controller;

    // Methods:
    public function index()
    {
        $user = new User();
        $data = [];

        /* Redirect to home page if the user tried to go to "deleteuser" without using the actual Delete button */
        if(empty($_GET["userId"]))
        {
            redirect("home");
        }

        $userId = (int)$_GET["userId"] ?? "";

        $userData = $user->first(["id" => $userId]);
        $data["userData"] = $userData;

        if(isset($_POST["finalAction"])){
            switch ($_POST["finalAction"])
            {
                case "confirm":
                    $user->delete($userId);
                    redirect("home");
                break;

                case "cancel":
                    redirect("home");
                    break;
            }
        }

        $this->view("deleteuser", $data);
    }
}