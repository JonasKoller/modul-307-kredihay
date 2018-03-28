function setClosed() {

    var toClose = '';

    $('input[type=checkbox]:checked').map(function(_, el) {
        toClose += $(el).val() + ';';
    }).get();

    if(toClose.endsWith(';')) {
        toClose = toClose.substr(0, toClose.length -1);
    }

    if(toClose.trim() !== '')
        window.location.href = "closecredit?to=" + encodeURI(toClose);
}