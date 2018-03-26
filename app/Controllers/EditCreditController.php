<?php

$editId = $_GET['id'] ?? '';
$editId = trim($editId);

if($editId === '')
    require 'app/Controllers/OverviewController.php';

$creditModel = new Credit();
$currentCredit = $creditModel->getById($editId);

$creditPackages = $creditModel->getCreditPackageList();

require 'app/Views/editcredit.view.php';
