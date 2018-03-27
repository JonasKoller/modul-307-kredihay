<?php

$credit = new Credit();
$creditPackages = $credit->getCreditPackageList();


require 'app/Views/entercredit.view.php';
