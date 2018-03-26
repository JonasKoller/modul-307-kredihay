<?php
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $inputFirstname = post('inputFirstname', '');
  $inputLastname = post('inputLastname', '');
  $inputEmail = post('inputEmail', '');
  $inputAddress = post('inputAddress', '');


  //1. Bereinigen
  $inputFirstname = trim($inputFirstname);
  $inputLastname = trim($inputLastname);
  $inputEmail = trim($inputEmail);
  $inputAddress = trim($inputAddress);


  //2.Validieren
  if ($inputFirstname === "") {
    $errors[] = 'Bitte geben Sie Ihren Vornamen ein.';
  }
  if ($inputLastname === "") {
    $errors[] = 'Bitte geben Sie Ihren Nachnamen ein.';
  }
  if ($inputEmail === "") {
    $errors[] = 'Bitte geben Sie Ihre E-Mail Adresse ein.';
  }
  if ($inputAddress === "") {
    $errors[] = 'Bitte geben Sie Ihre Adresse ein.';
  }

  if (count($errors) === 0) {
    require 'app/Views/success.view.php';

    } else {
      require 'app/Views/entercredit.view.php';
    }
  }
