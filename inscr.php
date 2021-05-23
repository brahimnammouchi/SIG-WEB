<?php 
	include("commun/entete.php");
	if(isset($_POST['nom']))
{
$la_civilite = $_POST['civilite']==1?'Madame':'Monsieur';
$le_nom = utf8_decode(addslashes($_POST['nom']));
$le_prenom = utf8_decode(addslashes($_POST['prenom']));
$la_naissance = $_POST['date_n'];
$le_mail = $_POST['mail_inscr'];
$le_mp = utf8_decode(addslashes($_POST['mp_inscr']));
$requete = 'INSERT INTO inscr("inscr_civilite", "inscr_nom", "inscr_prenom", "inscr_date", "inscr_mail", "inscr_mp") VALUES
('.$la_civilite.', '.$le_nom.', '.$le_prenom.', '.$la_naissance.', '.$le_mail.', '.$le_mp.')';
$retours = mysqli_query($liaison, $requete) or die ('problème avc la requète '.$requete);
}
?>

</div>

<script language="javascript" type="text/javascript">

	var b_civilite=false; var b_nom=false; var b_prenom=false;
	var b_date=false; var b_mail=false; var b_mp=false;
	
	function envoyer()
	{
		if(b_civilite==true && b_nom==true && b_prenom ==true && b_date ==true && b_mail ==true && b_mp)
		{
			document.getElementById("message").innerText = "Envoi serveur";
			document.getElementById("inscription").submit();
		}
		else
		{
			document.getElementById("message").innerText = "Le formulaire n'est pas complet";
		}
		document.getElementById("message").innerText += "-" + b_civilite + "-" + b_nom + "-" + b_prenom + "-" + b_date + "-" + b_mail + "-" + b_mp;		
	}

</script>
<script language="javascript" src="js/v_inscr.js"></script>			
			
			<div class="div_saut_ligne">
			</div>						
			
			<div style="float:left;width:10%;height:40px;"></div>
			<div style="float:left;width:80%;height:40px;text-align:center;">
			<div id="GTitre">
			<h1>Formulaire d'inscription contrôlé côté responsable</h1>
			</div>
			</div>
			<div style="float:left;width:10%;height:40px;"></div>
			
			<div class="div_saut_ligne" style="height:60px">
			</div>
			
			<div style="width:100%;height:auto;text-align:center;">
			
			<div style="width:800px;display:inline-block;" id="conteneur">
				<div id="centre">
				<div id="message">
				<?php
if(isset($_POST['nom']))
{
if($retours==1)
echo 'Vous êtes désormais inscrit(e) sur le site';
else
echo $la_civilite.' - '.$le_nom.' - '.$le_prenom.' - '.$la_naissance.' - '.$le_mail.' - '.$le_mp;
}
else
echo 'Tous les champs sont obligatoires';
?>				</div>
					<form id="inscription" name="inscription" method="post" action="inscr.php">
						<div class="div_input_form">
							<select id="civilite" name="civilite" onChange="Javascript:if(this.value>0){ b_civilite=true; } else{ b_civilite=false; }">
								<option value="0">Civilité</option>
								<option value="1">Madame</option>
								<option value="2">Monsieur</option>
							</select>
						</div>					
						<div class="div_input_form">
							<input type="text" name="nom" id="nom" maxlength="50" class="input_form" value='Votre nom' onClick="saisie('Votre nom',this.id)" onMouseOut="retablir('Votre nom',this.id)" onblur="mev('Votre nom',this.id)" />
						</div>
						<div class="div_input_form">
							<input type="text" name="prenom" id="prenom" maxlength="50" class="input_form" value='Votre prénom' onClick="saisie('Votre prénom',this.id)" onMouseOut="retablir('Votre prénom',this.id)" onblur="mev('Votre prénom',this.id)" />
						</div>
						<div class="div_input_form">
							<input type="text" name="date_n" id="date_n" maxlength="50" class="input_form" value='Naissance, ex : 19/04/1996' onClick="saisie('Naissance, ex : 19/04/1996',this.id)" onMouseOut="retablir('Naissance, ex : 19/04/1996',this.id)" onblur="mev('Naissance, ex : 19/04/1996',this.id)" />
						</div>
						<div class="div_input_form">
							<input type="text" name="mail_inscr" id="mail_inscr" maxlength="150" class="input_form" value='Votre mail' onClick="saisie('Votre mail',this.id)" onMouseOut="retablir('Votre mail',this.id)" onblur="mev('Votre mail',this.id)" />
						</div>
						<div class="div_input_form">
							<input type="text" name="cmail_inscr" id="cmail_inscr" maxlength="150" class="input_form" value='Confirmer le mail' onClick="saisie('Confirmer le mail',this.id)" onMouseOut="retablir('Confirmer le mail',this.id)" onblur="mev('Confirmer le mail',this.id)" />
						</div>
						<div class="div_input_form">
							Votre mot de passe : entre 5 et 10 caractères<br />
							<input type="password" name="mp_inscr" id="mp_inscr" maxlength="10" class="input_form" value="Mot de passe" onClick="saisie('Mot de passe',this.id)" onMouseOut="retablir('Mot de passe',this.id)" onblur="mev('Mot de passe',this.id)" />
						</div>
						<div class="div_input_form">
							Confirmer le mot de passe :<br />
							<input type="password" name="mp_conf" id="mp_conf" maxlength="10" class="input_form" value="Confirmer MP" onClick="saisie('Confirmer MP',this.id)" onMouseOut="retablir('Confirmer MP',this.id)" onblur="mev('Confirmer MP',this.id)" />
						</div>							
						<div class="div_input_form">
							<input type="button" name="valid_inscr" id="valid_inscr" class="input_form" value="Valider" onclick="envoyer()" />
						</div>	
					</form>	
				</div>
			</div>
			
			</div>

			<div class="div_saut_ligne" style="height:150px;">
			</div>
<?php 
	include("commun/pied.php");
?>