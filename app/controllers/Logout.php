<?php

class Logout
{
    // Parents:
    use Controller;

    // Methods:
    public function index()
    {
        if(!empty($_SESSION["USER"]))
        {
            unset($_SESSION["USER"]);
        }

        redirect("home");
    }
}
