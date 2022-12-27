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

    public function create($lounge_nmr, $lounge_chair_places,$lounge_wheelchair_places,$lounge_screensize,$lounge_open_date,$lounge_timeslots,$cinema_id)
    {
        try {
            $sql = "INSERT INTO `Lounge` (`lounge_nmr`, `lounge_chair_places`,`lounge_wheelchair_places`,`lounge_screensize`,`lounge_open_date`,`lounge_timeslots`,`cinema_id`) VALUES ('{$lounge_nmr}','{$lounge_chair_places}','{$lounge_wheelchair_places}','{$lounge_screensize}','{$lounge_open_date}','{$lounge_timeslots}','{$cinema_id}')";
            $result = self::createData($sql);
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function timeSlots($cinema_id)
    {
        try {
            $sql = "SELECT lounge_open_date, lounge_timeslots, lounge_id FROM Lounge WHERE `lounge_open_date` >= NOW() + INTERVAL 2 DAY AND `lounge_timeslots` IS NOT NULL AND `cinema_id` = $cinema_id";
            $results = self::readsData($sql);
            return $results;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function removeTime($lounge_id,$timeslots)
    {
        try {
            $sql = "UPDATE `Lounge` set `lounge_timeslots` = '$timeslots' WHERE lounge_id = $lounge_id";
            $results = self::updateData($sql);
            return $results;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
