<?php
if(isset($_POST['user']) && isset($_POST['pwd'])){
    if(!empty($_POST['user']) && !empty($_POST['pwd'])) {
        $unsafe_user = $_POST['user'];
        $unsafe_pwd = $_POST['pwd'];

        require 'tp2_db.php';
        $pdo = creerPDO();
        $requete = "SELECT Identifiant, MotDePasse FROM tp2db.personne WHERE Identifiant=:un_identifiant";
        $pdo_statement = $pdo->prepare($requete);
        $pdo_statement->execute(['un_identifiant' => $unsafe_user]);

        if ($pdo_statement->rowCount() == 1) {
            $ligne = $pdo_statement->fetch();
            $hash = $ligne['MotDePasse'];

            if (password_verify($unsafe_pwd, $hash)) {
                session_start();
                session_regenerate_id();
                $_SESSION['username'] = $ligne['Identifiant'];
                header('Location: tp2_pageinitiale.php');
            }
        }
    }
}

header('Location: tp2_pageinitiale.php?err=yes');