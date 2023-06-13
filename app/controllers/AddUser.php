<?php

class AddUser
{
    // Parents:
    use Controller;

    // Methods:
    public function index()
    {
        $user = new User();
        $data = [];

        $data["userData"] = $_POST ?? [];

        if(isset($_POST["finalAction"])){
            switch($_POST["finalAction"])
            {
                case "confirm":
                    if($user->validateAdd($_POST))
                    {
                        $_POST["password"] = password_hash($_POST["password"], PASSWORD_BCRYPT);
                        $user->insert($_POST);
                        redirect("home");
                    }
                    else
                    {
                        $data["errors"] = $user->errors;
                    }

                break;


                case "cancel":
                    redirect("home");
                break;

            }
        }

        $this->view("adduser", $data);
    }
}