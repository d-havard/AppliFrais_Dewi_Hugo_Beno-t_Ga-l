# ApplisFRais

Application web de gestion des frais du laboratoire GSB.

## Déploiement local
Executer les scripts `sql` puis servir le dossier `www` par un serveur web (apache).

## Mise en production
On veillera à changer le mot de passe de l'utilisateur `sql` dans `ScriptsSQL/gsbfrais_bduser.sql` et dans le fichier `config.php`.

Seul le dossier `www` doit être servi par le serveur web.