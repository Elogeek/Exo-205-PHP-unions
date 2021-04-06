<?php

/**
 * Reproduisez les tables présentes dans le fichier image ( via workbench ou phpmyadmin )
 * Ajoutez des donées dans chaque table en vous assurant d'ajouter au moins 1 fois un utilisateur identique dans deux tables.
 * Utilisez UNION pour récupérer les usernames de chaque table, affichez le résultat à l'aide d'un print_r ou d'une boucle.
 * Utilisez UNION ALL pour afficher toutes les données y compris les doublons, affichez le résultat  à l'aide d'une boucle ou d'un print_r.
 * PS: Si vous utilisez un print_r, alors utilisez la balise <pre> pour un résultat plus propre.
 */

require_once 'DB/DB.php';

$result = DB::getInstance()->prepare("
                                            SELECT username, password, email FROM admin
                                            UNION ALL
                                            SELECT username, password, email FROM client
                                            UNION ALL
                                            SELECT username, password, email FROM user
                                            ");

if($result->execute()) {
    echo "<pre>";
    print_r($result->fetchAll());
    echo "</pre>";
};