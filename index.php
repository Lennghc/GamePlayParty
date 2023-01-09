<?php
session_start();
include('config.php');


if (!SHOW_ERRORS) {
    error_reporting(0);

    register_shutdown_function( function () {
        $error = error_get_last();
        if ($error && $error['type'] == E_ERROR) {
            http_response_code(500);
            include('Views/Errors/500.php');
        }
    });
}

require_once 'Controller/MainController.php';

$controller = new MainController();
$controller->handleRequest();

