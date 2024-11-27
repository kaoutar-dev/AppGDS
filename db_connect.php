<?php
$host = 'localhost';
$db = 'mysql';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE DATABASE IF NOT EXISTS ista";
    $pdo->exec($sql);

    $sql = "USE ista";
    $pdo->exec($sql);

    $sql = "CREATE TABLE IF NOT EXISTS stagiaires (
    matStagiaire INT AUTO_INCREMENT PRIMARY KEY,
    nomStagiaire VARCHAR(50),
    prenomStagiaire VARCHAR(50),
    filiereStagiaire VARCHAR(50),
    anneeEtude INT,
    typeBac VARCHAR(50),
    anneeBac INT
)";
    $pdo->exec($sql);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
