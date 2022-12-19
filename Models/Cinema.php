<?php

require_once 'Main.php';


class Cinema extends Main
{
    public function allCinema()
    {
        try {
            $sql = "";
            $result = self::readsData($sql);

            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
