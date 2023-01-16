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

        <h4><?= !empty($data[0]['cinema_name']) ? $data[0]['cinema_name'] : null ?></h4>
        <?= !empty($reachability[2]['message']) ? $reachability[2]['message'] : null ?>
      </div>
      <div class="col-7">
        <h4><?= $user['fName'] . ' ' . $user['mName'] . ' ' . ucfirst($user['lName']) ?></h4>
        <?= ucfirst($user['adres']['street']) . ' ' . $user['adres']['houseNumber'] ?><br>
        <?= $user['adres']['zipcode'] . ' ' . ucfirst($user['adres']['city']) ?><br>
        Tel.:<?= !empty($user['tel']) ? $user['tel'] : null ?>
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
            <strong>GPP-<?= !empty($data[0]['reservation_id']) ? $data[0]['reservation_id'] : null ?></strong><br>
            <?php $date = new DateTime($data[0]['reservation_date']);
            echo $date->format('d F, Y') ?><br>
            <?php $date = new DateTime($data[0]['reservated_date']);
            echo $date->format('d F, Y') ?><br>
            <?php

            foreach ($timeslot as $key => $value) {
              echo $value['slot_start_time'] . ' - ' . $value['slot_end_time'];
            }
            ?><br>
            € <?= !empty($rate[1]) ? $rate[1] : null ?><br><br>
          </div>
        </div>
      </div>

      <?= !empty($rate[0]) ? $rate[0] : null ?>
      <div class="col-12 bob">
        <h2>Informatie over <?= $data[0]['cinema_name'] ?></h2>
      </div>
      <div class="col-6 bob">
        <p>Met Kinepolis Jaarbeurs (14 zalen, 3200 stoelen) heeft Utrecht eindelijk een moderne megabioscoop in de binnenstad: de grootste bioscoop van Utrecht, en een van de grootste bioscopen van Nederland. Kinepolis Jaarbeurs biedt elke filmbezoeker ‘the ultimate cinema experience’: ruime en comfortabele stoelen, royale beenruimte, en beeld en geluid van het allerhoogste niveau.</p>
      </div>

      <div class="col-6 bob">
        <p><strong>Openingstijden:</strong></p>
        <?= $reachability[1]['message'] ?>
        <?= !empty($reachability[1]['message']) ? $reachability[1]['message'] : null ?>
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


      <?= !empty($table) ? $table : null ?>


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