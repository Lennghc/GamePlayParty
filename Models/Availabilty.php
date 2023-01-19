<?php

require_once 'Main.php';


class Availabilty extends Main
{

    public function insertAvailabilty($lounge_id, $date, $time)
    {
        try {
            $sql = "INSERT INTO `Availabilty` (`lounge_id`, `availabilty_date`, `availabilty_time`) VALUES ('{$lounge_id}', '{$date}','{$time}')";
            $result = self::createData($sql);
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function updateAvailabilty($content_id, $content_title, $content_main, $content_extra)
    {
        try {
            $sql = "UPDATE `Content` SET `content_title`='{$content_title}', `content_main`='{$content_main}', `content_extra`='{$content_extra}' WHERE `content_id`= $content_id";
            $results = self::updateData($sql);
            return $results;
        } catch (Exception $e) {
            throw $e;
        }
    }


    public function collectallAvailabilty($user_id)
    {
        try {
            $sql = "SELECT availabilty_id AS ID, cinema_name AS BioscoopNaam, lounge_nmr AS ZaalNummer, availabilty_date as Zaal_open_op FROM Cinema JOIN Lounge USING(cinema_id) JOIN Availabilty USING(lounge_id) WHERE user_id = $user_id";
            $result = self::readData($sql);
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
