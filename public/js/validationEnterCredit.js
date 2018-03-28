$(function() {

    $('#enterForm').on('submit', function() {

        var errors  = [];

        if($('#inputFirstname').val() === '') {
            errors.push('Bitte gib deinen Vornamen ein.');
        }

        if($('#inputLastname').val() === '') {
            errors.push('Bitte gib dein Nachnamen ein.');
        }
        if($('#inputEmail').val() === '') {
            errors.push('Bitte gib deine E-Mail Adresse ein.');
        }

        function validateTel(phone) {
          var re = /^[-\+ 0-9]+$/;
          if (re.test(phone) == false) {
            errors.push('Bitte gib eine valide Telefonnummer ein.');
          }
        }
        /*if ($('#inputEmail').val() != '') {
          if ($('#inputEmail').val().indexOf("@") < 0) {
            errors.push('Bitte gib eine valide E-Mail Adresse ein.');

          }
        }*/

        if ($('#inputTel').val() !== '') {
          validateTel($('#inputTel').val());
        }

        if ($('#inputCreditPackage').val() === "") {
          errors.push('Bitte Wählen Sie das gewünschte Kredit Paket.');
        }
        if ($('#inputNumberOfRates').val() === "") {
          errors.push('Bitte Wählen Sie die gewünschte Raten Zahlung.');
        }








        // Das Formular ist nur dann `valid` wenn 0 Fehler vorhanden sind.
        var isValid = errors.length < 1;

        if( ! isValid) {
            renderErrors(errors);
        }

        return isValid;

    });


    /**
     * Wandelt das `errors` Array in eine
     * normale HTML-Liste um.
     *
     * @param array errors
     */
    function renderErrors(errors) {

        var $errorList = $('#errorList');

        // Bestehende <li> entfernen
        $errorList.html('');

        errors.forEach(function(error) {
            $errorList.append('<li id="erro">' + error + '</li>');
        });

        $errorList.show();
    }

});
