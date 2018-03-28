<!DOCTYPE html>
<html lang="de">
<?php
    $pageTitle = 'Kredit erfassen';
    require 'app/Views/static/head.php'
?>
<body>

<?php require 'app/Views/static/navbar.php' ?> <!-- TOP-NAV -->

<div class="container">
    <main class="mb-5">

        <div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h1 class="display-4">Kredit erfassen</h1>
        </div>

        <ul id="errorList"></ul> <!-- via CSS ausblenden -->

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

        <form action="entercreditvalidate" method="post" id="enterForm">

            <fieldset>
                <legend>Personalien</legend>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputFirstname">Vorname</label>
                        <input type="text" class="form-control" id="inputFirstname" placeholder="Vorname"
                               name="inputFirstname" required>
                    </div>
                    <div class="col-sm-6">
                        <label for="inputLastname">Nachname</label>
                        <input type="text" class="form-control" id="inputLastname" placeholder="Nachname"
                               name="inputLastname" required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputEmail">E-Mail</label>
                        <input type="email" class="form-control" id="inputEmail" placeholder="E-Mail"
                               name="inputEmail" required>
                    </div>
                    <div class="col-sm-6">
                        <label for="inputTel">Telefonnummer</label>
                        <input type="tel" class="form-control" id="inputTel" placeholder="Telefonnummer"
                               name="inputTel">
                    </div>
                </div>

            </fieldset>

            <fieldset>
                <legend>Kreditangaben</legend>

                <div class="form-group row">
                    <div class="col-sm-6">
        <label for="inputNumberOfRates">Anzahl Raten</label>
                        <select class="form-control" id="inputNumberOfRates" name="inputNumberOfRates" required>
                            <?php for ($a = 1; $a <= 10; $a++): ?>
                                <option value="<?= $a ?>">
                                    <?= $a ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="inputCreditPackage">Kredit-Paket</label>
                        <select class="form-control" id="inputCreditPackage" name="inputCreditPackage" required>
                            <?php foreach ($creditPackages as $package) : ?>
                                <option value="<?= $package['id'] ?>"><?= $package['name'] ?></option>
                            <?php endforeach; ?>
                        </select>

                    </div>
                </div>

            </fieldset>
            <div class="row pl-3">
                <p>
                    <strong>Rückzahlungstermin:</strong>
                    <span id="rueckzahlung"></span>
                </p>
            </div>
            <button type="submit" id="validate" class="btn btn-primary px-4 float-right">Speichern</button>

        </form>

    </main>

    <?php require 'app/Views/static/footer.php' ?> <!-- FOOTER -->

</div>
<script src="public/js/validationEnterCredit.js" charset="utf-8"></script>
<script src="public/js/entercredit.js" charset="utf-8"></script>
</body>
</html>
