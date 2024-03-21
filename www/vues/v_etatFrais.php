
<h3>Fiche de frais du mois <?php echo $numMois."-".$numAnnee?> : 
    </h3>
    <div class="encadre">
    <p>
        Etat : <?php echo $libEtat?> depuis le <?php echo $dateModif?> <br> Montant validé : <?php echo $montantValide?>             
                     
    </p>
  	<table class="listeLegere">
  	   <caption>Eléments forfaitisés </caption>
        <tr>
          <th></th>
         <?php
         foreach ( $lesFraisForfait as $unFraisForfait ) {
			       $libelle = $unFraisForfait['libelle'];
		?>	
			       <th> <?php echo $libelle?></th>
		 <?php
         }
		?>
		    </tr>
        <tr>
          <th>Numéro</th>
        <?php
          foreach (  $lesFraisForfait as $unFraisForfait  ) {
				      $quantite = $unFraisForfait['quantite'];
		?>

              <td class="qteForfait"><?php echo $quantite?> </td>
		 <?php
          }
		 ?>
        </tr>
        <tr>
        <?php
          foreach ( $lesIdFrais as $unIdFrais ){
           $montant = $unIdFrais['montant'];
           ?>
              
          <?php
          }
		    ?>
        </tr>
    </table>
  	<table class="listeLegere">
  	   <caption>Descriptif des éléments hors forfait -<?php echo $nbJustificatifs ?> justificatifs reçus -
       </caption>
             <tr>
                <th class="date">Date</th>
                <th class="libelle">Libellé</th>
                <th class='montant'>Montant</th>                
             </tr>
        <?php
          $montantTotal = 0;     
          foreach ( $lesFraisHorsForfait as $unFraisHorsForfait ) {
      			 $date = $unFraisHorsForfait['date'];
			       $libelle = $unFraisHorsForfait['libelle'];
			       $montant = $unFraisHorsForfait['montant'];
             $montantTotal += $unFraisHorsForfait['montant'];
		?>
             <tr>
                <td><?php echo $date ?></td>
                <td><?php echo $libelle ?></td>
                <td><?php echo $montant ?></td>
             </tr>
        <?php 
          }?>
        <p>Montant total hors forfait : <?php echo $montantTotal ?></p>
		
    </table>
  </div>
  </div>