<?php
require_once 'Main.php';

class Rates extends Main
{
    public function ownRates($user_id)
    {
        try {
            $sql = "SELECT cinema_id FROM Cinema WHERE user_id = $user_id";
            $result = self::readData($sql);

            $row = $result->fetchall(PDO::FETCH_ASSOC);
            foreach ($row as $value) {
                $cinema_id = $value['cinema_id'];
            }

            $sql = "SELECT rates_id as ID, rates_desc as Beschrijving, Replace(Replace(Concat('€ ', Format(`rates_price`, 2)), ',', ''), '.', ',') AS Prijs FROM Rates WHERE cinema_id = $cinema_id";
            $result = self::readsData($sql);
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function create($rates_desc, $rates_price, $cinema_id)
    {
        try {
            $sql = "INSERT INTO Rates (`rates_desc`,`rates_price`,`cinema_id`) VALUES ('{$rates_desc}', '{$rates_price}', '{$cinema_id}')";
            $result = self::createData($sql);
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function update($rates_id, $rates_desc, $rates_price)
    {
        try {
            $sql = "UPDATE Rates SET `rates_desc` = '{$rates_desc}', `rates_price` = '{$rates_price}' WHERE rates_id = $rates_id";
            $result = self::updateData($sql);
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function read($rates_id)
    {
        try {
            $sql = "SELECT rates_id, rates_desc, rates_price FROM Rates WHERE rates_id = $rates_id";
            $result = self::readData($sql);
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function delete($rates_id)
    {
        try {
            $sql = "DELETE FROM Rates WHERE rates_id = $rates_id";
            $result = self::deleteData($sql);
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
