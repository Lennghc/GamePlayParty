<?php
require_once 'Main.php';

class Lounge extends Main
{

    public function ownLounges($user_id)
    {
        try {
            $sql = "SELECT cinema_name AS BioscoopNaam, lounge_nmr AS ZaalNaam_Nummer, lounge_open_date AS Open_op FROM Cinema JOIN Lounge USING(cinema_id) WHERE user_id = $user_id";
            $result = self::readsData($sql);
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function create($lounge_nmr, $lounge_chair_places, $lounge_wheelchair_places, $lounge_screensize, $lounge_open_date, $lounge_timeslots, $cinema_id)
    {
        try {
            $sql = "INSERT INTO `Lounge` (`lounge_nmr`, `lounge_chair_places`,`lounge_wheelchair_places`,`lounge_screensize`,`lounge_open_date`,`lounge_timeslots`,`cinema_id`) VALUES ('{$lounge_nmr}','{$lounge_chair_places}','{$lounge_wheelchair_places}','{$lounge_screensize}','{$lounge_open_date}','{$lounge_timeslots}','{$cinema_id}')";
            $result = self::createData($sql);
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function timeSlots($week_start, $week_end, $cinema_id)
    {
        try {
            $sql = "SELECT lounge_open_date, lounge_timeslots, lounge_id FROM Lounge WHERE lounge_open_date BETWEEN '$week_start' AND '$week_end' AND cinema_id = $cinema_id";
            $results = self::readsData($sql);
            $result = $results->fetchall(PDO::FETCH_ASSOC);

            if (!$result) {
                $errors[] = "Geen reservering gevonden.";
            } else {
                http_response_code(201);

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


    public function getCinemaIDByLoungeID($lounge_id)
    {
        try {
            $sql = "SELECT cinema_id FROM Lounge JOIN Cinema USING(cinema_id) WHERE lounge_id = $lounge_id";
            $result = self::readData($sql);
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

}
