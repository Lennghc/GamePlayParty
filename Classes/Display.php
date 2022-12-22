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
                    $start_time = $value['lounge_start_time'];
                    $end_time = $value['lounge_end_time'];

                    setlocale(LC_TIME, 'NL_nl');
                    $html .= '<h5>' . strftime('%A %d, %B', strtotime($date)) . '</h5>';

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

    public function createCinemaList($result)
    {
        $html = "";
        if ($result->rowCount() != 0) {
            while ($row = $result->fetchall(PDO::FETCH_ASSOC)) {
                $html .= '<div class="col-lg-3"><ul class="list-group">';
                $item = 0;
                foreach ($row as $value) {
                    $cinema_name = $value['cinema_name'];
                    $cinema_id = $value['cinema_id'];

                    if ($item < $result->rowCount()) {
                        $html .= "<li class='list-group-item'><a href='index.php?con=cinema&op=details&id={$value['cinema_id']}'>{$value['cinema_name']}</a></li>";
                        $item++;
                        $html .= ($item % 5 == 0) ? '</ul></div><div class="col-lg-3"><ul class="list-group">' : "";
                    }
                }
                $html .= '</div>';
            }
        }
        return $html;
    }

    public function convertToText($result)
    {
        $html = "";
        if ($result->rowCount() != 0) {
            while ($row = $result->fetchall(PDO::FETCH_ASSOC)) {
                foreach ($row as $value) {
                    $html .= $value['cinema_desc'];
                }
            }
        }

        return $html;
    }

    public function CreateTable($result, $create = false, $actionMode = false, $checkbox = false){

        $tableheader = false;
        $html = "";

        if($checkbox) {
          $html .= "<form action='?con={$_GET['con']}&op=delete' method='POST'>";
        }

        $html .= "<table class='table table-hover table-responsive-sm'>";

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
          if ($tableheader == false) {
            $html .= "<tr>";
            if($checkbox) {
              $html .= "<th><input type='checkbox'></th>";
            }
            foreach ($row as $key => $value) {
              $html .= "<th>{$key}</th>";
            }

            if ($actionMode) {
              $html .= "<th>Actions</th>";
            }
            $html .= "</tr>";
            $tableheader = true;
          }

          $html .= "<tr>";
          if($checkbox) {
            $html .= "<td><input type='checkbox' name='delete' value={$row['id']}></td>";
            echo $row['id'] . "<br>";
          }
            foreach($row as $value){
              $html .= "<td>{$value}</td>";
          }


          if ($actionMode) {
            $html .= "<td style='display: flex; justify-content: space-between;'>";
            $html .= "<a href='?con={$_GET['con']}&op=update&id={$row['id']}'><i class='fa fa-edit'></i></a>";
            $html .= "<a href='?con={$_GET['con']}&op=read&id={$row['id']}'><i class='fa fa-eye'></i></a>";
            $html .= "<a href='?con={$_GET['con']}&op=deactivate&id={$row['id']}'><i class='fa-solid fa-lock'></i></a>";
            $html .= "<a href='?con={$_GET['con']}&op=activate&id={$row['id']}'><i class='fa-solid fa-unlock'></i></a>";

            $html .= "</td>";
          }
          $html .= "</tr>";
        }
        $html .= "</table>";
        if ($create) {
          $html .= "<a href='?con={$_GET['con']}&op=create&id={$_GET['con']}'><i class='fa-solid fa-circle-plus'></i></a>";
        }
        if($checkbox) {
          $html .= '<input type="submit">';
          $html .= "</form>";
        }
        return $html;
      }
    public function deactivateWarning()
    {
      $html = "";
      $html .= "Weet u zeker dat u deze bioscoop op <b> inactief </b> wilt zetten?";
      $html .= "<a href='?con={$_GET['con']}&op=deactivate' name='deactive'><i class='fa-regular fa-square-check'></i></a>";
      $html .= "<button onclick='history.back()'><i class='fa-regular fa-rectangle-xmark'></i></button>";
      return $html;
    }

    public function activateWarning()
    {
      $html = "";
      $html .= "Weet u zeker dat u deze bioscoop op <b> actief </b> wilt zetten?";
      $html .= "<a href='?con={$_GET['con']}&op=activate' name='deactive'><i class='fa-regular fa-square-check'></i></a>";
      $html .= "<button onclick='history.back()'><i class='fa-regular fa-rectangle-xmark'></i></button>";
      return $html;
    }
}
