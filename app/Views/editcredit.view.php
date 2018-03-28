<!DOCTYPE html>
<html lang="de">
<?php
    $pageTitle = 'Kredit bearbeiten';
    require 'app/Views/static/head.php'
?>
<body>

<?php require 'app/Views/static/navbar.php' ?> <!-- TOP-NAV -->

<div class="container">
    <main class="mb-5">

        <?php if (isset($errors) && count($errors) >= 1): ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="errorss">
                        <?php foreach ($errors as $err) : ?>
                            <ul>
                                <?= $err ?>
                            </ul>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        <?php endif; ?>

        <form action="editcreditvalidate?id=<?= $_GET['id'] ?>" method="post">

            <fieldset>
                <legend>Personalien</legend>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputFirstname">Vorname</label>
                        <input type="text" class="form-control" id="inputFirstname" placeholder="Vorname"
                               name="inputFirstname" required value="<?= e($currentCredit['firstname']) ?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputLastname">Nachname</label>
                        <input type="text" class="form-control" id="inputLastname" placeholder="Nachname"
                               name="inputLastname" required value="<?= e($currentCredit['lastname']) ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputEmail">E-Mail</label>
                        <input type="email" class="form-control" id="inputEmail" placeholder="E-Mail" name="inputEmail"
                               required value="<?= e($currentCredit['email']) ?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputTel">Telefonnummer</label>
                        <input type="tel" class="form-control" id="inputTel" placeholder="Telefonnummer"
                               name="inputTel" required value="<?= e($currentCredit['phone']) ?>">
                    </div>
                </div>

            </fieldset>

            <fieldset>
                <legend>Kreditangaben</legend>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputCreditPackage">Kredit-Paket</label>
                        <select class="form-control" id="inputCreditPackage" name="inputCreditPackage">
                            <?php
                            foreach ($creditPackages as $c) { ?>
                                <option
                                        value="<?= $c['id'] ?>"
                                    <?= $c['id'] == $currentCredit['fk_creditpackages'] ? 'selected' : '' ?>>
                                    <?= $c['name'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-sm-6">
                        <p class="form-radio-label">Verleih-Status</p>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="verleihstatusRadio"
                                       id="verleihstatusRaioGeschlossen"
                                       value="1" <?= $currentCredit['rentalStatus'] == 1 ? 'checked' : '' ?>>
                                Geschlossen
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="verleihstatusRadio"
                                       id="verleihstatusRaioOffen"
                                       value="0" <?= $currentCredit['rentalStatus'] == 0 ? 'checked' : '' ?>>
                                Offen
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputNumberOfRates">Anzahl Raten</label>
                        <select class="form-control" id="inputNumberOfRates" name="inputNumberOfRates">
                            <option value="1" selected><?= e($currentCredit['numberOfRates']) ?></option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="inputBegin">Startdatum</label>
                        <input type="text" class="form-control" id="inputBegin" placeholder="Startdatum"
                               name="inputBegin" disabled value="<?= e($currentCredit['begin']) ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputEnd">Zurückzahlen bis</label>
                        <input type="text" class="form-control" id="inputEnd" placeholder="Zurückzahlen bis"
                               name="inputEnd" disabled value="<?= e($currentCredit['endDate']) ?>">
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
