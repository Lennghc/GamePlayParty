<?php

define('SHOW_ERRORS', true);

//Password
define ("SALTHEADER","PLOP23B453J");
define ("SALTTRAILER","FDSF9434VH");
                                                            // webdomain                
define('DB_HOST', $_SERVER['SERVER_NAME'] == 'localhost' ? 's241.webhostingserver.nl' : 'localhost');
define('DB_NAME', 'deb141238_webworld');
define('DB_USER', 'deb141238_webworld');
define('DB_PASS', 'leUaqCKb');

//define('PATH_DIR', pathinfo($_SERVER['PHP_SELF'])['dirname']);
define('PATH_DIR', (pathinfo($_SERVER['PHP_SELF'])['dirname'] != '/' ? pathinfo($_SERVER['PHP_SELF'])['dirname'] : null ));
define('PATH_URL', '//' . $_SERVER['HTTP_HOST'] . PATH_DIR);
