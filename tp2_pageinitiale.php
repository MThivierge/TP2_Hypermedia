<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page principale</title>
    <link href="tp2_style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<?php
require 'tp2_db.php';
$PDO = creerPDO();
$PDO_article = $PDO->prepare('SELECT * FROM tp2db.article WHERE Id = 1');
$PDO_article->execute([]);

if ($PDO_article->rowCount() == 1) {
    $ligne = $PDO_article->fetch();
    $entete = $ligne['Entete'];
    $contenu = htmlspecialchars($ligne['Contenu']);
    $pied = $ligne['Pied'];
}

session_start();
session_regenerate_id();
$formulaire = '';

if (isset($_SESSION['username'])) {
    $_SESSION['idarticle']=1;
    $article = '<form method="post" action="tp2_modification.php"><textarea name="articlemodif" rows="15">' . $contenu . '</textarea><input type="submit" value="Soumettre les modifications"/></form>';
    $form_action = 'tp2_deconnexion.php';
    $formulaire .= '<p>Bonjour ' . $_SESSION['username'] . '</p><input type="submit" value="Déconnexion">';
} else {
    $article = '<p>' . $contenu . '</p>';

    $form_action = 'tp2_validation.php';
    if(isset($_GET['err']) && $_GET['err']==='yes') $formulaire .='<p id="erreur">Erreur!</p>';
    $formulaire .= '<p><label for="iduser">Identifiant :</label><br/><input type="text" name="user" id="iduser"></p><p><label for="iduser">Mot de passe :</label><br/><input type="password" name="pwd" id="idpwd"></p><input type="submit" value="Connexion">';
}
?>

<section>
    <article>

        <header><?php echo $entete; ?></header>

        <?php echo $article; ?>

        <footer><?php echo $pied; ?></footer>

    </article>
    <form class="connexion" method="post" action="<?php echo $form_action ?>">

        <?php echo $formulaire; ?>

    </form>
</section>
</body>
</html>
