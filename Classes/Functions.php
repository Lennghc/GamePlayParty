<?php

class Functions
{
    public static function getTimeSlot($interval, $start_time, $end_time)
    {
        $start = new DateTime($start_time);
        $end = new DateTime($end_time);
        $startTime = $start->format('H:i');
        $endTime = $end->format('H:i');
        $i = 0;
        $time = [];
        while (strtotime($startTime) <= strtotime($endTime)) {
            $start = $startTime;
            $end = date('H:i', strtotime('+' . $interval . ' minutes', strtotime($startTime)));
            $startTime = date('H:i', strtotime('+' . $interval . ' minutes', strtotime($startTime)));
            $i++;
            if (strtotime($startTime) <= strtotime($endTime)) {
                $time[$i]['slot_start_time'] = $start;
                $time[$i]['slot_end_time'] = $end;
            }
        }
        return $time;
    }

    public static function getAddressByZip($postalCode, $number)
    {
        try {
            $post = [
                'postalcode' => $postalCode,
                'number' => $number,
            ];

            $ch = curl_init('https://postcodefinder.p02.cldsvc.net/api/addressexpress/address');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

            // execute!
            $response = curl_exec($ch);

            // close the connection, release resources used
            curl_close($ch);

            // do anything you want with your response
            header('Content-type: application/json');
            return $response;
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }



    public static function encrypt($password)
    {
        $salted = SALTHEADER . $password . SALTTRAILER;
        return hash('ripemd160', $salted);
    }


    public static function isLoggedin($id = null)
    {
        if (!empty($_SESSION['user']) && $_SESSION['user']->id) {

            if (!empty($id) && $_SESSION['user']->id != $id) {
                return false;
            }

            return true;
        }

        return false;
    }

    public static function isAdmin()
    {
        if (!empty($_SESSION['user']) && $_SESSION['user']->admin) {

            if ($_SESSION['user']->admin == 4) {
                return true;
            }
        }

        return false;
    }

    public static function toJSON($array)
    {
        header('Content-type: application/json');
        return json_encode($array);
    }

    public static function toast($message, $type = 'info',  $position = 'toast-bottom-left', $duration = 1000, $onclick = '')
    {
        $message = "<script type=\"text/javascript\">toast('{$message}', '{$type}', '{$position}', {$duration}, {$onclick})</script>";

        if (isset($_SESSION['toast'])) {
            $_SESSION['toast'] = $_SESSION['toast'] . $message;
        } else {
            $_SESSION['toast'] = $message;
        }

        return $_SESSION['toast'];
    }
}