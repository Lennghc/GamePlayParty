<?php

class Display
{

	public function createTableLoungePDF($result)
	{
		$html = "";
		$html .= "<div class='col-12'>";
		$html .= "<table>";
		$html .= "<thead>";
		$html .= "<tr class='bob'>";
		$html .= "<th>Zaal</th>";
		$html .= "<th>Aantal stoelen</th>";
		$html .= "<th>Rolstoelplaatsen</th>";
		$html .= "<th>Schermgrootte</th>";
		$html .= "</tr>";
		$html .= " </thead>";


		foreach ($result as $key => $value) {
			$html .= "<tbody>";
			$html .= "<tr class='odd'>";
			$html .= "<td>{$value['lounge_nmr']}</td>";
			$html .= "<td>{$value['lounge_chair_places']}</td>";
			$html .= "<td>{$value['lounge_wheelchair_places']}</td>";
			$html .= "<td>{$value['lounge_screensize']}</td>";
			$html .= "</tr>";
		}
		$html .= "</table>";
		$html .= "</div>";
		return $html;
	}


	public function pdf($rates, $data)
	{
		$html = "";
		// $html .= '<div class="col-4 odd"><strong>Dienst</strong></div>
		$html .= '<div class="col-7 odd"><strong>Tarief</strong></div>
		  <div class="col-5 odd"><strong>Bedrag</strong></div>';
		// $html .= '<div class="col-4 bob"><strong>Kids GamePlayParty</strong><br>Vrijdag 14 oktober, 2018</div>';
		$subtotal = 0;
		foreach ($rates as $key => $value) {

			$keys = array_keys($value[0]);
			$arra = explode('*', $keys[0]);
			if ($arra[0] != 0) {
				$price = number_format($value[0]['rates_price'], 2, ',');
				$html .= "<div class='col-7 bob'><strong>{$value[0]['rates_desc']}:</strong> {$arra[0]} @ €{$price}</div>";
				$subtotalforeach = number_format($value[0][$keys[0]], 2, ',');
				$html .= "<div class='col-5 bob'>€ {$subtotalforeach}<br></div>";
				$subtotal = $subtotal + $value[0][$keys[0]];
			}
		}
		$subtotaal = number_format($subtotal, 2, ',');
		//   $html .='<div class="col-4 bob"><strong>Laser ULTRA</strong><br>Vrijdag 14 oktober, 2018</div>
		//   <div class="col-3 bob"><strong>Toeslag:</strong> 8 @ €2,50<br><br></div>
		//   <div class="col-5 bob">€ 20,00<br><br></div>';

		$html .= "<div class='col-7 ral'><strong>Subtotaal:</strong></div>
      <div class='col-5'>€ {$subtotaal}</div>";

		$btw = $subtotal * 1.21;

		$korting = $btw - $subtotal;
		$korting = number_format($korting, 2, ',');

		$html .= "<div class='col-7 ral'><strong>BTW 21%:</strong></div>
      <div class='col-5'>€ {$korting}</div>";

		$priceWithBTW = number_format($btw, 2, ',');
		$quart_3_4_OfTotal = $btw * 0.75;
		$quart = $btw - $quart_3_4_OfTotal;
		$quart = number_format($quart, 2, ',');
		$quartOfTotal = number_format($quart_3_4_OfTotal, 2, ',');
		$html .= "<div class='col-7 ral'><strong>Totaal:</strong></div>
      <div class='col-5'>€ {$priceWithBTW}</div>";

		$date = new DateTime($data[0]['reservated_date']);
		$html .= "<div class='col-7 ral bob'><strong>Reeds voldaan:</strong></div>
      <div class='col-5 bob'>€ {$quart}</div>
      <div class='col-7 ral'><strong>Nog te voldoen (75%):</strong></div>
      <div class='col-5 hil'><strong>€ {$quartOfTotal}</strong></div>
      <div class='col-12'><strong>Betalingen: </strong>{$date->format('d-m-Y')} <strong>€ {$quart} </strong>(MasterCard 1243)</div>";


		return [$html, $quartOfTotal];
	}


