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

<?php require 'app/Views/static/header.php' ?> <!-- TOP-NAV -->

<div class="container">
    <main class="mb-5">
        <form action="editcreditvalidate" method="post">

            <fieldset>
                <legend>Personalien</legend>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputFirstname">Vorname</label>
                        <input type="text" class="form-control" id="inputFirstname" placeholder="Vorname" name="inputFirstname" required value="<?= $currentCredit['firstname'] ?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputLastname">Nachname</label>
                        <input type="text" class="form-control" id="inputLastname" placeholder="Nachname" name="inputLastname" required value="<?= $currentCredit['lastname'] ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputEmail">E-Mail</label>
                        <input type="email" class="form-control" id="inputEmail" placeholder="E-Mail" name="inputEmail" required value="<?= $currentCredit['email'] ?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputPhone">Telefonnummer</label>
                        <input type="tel" class="form-control" id="inputPhone" placeholder="Telefonnummer" name="inputPhone" required value="<?= $currentCredit['phone'] ?>">
                    </div>
                </div>

            </fieldset>

            <fieldset>
                <legend>Kreditangaben</legend>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputCreditPackage">Kredit-Paket</label>
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
                        <p class="form-radio-label">Verleih-Status</p>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="verleihstatusRadio" id="verleihstatusRaioGeschlossen" value="1" <?= $currentCredit['rentalStatus'] == 1 ? 'checked' : '' ?>>
                                Geschlossen
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input"type="radio" name="verleihstatusRadio" id="verleihstatusRaioOffen" value="0" <?= $currentCredit['rentalStatus'] == 0 ? 'checked' : '' ?>>
                                Offen
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputNumberOfRates">Anzahl Raten</label>
                        <select class="form-control" id="inputNumberOfRates" disabled>
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

    <?php require 'app/Views/static/footer.php' ?> <!-- FOOTER -->

</div>

</body>
</html>
