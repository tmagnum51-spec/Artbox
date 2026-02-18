<?php
    require 'header.php';
    //require 'oeuvres.php';
    require 'bdd.php'
?>

   <?php
   if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('location:index.php');
    exit;

   }

    $id = $_GET['id'];
    // 1. On prépare la requête
    $sqlQuery = $mysqlClient->prepare('SELECT * FROM oeuvres where id_oeuvre = :id');
    // 2. On l'exécute avec l'ID récupéré dans l'URL
    $sqlQuery->execute(['id' =>$id]);
   // 3. ON RÉCUPÈRE LE TABLEAU
    $oeuvre = $sqlQuery->fetch();   
    if (!$oeuvre) {
    echo "L'oeuvre n'existe pas.";
    exit;
}
?>

<article id="detail-oeuvre">
    <div id="img-oeuvre">
        <img src="<?= htmlspecialchars($oeuvre['image']) ?>" alt="<?= htmlspecialchars($oeuvre['titre']) ?>">
    </div>
    <div id="contenu-oeuvre">
        <h1><?= htmlspecialchars($oeuvre['titre']) ?></h1>
        <p class="description"><?= htmlspecialchars($oeuvre['artiste']) ?></p>
        <p class="description-complete">
             <?= htmlspecialchars($oeuvre['description']) ?>
        </p>
    </div>
</article>

<?php require 'footer.php'; ?>
