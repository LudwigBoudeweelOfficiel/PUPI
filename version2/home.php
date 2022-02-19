<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=pupi2', 'root','', array(
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")); 
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
    
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$salles = $bdd->query('SELECT * FROM salles');

$sallepointer = $_GET['numerosalle'];
$sallepointer2 = $bdd->query('SELECT * FROM salles WHERE IdSalle="'.$sallepointer.'"');
$dsallepointer2 = $sallepointer2->fetch();

$date = date("y-m-d");
$reservations = $bdd->query('SELECT * FROM reservations WHERE Salle="'.$sallepointer.'" ');
?>
<html>
	<head>
		<title>Pupi</title>
		<link rel="stylesheet" href="style.css"/>
	</head>
	
	<body>
		<section class="header">
			<h3>Pupi</h3>
		</section>
		
		<section class="salles">
			<h3><b>Ressources</b></h3>
			<?php
			while($dsalles = $salles->fetch()){
			$nsalle = $dsalles['IdSalle'];
			?>
				<p onclick="salles(<?php echo $nsalle ?>)"><?php echo $dsalles['nom']?></p>
			<?php
			}
			?>
		</section>
		
		<section class="agenda">
			<h3>Réservations de la salle <?php echo $dsallepointer2['nom']?></h3>
			
			<h3>Grille des réservations aujourd'hui</h3>
			
			<table>
			<tr>
				<th class="heure"></th>
				<th class="stat_u">Etat</th>
				<th>Etat</th>
				<th>Professeur</th>
				<th>Horaires</th>
			</tr>
			<?php
			$heuredebut = "8";
			$minutedebut = "00";
			$compteur = 1;
			while($dreservations = $reservations->fetch()){
			?>
				<tr>
					<td><?php echo $heuredebut.":".$minutedebut ?></td>
					<td style="text-align:center"><span class="statut" style="color:<?php echo $dreservations['couleur'] ?>">•</span></td>
					<td><?php echo $dreservations['type'] ?></td>
					<td><?php echo $dreservations['prof'] ?></td>
					<td>De <?php echo $dreservations['Debut'] ?> à <?php echo $dreservations['Fin'] ?></td>
				</tr>
				<!--<section class="lignehoraire">
					<h3><b><?php echo $dreservations['type']?> par <?php echo $dreservations['prof']?></b></h3>
					<p>De <?php echo $dreservations['Debut']?> à <?php echo $dreservations['Fin']?></p>
					<p style="background-color:<?php echo $dreservations['couleur']?>;width:100px;padding:5px"><?php echo $dreservations['etatreservation']?></p>
				</section>-->
			
			
			<?php
			$compteur=$compteur+1;
			$minutedebut=$minutedebut+30;
			if($compteur==3){
				$compteur=1;
			} 
			if($minutedebut==60){
				$minutedebut="00";
				$heuredebut="0".$heuredebut+1;
			}
			}
			?>
			
			</table>
		</section>
		
		<script>
		function salles(salle){
			window.location.href="home.php?numerosalle="+salle;
		}
		</script>
	</body>
</html>
