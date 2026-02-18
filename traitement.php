<?php require 'ajouter.php';?>
<?php require 'bdd.php'; ?>

<?php $postdata = $_POST;
//conditions champs non vides et sans espaces
if (
   empty($postdata['titre'])
|| trim($postdata['titre']) === ''
|| empty($postdata['description'])
|| trim($postdata['description']) === ''
|| empty($postdata['artiste'])
|| trim($postdata['artiste']) === ''
|| empty($postdata['image'])
|| trim($postdata['image']) === ''
) {
//condition tous les champs remplis    
echo ('<div style="text-align:center; color:red;">Vous devez renseigner tous les champs</div>');
return;
}
//condition https
elseif (!str_starts_with($postdata['image'], 'https://'))
 {
echo '<div style="text-align:center; color:red;">L\'URL de l\'image doit être sécurisée et commencer par https://</div>';
return;
}
//condition plus de 3 lettres
elseif (strlen(trim($postdata['description']))<=3){

    echo ('<div style="text-align:center; color:red;">Allons je suis certain que vous pouvez faire mieux que 3 lettres</div>');
return;
}
//Requête sql d'insertion dans la BDD - prepare puis execute
$sqlquery= $mysqlClient->prepare('INSERT INTO `oeuvres`(`titre`, `description`, `artiste`, `image`) VALUES (:titre,:description,:artiste,:image)');
$sqlquery->execute([

'titre'=>$postdata['titre'],
'description'=>$postdata['description'],
'artiste'=>$postdata['artiste'],
'image'=>$postdata['image'] 
]);

//recupération de l'id de la derniere oeuvre ajoutée
$nouvelleoeuvre=$mysqlClient->lastinsertID();

//Option redirection vers l'index
//header('location: index.php')


//Option redirection vers l'oeuvre ajouté'
header('location: oeuvre.php?id=' . $nouvelleoeuvre);
exit;

