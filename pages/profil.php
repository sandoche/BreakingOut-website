<? session_start();?>
<?
if( empty($_SESSION['login']) )
{
include("login1.php");
}
else
{

include("db.php");

$retour_compte = '<br /><br /><a href="?page=compte">Retour</a>';

		$sql = "select * from table_user where login='".htmlentities($_SESSION['login'])."'";
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		$data = mysql_fetch_assoc($req);

		
		$reponse1 = mysql_query("SELECT * FROM table_user WHERE login='".htmlentities($_SESSION['login'])."'"); 
				while ($donnees1 = mysql_fetch_array($reponse1) )
		{
		$id_secu_user = $donnees1['id'];
		$id_user_secu = $donnees1['id'];
		$vraimdp = $donnees1['mdp'];
		$id = $donnees1['id'];
		$email = $donnees1['email'];
		$peine_de_mort = $donnees1['date_peine_de_mort'];
		$fin_peine = $donnees1['fin_peine'];
		$prochaine_dla = $donnees1['prochaine_dla'];
		$pv = $donnees1['pv'];
		$nom_rpg = $donnees1['nom_rpg'];
		$prenom_rpg = $donnees1['prenom_rpg'];
		$portemonnaie = $donnees1['portemonnaie'];
		$delit = $donnees1['delit'];
		$carac_force = $donnees1['carac_force'];
		$carac_agilite = $donnees1['carac_agilite'];
		$carac_intelligence = $donnees1['carac_intelligence'];
		$carac_respect = $donnees1['carac_respect'];
		$stat_combats_gagne = $donnees1['stat_combats_gagne'];
		$stat_combats = $donnees1['stat_combats'];
		$stat_infractions = $donnees1['stat_infractions'];
		$stat_trou = $donnees1['stat_trou'];
		$stat_parties_poker_gagne = $donnees1['stat_parties_poker_gagne'];
		$stat_parties_poker = $donnees1['stat_parties_poker'];
		$stat_sous_poker_gagne = $donnees1['stat_sous_poker_gagne'];
		$time_trou = $donnees1['time_trou'];
		$date_peine_de_mort = $donnees1['date_peine_de_mort'];
		$evasion_etape = $donnees1['evasion_etape'];
		$job = $donnees1['job'];
		$statut = $donnees1['statut'];
		$date_inscription = $donnees1['date_inscription'];
		$time = $donnees1['time'];
		$gang = $donnees1['gang'];
		$pa = $donnees1['pa'];
		$avatar = $donnees1['avatar'];
		$description = $donnees1['description'];
		$age_depart = $donnees1['age_depart'];
		$mdp_secu = $donnees1['mdp'];
		}
		
		include("pages/liens_imp.php");
?>
<style type="text/css">
<!--
.style1 {color: #000099}
.style2 {color: #666666}
.style8 {font-size: 10px; font-weight: bold; }
.style10 {color: #666666; font-size: 10px; }
.style11 {color: #000000}
-->
</style>
<span class="titre">>>> CELLULE</span>
</tr></tbody></table><br />
<br />
Voici votre profil,  <? $nom_rpg  = strtoupper($nom_rpg);
echo $nom_rpg.' '.$prenom_rpg; ?>, (<? echo htmlentities($_SESSION['login']); ?>)
<br />

<?
SWITCH($_GET['modif'])
{

case "1":

if($_POST['newemail'] != NULL)
{
$newemail = htmlentities($_POST['newemail']);
mysql_query("UPDATE table_user SET email='".$newemail."' WHERE login='".$_SESSION['login']."'");
echo "Votre adresse email a été changée.";

$email = $newemail;
}
else
{
echo "Veuillez remplir correctement les champs.";
}

break;

case "2":
if($_POST['avatarurl'] != NULL)
{
$var = htmlentities($_POST['avatarurl']);

if(!ereg('.jpg$',$var) && !ereg('.png$',$var) && !ereg('.gif$',$var)){
echo 'Ce fichier n\'est pas une image.';
}
else
{

if(!ereg('^http://',$var)){
echo 'Cette URL est invalide.';
}
else
{

mysql_query("UPDATE table_user SET avatar='".$var."' WHERE id=".$id_secu_user."");
echo "L'avatar a été changé !.";

}
}
}
else
{
echo "Veuillez remplir correctement les champs";
}
break;

case "3":

if($_POST['lemdp'] != NULL && $_POST['newmdp'] != NULL)
{
$lemdp = htmlentities($_POST['lemdp']);
$new = htmlentities($_POST['newmdp']);

$hash = md5($lemdp);
if($vraimdp == $hash)
{

$newhash = md5($new);

$reponse2 = mysql_query("UPDATE table_user SET mdp='".$newhash."' WHERE id=".$id_secu_user."");
if( !$reponse2 )   exit("Vous avez mis un caractère interdit.");

echo "Votre mot de passe a été changé, vous allez recevoir une comfirmation par email";

	$from = 'no-reply@breakingout.fr';
	$to = $email;
	$subject = 'Changement de mot de passe';
	$Message = "Votre mot de passe a été changé.
	
	Identifiant : ".htmlentities($_SESSION['login'])."
	Mot de passe : $new 
	
	A bientôt
	http://www.breakingout.fr";
	$headers = $from;

	mail($to, $subject, $Message);

}
else
{
echo "Vous n'avez pas mis votre vrai mot de passe actuel.";
}

}
else
{
echo "Veuillez remplir correctement les champs";
}
break;

case "4":

if($_POST['description'] != NULL)
{

$new_description = $_POST['description'];

$new_description = htmlentities($new_description); 
$new_description = nl2br($new_description); 


$reponse1 = mysql_query("UPDATE table_user SET description='".$new_description."' WHERE id=".$id_secu_user."");
if( !$reponse1 )   exit("Vous avez mis un caractère interdit.");
echo "Votre description a été changée.";

$description = $new_description;

}
else
{
echo "Veuillez remplir correctement les champs";
}

break;

case "5":

$d = 0;

		$reponse1 = mysql_query("SELECT * FROM table_gang WHERE chef='".htmlentities($_SESSION['login'])."'"); 
				while ($donnees1 = mysql_fetch_array($reponse1) )
		{
		$d++;
		}
		
		if($d == 0)
{

if($_POST['suppression'] == "OUI")
{

mysql_query("DELETE FROM `table_user` WHERE id=".$id_secu_user."");
mysql_query("DELETE FROM `table_object` WHERE pseudo='".htmlentities($_SESSION['login'])."'");


echo '<meta http-equiv="Refresh" content="0;URL=index.php?page=deleted">';
}
else
{
echo 'Votre compte n\'a pas été supprimé, vous avez mal recopié OUI.';
}

}
else
{
echo 'Vous ne pouvez pas supprimer votre compte car vous êtes chef d\'un gang !';
}
break;

default:
echo "<br>";
}
?>

<table width="90%" border="0">
  <tr>
    <td><fieldset style="border-color:#7e5125">
      <legend><strong>Changer d'adresse email : </strong></legend>
      <div>
<form id="form1" name="form1" method="post" action="?page=profil&modif=1">
<p><strong><br />
</strong>Adresse email actuel : <? echo $email; ?><strong><br />
    </strong>Nouvelle adresse email :
    <label>
    <input type="text" name="newemail" />
    </label>
    <br />
    <label>
    <input type="submit" name="Submit" value="Changer" />
    </label>
</form>
	  </div>
	  </fieldset>
	  </td>
	</tr>
</table>	
<br />
<table width="90%" border="0">
  <tr>
    <td><fieldset style="border-color:#7e5125">
      <legend><strong>Changer de mot de passe : </strong></legend>
      <div>
<form id="form1" name="form1" method="post" action="index.php?page=profil&modif=3">
  <p>Mot de passe actuel : 
    <label>
    <input type="text" name="lemdp" />
    </label>
    <br />
  Nouveau mot de passe : 
  <label>
  <input type="text" name="newmdp" />
  </label>
  <br />
  <label>
  <input type="submit" name="Submit3" value="Changer" />
  </label>

  </form>
	  </div>
	  </fieldset>
	  </td>
	</tr>
</table>
<br />
<table width="90%" border="0">
  <tr>
    <td><fieldset style="border-color:#7e5125">
      <legend><strong>Description (255 Caract&egrave;res maximum) : </strong></legend>
      <div>
<form action="index.php?page=profil&modif=4" method="post" name="form2" id="form2">
  <label>
  <textarea name="description" cols="50" rows="5"><? echo $description;  ?></textarea>
  </label>
  <br />
  <label>
  <input type="submit" name="Submit4" value="Changer" />
  </label>
</form>
	  </div>
	  </fieldset>
	  </td>
	</tr>
</table>
<br />
<table width="90%" border="0">
  <tr>
    <td><fieldset style="border-color:#7e5125">
      <legend><strong>Avatar : </strong></legend>
      <div>
<form action="index.php?page=profil&modif=2" method="post" name="form2" id="form2">
Avatar actuel :<br />
<img src='<?
			if($avatar == '0')
			{
			echo 'avatars/no_avatar.png';
			}
			else
			{
			echo $avatar;
			}
			?>' width="100" height="100" border="1" title="Avatar de <? echo $_SESSION['login']; ?>" /><br /><br />
URL nouvel avatar :
<br /><input type="text" name="avatarurl" size="50" />
<input type="submit" name="Submit333" value="Envoyer" />
</form>
	  </div>
	  </fieldset>
	  </td>
	</tr>
</table>
<br />
<table width="90%" border="0">
  <tr>
    <td><fieldset style="border-color:#7e5125">
      <legend><strong>Se suicider : </strong></legend>
      <div>
<form action="index.php?page=profil&modif=5" method="post" name="form3" id="form3">
  Supprimer mon compte ? 
  <label>
  <input name="suppression" type="text" id="suppression" />
  </label>
(Tappez OUI pour le supprimer) <br />
Attention cette op&eacute;ration est irr&eacute;versible.
<br />
<label>
<input type="submit" name="Submit5" value="Supprimer" />
</label>
</form>
	  </div>
	  </fieldset>
	  </td>
	</tr>
</table> 
<br />
<br />
<br />
<br />


<?

}
?>