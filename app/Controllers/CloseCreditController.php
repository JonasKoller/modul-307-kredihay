<?php

$toCloseInput = $_GET['to'] ?? '';
$toCloseInput = trim($toCloseInput);

if ($toCloseInput !== '') {
    $creditModel = new Credit();

    $toClose = explode(';', $toCloseInput);

    foreach ($toClose as $t) {
        $creditModel->closeCredit($t);
    }

    $success = true;
    require 'app/Controllers/OverviewController.php';
}
