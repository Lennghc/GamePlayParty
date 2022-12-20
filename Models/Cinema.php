<?php

require_once 'Main.php';


class Cinema extends Main
{
    public function all()
    {
        try {
            $sql = "SELECT cinema_id,cinema_name FROM Cinema";
            $results = self::readsData($sql);
            return $results;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
