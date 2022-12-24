<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Bioscoop details";
    include 'Views/Layout/header.php';
    ?>
    <link rel="stylesheet" href="Assets/Css/cinemaDetails.css">
</head>

<body>
    <!-- <img src="Assets/Img/gpp.svg" id="logo_image" alt=""> -->
    <div class="container row">
        <div class="col-md-7 title-under-logo">Jaarbeurs Utrecht</div>
    </div>

    <?php // include 'Views/Layout/navbar.php'; 
    ?>

    <div class="container">
        <div class="row">

            <div class="col-md-9" id="information">

                <div class="btn-group" role="group" aria-label="Basic example">
                    <a type="button" class="btn btn-primary" href="#tijden">Beschikbare Tijden</a>
                    <a type="button" class="btn btn-primary" href="#information">Informatie</a>
                    <a type="button" class="btn btn-primary" href="#adres">Adres</a>
                </div>

                <?= !empty($informationText) ? $informationText : null ?>

                <div class="btn-group-vertical" id="tijden" role="group">

                    <?= !empty($button) ? $button : null ?>

                </div>

            </div>

            <!-- <div class="col-md-3" id="adres">

                <div class="group-right">
                    <h2>Openingstijden</h2>
                    <p class="text-start fw-normal">
                        Maandag 10.00-22.00<br>
                        Dinsdag 10.00-22.00<br>
                        Woensdag 10.00-22.00<br>
                        Donderdag 10.00-22.00<br>
                        Vrijdag 10.00-22.00<br>
                        Zaterdag 10.00-22.00<br>
                        Zondag 10.00-22.00<br>
                    <h2>Adres</h2>
                    Kinepolis Jaarbeurs<br>
                    Jaarbeursboulevard 300<br>
                    3521 BC Utrecht<br>
                    Nederland<br>
                    Tel. 030-2003000<br><br>
                    <h2>Beschikbaarheid</h2>
                    Kinepolis Jaarbeurs ligt aan de Jaarbeurszijde van het Centraal Station, tegen de Jaarbeurshallen aan, en op loopafstand van de historische binnenstad via de Moreelsebrug.
                    <br><br>
                    <strong>Auto</strong>
                    <br>
                    Met de auto bereik je Kinepolis Jaarbeurs door op de Ring Utrecht de blauwe ANWB-borden met de aanduiding 'Jaarbeurs' te volgen. Rondom de Jaarbeurs is volop parkeergelegenheid.
                    Alle automobilisten die een kaartje voor de film hebben kunnen 4 uur parkeren voor slechts € 5,-. Hierna geldt het reguliere parkeertarief van € 4,25 per uur. Klik hier voor meer informatie.
                    P1 en P3 zijn het gunstigst gelegen t.o.v. de bioscoop. Dit parkeertarief is alleen geldig op het Jaarbeursterrein en niet geldig bij parkeergarage Croeselaan. Houd rekening met extra drukte op de parkeerplaatsen tijdens de beurzen in de Jaarbeurshallen.
                    <br><br>
                    <strong>Openbaar vervoer</strong>
                    <br>
                    Kinepolis Jaarbeurs ligt naast de Jaarbeurshallen tegenover het Centraal Station van Utrecht en is dus uitstekend te bereiken met trein, bus en tram. Volg vanaf het Centraal Station de borden ‘Jaarbeursplein’ en loop richting de Jaarbeurshallen. Binnen enkele minuten vind je de bioscoop aan uw linkerhand.
                    <br><br>
                    <strong>Fiets</strong>
                    <br>
                    Je kunt jouw fiets vlak naast de bioscoop kwijt in de gratis fietsenstalling, gelegen op de promenade naast hal 1 van de Jaarbeurs.
                    <br><br>
                    <strong>Rolstoeltoegankelijkheid</strong>
                    <br>
                    Kinepolis Jaarbeurs heeft rolstoelplaatsen in elke zaal. Lift en mindervalidentoilet zijn ook aanwezig.
                    </p>

                </div>
            </div> -->
        </div>
    </div>







    <?php include 'Views/Layout/footer.php'; ?>


</body>

</html>