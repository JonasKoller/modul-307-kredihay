<?php

$creditPackageModel = new CreditPackage();
$creditPackages = $creditPackageModel->getCreditPackageList();


require 'app/Views/entercredit.view.php';
