<?php
require_once 'Functions.php';

class Display extends Functions
{
    public function createTimeslotButtons($result)
    {

        function getTimeSlot($interval, $start_time, $end_time)
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



        $html = "";

        if ($result->rowCount() != 0) {
            while ($row = $result->fetchall(PDO::FETCH_ASSOC)) {
                foreach ($row as $value) {
                    $html .= "<div>";

                    $date = $value['lounge_open_date'];
                    $arrDate = explode('-', $date);
                    $start_time = $value['lounge_start_time'];
                    $end_time = $value['lounge_end_time'];

                    setlocale(LC_TIME, 'NL_nl');
                    $html .= '<h5>'.strftime('%A %d, %B', strtotime($date)).'</h5>';



                    $timeslots = getTimeSlot(90, $start_time, $end_time);
                    foreach ($timeslots as $value) {

                        $html .= "<button type='button' class='btn btn-secondary m-1'>{$value['slot_start_time']}-{$value['slot_end_time']}</button>";
                    }
                    $html .= "</div>";
                }
            }
        } else {
            $html .= "Geen tijden doorgegeven.";
        }

        return $html;
    }
}
