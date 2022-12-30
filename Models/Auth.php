<?php

require_once 'Main.php';

class Auth extends Main
{

    public function update($id, $fName, $mName, $lName, $street, $house_nmr, $zipcode, $city, $tel, $role_id)
    {
        try {
            $sql = "UPDATE Users SET user_fname = '{$fName}', user_insertion = '{$mName}', user_lname = '{$lName}', user_streetname = '{$street}', user_house_nmr = '{$house_nmr}', user_city = '{$city}', user_zipcode = '{$zipcode}', user_tel = '{$tel}', role_id = '{$role_id}' WHERE user_id = $id";
            $result = self::updateData($sql);
            self::__destruct();
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function collectUserData($id)
    {
        try {
            $sql = "SELECT * FROM Users WHERE user_id = $id";
            $result = self::readData($sql);
            

            $sql = "SELECT * FROM Roles";
            $result2 = self::readsData($sql);
            return [$result, $result2];
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function all($user_id)
    {
        try {
            $sql = "SELECT user_id AS ID,user_email AS Email,role_name AS Role FROM Users JOIN Roles USING(role_id) WHERE user_id != $user_id";
            $result = self::readsData($sql);
            self::__destruct();
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function create($username, $email, $password)
    {
        try {
            $errors = array();

            $sql = "SELECT * FROM `Users` WHERE `user_username` = '{$username}' AND `user_email`='{$email}'";
            $result = self::readsData($sql);

            if ($result->rowCount() > 0) {
                $errors[] = "username or email is already linked to a account.";
            } else {
                $password = Functions::encrypt($password);
                $sql = "INSERT INTO `Users` (`user_username`, `user_email`, `user_password`, `role_id`) VALUES ('{$username}','{$email}', '{$password}', 1)";
                $result = self::createData($sql);

                http_response_code(201);
                self::__destruct();
                return $result;
            }

            return (object) [
                'errors' => $errors
            ];
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function login($email, $password)
    {
        try {
            $errors = array();
            $password = Functions::encrypt($password);

            $sql = "SELECT * FROM `Users` WHERE user_email = '{$email}' AND user_password = '{$password}'";
            $result = self::readsData($sql);
            $result = $result->fetch(PDO::FETCH_ASSOC);

            if (!$result) {
                $errors[] = "Password or email are incorrect.";
            } else {
                $_SESSION['user'] = (object)array(
                    'id' => $result['user_id'],
                    'username' => $result['user_username'],
                    'role_id' => $result['role_id'],
                );

                setcookie('user', json_encode($_SESSION['user']));
                self::__destruct();
                return $result;
            }

            http_response_code(401);

            return (object) [
                'errors' => $errors
            ];
        } catch (Exception $e) {
            throw $e;
        }
    }
}
