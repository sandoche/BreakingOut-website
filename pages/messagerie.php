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
		$id = $donnees1['id'];
		$id_secu_user = $donnees1['id'];
		$id_user_secu = $donnees1['id'];
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
		$champsuppc = $donnees1['champsuppc'];
		$mdp_secu = $donnees1['mdp'];
		}
		
		include("pages/liens_imp.php");
		
		
?>
<style type="text/css">
<!--
.style1 {color: #000099}
.style2 {color: #666666}
.style8 {font-size: 10px; font-weight: bold; }
.style10 {color: #666666; font-size: 10px; }ftp://u39018139:***@s141195816.onlinehome.fr/wsb3901813901/help
.style11 {color: #000000}
-->
</style>
<?
if($time_trou > $secondesupp)
{

?><span class="titre">>>> TROU</span><br />
<br />
<p>Bienvenue au TROU <? $nom_rpg  = strtoupper($nom_rpg);
echo $nom_rpg.' '.$prenom_rpg; ?>, (<? echo htmlentities($_SESSION['login']); ?>) prisonnier N°<? echo $id; ?>
<br /><br />Vous y resterez jusqu'au
<?
			  $secondesupp1 = $time_trou;
			  
			  $jour1 = floor($secondesupp1/21600);
$heuresensec1 = fmod($secondesupp1, 21600);
$heures1 = floor($heuresensec1/900);
$minutesensec1 = fmod($heuresensec1, 900);
$minutes1 =  floor($minutesensec1/15);

echo ' jour '.$jour1.' à '.$heures1.'h'.$minutes1.'.';

include("pages/trou.php");
			  ?>

<?

}
else
{
?>
<span class="titre">>>> MESSAGERIE</span><br />
<br />
Voici votre messagerie,  <? $nom_rpg  = strtoupper($nom_rpg);
echo $nom_rpg.' '.$prenom_rpg; ?>, (<? echo $_SESSION['login']; ?>)
<br />
<br /><a href="?page=messagerie">Mes messages</a> | <a href="?page=messagerie&ecrire=1">Envoyer un message</a>
<br /><br />
<?
if($_GET['ecrire'] == 1)
{
?>
<table width="100%" border="0">
  <tr>
    <td><fieldset style="border-color:#7e5125">
      <legend><strong>Envoyer un message : </strong></legend>
      <div>
	  <form action="?page=messagerie&ecrire=2" method="post" name="form" id="form"><br />
	  <b>Pseudo du joueur</b>
	  <br />
	    <label>
		<input name="pseudo_dest" type="text" id="pseudo_dest" size="50" value='<? echo htmlentities($_GET['mec']); ?>'/>
		</label>
		<br /><br />
			  <b>Objet</b>
	  <br />
	    <label>
		<input name="objet" type="text" id="objet" size="50" value='<? echo htmlentities($_GET['objet']); ?>'/>
		</label>
		<br /><br />
					  <b>Message</b>
	  <br />
	    <label>
		<textarea name="message" cols="50" rows="5"></textarea>
		</label>
		<br /><br /><br />
		<input type="submit" name="Submit4" value="Envoyer" />

	  
	  </form>
	  </div>
	  </fieldset>
	</td>
</tr>
</table>
<br />

<?
}
elseif($_GET['ecrire'] == 2)
{

$pseudo_dest = htmlentities($_POST['pseudo_dest']);
$objet = htmlentities($_POST['objet']);
$message = htmlentities($_POST['message']);

if($pseudo_dest != NULL && $objet != NULL && $message != NULL)
{
include("db.php");

$i = 0;

$reponse = mysql_query("SELECT * FROM table_user WHERE login='".$pseudo_dest."'"); 
				while ($donnees = mysql_fetch_array($reponse) )
		{
		$i++;
		}
		
if($i >= 1)
{
$ip = $_SERVER["REMOTE_ADDR"];
$reponse = mysql_query("INSERT INTO table_messagerie VALUES ('', '".htmlentities($_SESSION['login'])."', '".$pseudo_dest."', '".$secondesupp."', '".$objet."', '".$message."', '".$ip."', '', '')");
echo 'Message envoyé.<br /><br /><a href="?page=messagerie">Retour</a>';
}
else
{
echo 'Ce prisonnier n\'existe pas.<br /><br /><a href="?page=messagerie&ecrire=1">Retour</a>';
}
		
mysql_close();
}
else
{
echo 'Un de vos champs est vide.<br /><br /><a href="?page=messagerie&ecrire=1">Retour</a>';
}

}
elseif($_GET['lire'] != NULL)
{

$id = htmlentities($_GET['lire']);

$reponse = mysql_query("SELECT * FROM table_messagerie WHERE id='".$id."'"); 
				while ($donnees = mysql_fetch_array($reponse) )
		{
$id = $donnees['id'];
$emetteur = $donnees['emetteur'];
$destinataire = $donnees['destinataire'];
$date = $donnees['date'];
$objet = $donnees['objet'];
$message = $donnees['message'];
$supp2 = $donnees['supp2'];
		}
		
if(strtolower($emetteur) == strtolower($_SESSION['login']) || strtolower($destinataire) == strtolower($_SESSION['login']))
{

if(strtolower($destinataire) == strtolower($_SESSION['login']))
{
mysql_query("UPDATE table_messagerie SET supp2='1' WHERE id='".$id."'");
}

?>
<table width="100%" border="0">
  <tr>
    <td><fieldset style="border-color:#7e5125">
      <legend><strong>Lire un message : </strong></legend>
      <div>
	  <b>Emetteur : </b><? echo $emetteur; ?>
	  <br />
	  <br /><b>Destinataire :</b> <? echo $destinataire; ?>
	  <br />
	  <br /><b>Date : </b><? echo jour_heure($date); ?>
	  <br />
	  <br /><b>Objet : </b><? echo $objet; ?>
	  <br />
	  <br /><b>Message : </b><? echo nl2br($message); ?>
	  </div>
	  </fieldset>
	</td>
</tr>
</table>
<br />
<?

if(strtolower($destinataire) == strtolower($_SESSION['login']))
{
echo '<a href="?page=messagerie&ecrire=1&mec='.$emetteur.'&objet=RE : '.$objet.'">Répondre</a>';
echo ' | <a href="?page=messagerie&delete='.$id.'">Supprimer</a>';
}

}
else
{
echo 'Vous ne pouvez pas lire ce message.<br /><br /><a href="?page=messagerie">Retour</a>';
}

}
elseif($_GET['delete'] != NULL)
{

$id = htmlentities($_GET['delete']);

$reponse = mysql_query("SELECT * FROM table_messagerie WHERE id='".$id."'"); 
				while ($donnees = mysql_fetch_array($reponse) )
		{
$id = $donnees['id'];
$emetteur = $donnees['emetteur'];
$destinataire = $donnees['destinataire'];
$date = $donnees['date'];
$objet = $donnees['objet'];
$message = $donnees['message'];
$supp2 = $donnees['supp2'];
		}
		
if(strtolower($destinataire) == strtolower($_SESSION['login']))
{

mysql_query("DELETE FROM `table_messagerie` WHERE id='".$id."'");
echo 'Le message a été supprimé.<br /><br /><a href="?page=messagerie">Retour</a>';

}
else
{
echo 'Vous ne pouvez pas supprimer ce message.<br /><br /><a href="?page=messagerie">Retour</a>';
}

}
else
{
?>
<table width="100%" border="0">
  <tr>
    <td><fieldset style="border-color:#7e5125">
      <legend><strong>Messages reçus : </strong></legend>
      <div>
<table width="100%">
<tr>
<td width="23%"><b>Emetteur</b></td>
<td width="40%"><b>Objet</b></td>
<td width="27%"><b>Date</b></td>
<td width="10%"><b>Supprimer</b></td>
</tr>
	  <?
	  $xd = 0;
	  				 $reponse1 = mysql_query("SELECT * FROM table_messagerie WHERE destinataire='".htmlentities($_SESSION['login'])."' ORDER BY date DESC"); 
				while ($donnees1 = mysql_fetch_array($reponse1) )
				{
				
$date = $donnees1['date'];	
$emetteur = $donnees1['emetteur'];		
$objet  = $donnees1['objet'];	
$xd++;	
				?>

<tr>
<td width="23%"><? echo $emetteur; ?></td>
<td width="40%"><a href='?page=messagerie&lire=<? echo $donnees1['id']; ?>'><? 
if($donnees1['supp2'] == 1)
{
echo substr($objet,0,15).'...'; 
}
else
{
echo '<b>'.substr($objet,0,15).'...</b>'; 
}
?></a></td>
<td width="27%"><? echo jour_heure($date); ?></td>
<td width="10%"><a href='?page=messagerie&delete=<? echo $donnees1['id']; ?>'>[X]</a></td>
</tr>
				<?
				}
				

				?>
				</table>
				<?
								if($xd == 0)
				{
				echo 'Pas de messages';
				}
				?>
	  </div>
	  </fieldset>
	</td>
</tr>
</table>
<br />
<table width="100%" border="0">
  <tr>
    <td><fieldset style="border-color:#7e5125">
      <legend><strong>Messages envoyés* : </strong></legend>
      <div><table width="100%">
<tr>
<td width="23%"><b>Destinataire</b></td>
<td width="50%"><b>Objet</b></td>
<td width="27%"><b>Date</b></td>
</tr>
	  <?
	  $abc = 0;
	  				 $reponse2 = mysql_query("SELECT * FROM table_messagerie WHERE emetteur='".htmlentities($_SESSION['login'])."' ORDER BY date DESC"); 
				while ($donnees2 = mysql_fetch_array($reponse2) )
				{
				
$date = $donnees2['date'];	
$destinataire = $donnees2['destinataire'];		
$objet  = $donnees2['objet'];		
$abc++;
				?>

<tr>
<td width="23%"><? echo $destinataire; ?></td>
<td width="50%"><? if($donnees2['supp2'] == 1)
{
echo '<a href="?page=messagerie&lire='.$donnees2['id'].'">'. substr($objet,0,30).'...</a></td>';
}
else
{
echo '<a href="?page=messagerie&lire='.$donnees2['id'].'"><b>'. substr($objet,0,30).'...</b></a></td>';
}




?>
<td width="27%"><? echo jour_heure($date); ?></td>
</tr>
				<?
				}
				

?>
				</table>
				<?
								if($abc == 0)
{
echo 'Pas de messages';
}
				?>
	  </div>
	  </fieldset>
	</td>
</tr>
</table>

<br />Les messages de plus de trois vraies semaines (soit 84 jours en prison) sont automatiquement supprimés.
<br />*Ces messages n'ont pas été supprimés par le destinataire.


<?
}

}

}
?>