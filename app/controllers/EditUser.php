<?php

class EditUser
{
    // Parents:
    use Controller;

    // Methods:
    public function index()
    {
        $user = new User();
        $data = [];

        /* Redirect to home page if the user tried to go to "edituser" without using an ID nor login */
        if(!isset($_SESSION["USER"]) || empty($_GET["userId"]))
        {
            redirect("home");
        }

        $userId = (int)$_GET["userId"] ?? "";

        $userData = $user->first(["id" => $userId]);
        $data["userData"] = $userData;

        $newUsername = $_POST["username"] ?? "";
        $newFirstName = $_POST["firstName"] ?? "";
        $newLastName = $_POST["lastName"] ?? "";
        $newDateOfBirth = $_POST["dateOfBirth"] ?? "";
        $newEmail = $_POST["email"] ?? "";
        $newPhoneNumber = $_POST["phoneNumber"] ?? "";

        if(isset($_POST["finalAction"])){
            switch ($_POST["finalAction"])
            {
                case "confirm":
                    if($user->validateEdit($_POST))
                    {
                        $user->update($userId, ["username" => $newUsername, "firstName" => $newFirstName, "lastName" => $newLastName,
                            "dateOfBirth" => $newDateOfBirth, "email" => $newEmail, "phoneNumber" => $newPhoneNumber]);
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

        $this->view("edituser", $data);
    }
}