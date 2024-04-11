<?php 
$config = include('./config.php');
include("./www/include/class.pdogsb.inc.php");

echo ('Êtes vous sûrs de vouloir hasher tout les mots de passes de la base de données ?') . PHP_EOL;
echo ('Si ce programme est réutilisé une deuxième fois, les hash des mots de passe seront également hasher !') . PHP_EOL;
echo ('Pour démarrer le hashage de tous les mots de passe stockés actuellement dans la BDD, écrivez : "Oui je suis sur" : ');
$mess = readline();

if ($mess != "Oui je suis sur"){
    echo ('Annulation du hachage complet des mots de passe de la BDD');
}
else{
    echo ('Êtes-vous vraiment sûr ? Écrivez "Oui" ou "Non" : ');
    $messSecu = readline();
    if ($messSecu != "Oui"){
        echo ('Annulation du hachage complet des mots de passe de la BDD');
    }
    else{
        $pdo = new PdoGsb(
            $config["host"],
            $config["database"],
            $config["user"],
            $config["password"]
          );
        
        $pdo -> hashAllPassword();
    }
}