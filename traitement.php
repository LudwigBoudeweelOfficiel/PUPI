<?php
session_start();
$name = $_POST['user'];
$pass = $_POST['pass'];
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=pupiv', 'root','', array(
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")); 
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
    
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


// Heures
$connect = $bdd->query('SELECT * FROM users WHERE Identifiant="'.$name.'"');
$dconnect = $connect->fetch();

if($pass == $dconnect['Mdp']){
	echo "Mot de passe correct";
	?>
		<script>window.location.href="index.php";</script>
	<?php
	$_SESSION['user']=$name;
}else{
	echo "Mot de passe incorrect";
}
?>