<?php

class SignUp
{
    // Parents:
    use Controller;

    // Methods:
    public function index()
    {
        $user = new User();
        $data = [];
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if($user->validate($_POST))
            {
                $_POST["password"] = password_hash($_POST["password"], PASSWORD_BCRYPT);
                $user->insert($_POST);
                redirect("login");
            }
            else
            {
                $data["errors"] = $user->errors;
            }
        }

        $this->view("signup", $data);
    }
}
