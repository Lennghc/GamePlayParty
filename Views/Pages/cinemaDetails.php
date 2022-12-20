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

    <?php include 'Views/Layout/navbar.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-9">

                <strong>Informatie over Kinepolis</strong>
                <p class="text-start fw-normal">
                    Kinepolis Jaarbeurs Utrecht is gevestigd aan het Jaarbeursplein in Utrecht en heeft 14 moderne zalen met
                    2.988 comfortabele zitplaatsen. Het filmaanbod is heel breed en ons personeel staat altijd klaar om je te
                    helpen bij het uitkiezen van de geschikte film voor jouw filmuitje. Maak je filmuitje compleet met een hapje
                    en een drankje bij een van de vele restaurants die rondom de bioscoop gevestigd zijn. Combineer je filmuitje
                    met een etentje bij een van onderstaande CineMenu-partners en profiteer van korting op je diner en
                    filmkaartje. De bioscoop is met de fiets, het openbaar vervoer of met de auto goed bereikbaar. Betaald
                    parkeren kan rondom de bioscoop en de bussen stoppen op loopafstand van de bioscoop.</p>
                <strong>Belevingen</strong>
                <p class="text-start fw-normal">
                    Kinepolis Jaarbeurs Utrecht is op gebied van beeld en geluid uitgerust met de modernste technieken voor de
                    beste filmbeleving. Daarnaast is de bioscoop ook uitgerust met een Laser ULTRA zaal die is voorzien van een
                    4K-laserprojector en Dolby Atmos geluid voor de ultieme filmbeleving. Wil je nog een stapje verder gaan?
                    Bezoek dan onze ScreenX voorstelling en laat je meesleuren in een 170 graden kijkervaring waardoor je het
                    gevoel krijgt middenin de film te zitten. Of bezoek een MX4D voorstelling en laat je zintuigen maximaal
                    prikkelen door de bewegende stoelen en speciale omgevingseffecten. Naast de reguliere stoelen zijn bijna
                    alle zalen ook voorzien van Cosy Seats die extra ruimte en privacy bieden zodat je in je eigen bubbel van
                    film kan genieten.</p>
                <strong>Events</strong>
                <p class="text-start fw-normal">
                    Kinepolis Jaarbeurs Utrecht organiseert op regelmatige basis leuke events voor jong en oud. Denk hierbij aan
                    een Ladies Night voor met vriendinnen, een Bier & Blockbusters avond voor vrienden, de CinePlus voor de iets
                    oudere of het Kids Weekend voor de kleintjes.</p>
                <strong><p>Beschikbare game tijden</p></strong>

                <div class="btn-group-vertical" role="group">

                    <?= !empty($button) ? $button : null ?>
                </div>



            </div>
            <div class="col-md-3">


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
            </div>
        </div>
    </div>







    <?php include 'Views/Layout/footer.php'; ?>

</body>

</html>