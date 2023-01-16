<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>GPP</title>
  <meta name="author" content="name">
  <meta name="description" content="description here">
  <meta name="keywords" content="keywords,here">
  <link rel="shortcut icon" href="favicon.ico" type="image/vnd.microsoft.icon">
  <link rel="stylesheet" href="stylesheet.css" type="text/css">
  <style>
    @charset "UTF-8";
    @import url('https://fonts.googleapis.com/css?family=Open+Sans');

    .keep-together {
      page-break-inside: avoid;
    }

    .break-before {
      page-break-before: always;
    }

    .break-after {
      page-break-after: always;
    }

    body {
      font-family: 'Open Sans', sans-serif;
    }

    * {
      box-sizing: border-box;
    }

    .row::after {
      content: "";
      clear: both;
      display: table;

    }

    [class*="col-"] {
      float: left;
      padding: 1em;
    }

    html {
      font-family: "Open Sans", sans-serif;
      color: #2c3e50;
    }

    .header {
      color: #ffffff;
      padding: 2em;
    }

    .menu ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
    }

    .menu li {
      padding: 8px;
      margin-bottom: 7px;
      background-color: #33b5e5;
      color: #ffffff;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
    }

    .menu li:hover {
      background-color: #0099cc;
    }

    .aside {
      background-color: #33b5e5;
      padding: 15px;
      color: #ffffff;
      text-align: center;
      font-size: 14px;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
    }

    .footer {
      background-color: #0099cc;
      color: #ffffff;
      text-align: center;
      font-size: 12px;
      padding: 15px;
    }

    /* For mobile phones: */
    [class*="col-"] {
      width: 100%;
    }

    @media only screen and (min-width: 600px) {

      /* For tablets: */
      .col-s-1 {
        width: 8.33%;
      }

      .col-s-2 {
        width: 16.66%;
      }

      .col-s-3 {
        width: 25%;
      }

      .col-s-4 {
        width: 33.33%;
      }

      .col-s-5 {
        width: 41.66%;
      }

      .col-s-6 {
        width: 50%;
      }

      .col-s-7 {
        width: 58.33%;
      }

      .col-s-8 {
        width: 66.66%;
      }

      .col-s-9 {
        width: 75%;
      }

      .col-s-10 {
        width: 83.33%;
      }

      .col-s-11 {
        width: 91.66%;
      }

      .col-s-12 {
        width: 100%;
      }
    }

    @media only screen and (min-width: 768px) {

      /* For desktop: */
      .col-1 {
        width: 8.33%;
      }

      .col-2 {
        width: 16.66%;
      }

      .col-3 {
        width: 25%;
      }

      .col-4 {
        width: 33.33%;
      }

      .col-5 {
        width: 41.66%;
      }

      .col-6 {
        width: 50%;
      }

      .col-7 {
        width: 58.33%;
      }

      .col-8 {
        width: 66.66%;
      }

      .col-9 {
        width: 75%;
      }

      .col-10 {
        width: 83.33%;
      }

      .col-11 {
        width: 91.66%;
      }

      .col-12 {
        width: 100%;
      }
    }

    .container {
      background: center 0px / 960px no-repeat url(Assets/Img/gpp.svg) #F5F5F5;
      width: 960px;
      margin: 0 auto;
    }

    table {
      width: inherit;
    }

    .ral {
      text-align: right;
    }

    .hil {
      background-color: #C4E538;
    }

    .odd {
      background-color: #A3CB38;
    }

    .menu>li {
      padding: 1em;
      margin-bottom: 1em;
      background-color: #FFF;
      color: #ffffff;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
      display: inline;
      font: condensed 0.8em/46px 'Open Sans';
    }

    .bob {
      border-bottom: 2px solid #FFC312;
    }

    .rot {
      transform: rotate(-15deg);
      font: bold 3em/5em 'Open Sans';
      margin-bottom: -3em;
    }
  </style>
</head>
<?php
$timeslot = json_decode($data[0]['reservated_timeslot'], true);
$reachability = json_decode($data[0]['cinema_reachability'], true);
$rates = json_decode($data[0]['reservated_people'], true);
$user = json_decode($data[0]['user_data'], true);

?>

