<?php

$creditModel = new Credit();
$openCredits = $creditModel->fetchAllOpenCreditsSortedByDate();

require 'app/Views/overview.view.php';
