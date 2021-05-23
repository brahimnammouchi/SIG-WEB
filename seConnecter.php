<?php
	require_once('connexion.php');
	session_start();
	
	$LOGIN=$_POST['LOGIN'];
	$PWD=$_POST['PWD'];
	
	$requete="SELECT * FROM UTILISATEUR where LOGIN= ? and PWD=MD5(?)";
//$requete="SELECT * FROM UTILISATEUR ";
	$param=array($LOGIN,$PWD);	
	$resultat = $con->prepare($requete);	
	$resultat->execute($param);	


	if($user=$resultat->fetch()){

			if($user['ETAT']==1){
				$_SESSION['utilisateur']=$user;
				header("Location:../index.php");
			}
    }else{
		 $_SESSION['erreurLogin']='<strong>Erreur!</strong> Login ou mot de passe incorrect!!!';
         header("Location:login.php");
    } 
	
?>