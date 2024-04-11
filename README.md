# ApplisFrais

Application web de gestion des frais du laboratoire GSB.

## Accès aux fichiers Git

-    Installer [Git](https://git-scm.com/download/linux) sur linux
-    Lancer git-bash
-    Créer une clé ssh: **`ssh-keygen -o`**.
-    Afficher votre clé publique: **`cat ~/.ssh/id_ed25519.pub`**
-    Ajouter cette clé dans github:
    -    Dans le coin supérieur droit d’une page, cliquez sur votre photo de profil, puis sur Paramètres.
    -    Dans la section « Accès » de la barre latérale, cliquez sur Clés SSH et GPG.
    -    Cliquez sur Nouvelle clé SSH ou Ajouter une clé SSH.
    -    Dans le champ « Clé », collez votre clé publique.

-    Aller à l'emplacement voulu pour cloner le dépôt
-    Clonez le dépôt avec la commande **`git clone git@github.com:d-havard/AppliFrais_Dewi_Hugo_Beno-t_Ga-l.git`**
-    Placez-vous dans le dossier où se situe le dossier avec la commande **`cd suivis du chemin vers le dossier`**
-    Pour accéder a la version 1.0, faites la commande **`git checkout 1.0`**
-    Et enfin, effectuez la commande **`git pull`** pour actualiser le dossier du site quand il y a modification.

## Déploiement local

Si c'est pas déjà fait, installer mysql sur votre machine
Executer les scripts **`sql`** dans l'ordre suivant:
- `source gsbfrais_bduser.sql`
- `source gsbfrais_structure.sql`
- `source gsbfrais_data.sql`
puis servir le dossier **`www`** par un serveur web (apache).

## Mise en production

On veillera à changer le mot de passe de l'utilisateur **`sql`** dans **`ScriptsSQL/gsbfrais_bduser.sql`** et dans le fichier **`config.php`**.

Seul le dossier **`www`** doit être servi par le serveur web.
