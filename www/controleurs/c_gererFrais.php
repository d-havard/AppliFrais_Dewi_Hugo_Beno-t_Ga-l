<?php
  include("vues/v_sommaire.php");
  include("vues/v_debutContenu.php");

// vérification du droit d'accès au cas d'utilisation
if ( ! estConnecte() ) {
    ajouterErreur("L'accès à cette page requiert une authentification !", $tabErreurs);
}
else  { // accès autorisé
  $idVisiteur = $_SESSION['idVisiteur'];
  $mois = getMois(date("d/m/Y"));
  $numAnnee =substr( $mois,0,4);
  $numMois =substr( $mois,4,2);
  $action = lireDonneeUrl('action');
  switch($action){
  	default :   // vaut pour action à saisirEtatFrais
  		if($pdo->estPremierFraisMois($idVisiteur,$mois)){
                    $pdo->creeNouvellesLignesFrais($idVisiteur,$mois);
  		}
  		break;
  	
  	case 'validerMajFraisForfait':
  		$lesFrais = lireDonneePost('lesFrais');
  		if(lesQteFraisValides($lesFrais)){
                    $pdo->majFraisForfait($idVisiteur,$mois,$lesFrais);
  		}
  		else{
                    ajouterErreur("Chaque quantité doit être renseignée et numérique positive", $tabErreurs);
  		}
  	  break;
  	
  	case 'validerCreationFrais':
  		$dateFrais = lireDonneePost('dateFrais');
  		$libelle = lireDonneePost('libelle');
  		$montant = lireDonneePost('montant');
  		valideInfosFrais($dateFrais,$libelle,$montant,$tabErreurs);
  		if (nbErreurs($tabErreurs) == 0 ){
                    $pdo->creeNouveauFraisHorsForfait($idVisiteur,$mois,$libelle,$dateFrais,$montant);
  		}
  		break;
  	
  	case 'supprimerFrais':
  		$idFrais = lireDonneeUrl('idFrais');
                $pdo->supprimerFraisHorsForfait($idFrais);
  		break;
  }
  $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur,$mois);
  $lesFraisForfait= $pdo->getLesFraisForfait($idVisiteur,$mois);
  $targetfolder = "testupload/";

  $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;

  $ok=1;

  $file_type=$_FILES['file']['type'];

  if ($file_type=="application/pdf") {

	  if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))

	  {

		  echo "The file ". basename( $_FILES['file']['name']). " is uploaded";

	  }

	  else {

		  ajouterErreur("Problème durant l'envoie du fichier", $tabErreurs);

	  }

	  }

  else {

	  ajouterErreur("Tu peux seulement envoyer des fichiers .pdf", $tabErreurs);

  }                        

  include("vues/v_erreurs.php");
  include("vues/v_listeFraisForfait.php");
  include("vues/v_listeFraisHorsForfait.php");
}  
?>