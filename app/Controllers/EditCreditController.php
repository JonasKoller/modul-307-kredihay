<?php


if (!isset($editId)) {
    $editId = $_GET['id'] ?? '';
    $editId = trim($editId);
}

if($editId === '') {
    require 'app/Controllers/OverviewController.php';
}

$creditModel = new Credit();
$currentCredit = $creditModel->getById($editId);

$creditPackageModel = new CreditPackage();
$creditPackages = $creditPackageModel->getCreditPackageList();


require 'app/Views/editcredit.view.php';
