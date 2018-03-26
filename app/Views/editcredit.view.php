<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="public/css/app.css">
    <link rel="stylesheet" href="public/css/editcredit.css">

    <title>Kredihay - Kredit bearbeiten</title>
</head>
<body>

<nav class="navbar navbar-expand sticky-top navbar-lighter">
    <a class="navbar-brand" href="overview">Kredihay</a>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
            <a class="nav-link" href="overview">Übersicht <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="entercredit">Erfassen</a>
        </li>
    </ul>
</nav>


<div class="container">
    <main class="mb-5">

        <form action="editcreditvalidate" method="post">
            <fieldset>
                <legend>Personalien</legend>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputFirstname">Vorname</label>
                        <input type="text" class="form-control" id="inputFirstname" placeholder="Vorname" name="inputFirstname" value="<?= $currentCredit['firstname'] ?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputLastname">Nachname</label>
                        <input type="text" class="form-control" id="inputLastname" placeholder="Nachname" name="inputLastname" value="<?= $currentCredit['lastname'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputEmail">E-Mail</label>
                        <input type="email" class="form-control" id="inputEmail" placeholder="E-Mail" name="inputEmail" value="<?= $currentCredit['email'] ?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputPhone">Telefonnummer</label>
                        <input type="tel" class="form-control" id="inputPhone" placeholder="Telefonnummer" name="inputPhone" value="<?= $currentCredit['phone'] ?>">
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>Kreditangaben</legend>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <div class="col-sm-6 form-label">
                            <label for="inputCreditPackage">Kredit-Paket</label>
                        </div>
                        <select class="form-control">
                            <?php
                            foreach ($creditPackages as $c) {?>
                                <option
                                        value="<?= $c['id'] ?>"
                                        <?= $c['id'] == $currentCredit['fk_creditpackages'] ? 'selected' : '' ?>
                                ><?= $c['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-sm-6">
                        <div class="col-sm-12 form-label">
                            <p class="form-radio-label">Verleih-Status</p>
                        </div>
                        <div class="row">
                            <div class="col-md-auto">
                                <label class="form-check-label">
                                    <input type="radio" name="verleihstatusRadio" id="verleihstatusRaioOffen" value="0" <?= $currentCredit['rentalStatus'] == 0 ? 'checked' : '' ?>>
                                    Offen
                                </label>
                            </div>
                            <div class="col-md-auto">
                                <label class="form-check-label inline-radio">
                                    <input type="radio" name="verleihstatusRadio" id="verleihstatusRaioGeschlossen" value="1" <?= $currentCredit['rentalStatus'] == 1 ? 'checked' : '' ?>>
                                    Geschlossen
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <div class="col-sm-6 form-label">
                            <label for="inputNumberOfRates">Anzahl Raten</label>
                        </div>
                        <select class="form-control" disabled>
                            <option value="1"><?= $currentCredit['numberOfRates'] ?></option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="inputBegin">Startdatum</label>
                        <input type="text" class="form-control" id="inputBegin" placeholder="Startdatum" name="inputBegin" disabled value="<?= $currentCredit['begin'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputEnd">Zurückzahlen bis</label>
                        <input type="text" class="form-control" id="inputEnd" placeholder="Zurückzahlen bis" name="inputEnd" disabled value="<?= $currentCredit['endDate'] ?>">
                    </div>
                </div>

            </fieldset>
            <button type="submit" class="btn btn-primary px-4 float-right">Speichern</button>
        </form>

    </main>

    <footer class="pt-3 pb-2 border-top text-center">
        <small class="text-muted">Copyright &copy; 2017-2018 Iman Lünsmann & Jonas Koller. All rights reserved.</small>
    </footer>
</div>

</body>
</html>
