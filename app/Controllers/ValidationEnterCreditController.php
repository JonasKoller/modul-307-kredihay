<?php
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $inputFirstname = post('inputFirstname', '');
  $inputLastname = post('inputLastname', '');
  $inputEmail = post('inputEmail', '');
  $inputTel = post('inputTel', '');
  $inputNumberOfRates = post('inputNumberOfRates', '');
  $inputCreditPackage = post('inputCreditPackage', '');


  //1. Bereinigen
  $inputFirstname = trim($inputFirstname);
  $inputLastname = trim($inputLastname);
  $inputEmail = trim($inputEmail);
  $inputTel = trim($inputTel);
  $inputNumberOfRates = trim($inputNumberOfRates);
  $inputCreditPackage = trim($inputCreditPackage);

  //2.Validieren
  if ($inputFirstname === "") {
    $errors[] = 'Bitte geben Sie Ihren Vornamen ein.';
  }
  if ($inputLastname === "") {
    $errors[] = 'Bitte geben Sie Ihren Nachnamen ein.';
  }
  if (strpos($inputEmail, "@") == false) {
    $errors[] = 'Die E-Mail Adresse muss ein @ enthalten.';
  }
  if ($inputEmail === "") {
    $errors[] = 'Bitte geben Sie Ihre E-Mail Adresse ein.';
  }
  if ($inputTel === "") {
    $errors[] = 'Bitte geben Sie Ihre Telefonnummer ein.';
  }
  if ($inputNumberOfRates === "") {
    $errors[] = 'Bitte geben Sie die Anzahl der Raten ein.';
  }

  if (count($errors) === 0) {
    require 'app/Views/success.view.php';

    } else {
      require 'app/Controllers/EnterCreditController.php';
    }
  }
