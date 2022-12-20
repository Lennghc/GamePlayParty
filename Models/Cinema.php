<?php

require_once 'Main.php';


class Cinema extends Main
{
    public function allCinema()
    {
        try {
            $sql = "SELECT * FROM Cinema JOIN Lounge USING(cinema_id)";
            $results = self::readsData($sql);
            return $results;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
