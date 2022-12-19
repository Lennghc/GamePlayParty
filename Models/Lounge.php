<?php
require_once 'Main.php';

class Lounge extends Main 
{
    public function timeSlots($cinema_id)
    {
        try {
            $sql = "SELECT lounge_open_date, lounge_open_hours FROM Lounge WHERE `lounge_open_date` >= NOW() + INTERVAL 2 DAY AND `cinema_id` = $cinema_id";
            $results = self::readsData($sql);
            return $results;
        } catch (Exception $e) {
            throw $e;
        }
    }

}