<?php
if(isset($_POST['articlemodif'])){
    session_start();
    session_regenerate_id();

    if(isset($_SESSION['username'])) {
        require 'tp2_db.php';
        $PDO = creerPDO();
        $PDO_article = $PDO->prepare('UPDATE tp2db.article SET Contenu=:un_contenu WHERE Id=:un_id');
        $PDO_article->execute(['un_contenu' => htmlspecialchars($_POST['articlemodif']), 'un_id' => $_SESSION['idarticle']]);
    }
}
header('Location: tp2_pageinitiale.php');