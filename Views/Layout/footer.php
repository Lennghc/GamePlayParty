<footer class="footer">
    <div class="footer_container">
        <div class="footer_top">
            <!-- <div>
                <h6 class="footer_title">Bioscopen</h6>
                <ul class="footer_list">
                    <li class="footer_list-item">
                        <a href="" class="footer_list-link">namen</a>
                    </li>
                </ul>
            </div>
            <div>
                <h6 class="footer_title">Evenementen</h6>
                <ul class="footer_list">
                    <li class="footer_list-item">
                        <a href="" class="footer_list-link">namen</a>
                    </li>
                </ul>
            </div> -->
            <div>
                <h6 class="footer_title">Pagina's</h6>
                <ul class="footer_list">
                        <?= isset($_SESSION['user']) ? '<li class="footer_list-item"><a href="index.php?con=auth&op=logout" class="footer_list-link">Uitloggen</a>' : '<a href="index.php?con=auth&op=registreer" class="footer_list-link">Registreren</a></li>'?>
                        <?= isset($_SESSION['user']) ? '' : '<li class="footer_list-item"><a href="index.php?con=auth&op=login" class="footer_list-link">Inloggen</a></li>'?>
                    <?= isset($_SESSION['user']) && $_SESSION['user']->role_id == 4 ? '<li class="footer_list-item"><a href="index.php?con=cms" class="footer_list-link">Beheer paneel</a></li>' : null ?>
                    <?= isset($_SESSION['user']) && $_SESSION['user']->role_id == 3 ? '<li class="footer_list-item"><a href="index.php?con=cms" class="footer_list-link">Beheer paneel</a></li>' : null ?>
                </ul>
            </div>
            <div>
                <h6 class="footer_title">Privacybeleid</h6>
                <ul class="footer_list">
                    <li class="footer_list-item">
                        <a href="index.php?con=home&op=cookies" class="footer_list-link">Cookies (EN)</a>
                    </li>
                    <li class="footer_list-item">
                        <a href="Views/Policy/termsfeed-privacy-policy-html-dutch.html" class="footer_list-link">Privacy (NL)</a>
                    </li>
                    <li class="footer_list-item">
                        <a href="Views/Policy/termsfeed-privacy-policy-html-english.html" class="footer_list-link">Privacy (EN)</a>
                    </li>
                    <li class="footer_list-item">
                        <a href="Views/Policy/termsfeed-return-refund-policy-html-english.html" class="footer_list-link">Return & Refund (EN)</a>
                    </li>
                    <li class="footer_list-item">
                        <a href="Views/Policy/termsfeed-terms-conditions-html-english.html" class="footer_list-link">Terms & Conditions (EN)</a>
                    </li>
                </ul>
            </div>
        </div>
        <hr class="footer_divider">
        <div class="footer_bottom">
            <span class="copyright">© 2022 Webworld. Alle rechten voorbehouden</span>
            <ul class="footer-list">
                <li class="footer_list-item">
                    <a href="https://www.facebook.com/Kinepolis.Nederland" class="footer_list-link">
                <li class="fa-brands fa-facebook"></li>
                </a>
                <a href="https://twitter.com/kinepolis_nl" class="footer_list-link">
                    <li class="fa-brands fa-twitter"></li>
                </a>
                <a href="https://www.instagram.com/kinepolis_nl/" class="footer_list-link">
                    <li class="fa-brands fa-instagram"></li>
                </a>
                <a href="https://www.youtube.com/channel/UCKyNMhPXbqTQJ-Q7h1zRvLg" class="footer_list-link">
                    <li class="fa-brands fa-youtube"></li>
                </a>
                </li>
            </ul>
        </div>
    </div>
</footer>

<?php
if (isset($_SESSION['toast'])) {
    echo $_SESSION['toast'];
    unset($_SESSION['toast']);
}
?>