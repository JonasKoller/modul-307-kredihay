<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $validator = new Validator();
    $validator->validateForm('enter');

    if (count($validator->errors) === 0) {
        $success = true;
        require 'app/Controllers/OverviewController.php';
    }
    else {
        $errors = $validator->errors;
        require 'app/Controllers/EnterCreditController.php';
    }
}