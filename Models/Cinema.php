<?php

require_once 'Main.php';


class Cinema extends Main
{
    public function all()
    {
        try {
            $sql = "SELECT cinema_id,cinema_name FROM Cinema WHERE cinema_desc IS NOT NULL";
            $results = self::readsData($sql);
            self::__destruct();
            return $results;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function read($cinema_id)
    {
        try {
            $sql = "SELECT cinema_id,cinema_name,cinema_desc,lounge_id FROM Cinema JOIN Lounge USING(cinema_id) WHERE cinema_id = $cinema_id LIMIT 1";
            $results = self::readData($sql);
            self::__destruct();
            return $results;
        } catch (Exception $e) {
            throw $e;
        }
    }
    public function create($name, $desc, $reachability, $user_id)
    {
        try {
            $sql = "INSERT INTO Cinema (`cinema_name`, `cinema_desc`,`cinema_reachability`, `user_id`) VALUES ('{$name}', '{$desc}', '{$reachability}', '{$user_id}')";
            $results = self::createData($sql);
            self::__destruct();
            return $results;
        } catch (Exception $e) {
            throw $e;
        }
    }
    public function readAll($cinema_id)
    {
        try {
            $sql = "SELECT cinema_name AS Naam, cinema_desc AS Beschrijving FROM Cinema WHERE cinema_id = $cinema_id";
            $results = self::readData($sql);
            self::__destruct();
            return $results;
        } catch (Exception $e) {
            throw $e;
        }
    }
    public function update()
    {
    }
    public function deactivate($cinema_id)
    {
        try {
            $sql = "UPDATE Cinema SET is_active = false WHERE cinema_id = '{$cinema_id}'";
            $results = self::readData($sql);
            self::__destruct();
            return $results;
        } catch (Exception $e) {
            throw $e;
        }
    }
    public function activate($cinema_id)
    {
        try {
            $sql = "UPDATE Cinema SET is_active = true WHERE cinema_id = '{$cinema_id}'";
            $results = self::readData($sql);
            self::__destruct();
            return $results;
        } catch (Exception $e) {
            throw $e;
        }
    }
    public function showAll()
    {
        try {
            $sql = "SELECT cinema_id AS id, cinema_name AS name FROM Cinema";
            $results = self::readData($sql);
            self::__destruct();
            return $results;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function hasCinema($user_id)
    {
        try {
            $sql = "SELECT cinema_id FROM Cinema WHERE user_id = $user_id";
            $result = self::readData($sql);
            self::__destruct();
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
