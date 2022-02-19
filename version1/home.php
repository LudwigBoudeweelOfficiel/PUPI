<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=pupi', 'root','', array(
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
$reservations = $bdd->query('SELECT * FROM reservations WHERE Salle="'.$sallepointer.'" ORDER BY Debut ASC ');
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
			
			<?php
			while($dreservations = $reservations->fetch()){
			?>
				<section class="lignehoraire">
					<h3><b><?php echo $dreservations['type']?> par <?php echo $dreservations['prof']?></b></h3>
					<p>De <?php echo $dreservations['Debut']?> à <?php echo $dreservations['Fin']?></p>
					<p style="background-color:<?php echo $dreservations['couleur']?>;width:100px;padding:5px"><?php echo $dreservations['etatreservation']?></p>
				</section>
			<?php
			} 
			?>
		</section>
		
		<script>
		function salles(salle){
			window.location.href="home.php?numerosalle="+salle;
		}
		</script>
	</body>
</html>
