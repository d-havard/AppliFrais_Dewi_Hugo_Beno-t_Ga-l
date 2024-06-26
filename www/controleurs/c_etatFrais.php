<?php
  include("vues/v_sommaire.php");
  include("vues/v_debutContenu.php");

// vérification du droit d'accès au cas d'utilisation
if ( ! estConnecte() ) {
    ajouterErreur("L'accès à cette page requiert une authentification !", $tabErreurs);
    include("vues/v_erreurs.php");
}
else  { // accès autorisé
    $action = lireDonneeUrl('action', 'selectionnerMois');
    $idVisiteur = $_SESSION['idVisiteur'];
    switch($action){
    	default :
    		$lesMois=$pdo->getLesMoisDisponibles($idVisiteur);
    		// Afin de sélectionner par défaut le dernier mois dans la zone de liste
    		// on demande toutes les clés, et on prend la première,
    		// les mois étant triés décroissants
    		$lesCles = array_keys( $lesMois );
    		$moisASelectionner = $lesCles[0];
    		include("vues/v_listeMois.php");
    		break;
    	
    	case 'voirEtatFrais':
    		$leMois = lireDonneePost('lstMois'); 
    		$lesMois=$pdo->getLesMoisDisponibles($idVisiteur);
    		$moisASelectionner = $leMois;
    		include("vues/v_listeMois.php");
    		$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur,$leMois);
    		$lesFraisForfait= $pdo->getLesFraisForfait($idVisiteur,$leMois);
    		$lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur,$leMois);
    		$LesIdFrais = $pdo->getLesIdFrais();
			$numAnnee =substr( $leMois,0,4);
    		$numMois =substr( $leMois,4,2);
    		$libEtat = $lesInfosFicheFrais['libEtat'];
			if ($lesInfosFicheFrais['montantValide'] == 0){ //verification si le montant validé est nul
				$montantValide = "Non renseigné";
			}
			else{
				$montantValide = $lesInfosFicheFrais['montantValide'];
			}
    		$nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
    		$dateModif =  $lesInfosFicheFrais['dateModif'];
    		$dateModif =  dateAnglaisVersFrancais($dateModif);
			$forfaitTotal = [];
			$totalfrais = 0;
			for ($i=0; $i< 4; $i++){
				$total = $lesFraisForfait[$i]['quantite'] * $LesIdFrais[$i]['montant'];
				$forfaitTotal[$i] += $total;
				$totalfrais += $total;
			}
    		include("vues/v_etatFrais.php");    	
    }
}
?>