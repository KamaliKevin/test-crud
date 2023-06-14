<?php

class Login
{
    // Parents:
    use Controller;

    // Methods:
    public function index()
    {
        $user = new User();
        $data = [];

        if($_SERVER["REQUEST_METHOD"] == "POST")
        {

            $arr["email"] = $_POST["email"];

            $row = $user->first($arr);

            if($row)
            {
                if (password_verify($_POST["password"], $row->password))
                {
                    $_SESSION["USER"] = $row;
                    redirect("home");
                }
            }

            /* Errors */
            $user->errors["wrongData"] = "Wrong email or password";

            $data["errors"] = $user->errors;
        }

        $this->view("login", $data);
    }
}