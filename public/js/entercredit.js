$(function () {

    showPreviewReturnDate();

    $( "#inputNumberOfRates" ).change(function() {
        showPreviewReturnDate();
    });

    function showPreviewReturnDate() {
        $( "#rueckzahlung" ).text(getDateAndAddDays());
    }

    function getDateAndAddDays() {
        var today = new Date();
        var numberOfDaysToAdd = $( "#inputNumberOfRates" ).val() * 15;
        today.setDate(today.getDate() + numberOfDaysToAdd);

        var dd = today.getDate();
        var mm = today.getMonth() + 1;
        var y = today.getFullYear();

        return dd + '-'+ mm + '-'+ y;
    }

});