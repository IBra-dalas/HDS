<?php
$page_no_redirection = '1';

include ('includes/header.php');

$connect = 0 ;
//----------authentification--------------
if(!empty($_POST['login'])){

    $url = "http://localhost/HelpdeskSolution/front/connect/'".$_POST['login']."'/'".$_POST['mdp']."'";
    $raw = file_get_contents($url);
    $json = json_decode($raw);
    if(isset($json[0] -> IDUSERS)){
        $connect = 1;
        $sess = session_id();
        $_SESSION['login'] = TRUE;
        $_SESSION['error'] = FALSE;
        $_SESSION['nom'] = $_POST['login'];
        $_SESSION['id'] = $json[0] -> IDUSERS;
        $_SESSION['role'] = $json[0] -> IDROLE;
        $_SESSION['societe'] = $json[0] -> IDSOCIETE;
    }
}
if(empty($_POST['login']) || $connect == 0 ){
    echo "
            <div class='bloc_central'>
                <form action='#' method='post' id='loginForm'>
                <br/><div class='bienvenue'>Welcome</div>
                <div class='bienvenue_desc'>Please connect, to continue</div>
                <br/><input type='text' name='login' placeholder='Login' class='input_login_page'/><br/>
                <br/><input type='password' placeholder='Password' name='mdp' class='input_login_page'/>";

                if($connect == 0 && !empty($_POST['login'])){echo "<br/><br/><div class='error'>Your login or password is incorrect</div>";}
    echo "
                <br/><br/><input type='submit' value='Connect' class='link_white'/><br/>
                </form>
				<div>
					<div class='ligne_gauche'></div>
					<text class='ou'>OR</text>
					<div class='ligne_droite'></div>
				</div>
				<a href='creation_compte.php' class='link_white' style='margin-top: 20px!important;display: block;width: fit-content;margin: auto;'>
					SIGN UP
				</a>
			</div>

	";
}
//quand tout est bon, affichage de la page normale
if(isset($_POST['login']) && $connect != 0){
	echo"<script language='javascript'>document.location='index.php?id=".$sess."'</script>";
}
include ('includes/footer.php');
?>