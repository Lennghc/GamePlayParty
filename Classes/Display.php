<?php
require_once 'Functions.php';
require_once './Controller/LoungeController.php';


class Display extends Functions
{
  public function __construct()
  {
    $this->LoungeController = new LoungeController();
  }

  public function reservDetailsForm($result)
  {
    $html = "";
    $row = $result->fetchall(PDO::FETCH_ASSOC);
    if ($result->rowCount() != 0) {
      foreach ($row as $value) {
        $html .= "<div class='container'>
        <form action='' method='POST'>
            <h4>{$value['user_username']} gegevens</h4>
            <div class='row'>
                <div class='col-md-4 form-group'>
                    <label for='fName'>Voornaam</label>
                    <input type='text' name='fname' value='{$value['user_fname']}' class='form-control' />
                </div>
                <div class='col-md-4 form-group'>
                    <label for='mName'>Tussenvoegsel</label>
                    <input type='text' name='mName' value='{$value['user_insertion']}' class='form-control'>
                </div>
                <div class='col-md-4 form-group'>
                    <label for='lName'>Achternaam</label>
                    <input type='text' name='lName' value='{$value['user_lname']}' class='form-control'>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-6 form-group'>
                    <label for='street'>Straat naam</label>
                    <input type='text' name='street' value='{$value['user_streetname']}'  class='form-control'>
                </div>
                <div class='col-md-6 form-group'>
                    <label for='houseNumber'>Huis nummer</label>
                    <input type='text' name='houseNumber' value='{$value['user_house_nmr']}' class='form-control'>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-6 form-group'>
                    <label for='zipcode'>Postcode</label>
                    <input type='text' name='zipcode' value='{$value['user_zipcode']}' class='form-control'>
                </div>
                <div class='col-md-6 form-group'>
                    <label for='city'>Stad</label>
                    <input type='text' name='city' value='{$value['user_city']}' class='form-control'>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-6 form-group'>
                    <label for='tel'>Telefoon nummer</label>
                    <input type='text' name='tel' value='{$value['user_tel']}' class='form-control'>
                </div>
                <div class='col-md-6 form-group'>
                    <label for='email'>Email</label>
                    <input type='email' name='email' value='{$value['user_email']}' class='form-control' readonly>
                </div>

            </div>
        </form>

    </div>";
      }
    }
    return $html;

  }
  public function createTimeslotButtons($result)
  {
    $html = "";
    $resArray = $result[1]->fetchall(PDO::FETCH_ASSOC);
    if ($result[0]->rowCount() != 0) {
      while ($row = $result[0]->fetchall(PDO::FETCH_ASSOC)) {
        foreach ($resArray as $value) {
          $resTime = json_decode($value['reservated_timeslot'], true);
          $resDate = $value['reservated_date'];
          $lounge_id = $value['lounge_id'];
        }

        foreach ($row as $item) {
          $html .= "<div>";
          $time = [];
          $time = json_decode($item['lounge_timeslots'], true);


          if ($result[1]->rowCount() != 0) {
            foreach ($resTime as $value) {
              if (!empty($time)) {
                for ($i = 0; $i < count($time); $i++) {
                  if ($resDate == $item['lounge_open_date'] || $lounge_id == $item['lounge_id']) {
                    if ($time[$i]['slot_start_time'] == $value['slot_start_time'] || $time[$i]['slot_end_time'] == $value['slot_end_time']) {
                      unset($time[$i]);
                      $newTime = array_values($time);
                      if (empty($time)) {
                        $newTime = NULL;
                      }
                      $this->LoungeController->removeTime($item['lounge_id'], $newTime);
                    }
                  }
                }
              }
            }
          }

          $date = $item['lounge_open_date'];
          $lounge_id = $item['lounge_id'];
          $user_id = isset($_SESSION['user']->id) ? $_SESSION['user']->id : '';
          setlocale(LC_TIME, 'NL_nl');

          if (!empty($time)) {

            $html .= '<h5>' . strftime('%A %d, %B', strtotime($date)) . '</h5>';

            foreach ($time as $value) {
              $html .= "<form id='form' action='index.php?con=reserv&op=handleReservation' method='POST'>";
              $time = $value['slot_start_time'] . '-' . $value['slot_end_time'];
              $html .= "<input type='hidden' value='{$user_id}' >";
              $html .= "<input type='hidden' name='lounge_id' value='{$lounge_id}'>";
              $html .= "<input type='hidden' value='{$time}' name='timeslot'>";
              $html .= "<input type='hidden' value='{$date}' name='date'>";
              $html .= "<input type='submit' name='submit' class='btn btn-secondary m-1' value='{$time}'>";
              $html .= "</form>";
            }
          }

          $html .= "</div>";
        }

        return $html;
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
