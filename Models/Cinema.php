<?php

require_once 'Main.php';


class Cinema extends Main
{
    public function all()
    {
        try {
            $sql = "SELECT cinema_id,cinema_name,cinema_desc FROM Cinema WHERE cinema_desc IS NOT NULL";
            $results = self::readsData($sql);
            return $results;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function read($cinema_id)
    {
        try {
            $sql = "SELECT cinema_id,cinema_name,cinema_desc FROM Cinema WHERE cinema_id = $cinema_id";
            $results = self::readsData($sql);
            return $results;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
