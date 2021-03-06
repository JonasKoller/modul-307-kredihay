<?php

$router = new Router();

$router->define([
    ''                      => 'app/Controllers/OverviewController.php',
    'overview'              => 'app/Controllers/OverviewController.php',
    'entercredit'           => 'app/Controllers/EnterCreditController.php',
    'success'               => 'app/Controllers/SuccessController.php',
    'entercreditvalidate'   => 'app/Controllers/ValidationEnterCreditController.php',
    'edit'                  => 'app/Controllers/EditCreditController.php',
    'editcreditvalidate'    => 'app/Controllers/ValidationEditCreditController.php',
    'closecredit'           => 'app/Controllers/CloseCreditController.php'
]);
