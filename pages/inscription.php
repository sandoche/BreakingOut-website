<?

include("db.php");


if($_GET['p'] != NULL){
$_SESSION['parrain'] = htmlentities($_GET['p'] );
}

$can3 = 0;

$reponsea = mysql_query("SELECT ip FROM ip_secu WHERE ip='".$_SERVER["REMOTE_ADDR"]."'");
		
		while ($donneesa = mysql_fetch_array($reponsea) )
		{
		$donnemin = $donneesa['ip'];
		
		if($donnemin == $_SERVER["REMOTE_ADDR"])
		{
		$can3++;
		}
		
		}

if($_SESSION['login'] != NULL || $can3 >= 1 || $_COOKIE['login_breakingout'] != NULL)
{

echo 'Vous avez déjà un compte.<br />'; 
?>

<?
}
else
{
if($_GET['step'] == 2)
{

include("db.php");


if($_POST['nom_rpg'] != NULL && $_POST['prenom_rpg'] != NULL && $_POST['pseudo'] != NULL && $_POST['email'] != NULL && $_POST['mdp'] != NULL && $_POST['remdp'] != NULL && $_POST['radiobutton'] != NULL)
{
if($_POST['mdp'] == $_POST['remdp'])
{
if($_POST['age'] >= 12 && $_POST['age'] <= 80)
{

											$pseudo = $_POST['pseudo'];
											$pseudo = preg_replace('![^a-zA-Z]!isU','',$pseudo);
											
											if($pseudo != NULL && $pseudo != 'marche_noir' && $pseudo != 'police')
											{
					
		
		$caract_variable = strlen($pseudo);
		
		if($caract_variable >= 4)
		{
		
		$loginmin = strtolower($pseudo);
		
		$reponse1 = mysql_query("SELECT login FROM table_user");
		
		while ($donnees1 = mysql_fetch_array($reponse1) )
		{
		$donnemin = strtolower($donnees1['login']);
		
		if($donnemin == $loginmin)
		{
		$can++;
		}
		
		}
		
		$emailmin = strtolower($_POST['email']);
		
		$reponse1 = mysql_query("SELECT email FROM table_user");
		
		while ($donnees1 = mysql_fetch_array($reponse1) )
		{
		$donnemin = strtolower($donnees1['email']);
		
		if($donnemin == $emailmin)
		{
		$can1++;
		}
		
		}
		
		if($can1 == 0)
		{
			
		if($can == 0)
		{
		
		
if(eregi("'",$_POST['pseudo'])){
echo 'Les \' ne sont pas admis dans le pseudo !<br /><br /><a href="?page=inscription">Retour</a>';
}
else
{		

$timestamp = $secondesupp;
		
$pays = $_SERVER["REMOTE_ADDR"];	
$type = '0';
$respect_police = '0';
$date_peine_e_mort = '0';
$job = '0';
$time = $timestamp;
$prochaine_dla = $timestamp;
$pa = '20'; //A remplir
$description = 'Ma description Ici';
$objetdac = 0;

 switch($_POST['radiobutton']){
 
 	case "1": //Meurtrier du vice président
$objetdac = 1;
$name = 'Meurtrier du vice président';
$carac_force = 4000;
$carac_agilite = 2000;
$carac_respect = 2000;
$carac_intelligence = 2000;
$portemonnaie = 250;
$objet = 'Carte de travail';
$duree_peine = 'Peine de mort ans 5 ans';
$date_peine_e_mort = $timestamp + 7884000*5;
$ans = 5;

$nom_objet = 'Carte de travail';
$force = 0;
$agilite = 0;
$intelligence = 0;
$respect = 1000;
$prix = 2000;
$danger = 0;
$volable = 0;
$champsupp1 = '';
$champsupp2 = '';
$champsupp3 = '';

 	break; 
	
	case "2": //Mafieu
$objetdac = 1;
$name = 'Mafieu';
$carac_force = 2000;
$carac_agilite = 1000;
$carac_respect = 5000;
$carac_intelligence = 2000;
$portemonnaie = 500;
$objet = 'Lame de rasoir';
$duree_peine = '8 ans';
$ans = 8;

$nom_objet = 'Lame de rasoir';
$force = 500;
$agilite = 0;
$intelligence = 0;
$respect = 100;
$prix = 200;
$danger = 1;
$volable = 1;
$champsupp1 = '';
$champsupp2 = '';
$champsupp3 = '';

	break; 
	
	case "3": //Tueur en serie
$objetdac = 1;
$name = 'Tueur en serie';
$carac_force = 4000;
$carac_agilite = 4000;
$carac_respect = 1000;
$carac_intelligence = 1000;
$portemonnaie = 0;
$objet = 'Bout de verre';
$duree_peine = '22 ans';
$ans = 22;

$nom_objet = 'Bout de verre';
$force = 750;
$agilite = 0;
$intelligence = 0;
$respect = 0;
$prix = 500;
$danger = 1;
$volable = 1;
$champsupp1 = '';
$champsupp2 = '';
$champsupp3 = '';


	break; 
	
 	case "4": //Pickpocket 
$name = 'Pickpocket';
$carac_force = 2000;
$carac_agilite = 4000;
$carac_respect = 1000;
$carac_intelligence = 3000;
$portemonnaie = 300;
$objet = 'Aucun';
$duree_peine = '2 ans';
$ans = 2;
	break; 
	
 	case "5": //Trafiquant d'armes et drogues
$objetdac = 1;
$name = 'Trafiquant armes et drogues';
$carac_force = 3000;
$carac_agilite = 2000;
$carac_respect = 3000;
$carac_intelligence = 2000;
$portemonnaie = 250;
$objet = 'Ciseaux';
$duree_peine = '5 ans';
$ans = 5;

$nom_objet = 'Ciseaux';
$force = 750;
$agilite = 250;
$intelligence = 0;
$respect = 0;
$prix = 500;
$danger = 1;
$volable = 1;
$champsupp1 = '';
$champsupp2 = '';
$champsupp3 = '';

	break; 
	
 	case "6": //Braqueurd e supermarché 
$objetdac = 1;
$name = 'Braqueur de supermarché';
$carac_force = 3000;
$carac_agilite = 5000;
$carac_respect = 1000;
$carac_intelligence = 1000;
$portemonnaie = 0;
$objet = 'Couteau';
$duree_peine = '2 ans';
$ans = 2;

$nom_objet = 'Couteau';
$force = 1000;
$agilite = 0;
$intelligence = 0;
$respect = 0;
$prix = 700;
$danger = 1;
$volable = 1;
$champsupp1 = '';
$champsupp2 = '';
$champsupp3 = '';
	break; 
	
 	case "7": //Voleur d'un million e ollars
$name = 'Voleur de millions de dollars';
$carac_force = 2000;
$carac_agilite = 1000;
$carac_respect = 3000;
$carac_intelligence = 4000;
$portemonnaie = 1500;
$objet = 'Aucun';
$duree_peine = '15 ans';
$ans = 15;
	break; 
	
	case "8": //Tête pensante
$objetdac = 1;
$name = 'Tête pensante';
$carac_force = 2000;
$carac_agilite = 2000;
$carac_respect = 1000;
$carac_intelligence = 5000;
$portemonnaie = 200;
$objet = 'Plan de la prison';
$duree_peine = '3 ans';
$ans = 3;

$nom_objet = 'Plan de la prison';
$force = 0;
$agilite = 0;
$intelligence = 1000;
$respect = 0;
$prix = 0;
$danger = 0;
$volable = 0;
$champsupp1 = '';
$champsupp2 = '';
$champsupp3 = '';
	break; 
	
	default:	
echo 'Erreur';
    break;	
	
  }
  
$statut = 'Prisonnier';
$fin_peine = $timestamp + 7884000*$ans;
$delit = $name;
$mdp = md5($_POST['mdp']);
  
$nom_off = "0";
$prenom_off = "0";
$nom_rpg = htmlentities($_POST['nom_rpg']);
$prenom_rpg = htmlentities($_POST['prenom_rpg']);
$age = htmlentities($_POST['age']);
$pays =  htmlentities($pays);
$pseudo = htmlentities($pseudo);
$email = htmlentities($_POST['email']);

 
$reponse = mysql_query("INSERT INTO table_user VALUES('', '".$nom_off."', '".$prenom_off."', '".$nom_rpg."', '".$prenom_rpg."',	
'".$age."', '".$pays."', '".$pseudo."', '".$mdp."', '".$email."', '".$portemonnaie."',
'".$type."', '".$delit."', '".$carac_force."', '".$carac_agilite."', '".$carac_intelligence."', '".$carac_respect."', '".$respect_police."', 
'0', '0', '0', '0', '0', '0', '0', '0', '".$date_peine_e_mort."', '0', '".$job."', '".$statut."', '".$time."', '".$fin_peine."', 
'".$time."', '".$prochaine_dla."', '0', '".$pa."', '0', '0', '".$description."', '100', '0', '0', '0', '0', '0', '100', '40', '100', '0', '0', '0', '0', '0', '0')");
		

if($objetdac == 1)
{
$reponse = mysql_query("INSERT INTO table_object VALUES ('', '".$nom_objet."',  '".$force."',  '".$agilite."',  '".$intelligence."',  '".$respect."',  '".$prix."',  '".$danger."',  '".$pseudo."',  '".$volable."', '', '', '')");
}

if($_SESSION['parrain'] != NULL){


//VERIF PARAIN
$reponse3 = mysql_query("SELECT * FROM table_user WHERE id='".$_SESSION['parrain']."'"); 
$donnees3 = mysql_fetch_array($reponse3);
$pseudo123 = $donnees3['login'];
if($pseudo123 != NULL){
//DONNER SB AU PARRAIN
mysql_query("UPDATE table_user SET portemonnaie=portemonnaie+25 WHERE id='".$_SESSION['parrain']."'");
//INSERT TABLE PARRAIN
mysql_query("INSERT INTO table_parrain VALUES ('', '".$_SESSION['parrain']."', '', '".$pseudo123."', '".$pseudo."', '".$_SERVER["REMOTE_ADDR"]."', '".time()."', '', '')");
} 
}


echo 'L\'inscription s\'est déroulée avec succès.<br />Vous pouvez vous identifier.<br />Votre login est '.$pseudo.' et votre mot de passe '.$_POST['mdp'].'<br /><br /><a href="?index.php">Jouer</a>';

	$to = $_POST['email'];
	$from = 'no-reply@breakingout.fr';
	$subject = 'Inscription à BreakingOut';
	$Message = "Bienvenue à toi ".$_POST['nom_rpg']." ".$_POST['prenom_rpg']."
	
	Voici ton identifiant et ton mot de passe :
	Identifiant : ".$pseudo."
	Mot de passe : ".$_POST['mdp']."
	
	
	à Bientôt sur http://www.breakingout.fr";
	$headers = $from;

	mail($to, $subject, $Message);
		
$ip = $_SERVER["REMOTE_ADDR"];
mysql_query("INSERT INTO ip_secu VALUES ('', '".time()."', '".$pseudo."', '".$ip."')");		
		

		}
	}
	else {
	echo "Votre pseudo a déjà été pris !<br /><br /><a href='?page=inscription'>Retour</a>";
	}
	
	}else{
	echo "Cette adresse email existe déjà.<br /><br /><a href='?page=inscription'>Retour</a>";
	}
	
	
	}else{
	echo "Votre pseudo est trop court.<br /><br /><a href='?page=inscription'>Retour</a>";
	}
	
	}
	else {
	echo "Seules les lettres pour le pseudo sont acceptés.<br /><br /><a href='?page=inscription'>Retour</a>";
	}

}
else
{
echo 'Votre age est incorrect.<br /><br /><a href="?page=inscription">Retour</a>';
}
}
else
{
echo 'Le mot de passe et la comfirmation ne correspondent pas.<br /><br /><a href="?page=inscription">Retour</a>';
}

}
else
{
echo 'Un de vos champs est nul, veuillez remplir correctement le formulaire.<br /><br /><a href="?page=inscription">Retour</a>';
}

mysql_close();

}
else
{
?>

<SCRIPT LANGUAGE="JavaScript">
/*
SCRIPT EDITE SUR L'EDITEUR JAVASCRIPT
http://www.editeurjavascript.com
*/
function VerifForm(formulaire)
	{
	adresse = formulaire.email.value;
	var place = adresse.indexOf("@",1);
	var point = adresse.indexOf(".",place+1);
	if ((place > -1)&&(adresse.length >2)&&(point > 1))
		{
		formulaire.submit();
		return(true);
		}
	else
		{
		alert('Entrez une adresse e-mail valide!!');
		return(false);
		}
	}
</SCRIPT>

En vous inscrivant vous acceptez <a href="?page=jeu" target="_blank">les règles</a>.
<br />
<br />
<form id="form" name="form" method="post" action="?page=inscription&step=2" onSubmit="return(VerifForm(this))">

  <table width="100%" border="0">
      <tr>
      <td width="30%" align="left" valign="top">Surnom (Identifiant)* </td>
      <td width="70%" align="left" valign="top"><input name="pseudo" type="text" size="25" /></td>
    </tr>
	    <tr>
      <td width="30%" align="left" valign="top">Nom du prisonnier </td>
      <td width="70%" align="left" valign="top"><input name="nom_rpg" type="text" size="25" /></td>
    </tr>
	    <tr>
      <td align="left" valign="top">Pr&eacute;nom du prisonnier </td>
      <td align="left" valign="top"><input name="prenom_rpg" type="text" size="25" /></td>
    </tr>
	    <tr>
      <td align="left" valign="top">Adresse email </td>
      <td align="left" valign="top"><input name="email" type="text" size="25" /></td>
    </tr>
		    <tr>
      <td align="left" valign="top">Mot de passe </td>
      <td align="left" valign="top"><input name="mdp" type="password" size="25" /></td>
    </tr>
		    <tr>
      <td align="left" valign="top">Comfirmation du mot de passe </td>
      <td align="left" valign="top"><input name="remdp" type="password" size="25" /></td>
    </tr>
			    <tr>
      <td align="left" valign="top">Age de votre personnage (Entre 12 et 80 ans) </td>
      <td align="left" valign="top"><input name="age" type="text" size="5" /></td>
    </tr>
		    <tr>
      <td align="left" valign="top">Choix du personnage </td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
		    <tr>
      <td align="left" valign="top"><iframe src="type.php" height="200" width="200" frameborder="0" name="iframe" id="iframe" ></iframe></td>
      <td align="left" valign="top"><label>
        <a href="type.php?man=1" target="iframe"><input name="radiobutton" type="radio" value="1"  />
        Meurtrier du vice pr&eacute;sident </a></label>
	    <a href="type.php?">
	    <label></label>
	    </a>
	    <label><br /><a href="type.php?man=2" target="iframe">
        <input name="radiobutton" type="radio" value="2" />
		Mafieu</a></label>
	    <label><br /><a href="type.php?man=3" target="iframe">
        <input name="radiobutton" type="radio" value="3" />
        Tueur en serie</a> </label>
	    <label><br /><a href="type.php?man=4" target="iframe">
	    <input name="radiobutton" type="radio" value="4" />
        Pickpocket</a> </label>
        <label></label>
        <label><br />
	    </label>
	  <label><a href="type.php?man=5" target="iframe">
        <input name="radiobutton" type="radio" value="5" />
		Trafiquant d'armes et drogues </a></label>
	  <a href="type.php?man=4">
	  <label></label>
	  </a>
	  <label><br /><a href="type.php?man=6" target="iframe">
        <input name="radiobutton" type="radio" value="6" />
        Braqueur de supermarch&eacute;</a>
        <br />
	  </label>
	  <label><a href="type.php?man=7" target="iframe">
        <input name="radiobutton" type="radio" value="7" />
        Voleur d'un million de dollars</a> <br />
	  </label><label><a href="type.php?man=8" target="iframe">
        <input name="radiobutton" type="radio" value="8" /> 
        Tête pensante</a></label>
<br />
	    <br />
	    <input type="submit" name="Submit" value="Inscription" />
	  </label></td>
    </tr>
  </table>
  <br />
  *Pour éviter tout problème, seuls les lettres seront pris en comptes, tout les autres caractères seront remplacés !
  <br />
  <br />
</form>
<?
}
}
?>
