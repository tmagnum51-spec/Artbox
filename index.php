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
                <a href="oeuvre.php?id=<?= $oeuvre['id_oeuvre'] ?>">
                <img src="<?= $oeuvre['image'] ?>" alt="<?= $oeuvre['titre'] ?>">
                <h2><?= $oeuvre['titre'] ?></h2>
                <p class="description"><?= $oeuvre['artiste'] ?></p>
            </a>
        </article>
    <?php endforeach; ?>
</div>
<?php require 'footer.php'; ?>
