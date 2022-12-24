<?php

require_once 'Main.php';

class Reservation extends Main
{

    public function setTimeSlot($timeslot, $date, $lounge_id, $user_id)
    {
        try {
            $sql = "INSERT INTO `Reservation` (`reservated_date`, `reservated_timeslot`, `lounge_id`, `user_id`) VALUES('{$date}', '$timeslot', '{$lounge_id}', '{$user_id}')";
            $result = self::createData($sql);
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function beforeCheckTimeSlot()
    {
        try {
            $sql = "SELECT reservated_timeslot, reservated_date, lounge_id FROM Reservation";
            $result = self::readData($sql);
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
