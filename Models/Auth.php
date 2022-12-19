<?php

require_once 'Main.php';

class Auth extends Main
{
    public function create($username, $email, $password)
    {
        try {
            $errors = array();

            $sql = "SELECT * FROM `Users` WHERE `username`='{$username}' OR `email`='{$email}'";
            $result = self::readsData($sql);

            if ($result->rowCount() > 0) {
                $errors[] = "Username or email is already linked to a account.";
            } else {
                $password = Functions::encrypt($password);
                $sql = "INSERT INTO `users` (`username`, `email`, `password`, `created_at`) VALUES ('{$username}', '{$email}', '{$password}', NOW())";
                $result = self::createData($sql);

                http_response_code(201);

                return $result;
            }

            return (object) [
                'errors' => $errors
            ];
        } catch (Exception $e) {
            throw $e;
        }
    }
}
