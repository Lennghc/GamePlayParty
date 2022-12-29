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
    <img src="Assets/Img/gpp.svg" id="logo_image" alt="">
    <div class="container row">
        <div class="col-md-7 title-under-logo">Jaarbeurs Utrecht</div>
    </div>

    <?php include 'Views/Layout/navbar.php';   ?>

    <div class="container">
        <div class="row">

            <div class="col-md-9" id="information">

                <!-- <div class="btn-group" role="group" aria-label="Basic example">
                    <a type="button" class="btn btn-primary" href="#tijden">Beschikbare Tijden</a>
                    <a type="button" class="btn btn-primary" href="#information">Informatie</a>
                    <a type="button" class="btn btn-primary" href="#adres">Adres</a>
                </div> -->

                <?= !empty($informationText) ? $informationText : null ?>

                <div class="row" id="tijden" role="group">

                    <?= !empty($button) ? $button : null ?>

                </div>
            </div>




            <div class="col-md-3 bg-secondary bg-gradient bg-opacity-10" id="adres">

                    <h2>Openingstijden</h2>
                    <p class="text-start fw-normal">Maandag 10.00-22.00</p>
                    <p class="text-start fw-normal">Dinsdag 10.00-22.00</p>
                    <p class="text-start fw-normal">Woensdag 10.00-22.00</p>
                    <p class="text-start fw-normal">Donderdag 10.00-22.00</p>
                    <p class="text-start fw-normal">Vrijdag 10.00-22.00</p>
                    <p class="text-start fw-normal">Zaterdag 10.00-22.00</p>
                    <p class="text-start fw-normal">Zondag 10.00-22.00</p>
                    <h2>Adres</h2>
                    <p class="text-start fw-normal">Kinepolis Jaarbeurs</p>
                    <p class="text-start fw-normal">Jaarbeursboulevard 300</p>
                    <p class="text-start fw-normal">3521 BC Utrecht</p>
                    <p class="text-start fw-normal">Nederland</p>
                    <p class="text-start fw-normal">Tel. 030-2003000</p>
                    <h2>Beschikbaarheid</h2>
                    <p class="text-start fw-normal">Kinepolis Jaarbeurs ligt aan de Jaarbeurszijde van het Centraal Station, tegen de Jaarbeurshallen aan, en op loopafstand van de historische binnenstad via de Moreelsebrug.</p>
                    
                    <p class="text-start fw-normal"><strong>Auto</strong><p class="text-start fw-normal">
                    
                    <p class="text-start fw-normal">Met de auto bereik je Kinepolis Jaarbeurs door op de Ring Utrecht de blauwe ANWB-borden met de aanduiding 'Jaarbeurs' te volgen. Rondom de Jaarbeurs is volop parkeergelegenheid.
                    Alle automobilisten die een kaartje voor de film hebben kunnen 4 uur parkeren voor slechts € 5,-. Hierna geldt het reguliere parkeertarief van € 4,25 per uur. Klik hier voor meer informatie.
                    P1 en P3 zijn het gunstigst gelegen t.o.v. de bioscoop. Dit parkeertarief is alleen geldig op het Jaarbeursterrein en niet geldig bij parkeergarage Croeselaan. Houd rekening met extra drukte op de parkeerplaatsen tijdens de beurzen in de Jaarbeurshallen.</p>
                    
                    <p class="text-start fw-normal"><strong>Openbaar vervoer</strong></p>
                    
                    <p class="text-start fw-normal">Kinepolis Jaarbeurs ligt naast de Jaarbeurshallen tegenover het Centraal Station van Utrecht en is dus uitstekend te bereiken met trein, bus en tram. Volg vanaf het Centraal Station de borden ‘Jaarbeursplein’ en loop richting de Jaarbeurshallen. Binnen enkele minuten vind je de bioscoop aan uw linkerhand.</p>
                    
                    <p class="text-start fw-normal"><strong>Fiets</strong></p>
                    
                    <p class="text-start fw-normal">Je kunt jouw fiets vlak naast de bioscoop kwijt in de gratis fietsenstalling, gelegen op de promenade naast hal 1 van de Jaarbeurs.</p>
                    
                    <p class="text-start fw-normal"><strong>Rolstoeltoegankelijkheid</strong></p>
                    
                    <p class="text-start fw-normal">Kinepolis Jaarbeurs heeft rolstoelplaatsen in elke zaal. Lift en mindervalidentoilet zijn ook aanwezig.</p>

            </div>



        </div>


    </div>







    <?php include 'Views/Layout/footer.php'; ?>


</body>

</html>