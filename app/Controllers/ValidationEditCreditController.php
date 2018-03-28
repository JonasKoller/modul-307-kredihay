<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $validator = new Validator();
    $validator->id = $_GET['id'];
    $validator->validateForm('edit');

    if (count($validator->errors) === 0) {
        $success = true;
        require 'app/Controllers/OverviewController.php';
    }
    else {
        $editId = $_GET['id'];
        $errors = $validator->errors;
        require 'app/Controllers/EditCreditController.php';
    }
}