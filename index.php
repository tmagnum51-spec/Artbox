<?php
    require 'header.php';
    //require 'oeuvres.php';
    require 'bdd.php';
?>
    
<?php
//on recupere la bdd dans un tableau php qui remplace oeuvres.php
$sqlQuery = 'SELECT * FROM oeuvres';
$oeuvresStatement = $mysqlClient->prepare($sqlQuery);
$oeuvresStatement->execute();
$oeuvres = $oeuvresStatement->fetchAll();
?>

<div id="liste-oeuvres">
    <?php foreach($oeuvres as $oeuvre): ?>
        <article class="oeuvre">
                <a href="oeuvre.php?id=<?= htmlspecialchars($oeuvre['id_oeuvre']) ?>">
                <img src="<?= htmlspecialchars($oeuvre['image']) ?>" alt="<?= htmlspecialchars($oeuvre['titre']) ?>">
                <h2><?= htmlspecialchars($oeuvre['titre']) ?></h2>
                <p class="description"><?= htmlspecialchars($oeuvre['artiste']) ?></p>
            </a>
        </article>
    <?php endforeach; ?>
</div>
<?php require 'footer.php'; ?>
