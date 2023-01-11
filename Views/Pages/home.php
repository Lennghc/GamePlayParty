<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Home";
    include 'Views/Layout/header.php';
    ?>
</head>

<body>
    <img src="Assets/Img/gpp.svg" id="logo_image" alt="">
    <div class="container row">
        <div class="col-md-7 title-under-logo">Game nu in de bioscoop!</div>
    </div>

    <?php include 'Views/Layout/navbar.php'; ?>


    <div class="container conatiner_landing_page">

            <div class="row">
                <p class="text-start fw-bold text-color"> POWER TO THE PLAYERS! <br>Breng jouw spel naar het volgende niveau op het grote scherm! <br>Met een privé-theater dat speciaal voor jou en je crew is gereserveerd, heb je nog nooit eerder zo gespeeld. <br>Maak er een toernooi van! </p>
                <p class="text-start fw-bold text-color"> Neem je eigen favoriete Xbox One-spellen mee of kies uit het aanbod van je theater. </p>
                <h5 class="fs-5 fw-bold">Dingen die je moet weten</h5>


                <div class="col-md-12">
                    <img src="https://images.unsplash.com/photo-1517604931442-7e0c8ed2963c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=680&q=80" alt="" class="img-fluid home-image"></img>

                    <p class="text-start fw-normal"> Er is geen minimum voor groepen, maar het wordt aanbevolen dat de groepsgrootte tussen de 8 en 12 personen is. Dit zal de speeltijd voor elke speler maximaliseren.
                        Voel je vrij om je eigen Xbox-spel mee te nemen om te spelen <b>(persoonlijke spelconsoles of spellen voor andere spelconsoles zijn niet toegestaan)</b>.
                        Er is geen leeftijdsgrens voor videospelletjes op Xbox, maar de ouders moeten wel zelf kunnen beslissen over de spelbeoordeling van oudere gamers (d.w.z., titels met een 'M'-rating).
                    <p>
                    <div class="collapse" id="collapseExample">
                        Feesten kunnen <b>maximaal 6 weken</b> voor de datum van uw voorkeur worden aangevraagd en zijn niet gegarandeerd tot de datum is bevestigd en geboekt door het theater.
                        Voor elke partij kan een aanbetaling van €50 worden gevraagd en kan op elk moment voor de partij aan de kassa worden betaald. De boeking kan pas worden gereserveerd na ontvangst van de aanbetaling.</p>
                        Annuleringen met een opzegtermijn van minder dan 24 uur kunnen leiden tot een niet-terugvorderbare aanbetaling.
                        Buiten eten en drinken is niet toegestaan in de theatercomplexen, maar als u een verjaardag viert, kunt u uw eigen <b>verjaardagstaart</b> meenemen! Wij zorgen voor de borden, servetten en bestek.
                        Feesten kunnen op elk moment buiten de openingsuren geboekt worden. Een voorbeeldboeking is <b>zaterdag 10.00 - 12.00 uur of eender welke nacht na 22.30 uur</b>, in afwachting van beschikbaarheid in bepaalde theaters en kan rechtstreeks bij het theater worden bevestigd.
                        Cadeaubonnen, alle belangrijke creditcards en debetkaarten worden geaccepteerd als betaalmiddel.
                        Het is mogelijk dat er op sommige locaties doordeweeks geen partyboekingen beschikbaar zijn.</p>

                    </div>

                    <a class="" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <span class="collapsed">
                            Lees meer
                    </span>
                    <span class="expanded">
                            Lees minder
                    </span>
                    </a>

                </div>

            </div>

            <div class="col-md-6 box-right">
                <img src="Assets/Img/gameconsole.jpg" alt="" class="img-gameconsole"></img>
            </div>
    </div>



    <?php include 'Views/Layout/footer.php'; ?>

</body>

</html>