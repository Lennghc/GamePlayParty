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
            $sql = "SELECT user_fname, user_insertion, user_lname, user_streetname, user_city, user_zipcode, user_tel, user_house_nmr, user_username, user_email, reservation_id, user_id,lounge_id FROM Reservation JOIN Users USING(user_id) WHERE status_id = 4 OR status_id = 5 AND user_id = $user_id";
            $result = self::readData($sql);
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function ownCinemasReservations($user_id)
    {
        try {
            $sql = "SELECT cinema_id FROM Cinema WHERE user_id = $user_id";
            $result = self::readData($sql);
            $fetch = $result->fetchall(PDO::FETCH_ASSOC);

            $sql = "SELECT reservation_id AS ID, cinema_name AS BioscoopNaam, user_fname AS KlantNaam, status_text AS Status FROM Reservation JOIN Users USING(user_id) JOIN Lounge USING(lounge_id) JOIN Cinema USING(cinema_id) JOIN Status USING(status_id) WHERE cinema_id = {$fetch[0]['cinema_id']} AND status_id = 2";
            $result = self::readsData($sql);
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function allReservationCinemas()
    {
        try {
            $sql = "SELECT reservation_id AS ID, cinema_name AS BioscoopNaam, user_fname AS KlantNaam, status_text AS Status FROM Reservation JOIN Users USING(user_id) JOIN Lounge USING(lounge_id) JOIN Cinema USING(cinema_id) JOIN Status USING(status_id) WHERE status_id = 2";
            $result = self::readsData($sql);
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function updateUser($id, $fName, $mName, $lName, $street, $house_nmr, $zipcode, $city, $tel)
    {
        try {
            $sql = "UPDATE Users SET user_fname = '{$fName}', user_insertion = '{$mName}', user_lname = '{$lName}', user_streetname = '{$street}', user_house_nmr = '{$house_nmr}', user_city = '{$city}', user_zipcode = '{$zipcode}', user_tel = '{$tel}' WHERE user_id = $id";
            $result = self::updateData($sql);
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }


}
