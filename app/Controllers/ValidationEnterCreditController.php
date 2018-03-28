<?php

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $creditModel = new Credit();

    $inputFirstname = post('inputFirstname');
    $inputLastname = post('inputLastname');
    $inputEmail = post('inputEmail');
    $inputTel = post('inputTel');
    $inputNumberOfRates = post('inputNumberOfRates');
    $inputCreditPackage = post('inputCreditPackage');

    //1. Bereinigen
    $inputFirstname = trim($inputFirstname);
    $inputLastname = trim($inputLastname);
    $inputEmail = trim($inputEmail);
    $inputTel = trim($inputTel);
    $inputNumberOfRates = (int)trim($inputNumberOfRates);
    $inputCreditPackage = (int)trim($inputCreditPackage);

    //2.Validieren
    if ($inputFirstname === '') {
        $errors[] = 'Bitte geben Sie Ihren Vornamen ein.';
    }

    if ($inputLastname === '') {
        $errors[] = 'Bitte geben Sie Ihren Nachnamen ein.';
    }

    if ($inputEmail === '') {
        $errors[] = 'Bitte geben Sie Ihre E-Mail Adresse ein.';
    }
    else if (strpos($inputEmail, '@') === false) {
        $errors[] = 'Die E-Mail Adresse muss ein @ enthalten.';
    }

    if($inputTel !== '' && !preg_match('/^[-\+ 0-9]+$/', $inputTel)) {
        $errors[] = 'Bitte geben Sie eine gültige Telefonnummer ein.';
    }

    if($inputNumberOfRates < 1 || $inputNumberOfRates > 10) {
        $errors[] = 'Wählen Sie eine Rate aus.';
    }


    if(!$creditModel->checkIfCreditPackageExists($inputCreditPackage)) {
        $errors[] = 'Wählen Sie ein Kreditpaket aus.';
    }

    if (count($errors) === 0) {
        require 'app/Views/success.view.php';
    }

    foreach ($errors as $error) {
      echo $error;
    }

}
