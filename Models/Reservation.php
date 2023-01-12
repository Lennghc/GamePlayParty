<?php

require_once 'Main.php';

class Reservation extends Main
{

    public function getDataforPDF($reservation_id)
    {
        try {
            $sql = "SELECT cinema_name, cinema_reachability, reservated_date, reservation_date, reservated_people, reservated_timeslot, status_id, status_text, lounge_id ,cinema_id FROM reservation JOIN lounge USING(lounge_id) JOIN cinema USING(cinema_id) JOIN status USING(status_id) WHERE reservation_id = $reservation_id";
            $result = self::readData($sql);

            http_response_code(200);
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function setReservation($encodeField, $encodeUserData, $encodeTimeslot, $lounge_id, $open_date)
    {
        try {
            $sql = "INSERT INTO `Reservation` (`reservated_date`, `reservated_timeslot`, `lounge_id`, `user_data`, `reservated_people`, `status_id`) VALUES ('{$open_date}', '$encodeTimeslot', '{$lounge_id}', '$encodeUserData' , '$encodeField' , '5')";
            $result = self::createData($sql);

            http_response_code(201);
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }


    public function setTimeSlotInactive($lounge_id, $timeSlot, $key)
    {
        try {
            $sql = "SELECT lounge_timeslots FROM Lounge WHERE lounge_id = $lounge_id";
            $result = self::readData($sql);

            $row = $result->fetch(PDO::FETCH_ASSOC);

            $oldTimeSlot = json_decode($row['lounge_timeslots'], true);
            $newTimeSlot = json_decode($timeSlot, true);

            unset($oldTimeSlot[$key]);

            $combineArray = json_encode(array_merge($oldTimeSlot, $newTimeSlot));

            $sql = "UPDATE Lounge SET lounge_timeslots = '$combineArray' WHERE lounge_id = $lounge_id";
            $result = self::updateData($sql);

            http_response_code(201);
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
}