	public function createCinemaList($result)
	{

		$html = "";

		if ($result->rowCount() != 0) {
			$html .= "<section id='list'>
            <div class='container col-md-12'>
                <div class='row mt-4'>
                    <div class='col-md-4 mt-5'>";
			$item = 0;

			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

				if ($item < $result->rowCount()) {
					$html .= "<div class='list-item'>
										<div class='list-img'>";

					if (!empty($row['cinema_img'])) {
						$html .= "<img src='Assets/Img/uploads/{$row['cinema_img']}'>";
					} else {
						$html .= "<img src='https://via.placeholder.com/350x150'>";
					}

					$html .= "</div>
            <div class='list-info'>
              <h6>{$row['cinema_name']}</h6>
            </div>
            <div class='list-ticket'>";
					$html .= "<a class='list-button' href='index.php?con=cinema&op=details&id={$row['cinema_id']}'>";
					$html .= "<i id='fa' class='fa fa-arrow-left'></i></a>
            </div>
          </div>";
					$item++;
					$html .= ($item % 5 == 0) ? '</div><div class="col-md-4 mt-5">' : "";
				}
			}

			$html .= "</div></div></div></div></section>";
		}
		return $html;
	}


	public function createRatesForm($result)
	{
		$html = "";
		if ($result->rowCount() != 0) {
			$html .= "<div class='container'><form onsubmit=\"event.preventDefault();\" id='rates-form' method='POST'>";
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
                          <button type='button' class='btn btn-danger minplus' onclick='ratesCalculate({$value['rates_id']},1)' data-type='minus' data-field='quant[1]'>
                              <span class='fa fa-minus'></span>
                          </button>
                          <input type='number' id='inputField_{$value['rates_id']}' name='quant[1]' class='form-control input-number' data-type='{$value['rates_id']}' value='0' min='0' max='30'/>
                          <button type='submit' class='btn btn-success minplus' onclick='ratesCalculate({$value['rates_id']},2)' data-type='plus' data-field='quant[1]'>
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
      </div></div><div class='d-grid col-md-9' id='download'><button id='rates_button' class='btn bg-primary bg-opacity-10'>Volgende</button></div>";
			$html .= '</form></div>';

			return $html;
		}
	}

	public function createUserForm($time, $date, $key, $lounge_id)
	{
		$html = "";

		$html .= "<div class='container'>
          <form onsubmit=\"event.preventDefault();\" id='rates-form'  method='POST'>
          <div class='d-flex justify-content-between'>
          <h4>Gegevens gast</h4>
            <h7>Tijds blok <span id='time'>{$time}</span></h7>
          </div>
              <input type='hidden' id='date' value='{$date}' />
              <input type='hidden' id='zaal' value='{$lounge_id}' />
              <input type='hidden' id='key' value='{$key}' />
              <div class='row'>
                  <div class='col-md-4'>
                    <div class='form-floating mb-3'>
                        <input type='text' name='fName' id='fName' placeholder='Voornaam' class='form-control' />
                        <label for='fName'>Voornaam</label>
                    </div>
                  </div>
                  <div class='col-md-4'>
                    <div class='form-floating mb-3'>
                      <input type='text' name='mName' id='mName' placeholder='Tussenvoegsel' class='form-control'>
                      <label for='mName'>Tussenvoegsel</label>
                    </div>
                  </div>
                  <div class='col-md-4'>
                    <div class='form-floating mb-3'>
                      <input type='text' name='lName' id='lName' placeholder='Achternaam' class='form-control'>
                      <label for='lName'>Achternaam</label>
                    </div>
                  </div>
              </div>
              <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-floating mb-3'>
                      <input type='text' name='street' id='Street' placeholder='Straat naam'  class='form-control'>
                      <label for='Street'>Straat naam</label>
                      </div>
                  </div>
                  <div class='col-md-6'>
                    <div class='form-floating mb-3'>
                      <input type='text' name='houseNumber' id='houseNumber' placeholder='Huis nummer' class='form-control'>
                      <label for='houseNumber'>Huis nummer</label>
                      </div>
                  </div>
              </div>
              <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-floating mb-3'>
                      <input type='text' name='zipcode' id='zipCode' placeholder='Postcode' class='form-control'>
                      <label for='zipCode'>Postcode</label>
                    </div>
                  </div>
                  <div class='col-md-6'>
                    <div class='form-floating mb-3'>
                      <input type='text' name='city' id='City' placeholder='Stad' class='form-control'>
                      <label for='City'>Stad</label>
                    </div>
                  </div>
              </div>
              <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-floating mb-3'>
                    <input type='text' name='tel' id='Tel' placeholder='Telefoon nummer' class='form-control'>
                      <label for='Tel'>Telefoon nummer</label>
                    </div>
                  </div>
                  <div class='col-md-6'>
                    <div class='form-floating mb-3'>
                      <input type='email' name='email' id='Email' placeholder='Email' class='form-control'>
                      <label for='Email'>Email</label>
                    </div>
                  </div>
              </div>
          </form>
      </div>";
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
							$html .= "<a type='button' href='index.php?con={$_GET['op']}&op=deactivate&id={$row['id']}' class='btn btn-success'><i class='fa-solid fa-check'></i>Actief</a>";
						}
						if ($row['is_active'] == 0) {
							$html .= "<a type='button' href='index.php?con={$_GET['op']}&op=activate&id={$row['id']}' class='btn btn-danger'><i class='fa-solid fa-xmark'></i>&nbsp; Inactief</a>";
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
		$time = [];

		if ($result->rowCount() != 0) {
			$row = $result->fetchall(PDO::FETCH_ASSOC);

			foreach ($row as $newkey => $rowValue) {
				$time = json_decode($rowValue['lounge_timeslots'], true);
				$date = $rowValue['lounge_open_date'];
				$lounge_id = $rowValue['lounge_id'];
				setlocale(LC_ALL, 'nl_NL');

				$html .= $time[$newkey]['active'] == 0 ? '<div class="col-md-12 mt-3"><h5>' . strftime('%A %d, %B', strtotime($date)) . '</h5></div>' : null;

				$html .= "<div class='col-md-8 d-flex flex-wrap mb-3'>";

				foreach ($time as $key => $valueTime) {
					if ($valueTime['active'] == 0) {
						$html .= "<form id='form' action='index.php?con=reserv&op=handleReservation' method='POST'>";
						$time = $valueTime['slot_start_time'] . '-' . $valueTime['slot_end_time'];
						$html .= "<input type='hidden' name='key' value='{$key}' >";
						$html .= "<input type='hidden' name='lounge_id' value='{$lounge_id}'>";
						$html .= "<input type='hidden' value='{$time}' name='timeslot'>";
						$html .= "<input type='hidden' value='{$date}' name='date'>";
						$html .= "<div class='col-md-12'>";
						$html .= "<button type='submit' name='submit' class='btn btn-secondary m-1' >{$time}</button>";
						$html .= "</div>";
						$html .= "</form>";
					}
				}


				$html .= "</div>";
			}

			return $html;
		}
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
		$title = "";
		if ($result->rowCount() != 0) {
			$row = $result->fetchall(PDO::FETCH_ASSOC);
			foreach ($row as $value) {
				$html .= $value['cinema_desc'];
				$title .= $value['cinema_name'];
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
			return [$html, $side, $title];
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
