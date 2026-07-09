<?php

/**
 * Connexion PDO — une seule fonction, pas de classe.
 * Chaque page appelle getConnection() directement.
 */
function getConnection(): PDO
{
    static $pdo = null;

    if ($pdo === null) {
        $pdo = new PDO(
            'mysql:host=localhost;dbname=mglsi_news;charset=utf8mb4',
            'mglsi_user',
            'passer',
            [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ]
        );
    }

    return $pdo;
}