<body>
  <div class="container">
    <div class="header"></div>
    <article class="row">
      <div class="col-7 ral rot">Reservering</div>
      <div class="col-5 ral">
        <h4><?= $data[0]['cinema_name'] ?></h4>
        <?= $reachability[2]['message'] ?>
      </div>
      <div class="col-7">
        <h4><?= $user['fName'] . ' ' . $user['mName'] . ' ' . $user['lName'] ?></h4>
        <?= $user['adres']['street'] . ' ' . $user['adres']['houseNumber'] ?><br>
        <?= $user['adres']['zipcode'] . ' ' . $user['adres']['city'] ?><br>
        Tel.:<?= $user['tel'] ?>
      </div>
      <div class="col-5">
        <div class="row">
          <div class="col-6 odd">
            <strong>Reserverings ID:</strong><br>
            <strong>Datum:</strong><br>
            <strong>Reserveringsdatum:</strong><br>
            <strong>Reserveringstijd:</strong><br>
            <strong>Totaal EURO:</strong><br><br>
          </div>
          <div class="col-6 bob">
            <strong>GPP-<?= $data[0]['reservation_id'] ?></strong><br>
            <?php $date = new DateTime($data[0]['reservation_date']);
            echo $date->format('d F, Y') ?><br>
            <?php $date = new DateTime($data[0]['reservated_date']);
            echo $date->format('d F, Y') ?><br>
            <?php

            foreach ($timeslot as $key => $value) {
              echo $value['slot_start_time'] . ' - ' . $value['slot_end_time'];
            }
            ?><br>
            € <?=$rate[1]?><br><br>
          </div>
        </div>
      </div>
      <!-- <div class="col-4 odd"><strong>Dienst</strong></div>
      <div class="col-3 odd"><strong>Tarief</strong></div>
      <div class="col-5 odd"><strong>Bedrag</strong></div>
      <div class="col-4 bob"><strong>Kids GamePlayParty</strong><br>Vrijdag 14 oktober, 2018</div>
      <div class="col-3 bob"><strong>Kinderen t/m 11 jaar:</strong> 8 @ €20,00</div>
      <div class="col-5 bob">€160,00<br><br></div>
      <div class="col-4 bob"><strong>Laser ULTRA</strong><br>Vrijdag 14 oktober, 2018</div>
      <div class="col-3 bob"><strong>Toeslag:</strong> 8 @ €2,50<br><br></div>
      <div class="col-5 bob">€ 20,00<br><br></div>
      <div class="col-7 ral"><strong>Subtotaal:</strong></div>
      <div class="col-5">€180,00</div>
      <div class="col-7 ral"><strong>BTW 21%:</strong></div>
      <div class="col-5">€ 37,80</div>
      <div class="col-7 ral"><strong>Totaal:</strong></div>
      <div class="col-5">€217,80</div>
      <div class="col-7 ral bob"><strong>Reeds voldaan:</strong></div>
      <div class="col-5 bob">€ 54,45</div>
      <div class="col-7 ral"><strong>Nog te voldoen (75%):</strong></div>
      <div class="col-5 hil"><strong>€163,35</strong></div>
      <div class="col-12"><strong>Betalingen: </strong>14-10-2018 <strong>€ 54,45 </strong>(MasterCard 1243)</div> -->
      <?= $rate[0] ?>
      <div class="col-12 bob">
        <h2>Informatie over <?= $data[0]['cinema_name'] ?></h2>
      </div>
      <div class="col-6 bob">
        <p>Met Kinepolis Jaarbeurs (14 zalen, 3200 stoelen) heeft Utrecht eindelijk een moderne megabioscoop in de binnenstad: de grootste bioscoop van Utrecht, en een van de grootste bioscopen van Nederland. Kinepolis Jaarbeurs biedt elke filmbezoeker ‘the ultimate cinema experience’: ruime en comfortabele stoelen, royale beenruimte, en beeld en geluid van het allerhoogste niveau.</p>
      </div>

      <div class="col-6 bob">
        <p><strong>Openingstijden:</strong></p>
        <?= $reachability[1]['message'] ?>
        <br>

      </div>
      <div class="col-4">
        <p><strong>Reguliere tarieven:</strong></p>
      </div>
      <div class="col-8">
        <?php
        foreach ($allRates as $key => $value) {
          $price = number_format($value['rates_price'], 2, ',');

          echo ' € ' . $price . " | " . $value['rates_desc'] . '<br>';
        }
        ?>
      </div>
      <!-- <div class="col-4">
        <p><strong>Toeslagen:</strong></p>
      </div>
      <div class="col-8">
        € 0,50 | toeslag bij film van 135 minuten en langer<br>
        € 1,50 | 3D-toeslag excl. bril<br>
        € 2,60 | 3D-toeslag incl. bril<br>
        € 1,50 | Dolby Atmos<br>
        € 2,50 | Laser ULTRA<br>
        € 2,50 | COSY

      </div> -->
      <div class="col-4">
        <p><strong>Voorwaarden:</strong></p>
      </div>
      <div class="col-8">
        <ul>
          <li>Bovenstaande prijzen zijn per persoon, zijn niet geldig bij evenementen, speciale voorstellingen of besloten voorstellingen en altijd exclusief toeslagen.</li>
        </ul>
      </div>

      <?php
      foreach ($reachability as $key => $value) {
        if ($key != 1 && $key != 2) {
          if ($value['message'] != "") {
            if ($value['title'] == 'Openbaar vervoer') {
              echo "<div class='col-4'><p><strong>Bereikbaarheid OV:</strong></p></div>";
              echo "<div class='col-8'>{$value['message']}</div>";
            } elseif ($value['title'] == 'Rolstoeltoegankelijkheid') {
              echo "<div class='col-4'><p><strong>Rolstoeltoegankelijkheid:</strong></p></div>";
              echo "<div class='col-8'>{$value['message']}</div>";
            } else {
              echo "<div class='col-4'><p><strong>Bereikbaarheid {$value['title']}:</strong></p></div>";
              echo "<div class='col-8'>{$value['message']}</div>";
            }
          }
        }
      }
      ?>

      <!-- <div class="col-4">
        <p><strong>Voorwaarden:</strong></p>
      </div>
      <div class="col-8">
        <p>U kunt uw fiets vlak naast de bioscoop kwijt in de gratis fietsenstalling, gelegen tussen restaurant Miyagi and Jones en parkeerplaats P3.</p>
      </div>
     -->

     <?= !empty($table) ? $table : null ?>


      <!-- <div class="col-12">
        <table>
          <thead>
            <tr class="bob">
              <th>Zaal</th>
              <th>Aantal stoelen</th>
              <th>Rolstoelplaatsen</th>
              <th>Schermgrootte</th>
              <th>Faciliteiten</th>
              <th>Versies</th>
            </tr>
          </thead>
          <tbody>
            <tr class="odd">
              <td>1</td>
              <td>102</td>
              <td>2</td>
              <td>11.20m x 4.68m</td>
              <td><span class="screen-facilities icon icon-screen-facilities-toegankelijk-voor-andersvaliden" title="Toegankelijk voor andersvaliden">Toegankelijk voor andersvaliden</span></td>
              <td>
                <div class="screen-technology icon icon-screen-technology-laser" title="Laser"><span>Laser</span></div>
                <div class="screen-technology icon icon-screen-technology-dolby-71" title="Dolby 7.1"><span>Dolby 7.1</span></div>
              </td>
            </tr>
            <tr class="even">
              <td>2</td>
              <td>102</td>
              <td>2</td>
              <td>11.20m x 4.68m</td>
              <td><span class="screen-facilities icon icon-screen-facilities-toegankelijk-voor-andersvaliden" title="Toegankelijk voor andersvaliden">Toegankelijk voor andersvaliden</span></td>
              <td>
                <div class="screen-technology icon icon-screen-technology-laser" title="Laser"><span>Laser</span></div>
                <div class="screen-technology icon icon-screen-technology-dolby-71" title="Dolby 7.1"><span>Dolby 7.1</span></div>
              </td>
            </tr>
        </table>
      </div> -->


      <div class="col-12">
        <ul class="menu">
          <li><a href="/gebruiksvoorwaarden">Gebruiksvoorwaarden</a></li>
          <li><a href="/privacy-beleid">Privacy beleid</a></li>
          <li><a href="/cookie-beleid">Cookie beleid</a></li>
          <li><a href="/algemene-verkoopvoorwaarden">Algemene Verkoopvoorwaarden</a></li>
          <li><a href="/privacy-beleid-b2b">Privacy beleid B2B</a></li>
          <li><a href="/sitemap">Sitemap</a></li>
        </ul>
      </div>
    </article>
  </div>
</body>

</html>