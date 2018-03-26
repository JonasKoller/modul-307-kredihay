<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="public/css/app.css">

    <title>Kredihay - Kredit Erfassen</title>
  </head>
    <body>
      <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
        <h5 class="my-0 mr-md-auto font-weight-normal">Kredihay</h5>
        <nav class="my-2 my-md-0 mr-md-3">
          <a class="p-2 text-dark" href="#">Übrsicht</a>
          <a class="p-2 text-dark" href="#">Erfassen</a>
        </nav>
      </div>

      <div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Kredit erfassen</h1>
      </div>
      <div class="row">
        <div class="col-md-12">
          <?php
            if (isset($errors) && count($errors) >= 1) {
              foreach ($errors as $err) {?>
                <ul>
                  <?= $err ?>
                </ul>
              <?php }} ?>
            </div>

      </div>
      <div class="container">
        <div class="container py-5">
          <div class="row">
              <div class="col-md-10 mx-auto">
                <form action="entercreditvalidate" method="post">
                  <fieldset>
                    <legend>Personalien</legend>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="inputFirstname">First name</label>
                            <input type="text" class="form-control" id="inputFirstname" placeholder="First name" name="inputFirstname">
                        </div>
                        <div class="col-sm-6">
                            <label for="inputLastname">Last name</label>
                            <input type="text" class="form-control" id="inputLastname" placeholder="Last name" name="inputLastname">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="inputEmail">E-Mail</label>
                            <input type="email" class="form-control" id="inputEmail" placeholder="E-Mail" name="inputEmail">
                        </div>
                        <div class="col-sm-6">
                            <label for="inputAddress">Address</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="Address" name="inputAddress">
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
                    <button type="submit" class="btn btn-primary px-4 float-right">Save</button>
                </form>
            </div>
        </div>
    </div>
      </footer>
    </div>
  </body>
</html>
