<?php

$router = new Router();

$router->define([
    '' => 'app/Controllers/WelcomeController.php',
    'entercredit' => 'app/Controllers/EnterCreditController.php',
    'success' => 'app/Controllers/SuccessController.php',
    'entercreditvalidate' => 'app/Controllers/ValidationEnterCreditController.php',

]);
