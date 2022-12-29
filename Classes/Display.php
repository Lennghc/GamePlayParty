<?php

class Display
{

  public function __construct()
  {
    $this->Lounge = new Lounge();
  }

  public function createUserForm($result, $role = false, $url)
  {
    $html = "";
    if ($result[0]->rowCount() != 0) {
      $roles = $result[1]->fetchall(PDO::FETCH_ASSOC);
      while ($row = $result[0]->fetchall(PDO::FETCH_ASSOC)) {
        foreach ($row as $value) {
          $html .= "<div class='container'>
          <form action='$url' method='POST'>
              <h4>Gegevens {$value['user_username']}</h4>
              <div class='row'>
                  <div class='col-md-4 form-group'>
                      <label for='fName'>Voornaam</label>
                      <input type='text' name='fName' value='{$value['user_fname']}' class='form-control' />
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
";
          if ($role == true) {
            $html .= "<div class='row'>
              <div class='col-md-4 form-group'>
              <label for='inputRole'>Role</label>

										<select class='form-control' name='role' id='inputRole'>";
            foreach ($roles as $item) {
              if ($item['role_id'] == $value['role_id']) {

                $html .= "<option selected value=" . $item['role_id'] . ">" . $item['role_name'] . "</option>";
              } else {

                $html .= "<option value=" . $item['role_id'] . ">" . $item['role_name'] . "</option>";
              }
            }
            $html .= "</select>
          </div>
              </div>";
          }
          $html .= "            <div class='mt-2 form-group'>
              <input type='submit' name='submit' class='btn btn-success btn-sm' value='Opslaan' />
              </div>
          </form>
  
      </div>";
        }
      }
    } else {
      $html .= '<h2>Geen data</h2>';
    }
    return $html;
  }

  public function createTable($result, $edit = false, $delete = false, $read = false, $create = false, $status = false)
  {
    $tableheader = false;
    $html = "";
    if ($result->rowCount() != 0) {
      $html .= "<div class='table-responsive'>";
      $html .= "<table class='table align-middle table-bordered'>";


      while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

        if ($tableheader == false) {
          $html .= "<tr>";
          foreach ($row as $key => $value) {
            $html .= "<th scope='col'>{$key}</th>";
          }
          if ($edit == true || $delete == true || $read == true) {
            $html .= "<th>Actions</th>";
          }
          $html .= "</tr>";
          $tableheader = true;
        }
        $html .= "<tr scope='row'>";
        foreach ($row as $value) {
          $html .= "<td>" . (empty($value) ? '<i class="text-black fa fa-ban" aria-hidden="true"></i>' : $value) . "</td>";
        }
        if ($edit == true || $delete == true || $read == true) {
          $html .= "<td style='display: flex; justify-content: space-between;'>";
          if ($edit == true) {
            $html .= "<a type='button' href='index.php?con={$_GET['op']}&op=update&id={$row['ID']}' class='btn btn-info'><i class='fa fa-edit'></i></a>";
          }
          if ($delete == true) {
            $html .= "<a type='button' class='btn btn-danger'><i class='fa fa-trash'></i></a>";
          }
          if ($read == true) {
            $html .= "<a type='button' class='btn btn-success'><i class='fa fa-eye'></i></a>";
          }
          $html .= "</td>";
        }
        $html .= "</tr  >";
      }

      $html .= "</table>";
      $html .= "</div>";
    } else {
      $html .= "<h2>Geen data</h2>";
    }
    if ($create == true) {
      $html .= "<div class='flex flex-row-reverse' style='display:flex;'> 
        <div class='justify-content-end'>
          <a class='btn btn-lg bg-green rounded-circle' href='index.php?con={$_GET['op']}&op=create'><span class='text-white fa fa-plus'></span></a>
        </div>
    </div>";
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

        foreach ($row as $rowValue) {
          $html .= "<div>";
          if(!empty($rowValue['lounge_timeslots'])){
          $time = [];
          $time = json_decode($rowValue['lounge_timeslots'], true);
          }

          if ($result[1]->rowCount() != 0) {
            foreach ($resTime as $resTimeValue) {
              if (!empty($time)) {
                foreach ($time as $key => $timeValue) {
                  if ($resDate == $rowValue['lounge_open_date'] || $lounge_id == $rowValue['lounge_id']) {
                    if ($timeValue['slot_start_time'] == $resTimeValue['slot_start_time'] || $timeValue['slot_end_time'] == $resTimeValue['slot_end_time']) {
                      unset($time[$key]);
                      if (empty($time)) {
                        $time = NULL;
                      }
                      $this->Lounge->removeTime($rowValue['lounge_id'], $time);
                    }
                  }
                }
              }
            }
          }

          $date = $rowValue['lounge_open_date'];
          $lounge_id = $rowValue['lounge_id'];
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
    } else {
      $html .= '<h2>Geen data</h2>';
    }
    return $html;
  }

  public function convertToText($result)
  {
    $html = "";
    if ($result->rowCount() != 0) {
      $row = $result->fetchall(PDO::FETCH_ASSOC);
      foreach ($row as $value) {
        $html .= $value['cinema_desc'];
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
