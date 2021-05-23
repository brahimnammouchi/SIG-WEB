<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
    // connexion à la base de données
    $db_username = 'root';
    $db_password = 'root';
    $db_name     = 'bd_gestion';
    $db_host     = '127.0.0.1:3307';
    $db = mysqli_connect("127.0.0.1:3307","root","root") or die ("Accès à la base de donnée impossible !!!");
	mysqli_select_db($db, "bd_gestion") or die ("Accès à la base de donnée impossible1 !!!"); 
	
	$LOGIN=$_POST['username'];
	$PWD=$_POST['password'];
	
	$requete="SELECT * FROM inscr where inscr_mail= ? and inscr_mp=MD5(?)";
//$requete="SELECT * FROM UTILISATEUR ";
	$param=array($LOGIN,$PWD);	
	$resultat = $db->prepare($requete);	
	$resultat->execute($param);	


	if($inscr_mail=$resultat->fetch()){
				$_SESSION['username']=$inscr_mail;
				echo "connection avec succéé";
				header("Location:../responsable.html");
			}
			else{
		 $_SESSION['erreurLogin']='<strong>Erreur!</strong> Login ou mot de passe incorrect!!!';
		 echo "erreur";
         header("Location:responsable.html");
    } 
}
?>