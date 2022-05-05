<?php
$page_no_redirection = '1';

include ('includes/header.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$login = 1;

if(isset($_POST['login'])){
	
	$url = "http://localhost/HelpdeskSolution/front/get_compte/'".$_POST['login']."'";
    $raw = file_get_contents($url);
    $json = json_decode($raw);
    if(!isset($json[0] -> IDUSERS)){
		$login = 0;
	}
	if(empty($_POST['nom'])){
		$login = 13;
	}
	if(empty($_POST['prenom'])){
		$login = 14;
	}
	if(empty($_POST['mail'])){
		$login = 3;
	}
	if(!empty($_POST['entreprise'])){
		if(!empty($_POST['code'])){
			$url = "http://localhost/HelpdeskSolution/front/verif_entreprise/'".$_POST['entreprise']."'/'".$_POST['code']."'";
    		$raw = file_get_contents($url);
    		$json = json_decode($raw);
    		if(isset($json[0] -> IDSOCIETE)){
				$IDSOCIETE = $json[0] -> IDSOCIETE;
			}else{
				$login = 12;
			}
		}else{
			$login = 11;
		}
	}else{
		$login = 10;
	}
	if(empty($_POST['mdp']) ){
		$login = 4;
	}
	if(strlen($_POST['mdp']) > 30){
		$login = 6;
	}
	if(strlen($_POST['mdp']) < 7){
		$login = 7;
	}
	if(!isset($_POST['conditions'])){
		$login = 9;
	}
	if($_POST['mdp'] != $_POST['mdp2'] ){
		$login = 2;
	}
}
// req nouveau pré-compte
if(isset($_POST['login']) && $login == 0 ){
	
	//echo"<script>window.alert('$IDSOCIETE');</script>";
	
	$url = "http://localhost/HelpdeskSolution/front/create_compte/'".addslashes($_POST['nom'])."'/'".addslashes($_POST['prenom'])."'/'".addslashes($_POST['login'])."'/'".addslashes($_POST['mdp'])."'/'".addslashes($_POST['telephone'])."'/'".addslashes($_POST['mail'])."'/'$IDSOCIETE'/'1'";
    $raw = file_get_contents($url);

	//$email = $_POST['mail'];
    //$headers = "From: Helpdesk <web@hds.com>\r\n".
	//	   "MIME-Version: 1.0" . "\r\n" .
    //       "Content-type: text/html; charset=UTF-8" . "\r\n";
	//$message = "Cliquer sur le bouton <a href='http://localhost/HDS/validation_compte.php/login=".$_POST['login']."> valider</a> pour confirmer votre adresse mail sur le site Helpdeskqs.
	//
	//\n\n";
	//mail($email, '[Helpdesk] - Confirmation Mail', $message, $headers);


	echo "
		<div class='bloc_central'>
			<h3>En attente de comfirmation</h3>
			Veuillez confirmer l'e-mail de vérification que nous vous avons envoyé, vous pourrez vous connecter dès que l'adresse e-mail sera valide<br/><br/>
			<a href='connexion.php' class='connexion'>Connection</a>
		</div>
";
}

if(!isset($_POST['login']) || $login != 0 || !isset($_POST['conditions'])){

//---pass the data from a textarea input into an input type = text---
echo "<script>
function Pass_candidature(){
	document.getElementById('form_candidature').submit();
}
</script>";
echo "	<div class='bloc_central_inscription'>
			<form method='post' charset='UTF-8' enctype='multipart/form-data' id='form_candidature' name='form_candidature' action='#'>

				<br/><div class='bienvenue' style='font-size:40px'>Account creation</div><br/>
				<br/><input type='text' name='nom' placeholder='Nom' class='input_login_page crea_nom'/><br/>
				<br/><input type='text' name='prenom' placeholder='Prenom' class='input_login_page crea_prenom'/><br/>
				<br/><input type='text' name='login' placeholder='login' class='input_login_page crea_login'/><br/>
				<br/><input type='text' name='mail' placeholder='Mail' class='input_login_page crea_login'/><br/>
				<br/><input type='password' name='mdp' placeholder='Mot de passe' class='input_login_page crea_mdp1'/><br/>
				<br/><input type='password' name='mdp2' placeholder='Confirmation mot de passe' class='input_login_page crea_mdp2'/><br/>
            	<br/><input type='text' name='telephone' placeholder='Telephone' class='input_login_page crea_mail'/><br/>
            	<br/><input type='text' name='entreprise' placeholder='Entreprise' class='input_login_page crea_entreprise'/><br/>
				<br/><input type='text' name='code' placeholder='Code de l&apos;entreprise' class='input_login_page crea_entreprise'/><br/>
				<br/><input type='text' name='fonction' placeholder='Fonction dans l&apos;entreprise' class='input_login_page crea_entreprise'/>
";

				//----simple passage de login à autre chose que 0 selon le pb-----
				if($login == 1 && isset($_POST['login'])){echo "<br/><div class='error'>Ce login est deja utilisé pour un autre compte</div>";}
				if($login == 2 && isset($_POST['login'])){echo "<br/><div class='error'>Les deux mots de passe ne sont pas identiques</div>";}
				if($login == 3 && isset($_POST['login'])){echo "<br/><div class='error'>Veuiller rentrer votre mail</div>";}
				if($login == 4 && isset($_POST['login'])){echo "<br/><div class='error'>Veuiller rentrer un mot de passe</div>";}
				if($login == 5 && isset($_POST['login'])){echo "<br/><div class='error'></div>";}
				if($login == 6 && isset($_POST['login'])){echo "<br/><div class='error'>La longueur maximale du mot de passe est de 20 caractères</div>";}
				if($login == 7 && isset($_POST['login'])){echo "<br/><div class='error'>Votre mot de passe doit comporter au moins 7 caractères</div>";}
				if($login == 8 && isset($_POST['login'])){echo "<br/><div class='error'></div>";}
				if($login == 9 && isset($_POST['login'])){echo "<br/><div class='error'>Please accept the general conditions of use</div>";}
            	if($login == 10 && isset($_POST['login'])){echo "<br/><div class='error'>please enter the company</div>";}
				if($login == 11 && isset($_POST['login'])){echo "<br/><div class='error'>please enter the code related to the company</div>";}
				if($login == 12 && isset($_POST['login'])){echo "<br/><div class='error'>the code does not correspond to the company</div>";}
				if($login == 13 && isset($_POST['login'])){echo "<br/><div class='error'>You must fill in your Lastname</div>";}
				if($login == 14 && isset($_POST['login'])){echo "<br/><div class='error'>You must fill in your Firstname</div>";}

echo "
				<br/>
				<label>
					<input type='checkbox' name='conditions'>
					<span></span>
				</label> J'accepte les 
				<a href='' target='_BLANK' class = 'link_green'> conditions générales d'utilisation</a>
				<br/>
				<br/><input type='button' value='Création de compte' name='creation_compte' class='link_white' onclick='Pass_candidature()'/><br/><br/>
			</form>
			<a href='index.php' class = 'link_green'>Return</a>
		</div>
";}



include ('includes/footer.php');

?>
