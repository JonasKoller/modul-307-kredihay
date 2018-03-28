<?php

class Validator {

    private $creditModel;
    private $creditPackageModel;
    public $id;
    public $errors = [];

    public function __construct() {
        $this->creditModel = new Credit();
        $this->creditPackageModel = new CreditPackage();
    }

    public function isEmpty(string $value) {
        return $value === '';
    }

    public function isValidEMail($value) {
        return strpos($value, '@') === false;
    }

    public function isValidTel($value) {
        return preg_match('/^[-\+ 0-9]+$/', $value);
    }

    public function isValidRate($value) {
        return $value >= 1 && $value <= 10;
    }

    public function isValidCreditPackage($value) {
        return $this->creditPackageModel->checkIfCreditPackageExists($value);
    }

    /**
     * @param $formType
     * @return array
     */
    public function validateForm($formType) {

        $inputFirstname = postAndTrim('inputFirstname');
        $inputLastname = postAndTrim('inputLastname');
        $inputEmail = postAndTrim('inputEmail');
        $inputTel = postAndTrim('inputTel');
        $inputNumberOfRates = (int) postAndTrim('inputNumberOfRates');
        $inputCreditPackage = (int) postAndTrim('inputCreditPackage');

        //2.Validieren
        if ($this -> isEmpty($inputFirstname)) {
            $this->errors[] = 'Bitte geben Sie Ihren Vornamen ein.';
        }

        if ($this -> isEmpty($inputLastname)) {
            $this->errors[] = 'Bitte geben Sie Ihren Nachnamen ein.';
        }

        if ($this -> isEmpty($inputEmail)) {
            $this->errors[] = 'Bitte geben Sie Ihre E-Mail Adresse ein.';
        }
        else if ($this -> isValidEMail($inputEmail)) {
            $this->errors[] = 'Die E-Mail Adresse muss ein @ enthalten.';
        }

        if((!$this -> isEmpty($inputTel)) && !$this -> isValidTel($inputTel)) {
            $this->errors[] = 'Bitte geben Sie eine gültige Telefonnummer ein.';
        }

        if(!$this -> isValidRate($inputNumberOfRates)) {
            $this->errors[] = 'Wählen Sie eine Rate aus.';
        }

        if(!$this -> isValidCreditPackage($inputCreditPackage)) {
            $this->errors[] = 'Wählen Sie ein Kreditpaket aus.';
        }

        if($formType === 'enter' && sizeof($this->errors) === 0) {
            $this->creditModel->insertCredit($inputLastname, $inputFirstname, $inputEmail, $inputTel, $inputNumberOfRates, $inputCreditPackage);
        }

        if($formType === 'edit') {
            $inputRentalStatus = (int) postAndTrim('verleihstatusRadio');

            if (!($inputRentalStatus === 0 || $inputRentalStatus === 1)) {
                $this->errors[] = 'Wählen Sie einen Verleihstatus aus.';
            }

            if (sizeof($this->errors) === 0 && isset($this->id)) {
                $this->creditModel->updateChanges($this->id, $inputLastname, $inputFirstname, $inputEmail, $inputTel, $inputRentalStatus, $inputCreditPackage);
            }

        }

        return $this->errors;

    }


}