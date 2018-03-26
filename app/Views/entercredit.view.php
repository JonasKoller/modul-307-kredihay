<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="public/css/app.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <title>Kredihay - Kredit Erfassen</title>
  </head>
    <body>
      <nav class="navbar navbar-expand sticky-top navbar-lighter">
          <a class="navbar-brand" href="#">Kredihay</a>
          <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                  <a class="nav-link" href="#">Übersicht <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">Erfassen</a>
              </li>
          </ul>
      </nav>

      <div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Kredit erfassen</h1>
      </div>

      <ul id="errorList"></ul> <!-- via CSS ausblenden -->

      <div class="row">
        <div class="col-md-12">
          <div class="errorss">
            <?php
              if (isset($errors) && count($errors) >= 1) {
                foreach ($errors as $err) {?>
                  <ul>
                    <?= $err ?>
                  </ul>
                <?php }} ?>
          </div>
            </div>

      </div>
      <div class="container">
        <div class="container py-5">
          <div class="row">
              <div class="col-md-10 mx-auto">
                <form action="entercreditvalidate" method="post" id="enterForm">
                  <fieldset>
                    <legend>Personalien</legend>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="inputFirstname">Vorname</label>
                            <input type="text" class="form-control" id="inputFirstname" placeholder="First name" name="inputFirstname">
                        </div>
                        <div class="col-sm-6">
                            <label for="inputLastname">Nachname</label>
                            <input type="text" class="form-control" id="inputLastname" placeholder="Last name" name="inputLastname">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="inputEmail">E-Mail</label>
                            <input type="text" class="form-control" id="inputEmail" placeholder="E-Mail" name="inputEmail">
                        </div>
                        <div class="col-sm-6">
                            <label for="inputTel">Telefonnummer</label>
                            <input type="text" class="form-control" id="inputTel" placeholder="Telefonnummer" name="inputTel">
                        </div>
                    </div>
                  </fieldset>

                  <fieldset>
                    <legend>Kreditangaben</legend>
                    <div class="form-group row">
                        <div class="col-sm-6">
                          <label for="inputNumberOfRates">Anzahl Raten</label>
                          <select>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                          </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="inputCreditPackage">Kredit-Paket</label>
                            <select>
                            <?php
                              foreach ($task as $t ) {?>
                                  <option value="<?= $t['id'] ?>"><?= $t['name'] ?></option>
                              <?php } ?>
                              </select>

                        </div>
                    </div>

                  </fieldset>

                    <button type="submit" id="validate" class="btn btn-primary px-4 float-right">Save</button>
                    <h2 id="result"></h2>
                </form>
            </div>
        </div>
    </div>
      </footer>
      <script src="public/js/validationEnterCredit.js" charset="utf-8"></script>
    </div>
  </body>
</html>
