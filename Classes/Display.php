<?php

class Display
{

  public function __construct()
  {
    $this->Lounge = new Lounge();
  }

  public function quantityButtonMinPlus($result)
  {
    $html = "";
    if ($result->rowCount() != 0) {
    }
  }

  public function createRatesForm($result)
  {
    $html = "";
    if ($result->rowCount() != 0) {
      $html .= "<div class='container'><form action=''>";
      $html .= "<h4>Tarieven per persoon</h4>";
      while ($row = $result->fetchall(PDO::FETCH_ASSOC)) {
        foreach ($row as $value) {
          $html .= "
              <div id='rates{$value['rates_id']}' class='row'>
                  <div class='col-md-5'>
                      <p>{$value['rates_desc']} | <span id='price'>{$value['rates_price']}</span></p>
                  </div>
                  <div class='col-sm-3 reservDetails-inputfield'>
                      <div class='input-group input-group-sm'>
                          <button type='button' class='btn btn-danger sub' onclick='ratesCalculate({$value['rates_id']},1)' data-type='minus' data-field='quant[1]'>
                              <span class='fa fa-minus'></span>
                          </button>
                          <input type='number' id='inputField{$value['rates_id']}' name='quant[1]' class='form-control input-number' value='0' min='0' max='30'/>
                          <button type='button' class='btn btn-success add' onclick='ratesCalculate({$value['rates_id']},2)' data-type='plus' data-field='quant[1]'>
                              <span class='fa fa-plus'></span>
                          </button>
                      </div>
                  </div>

                  <div class='col-md-4'>
                      <p id='subtotal'>€ 0,00</p>
                  </div>
              </div>";
        }
      }
      $html .= "<div class='row'>
      <div class='col-md-8'>
      <p>Totaal:</p>
      </div>
      <div class='col-md-4'>
      <p class='float-right' id='total'>€ 0,00</p>
      </div></div><div class='d-grid col-md-9'><button class='btn bg-primary bg-opacity-10'>Volgende</button></div>";
      $html .= '</form></div>';

      return $html;
    }
  }

