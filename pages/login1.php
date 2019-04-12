<?


include("db.php");

if($_GET['oubli'] == 1)
{
?>


<span class="titre">>>> JOUER : J'ai oublié mon mot de passe</span><br />
<center>
<form id="form2" name="form2" method="post" action="index.php?page=login1&oubli=2">
  <label>
  Veuillez entrer votre adresse email :<br />
  <input name="email" type="text" size="50" />
  </label>
  <br />
  <label>
  <input type="submit" name="Submit2" value="Envoyer" />
  </label>
</form>
<p>&nbsp; </p>
<p>
</center>
  <?

}
elseif($_GET['oubli'] == 2)
{
$email = htmlentities($_POST['email']);

		$reponse1 = mysql_query("SELECT * FROM table_user WHERE email='".$email."'"); 
				while ($donnees1 = mysql_fetch_array($reponse1) )
		{
		$joueurs = $donnees1['login'];
		$mdp = $donnees1['mdp'];
		}
		
		$joueur1 = md5($joueurs);
		
if($joueurs == NULL)
{
?>

<span class="titre">>>> JOUER : J'ai oublié mon mot de passe</span>
<center>
<?
echo $joueurs;
echo "Aucun joueur ne correspond a cette adresse email.";
?>
</center>
<br>
<a href="index.php?page=login1&oubli=1">Retour</a>
<?
}
else
{
?>
<span class="titre">>>> JOUER : J'ai oublié mon mot de passe</span>
<?
echo $joueurs.", vous allez recevoir un email pour changer de mot de passe.";

$joueur2 = base64_encode($joueur1);
$mdp2 = base64_encode($mdp);

$from = 'no-reply@breakingout.fr';
	$to = $email;
	$subject = 'Changement de mot de passe';
	$Message = "Pour recevoir un novueau mot de passe veuillez cliquer sur le lien suivant et suivre les instructions :
	
	http://www.breakingout.fr/index.php?page=login1&oubli=404&l=".$joueur2."&p=".$mdp2."
	
	A bientôt
	http://www.breakingout.fr/";
	$headers = $from;

	mail($to, $subject, $Message);

}


}
elseif($_GET['oubli'] == 404)
{

$mdp_hash = base64_decode($_GET['p']);
$login_hash = base64_decode($_GET['l']);

		$reponse1 = mysql_query("SELECT * FROM table_user WHERE mdp='".$mdp_hash."'"); 
				while ($donnees1 = mysql_fetch_array($reponse1) )		
			{
		$login_no_hash = $donnees1['login'];
		$email = $donnees1['email'];
			}
		$login_hash_real = md5($login_no_hash);
		
if($login_no_hash != NULL)
{

if($login_hash_real == $login_hash)
{

echo "Vous allez recevoir un nouveau mot de pass par email.";

$code = dechex(rand(100000000000000, 999999999999999));
$new_mdp = $code;
$hash = md5($new_mdp);

$reponseg = mysql_query("UPDATE table_user SET mdp='".$hash."' WHERE mdp='".$mdp_hash."'");

$from = 'no-reply@breakingout.fr';
	$to = $email;
	$subject = 'Changement de mot de passe';
	$Message = "Votre mot de passe a été changé :
	
	Identifiant : $login_no_hash
	Mot de passe : $new_mdp
	
	Nous vous conseillons vivement de changer de mot de passe.
	
	A bientôt
	http://www.breakingout.fr/";
	$headers = $from;

	mail($to, $subject, $Message);

}
else
{
echo "Lien erroné.";
}

}
else
{
echo "Lien erroné.";
}
		
		


}
else
{
?>

<!---
<div style="position:absolute; left:200px; top:500px; width:480px; background-color:white;
border:1px solid #804000; padding:10px"><center>
<?
?>
<?php

echo "
<SCRIPT language='javascript' SRC='http://ads.allotraffic.com/clicstandart?id=7953'></SCRIPT>
<br />
<script language='JavaScript' src='http://www.clicjeux.fr/banniere.php?id=753'></script>";

?>
</center></div>
--->

<span class="titre">>>> JOUER</span>
<form id="form1" name="form1" method="post" action="?page=login">
              <label>
  <div align="center">
    <p>Identifiant :<br />
                <input name="login" type="text" id="login" size="20" />
                
                <br />
                Mot de passe 
                :<br />
                <input name="mdp" type="password" id="mdp" size="20" />
                <br />
                <input type="submit" name="Submit" value="Connecter" />
    </p>
    <p><a href="?page=login1&amp;oubli=1">J'ai oubli&eacute; mon mot de passe ! </a><br />
      <br>
    </p>
  </div>
              </label>
              
              <label>              </label>
</form>
<?

}

mysql_close();
?>
<br /><br /><br /><br />
<? //<center><SCRIPT language="javascript" SRC="http://ads.allotraffic.com/bandeau?id=12935"></SCRIPT></center> ?>