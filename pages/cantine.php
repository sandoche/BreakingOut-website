<? session_start();?>
<?
if( empty($_SESSION['login']) )
{
include("login1.php");
}
else
{
$retour_compte = '<br /><br /><a href="?page=compte">Retour</a>';
$retour = '<br /><br /><a href="?page=cantine">Retour</a>';
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
		$moral = $donnees1['moral'];
		$hygiene = $donnees1['hygiene'];
		$faim = $donnees1['faim'];
		$mdp_secu = $donnees1['mdp'];
		}
		
		$_SESSION['id_user_secu'] = $id_user_secu;
		
		$sanleboss = 0;
		
		$rep = mysql_query("SELECT * FROM table_object WHERE pseudo='".$_SESSION['login']."'"); 
						while ($data = mysql_fetch_array($rep) )
		{
		if($data['nom'] == 'Carte de travail')
		{
		$sanleboss++;
		}
		}

$plat1 = 'Pâtes'; 
$plat2 = 'Frites';	
$plat3 = 'Gâteau';
$plat4 = 'Epinards';
$plat5 = 'Pizza';
		

if($statut == 'Prisonnier'  && $_SESSION['mdp'] == $mdp_secu)
{
	
if($time_trou > $secondesupp)
{


?>
<style type="text/css">
<!--
.style19 {
	color: #FF0000;
	font-weight: bold;
}
-->
</style>

<span class="titre">>>> TROU</span><br />
<br />
<p>Bienvenue au TROU <? $nom_rpg  = strtoupper($nom_rpg);
echo $nom_rpg.' '.$prenom_rpg; ?>, (<? echo $_SESSION['login']; ?>) prisonnier N°<? echo $id; ?>
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
<span class="titre">>>> CANTINE</span><br />

<br />
<br />
<table width="100%">
<tr><td width="70%">
<p>Bienvenue dans la cantine <? $nom_rpg  = strtoupper($nom_rpg);
echo $nom_rpg.' '.$prenom_rpg; ?>, (<? echo htmlentities($_SESSION['login']); ?>) prisonnier N°<? echo $id; ?><br /><br />
</td>
<td width="30%"><img src="images/cantine.png"></td></table>
<blockquote>
 
<p>
  <?
if(($heures >= 11 && $heures <= 13) OR ($heures >= 19 && $heures <= 21)){


function mange($var_moral, $var_faim, $id_user_secu, $moral, $faim){

$moral_final = $moral + $var_moral;
$faim_final = $faim + $var_faim;

if($moral_final > 100){
$moral_final = 100;
}
if($faim_final > 100){
$faim_final = 100;
}

mysql_query("UPDATE table_user SET moral=".$moral_final." WHERE id=".$id_user_secu."");
mysql_query("UPDATE table_user SET faim=".$faim_final." WHERE id=".$id_user_secu."");
mysql_query("UPDATE table_user SET pa=pa-3 WHERE id=".$id_user_secu."");

echo 'Vous avez mangé'.$nom.' et gagné '.$var_moral.' en moral et '.$var_faim.' en faim.';
}

if($_GET['action'] == 1){ //Manger à la cantine
if($pa >= 3){

if($_GET['repas'] == 1){
$nom = $plat1;
$moral_gain = 5;
$faim_gain = 25;
mange($moral_gain, $faim_gain, $id_user_secu, $moral, $faim);
echo $retour;
}elseif ($_GET['repas'] == 2){
$nom = $plat2;
$moral_gain = 15;
$faim_gain = 5;
mange($moral_gain, $faim_gain, $id_user_secu, $moral, $faim);
echo $retour;
}elseif ($_GET['repas'] == 3){
$nom = $plat3;
$moral_gain = 20;
$faim_gain = 0;
mange($moral_gain, $faim_gain, $id_user_secu, $moral, $faim);
echo $retour;
}elseif ($_GET['repas'] == 4){
$nom = $plat4;
$moral_gain = 0;
$faim_gain = 30;
mange($moral_gain, $faim_gain, $id_user_secu, $moral, $faim);
echo $retour;
}elseif ($_GET['repas'] == 5){
$nom = $plat5;
$moral_gain = 10;
$faim_gain = 10;
mange($moral_gain, $faim_gain, $id_user_secu, $moral, $faim);
echo $retour;
}else{
?>
  Choisissez votre plat (chaque plat co&ucirc;te 3 PA) : </p>
</blockquote>



    <table width="100%" border="0">
      <tr>
        <td width="250" bgcolor="#999999"><strong>Plat</strong></td>
        <td width="100" bgcolor="#999999"><strong>Moral </strong></td>
        <td width="100" bgcolor="#999999"><strong>Faim</strong></td>
      </tr>
      <tr>
        <td><a href="?page=cantine&amp;action=1&amp;repas=1"><? echo $plat1; ?></a></td>
        <td>5</td>
        <td>25</td>
      </tr>
      <tr>
        <td><a href="?page=cantine&amp;action=1&amp;repas=2"><? echo $plat2; ?></a></td>
        <td>15</td>
        <td>5</td>
      </tr>
      <tr>
        <td><a href="?page=cantine&amp;action=1&amp;repas=3"><? echo $plat3; ?></a></td>
        <td>20</td>
        <td>0</td>
      </tr>
      <tr>
        <td><a href="?page=cantine&amp;action=1&amp;repas=4"><? echo $plat4; ?></a></td>
        <td>0</td>
        <td>30</td>
      </tr>
      <tr>
        <td><a href="?page=cantine&amp;action=1&amp;repas=5"><? echo $plat5; ?></a></td>
        <td>10</td>
        <td>10</td>
      </tr>
    </table>
    <p><br />
    </p>
    <blockquote><br />
      
  <?
}

}
else{
echo 'Vous n\'avez pas assez de PA pour effectuer cette action.'.$retour;
}
} elseif($_GET['action'] == 2) { //Bataille
if($pa >= 3){

$provoc = rand(0,15);


$reponse6 = mysql_query("SELECT SQL_CACHE * FROM table_object WHERE pseudo='".htmlentities($_SESSION['login'])."'"); 
				while ($donnees6 = mysql_fetch_array($reponse6) )
{
$intellisupp=$intellisupp+$donnees6['intelligence'];
$respectsupp=$respectsupp+$donnees6['respect'];
}

$intellitotal = $intellisupp+$carac_intelligence;

$trou_max = ($intellitotal)/200;
$trou = rand(0, $trou_max);

if($trou == 1){

$timetrou = $secondesupp + 21600*2;
mysql_query("UPDATE table_user SET stat_infractions=stat_infractions+1 WHERE id='".$id_user_secu."'");
mysql_query("UPDATE table_user SET stat_trou=stat_trou+1 WHERE id='".$id_user_secu."'");
mysql_query("UPDATE table_user SET time_trou=".$timetrou." WHERE id='".$id_user_secu."'");

echo 'Vous vous faites chopper entrain de balancer de la nourriture, vous allez 2 jours au trou'.$retour;

}else{
if($provoc == 1){
$gain_moral = rand(5,10);
$gain_respect = rand(5,10);
$echogain = $gain_respect/1000;
$resultat = 'Vous avez provoqué une bataille de purée générale vous gagnez ainsi '.$gain_moral.' de moral et '.$echogain.' de respect';
}else{
$gain_moral = rand(1,5);
$resultat = 'Vous avez balancé de la purée sur un prisonnier vous gagnez '.$gain_moral.' de moral.';
}

mysql_query("UPDATE table_user SET moral=moral+".$gain_moral." WHERE id='".$id_user_secu."'");
mysql_query("UPDATE table_user SET carac_respect=carac_respect+".$gain_respect." WHERE id='".$id_user_secu."'");

echo $resultat.''.$retour;
 
}

mysql_query("UPDATE table_user SET pa=pa-3 WHERE id='".$id_user_secu."'");


}
else{
echo 'Vous n\'avez pas assez de PA pour effectuer cette action.'.$retour;
}
} elseif($_GET['action'] == 3) { //Racket
if($pa >= 1){
if($hygiene >= 70 || $delit == 'Mafieu'){

$reponse6 = mysql_query("SELECT SQL_CACHE * FROM table_object WHERE pseudo='".htmlentities($_SESSION['login'])."'"); 
				while ($donnees6 = mysql_fetch_array($reponse6) )
{
$intellisupp=$intellisupp+$donnees6['intelligence'];
$respectsupp=$respectsupp+$donnees6['respect'];
}

$troumax = ($carac_respect+$respectsupp)/200;

$trou = rand(0,$troumax);

if($trou == 1){

$timetrou = $secondesupp + 21600*3;
mysql_query("UPDATE table_user SET stat_infractions=stat_infractions+1 WHERE id='".$id_user_secu."'");
mysql_query("UPDATE table_user SET stat_trou=stat_trou+1 WHERE id='".$id_user_secu."'");
mysql_query("UPDATE table_user SET time_trou=".$timetrou." WHERE id='".$id_user_secu."'");


echo 'Vous vous faites chopper entrain de balancer de la nourriture, vous allez 3 jours au trou'.$retour;

}else{
$gain_moral = rand(1,5);
$gain_respect = rand(1,5);
$gain_faim = rand(1,5);
$echogain = $gain_respect/1000;
$resultat = 'Vous avez gagné '.$gain_moral.' de moral, '.$gain_faim.' de faim et '.$echogain.' de respect en mangeant le dessert d\'un autre prisonnier.';

mysql_query("UPDATE table_user SET faim=faim+".$gain_faim." WHERE id='".$id_user_secu."'");
mysql_query("UPDATE table_user SET moral=moral+".$gain_moral." WHERE id='".$id_user_secu."'");
mysql_query("UPDATE table_user SET carac_respect=carac_respect+".$gain_respect." WHERE id='".$id_user_secu."'");
mysql_query("UPDATE table_user SET pa=pa-1 WHERE id='".$id_user_secu."'");
echo $resultat.''.$retour;
}


}else{
echo 'Vous ne sentez pas assez bon pour vous faire respecter, allez prendre une douche.'.$retour;
}
}
else{
echo 'Vous n\'avez pas assez de PA pour effectuer cette action.'.$retour;
}
}else {
?>
  <a href="?page=cantine&action=1">-Manger a la cantine (3 PA)</a><br />
  <br />
  <a href="?page=cantine&action=2">-Faire une bataille de purée (3 PA)</a><br />
  <br />
  <a href="?page=cantine&action=3">-Menacer un prisonnier pour recupérer son dessert (1 PA)</a><br />
  <?
}

}else{
echo 'Il n\'est pas l\'heure de manger, revenez entre 11h00 et 14h00 ou entre 19h00 et 22h00.'.$retour_compte;
}
?>
      
    </blockquote>
    <?
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

	
mysql_close();

}
?>

                 </p>
</p>
</blockquote>
