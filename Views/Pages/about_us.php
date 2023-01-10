<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "About us";
    include 'Views/Layout/header.php';
    ?>
</head>

<body>
    <img src="Assets/Img/gpp.svg" id="logo_image" alt="">
    <div class="container row">
        <div class="col-md-7 title-under-logo">About Us</div>
    </div>

    <?php include 'Views/Layout/navbar.php'; ?>

    <div class="container conatiner_landing_page">

        <div class="row">
            <h5 class="fs-5 fw-bold text-start">Wie zijn wij?</h5>

            <div class="col-md-12">
                <p>Game play party is een organisatie die samen met bioscopen werkt. 
                Bioscopen kunnen zich bij ons aansluiten en hun beschikbare gameplay tijden aangeven. 
                U kunt op een van de beschikbare tijden een reservering maken. Game play party is het leukst met een grote aantal.
                Je kan absoluut je feestje bij ons komen vieren. Bij het reserveren kunt u er ook voor kiezen om er een taart bij te bestellen.
                Neem vooral je eigen favoriete Xbox One-spellen mee. Mocht je geen eigen xbox One-spellen hebben heeft het theater bij jou in de buurt
                een eigen aanbod aan spellen.
                </p>
            </div>
            
            <div class="col-md-12">
                <h5 class="fs-5 fw-bold">Contact ons</h5>

                <p>Om met ons contact op te kunnen zoeken kunt u ons alleen bereiken via de mail.
                Via de knop hieronder kunt u ons een mailen met het volgende e-mailadres:
                <b>gameplayparty@gmail.com</b>
                </p>
                <a href="mailto:gameplayparty@gmail.com"><div class="button">Mail ons!</div></a>
            </div>
        </div>
    </div>

    <?php include 'Views/Layout/footer.php'; ?>

</body>

</html>