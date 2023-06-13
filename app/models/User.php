<?php

class User
{
    // Parents:
    use Model;

    // Properties:
    protected $table = "users";
    protected $allowedColumns = [
        "username",
        "password",
        "firstName",
        "lastName",
        "dateOfBirth",
        "email",
        "phoneNumber"
    ];
    
    // Methods:
    public function validate($data): bool
    {
        $this->errors = [];
        $usernameIsTaken = $this->first(["username" => $data["username"]]);
        $emailIsTaken = $this->first(["email" => $data["email"]]);

        /* Username */
        if(empty($data["username"]))
        {
            $this->errors["username"] = "Username is required";
        }
        else if($usernameIsTaken)
        {
            $this->errors["username"] = "Username is being used by another user";
        }

        /* First name */
        if(empty($data["firstName"]))
        {
            $this->errors["firstName"] = "First name is required";
        }

        /* Last name */
        if(empty($data["lastName"]))
        {
            $this->errors["lastName"] = "Last name is required";
        }

        /* Date of birth */
        if(empty($data["dateOfBirth"]))
        {
            $this->errors["dateOfBirth"] = "Date of birth is required";
        }

        /* Email */
        if(empty($data["email"]))
        {
            $this->errors["email"] = "Email is required";
        }
        else if(!filter_var($data["email"], FILTER_VALIDATE_EMAIL))
        {
            $this->errors["email"] = "Email is not valid. Example format: name@example.com";
        }
        else if($emailIsTaken)
        {
            $this->errors["email"] = "Email is being used by another user";
        }

        /* Password */
        if(empty($data["password"]))
        {
            $this->errors["password"] = "Password is required";
        }

        /* Terms */
        if(empty($data["terms"]))
        {
            $this->errors["terms"] = "You must accept the terms to create an account";
        }

        /* Result */
        if(empty($this->errors))
        {
            return true;
        }

        return false;
    }

    public function validateEdit($data): bool
    {
        $this->errors = [];

        /* Username */
        if(empty($data["username"]))
        {
            $this->errors["username"] = "Username is required";
        }

        /* First name */
        if(empty($data["firstName"]))
        {
            $this->errors["firstName"] = "First name is required";
        }

        /* Last name */
        if(empty($data["lastName"]))
        {
            $this->errors["lastName"] = "Last name is required";
        }

        /* Date of birth */
        if(empty($data["dateOfBirth"]))
        {
            $this->errors["dateOfBirth"] = "Date of birth is required";
        }

        /* Email */
        if(empty($data["email"]))
        {
            $this->errors["email"] = "Email is required";
        }
        else if(!filter_var($data["email"], FILTER_VALIDATE_EMAIL))
        {
            $this->errors["email"] = "Email is not valid. Example format: name@example.com";
        }


        /* Result */
        if(empty($this->errors))
        {
            return true;
        }

        return false;
    }

    public function validateAdd($data): bool
    {
        $this->errors = [];
        $usernameIsTaken = $this->first(["username" => $data["username"]]);
        $emailIsTaken = $this->first(["email" => $data["email"]]);

        /* Username */
        if(empty($data["username"]))
        {
            $this->errors["username"] = "Username is required";
        }
        else if($usernameIsTaken)
        {
            $this->errors["username"] = "Username is being used by another user";
        }

        /* First name */
        if(empty($data["firstName"]))
        {
            $this->errors["firstName"] = "First name is required";
        }

        /* Last name */
        if(empty($data["lastName"]))
        {
            $this->errors["lastName"] = "Last name is required";
        }

        /* Date of birth */
        if(empty($data["dateOfBirth"]))
        {
            $this->errors["dateOfBirth"] = "Date of birth is required";
        }

        /* Email */
        if(empty($data["email"]))
        {
            $this->errors["email"] = "Email is required";
        }
        else if(!filter_var($data["email"], FILTER_VALIDATE_EMAIL))
        {
            $this->errors["email"] = "Email is not valid. Example format: name@example.com";
        }
        else if($emailIsTaken)
        {
            $this->errors["email"] = "Email is being used by another user";
        }

        /* Password */
        if(empty($data["password"]))
        {
            $this->errors["password"] = "Password is required";
        }

        /* Result */
        if(empty($this->errors))
        {
            return true;
        }

        return false;
    }
}