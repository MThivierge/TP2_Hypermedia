<?php
function creerPDO(): PDO
{
    try {
        $host = 'localhost';
        $database = 'tp2db';
        $username = 'root';
        $password = '';

        $mon_pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        $mon_pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $mon_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $mon_pdo;

    } catch (PDOException $une_exception) {
        echo "Erreur de connexion avec la base de données : " . $une_exception->getMessage();
        die();
    }
}