<!DOCTYPE html>
<html lang="de">
<?php
    $pageTitle = 'Übersicht';
    require 'app/Views/static/head.php'
?>
<body>

<?php require 'app/Views/static/navbar.php' ?> <!-- TOP-NAV -->

<div class="container">
    <main class="mb-5 text-center">

        <?php if ($success === true) : ?>
            <div class="alert alert-success" role="alert">
                Aktion erfolgreich durgeführt.
            </div>
        <?php endif; ?>

        <div class="card" id="card" >
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Offene Kredite</h4>
            </div>
            <div class="card-body">
                <?php if (sizeof($openCredits) > 0): ?>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Vorname</th>
                            <th scope="col">Nachname</th>
                            <th scope="col">Kreditpaket</th>
                            <th scope="col">Zurückzahlen bis</th>
                            <th scope="col">Status</th>
                            <th scope="col">Bearbeiten</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($openCredits as $credit): ?>
                            <tr>
                                <td>
                                    <input type="checkbox" value="<?= $credit['id'] ?>">
                                </td>
                                <td><?= e($credit['firstname']) ?></td>
                                <td><?= e($credit['lastname']) ?></td>
                                <td><?= e($credit['creditpackage']) ?></td>
                                <td><?= e($credit['endDate']) ?></td>
                                <?php if($credit['endDate'] >= date("Y-m-d") ): ?>
                                    <td title="Geld ist noch ausgeliehen, aber noch innerhalb der Verleih-Frist.">🌞</td>
                                <?php else: ?>
                                    <td title="Geld ist noch ausgeliehen, aber nicht mehr innerhalb der Verleih-First.">⚡</td>
                                <?php endif; ?>
                                <td>
                                    <a class="linkk" href="edit?id=<?= $credit['id'] ?>">&#9998;</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p class="text-muted">Keine offenen Kredite.</p>
                <?php endif; ?>
            </div>
        </div>
        <button class="btn btn-sm btn-primary mt-2 float-left" onclick="setClosed()">Status auf 'zurückgezahlt'</button>
    </main>

    <?php require 'app/Views/static/footer.php' ?> <!-- FOOTER -->

</div>
<script src="public/js/overview.js"></script>
</body>
</html>