  public function createUserForm($result, $role = false, $url)
  {
    $html = "";
    if ($result[0]->rowCount() != 0) {
      $roles = $result[1]->fetchall(PDO::FETCH_ASSOC);
      while ($row = $result[0]->fetchall(PDO::FETCH_ASSOC)) {
        foreach ($row as $value) {
          !empty($value['user_fname']) ? $value['user_fname'] : null;
          !empty($value['user_insertion']) ? $value['user_insertion'] : null;
          !empty($value['user_lname']) ? $value['user_lname'] : null;
          !empty($value['user_streetname']) ? $value['user_streetname'] : null;
          !empty($value['user_house_nmr']) ? $value['user_house_nmr'] : null;
          !empty($value['user_zipcode']) ? $value['user_zipcode'] : null;
          !empty($value['user_city']) ? $value['user_city'] : null;
          !empty($value['user_tel']) ? $value['user_tel'] : null;
          !empty($value['user_email']) ? $value['user_email'] : null;


          $html .= "<div class='container'>
          <form action='$url' method='POST'>
              <h4>Gegevens {$value['user_username']}</h4>
              <div class='row'>
                  <div class='col-md-4'>
                    <div class='form-floating mb-3'>
                        <input type='text' name='fName' id='fName' value='{$value['user_fname']}' placeholder='Voornaam' class='form-control' />
                        <label for='fName'>Voornaam</label>
                    </div>
                  </div>
                  <div class='col-md-4'>
                    <div class='form-floating mb-3'>
                      <input type='text' name='mName' id='mName' value='{$value['user_insertion']}' placeholder='Tussenvoegsel' class='form-control'>
                      <label for='mName'>Tussenvoegsel</label>
                    </div>
                  </div>
                  <div class='col-md-4'>
                    <div class='form-floating mb-3'>
                      <input type='text' name='lName' id='lName' value='{$value['user_lname']}' placeholder='Achternaam' class='form-control'>
                      <label for='lName'>Achternaam</label>
                    </div>
                  </div>
              </div>
              <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-floating mb-3'>
                      <input type='text' name='street' id='Street' value='{$value['user_streetname']}' placeholder='Straat naam'  class='form-control'>
                      <label for='Street'>Straat naam</label>
                      </div>
                  </div>
                  <div class='col-md-6'>
                    <div class='form-floating mb-3'>
                      <input type='text' name='houseNumber' id='houseNumber' value='{$value['user_house_nmr']}' placeholder='Huis nummer' class='form-control'>
                      <label for='houseNumber'>Huis nummer</label>
                      </div>
                  </div>
              </div>
              <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-floating mb-3'>
                      <input type='text' name='zipcode' id='zipCode' value='{$value['user_zipcode']}' placeholder='Postcode' class='form-control'>
                      <label for='zipCode'>Postcode</label>
                    </div>
                  </div>
                  <div class='col-md-6'>
                    <div class='form-floating mb-3'>
                      <input type='text' name='city' id='City' value='{$value['user_city']}' placeholder='Stad' class='form-control'>
                      <label for='City'>Stad</label>
                    </div>
                  </div>
              </div>
              <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-floating mb-3'>
                    <input type='text' name='tel' id='Tel' value='{$value['user_tel']}' placeholder='Telefoon nummer' class='form-control'>
                      <label for='Tel'>Telefoon nummer</label>
                    </div>
                  </div>
                  <div class='col-md-6'>
                    <div class='form-floating mb-3'>
                      <input type='email' name='email' id='Email' value='{$value['user_email']}' placeholder='Email' class='form-control' readonly>
                      <label for='Email'>Email</label>
                    </div>
                  </div>
              </div>";
          if ($role == true) {
            $html .= "<div class='row'>
              <div class='col-md-4'>
              <div class='form-floating mb-3'>

										<select class='form-control' name='role' id='inputRole'>";
            foreach ($roles as $item) {
              if ($item['role_id'] == $value['role_id']) {

                $html .= "<option selected value=" . $item['role_id'] . ">" . $item['role_name'] . "</option>";
              } else {

                $html .= "<option value=" . $item['role_id'] . ">" . $item['role_name'] . "</option>";
              }
            }
            $html .= "</select>
            <label for='inputRole'>Role</label>
            </div>
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
          } elseif ($status == true) {
            $html .= "<th>Actief/Inactief</th>";
          }
          $html .= "</tr>";
          $tableheader = true;
        }
        $html .= "<tr scope='row'>";
        foreach ($row as $value) {
          $html .= "<td>" . (empty($value) ? '<i class="text-black fa fa-ban" aria-hidden="true"></i>' : $value) . "</td>";
        }
        if ($edit == true || $delete == true || $read == true || $status == true) {
          $html .= "<td style='display: flex; justify-content: ;'>";
          if ($edit == true) {
            $html .= "<a type='button' href='index.php?con={$_GET['op']}&op=update&id={$row['ID']}' class='btn btn-info'><i class='fa fa-edit'></i></a>";
          }
          if ($delete == true) {
            $html .= "<a type='button' href='index.php?con={$_GET['op']}&op=delete&id={$row['ID']}' class='btn btn-danger'><i class='fa fa-trash'></i></a>";
          }
          if ($read == true) {
            $html .= "<a type='button' class='btn btn-success'><i class='fa fa-eye'></i></a>";
          }
          if ($status == true) {
            if ($row['is_active'] == 1) {
              $html .="<a type='button' href='index.php?con={$_GET['op']}&op=deactivate&id={$row['id']}' class='btn btn-success'><i class='fa-solid fa-check'></i>Actief</a>";
            }
            if ($row['is_active'] == 0) {
              $html .="<a type='button' href='index.php?con={$_GET['op']}&op=activate&id={$row['id']}' class='btn btn-danger'><i class='fa-solid fa-xmark'></i>&nbsp; Inactief</a>";
            }

          }
          $html .= "</td>";
        }
        $html .= "</tr>";
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
          if (!empty($rowValue['lounge_timeslots'])) {
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

            $html .= '<div class="col-md-12 mt-3"><h5>' . strftime('%A %d, %B', strtotime($date)) . '</h5></div>';
            $html .= "<div class='col-md-8 d-flex flex-wrap mb-3'>";

            foreach ($time as $value) {
              $html .= "<form id='form' action='index.php?con=reserv&op=handleReservation' method='POST'>";
              $time = $value['slot_start_time'] . '-' . $value['slot_end_time'];
              $html .= "<input type='hidden' value='{$user_id}' >";
              $html .= "<input type='hidden' name='lounge_id' value='{$lounge_id}'>";
              $html .= "<input type='hidden' value='{$time}' name='timeslot'>";
              $html .= "<input type='hidden' value='{$date}' name='date'>";
              $html .= "<div class='col-md-12'>";
              $html .= "<button type='submit' name='submit' class='btn btn-secondary m-1' >{$time}</button>";
              $html .= "</div>";
              $html .= "</form>";
            }

            $html .= "</div>";
          }
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

  public function convertToSidebar($result)
  {
    $html = "";
    if ($result->rowCount() != 0) {
      $row = $result->fetchall(PDO::FETCH_ASSOC);
      foreach ($row as $value) {
        return var_dump(gettype($value['cinema_reachability']));
        $reachability = json_decode($value['cinema_reachability'], true);
        foreach ($reachability as $item) {
          if (!empty($item['message'])) {
            $html .= "<h4><strong>{$item['title']}</strong></h4>";
            $html .= "<p>{$item['message']}</p>";
          }
        }
      }
      return $html;
    }
  }

  public function convertToText($result, $sidebar = false)
  {
    $html = "";
    if ($result->rowCount() != 0) {
      $row = $result->fetchall(PDO::FETCH_ASSOC);
      foreach ($row as $value) {
        $html .= $value['cinema_desc'];
        if ($sidebar == true) {
          $side = "";
          $reachability = json_decode($value['cinema_reachability'], true);
          foreach ($reachability as $item) {
            if (!empty($item['message'])) {
              $side .= "<h4><strong>{$item['title']}</strong></h4>";
              $side .= $item['message'];
            }
          }
        }
      }
    }

    if ($sidebar == true) {
      return [$html, $side];
    } else {
      return $html;
    }
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