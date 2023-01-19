<?php
require_once 'Main.php';

class Lounge extends Main
{

    public function ownLounges($user_id)
    {
        try {
            $sql = "SELECT cinema_id FROM Cinema WHERE user_id = $user_id";
            $result = self::readsData($sql);
            $result = $result->fetch(PDO::FETCH_ASSOC);

            $sql = "SELECT lounge_nmr AS ZaalNummer_naam, lounge_id AS ID, is_active FROM  Lounge WHERE cinema_id = {$result['cinema_id']}";
            $result = self::readsData($sql);
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function collectAllLounges($user_id)
    {
        try {
            $sql = "SELECT cinema_id FROM Cinema WHERE user_id = $user_id";
            $result = self::readsData($sql);
            $result = $result->fetch(PDO::FETCH_ASSOC);

            $sql = "SELECT lounge_id, lounge_nmr, is_active FROM Lounge WHERE cinema_id = {$result['cinema_id']} AND is_active = 1";
            $result = self::readsData($sql);

            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function create($lounge_nmr, $lounge_chair_places, $lounge_wheelchair_places, $lounge_screensize, $cinema_id)
    {
        try {
            $sql = "INSERT INTO `Lounge` (`lounge_nmr`, `lounge_chair_places`,`lounge_wheelchair_places`,`lounge_screensize`,`is_active`,`cinema_id`) VALUES ('{$lounge_nmr}','{$lounge_chair_places}','{$lounge_wheelchair_places}','{$lounge_screensize}', false ,'{$cinema_id}')";
            $result = self::createData($sql);
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function timeSlots($week_start, $week_end, $cinema_id)
    {
        try {
            $sql = "SELECT availabilty_date, availabilty_time, availabilty_id, lounge_id FROM Lounge JOIN Availabilty USING(lounge_id) WHERE availabilty_date BETWEEN '$week_start' AND '$week_end' AND cinema_id = $cinema_id ORDER BY availabilty_date ASC";
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

    public function read($lounge_id)
    {
        try {
            $sql = "SELECT lounge_nmr, lounge_chair_places, lounge_wheelchair_places, lounge_screensize FROM Lounge WHERE lounge_id = $lounge_id";
            $result = self::readData($sql);
            $result = $result->fetch(PDO::FETCH_ASSOC);

            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function update($lounge_id, $lounge_nmr, $lounge_chair_places, $lounge_wheelchair_places, $lounge_screensize)
    {
        try {
            $sql = "UPDATE Lounge SET `lounge_nmr` = '$lounge_nmr', `lounge_chair_places` = '$lounge_chair_places', `lounge_wheelchair_places` = '$lounge_wheelchair_places', `lounge_screensize` = '$lounge_screensize' WHERE lounge_id = $lounge_id";
            $result = self::updateData($sql);
            $result = $result->fetch(PDO::FETCH_ASSOC);

            if (!$result) {
                $errors[] = "Zaal niet geupdate!";
            } else {
                return $result;
            }

            return (object) [
                'errors' => $errors
            ];
        } catch (Exception $e) {
            throw $e;
        }
    }


    public function activate($lounge_id)
    {
        try {
            $sql = "UPDATE Lounge SET `is_active` = true WHERE lounge_id = $lounge_id";
            $result = self::updateData($sql);
            $result = $result->fetch(PDO::FETCH_ASSOC);

            if (!$result) {
                $errors[] = "Zaal niet geupdate!";
            } else {
                return $result;
            }

            return (object) [
                'errors' => $errors
            ];
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deactivate($lounge_id)
    {
        try {
            $sql = "UPDATE Lounge SET `is_active` = false WHERE lounge_id = $lounge_id";
            $result = self::updateData($sql);
            $result = $result->fetch(PDO::FETCH_ASSOC);

            if (!$result) {
                $errors[] = "Zaal niet geupdate!";
            } else {
                return $result;
            }

            return (object) [
                'errors' => $errors
            ];
        } catch (Exception $e) {
            throw $e;
        }
    }
}
