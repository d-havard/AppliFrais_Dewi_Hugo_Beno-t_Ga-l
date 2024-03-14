# ApplisFRais

Application web de gestion des frais du laboratoire GSB.

## Déploiement local
Si pas deja fait, installer mysql sur votre machine
Executer les scripts **`sql`**dans l'ordre suivant:
- source gsbfrais_bduser.sql
- source gsbfrais_structure.sql
- source gsbfrais_data.sql
puis servir le dossier **`www`** par un serveur web (apache).

## Mise en production
On veillera à changer le mot de passe de l'utilisateur **`sql`** dans **`ScriptsSQL/gsbfrais_bduser.sql`** et dans le fichier **`config.php`**.

Seul le dossier **`www`** doit être servi par le serveur web.