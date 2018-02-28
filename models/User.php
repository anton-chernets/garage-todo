<?php

namespace models;

class User
{
    public $id;
    
    public $email;
    
    public $password;
    
    public $created_at;

    public static function insetSQL($email, $password, $created_at)
    {
        return "INSERT INTO `users` (`email`, `password`, `created_at`) VALUES ('".$email."', '".$password."', '".$created_at."');";
    }

    public static function findByEmail($email)
    {
        return "SELECT * from users where email = '".$email."'";
    }
}