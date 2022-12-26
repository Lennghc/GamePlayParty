<?php

require_once 'Main.php';

class Reservation extends Main
{

    public function setTimeSlot($timeslot, $date, $lounge_id, $user_id)
    {
        try {
            $sql = "INSERT INTO `Reservation` (`reservated_date`, `reservated_timeslot`, `lounge_id`, `user_id`, `status_id`) VALUES ('{$date}', '$timeslot', '{$lounge_id}', '{$user_id}' , '5')";
            $result = self::createData($sql);
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getReservatedTimeSlots()
    {
        try {
            $sql = "SELECT reservated_timeslot, reservated_date, lounge_id FROM Reservation";
            $result = self::readData($sql);
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function hasReservation($user_id)
    {
        try {
            $sql = "SELECT user_fname, user_insertion, user_lname, user_streetname, user_city, user_zipcode, user_tel, user_house_nmr, user_username, user_email, reservation_id, user_id FROM Reservation JOIN Users USING(user_id) WHERE user_id = $user_id AND status_id = 4 OR status_id = 5";
            $result = self::readData($sql);
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
