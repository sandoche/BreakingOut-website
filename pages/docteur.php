<? session_start();?>
<?
if( empty($_SESSION['login']) )
{
include("login1.php");
}
else
{
$retour_compte = '<br /><br /><a href="?page=compte">Retour</a>';
include("db.php");

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
		$mdp_secu = $donnees1['mdp'];
		}
		
if($statut == 'Prisonnier'  && $_SESSION['mdp'] == $mdp_secu)
{		
		
if($time_trou > $secondesupp)
{
?>
<span class="titre">>>> TROU</span><br />
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

include("pages/liens_imp.php");
?>
<table width="100%">
<tr><td width="70%" valign="top">
<span class="titre">>>> INFIRMERIE</span><br />
</td>
<td width="30%"><img src="images/infirmerie.png"></td></table>
<p>Bienvenue dans l'infirmerie <? $nom_rpg  = strtoupper($nom_rpg);
echo $nom_rpg.' '.$prenom_rpg; ?>, (<? echo htmlentities($_SESSION['login']); ?>) prisonnier N°<? echo $id; ?><br /><br />
<?
if($pa >= 6)
{

if($pv <= 40)
{

if($_GET['action'] == 1)
{

$chance = rand(1,3);

if($chance == 1){
echo 'L\'infirmière est un laideron, vous perdez 10 en moral.<br />';
mysql_query("UPDATE table_user SET moral=moral-10 WHERE id=".$id_secu_user."");
}elseif($chance == 2){
echo 'L\'infirmière est un vrai cannon, vous gagnez 10 en moral.<br />';
mysql_query("UPDATE table_user SET moral=moral+10 WHERE id=".$id_secu_user."");
}

mysql_query("UPDATE table_user SET pa=pa-6 WHERE id=".$id_secu_user."");
mysql_query("UPDATE table_user SET pv=100 WHERE id=".$id_secu_user."");

echo 'Le docteur vient de vous soigner, vous pouvez maintenant retourner a votre cellule.'.$retour_compte;

}
elseif($_GET['action'] == 2)
{

echo '<a href="?page=doc&action=1">Se faire soigner (6 PA)</a>';

}
else
{

echo '<a href="?page=doc&action=1">Se faire soigner (6 PA)</a>';

}

}
else
{
echo 'Vous ne pouvez venir ici seulement si vous avez une santé inférieure ou égale a 40.'.$retour_compte;
}
}
else
{
echo 'Vous n\'avez pas assez de PA pour venir ici.'.$retour_compte;
}
?>
    <br />
    <br />

    <?

mysql_close();
}


}
elseif($statut == 'Mort'  && $_SESSION['mdp'] == $mdp_secu)
{
echo '<SCRIPT LANGUAGE="JavaScript">
document.location.href="?page=mort" /* vous pouvez aussi mettre http://www.monsite.com */
</SCRIPT>';
}
elseif($statut == 'Evadé'  && $_SESSION['mdp'] == $mdp_secu)
{
echo '<SCRIPT LANGUAGE="JavaScript">
document.location.href="?page=evade" /* vous pouvez aussi mettre http://www.monsite.com */
</SCRIPT>';
}
else
{
echo 'Bug 1 veuillez prévenir l\'administrateur !';
}

}
?>
  </p>
</blockquote>
