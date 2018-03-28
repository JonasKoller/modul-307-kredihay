<?php

if(!isset($success))
    $success = false;

$creditModel = new Credit();
$openCredits = $creditModel->getOpenCreditsSortedByDate();



require 'app/Views/overview.view.php';
