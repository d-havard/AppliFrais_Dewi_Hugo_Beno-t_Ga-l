# Test Cas d'utilisations v1.0

## Test #1 Se connecter
Utilisation d'un login + mot de passe de la base de données pour le test

- Si un login est manquant, le message **`'Login ou mot de passe incorrect'`**

- Si un mot de passe est manquant, le même message est affiché

## Test #2 Renseigner une fiche de frais
Enregistre les numéros que l'on rentre dans les  différentes cases

 - Saisie des frais, si ce n'est pas un nombre positif, le message suivant apparait **`'Chaque quantité doit être renseignée et numérique positive'`**

 - Si la saisie est des charatères, le même message apparait

 - Cliquer sur **`'Valider'`** rajoute bien la saisie dans **`'Mes fiches de frais'`** pour la saisie des frais

- Si dans les éléments hors forfait, le format ou les charactères ne sont pas correct, les messages suivant apparaît :
    - **`'La date d'engagement doit être renseignée'`**
    - **`'Le libellé doit être renseigné'`**
    - **`'Le montant doit être renseigné'`**

- Sinon, l'élément hors forfait s'affiche en dessous des éléments forfaitisés

- Appuyer sur **`'Effacer'`** n'efface pas ce qui a été précemment validé, mais ce qui est rajouté et/ou modifié.

## Test #3 Consulter mes fiches de frais

Selectionner le mois puis valider fait voir les éléments forfaitisés avec leurs nombres et hors forfaits, avec le montant.