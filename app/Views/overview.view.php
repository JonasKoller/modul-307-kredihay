<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="public/css/app.css">

    <title>Kredihay - Übersicht</title>
</head>
<body>

<nav class="navbar navbar-expand sticky-top navbar-lighter">
    <a class="navbar-brand" href="#">Kredihay</a>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
            <a class="nav-link" href="#">Übersicht <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="entercredit">Erfassen</a>
        </li>
    </ul>
</nav>


<div class="container">
    <main class="mb-5 text-center">

        <div class="card mb-12">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Offene Kredite</h4>
            </div>
            <div class="card-body">
                <?php if(sizeof($openCredits) > 0): ?>
                    <p class="text-muted"><strong>Tipp:</strong> Klicke auf einen Kredit, um diesen zu mutieren.</p>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Vorname</th>
                            <th scope="col">Nachname</th>
                            <th scope="col">Kreditpaket</th>
                            <th scope="col">Zurückzahlen bis</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($openCredits as $credit): ?>
                                <tr onclick="redirectOnClick(<?= $credit['id'] ?>);">
                                    <td><?= e($credit['firstname']) ?></td>
                                    <td><?= e($credit['lastname']) ?></td>
                                    <td><?= e($credit['creditpackage']) ?></td>
                                    <td><?= e($credit['endDate']) ?></td>
                                    <td><?= $credit['endDate'] >= date("Y-m-d") ? '🌞' : '⚡' ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>Keine offenen Kredite.</p>
                <?php endif; ?>
            </div>
        </div>

    </main>

    <footer class="pt-3 pb-2 border-top text-center">
        <small class="text-muted">Copyright &copy; 2017-2018 Iman Lünsmann & Jonas Koller. All rights reserved.</small>
    </footer>
</div>
<script src="public/js/overview.js"></script>
</body>
</html>
