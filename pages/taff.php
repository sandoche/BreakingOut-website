<? session_start();?>
<?
if( empty($_SESSION['login']) )
{
include("login1.php");
}
else
{
$retour_compte = '<br /><br /><a href="?page=compte">Retour</a>';
$retour = '<br /><br /><a href="?page=taff">Retour</a>';
include("db.php");

		$sql = "select * from table_user where login='".htmlentities($_SESSION['login'])."'";
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		$data = mysql_fetch_assoc($req);

		
		$reponse1 = mysql_query("SELECT * FROM table_user WHERE login='".htmlentities($_SESSION['login'])."'"); 
				while ($donnees1 = mysql_fetch_array($reponse1) )
		{
		$id = $donnees1['id'];
		$id_user_secu = $donnees1['id'];
		$id_secu_user = $donnees1['id'];
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
		$hygiene = $donnees1['hygiene'];
		$moral = $donnees1['moral'];
		$faim = $donnees1['faim'];
		}
		
		$_SESSION['id_user_secu'] = $id_user_secu;
		
		$sanleboss = 0;
		
		$rep = mysql_query("SELECT * FROM table_object WHERE pseudo='".htmlentities($_SESSION['login'])."'"); 
						while ($data = mysql_fetch_array($rep) )
		{
		if($data['nom'] == 'Carte de travail')
		{
		$sanleboss++;
		}
		}


if($statut == 'Prisonnier' && $_SESSION['mdp'] == $mdp_secu)
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
<span class="titre">>>> INDUSTRIE PENITENCIERE</span><br />
<br />
<br />
<table width="100%">
<tr><td width="70%">
<p>Bienvenue dans l'industrie de prison <? $nom_rpg  = strtoupper($nom_rpg);
echo $nom_rpg.' '.$prenom_rpg; ?>, (<? echo $_SESSION['login']; ?>) prisonnier N°<? echo $id; ?><br /><br />
</td>
<td width="30%"><img src="images/travail.png"></td></table>
<?
if($pa >= 4)
{

if($faim >= 40)
{

if($sanleboss >= 1)
{



if($_GET['action'] == 1)
{

mysql_query("UPDATE table_user SET moral=moral+5 WHERE id='".$id_user_secu."'");
mysql_query("UPDATE table_user SET faim=faim-10 WHERE id='".$id_user_secu."'");

$xp_force = rand(1, 10);
$xp_agilite = rand(5, 15);
$xp_intelligence = rand(5, 10);
$xp_respect = rand(1, 5);

$echo_xp_force = $xp_force/1000;
$echo_xp_agilite = $xp_agilite/1000;
$echo_xp_intelligence = $xp_intelligence/1000;
$echo_xp_respect = $xp_respect/1000;

mysql_query("UPDATE table_user SET carac_force=carac_force+".$xp_force." WHERE id=".$id_secu_user."");
mysql_query("UPDATE table_user SET carac_agilite=carac_agilite+".$xp_agilite." WHERE id=".$id_secu_user."");
mysql_query("UPDATE table_user SET carac_intelligence=carac_intelligence+".$xp_intelligence." WHERE id=".$id_secu_user."");
mysql_query("UPDATE table_user SET carac_respect=carac_respect+".$xp_respect." WHERE id=".$id_secu_user."");

echo 'Vous lavez le linge, vous gagnez '.$echo_xp_force.' XP de force, '.$echo_xp_agilite.' XP d\'agilité, '.$echo_xp_intelligence.' d\'intelligence et '.$echo_xp_respect.' XP de respect.<a href="?page=taff&action=1"> Continuer le lavage (4 PA).</a>';


	
mysql_query("UPDATE table_user SET pa=pa-4 WHERE id=".$id_secu_user."");
mysql_query("UPDATE table_user SET portemonnaie=portemonnaie+10 WHERE id=".$id_secu_user."");

echo $retour;
}
elseif($_GET['action'] == 2)
{
$xp_force = rand(1, 20);
$xp_agilite = rand(10, 15);
$xp_intelligence = rand(5, 10);
$xp_respect = rand(1, 5);

$echo_xp_force = $xp_force/1000;
$echo_xp_agilite = $xp_agilite/1000;
$echo_xp_intelligence = $xp_intelligence/1000;
$echo_xp_respect = $xp_respect/1000;

mysql_query("UPDATE table_user SET carac_force=carac_force+".$xp_force." WHERE id=".$id_secu_user."");
mysql_query("UPDATE table_user SET carac_agilite=carac_agilite+".$xp_agilite." WHERE id=".$id_secu_user."");
mysql_query("UPDATE table_user SET carac_intelligence=carac_intelligence+".$xp_intelligence." WHERE id=".$id_secu_user."");
mysql_query("UPDATE table_user SET carac_respect=carac_respect+".$xp_respect." WHERE id=".$id_secu_user."");

echo 'Vous peignez des murs, vous gagnez '.$echo_xp_force.' XP de force, '.$echo_xp_agilite.' XP d\'agilité, '.$echo_xp_intelligence.' d\'intelligence et '.$echo_xp_respect.' XP de respect.<a href="?page=taff&action=2"> Continuer la peinture (4 PA).</a>';

mysql_query("UPDATE table_user SET faim=faim-7 WHERE id='".$id_user_secu."'");
mysql_query("UPDATE table_user SET hygiene=hygiene-7 WHERE id='".$id_user_secu."'");
	
mysql_query("UPDATE table_user SET pa=pa-4 WHERE id=".$id_secu_user."");
mysql_query("UPDATE table_user SET portemonnaie=portemonnaie+10 WHERE id=".$id_secu_user."");

echo $retour;
}
elseif($_GET['action'] == 3)
{

$xp_force = rand(1, 5);
$xp_agilite = rand(10, 15);
$xp_intelligence = rand(5, 15);
$xp_respect = rand(1, 5);

$echo_xp_force = $xp_force/1000;
$echo_xp_agilite = $xp_agilite/1000;
$echo_xp_intelligence = $xp_intelligence/1000;
$echo_xp_respect = $xp_respect/1000;

mysql_query("UPDATE table_user SET carac_force=carac_force+".$xp_force." WHERE id=".$id_secu_user."");
mysql_query("UPDATE table_user SET carac_agilite=carac_agilite+".$xp_agilite." WHERE id=".$id_secu_user."");
mysql_query("UPDATE table_user SET carac_intelligence=carac_intelligence+".$xp_intelligence." WHERE id=".$id_secu_user."");
mysql_query("UPDATE table_user SET carac_respect=carac_respect+".$xp_respect." WHERE id=".$id_secu_user."");

echo 'Vous cuisinez, vous gagnez '.$echo_xp_force.' XP de force, '.$echo_xp_agilite.' XP d\'agilité, '.$echo_xp_intelligence.' d\'intelligence et '.$echo_xp_respect.' XP de respect.<a href="?page=taff&action=3"> Continuer de cuisiner (4 PA).</a>';

mysql_query("UPDATE table_user SET faim=faim+5 WHERE id='".$id_user_secu."'");
mysql_query("UPDATE table_user SET hygiene=hygiene-10 WHERE id='".$id_user_secu."'");
	
mysql_query("UPDATE table_user SET pa=pa-4 WHERE id=".$id_secu_user."");
mysql_query("UPDATE table_user SET portemonnaie=portemonnaie+10 WHERE id=".$id_secu_user."");

echo $retour;
}
else
{

?>Travailler : 
<blockquote>
  <p>-<a href="?page=taff&amp;action=1">Laver le linge</a> (4 PA) </p>
  <p>-<a href="?page=taff&amp;action=2">Peindre les batiments</a>  (4 PA) </p>
  <p>-<a href="?page=taff&amp;action=3">Cuisiner</a> (4 PA)</p>
</blockquote>
<p>A chaque travaux vous gagnerez 10 $B. </p>
<p><a href="?page=compte">Retour</a></p>
<p>
  <?
  }
}
else
{
if ($_GET['get'] == 'card')
{
?>
  <br />
  Il faut une carte de travail pour pouvoir travailler.
  <br />
  <br />
  <b>Obtenir une carte de travail</b>
  <br />
<table width="100%" border="0">
  <tr>
    <td><fieldset style="border-color:#7e5125">
      <legend><strong>Solution 1    : </strong></legend>
      <div>
        <div align="center">
          <p align="left">Acheter directement votre carte de travail : </p>
        </div>
				
		
		
<div align="center">
<br />






<table border="0" width="436" height="411" style="border: 1px solid #E5E3FF;" cellpadding="0" cellspacing="0">
 <tr>
  <td colspan="2" width="436">
   <table width="436" border="0" cellpadding="0" cellspacing="0">
    <tr height="27">
     <td width="127" align="left" bgcolor="#D0D0FD">
      <a href="http://www.allopass.com/?REDIRECT=presentation.php4&ADV=5052294" target="_blank"><img src="http://www.allopass.com/imgweb/common/access/logo.gif" width="127" height="27" border="0" alt="Allopass"></a>
     </td>
         <td width="309" align="right" bgcolor="#D0D0FD">
      <font style="font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; color: #000084; font-style : none; font-weight: bold; text-decoration: none;">
       Solution de micro paiement sécurisé<br>Securised micro payment solution
      </font>
     </td>
    </tr>
    <tr height="30">
     <td colspan="2" width="436" align="center" valign="middle" bgcolor="#F1F0FF">
      <font style="font-family: Arial, Helvetica, sans-serif; font-size: 9px; color: #000084; font-style : none; font-weight: bold; text-decoration: none;">
       Pour acheter ce contenu, insérez le code obtenu en cliquant sur le drapeau de votre pays
      </font>
      <br>
      <font style="font-family: Arial, Helvetica, sans-serif; font-size: 9px; color: #5E5E90; font-style : none; font-weight: bold; text-decoration: none;">
       To buy this content, insert your access code obtained by clicking on your country flag
      </font>
     </td>
    </tr>
        <tr height="2"><td colspan="2" width="436" bgcolor="#E5E3FF"></td></tr>
   </table>
  </td>
 </tr>
 <tr height="347">
  <td width="284">
   <iframe name="APsleft" width="284" height="347" frameborder="0" marginheight="0" marginwidth="0" scrolling="no" src="http://www.allopass.com/access/left.php4?LG=fr_uk&SITE_ID=110164&DOC_ID=310302&ADV=5052294"></iframe>
  </td>
  <td width="152">
   <iframe name="APsright" width="152" height="347" frameborder="0" marginheight="0" marginwidth="0" scrolling="no" src="http://www.allopass.com/access/right.php4?LG=fr_uk&SITE_ID=110164&DOC_ID=310302&ADV=5052294"></iframe>
  </td>
 </tr>
 <tr height="5"><td colspan="2" bgcolor="#D0D0FD" width="436"></td></tr>
</table>







<br />Vous ne pouvez acheter qu'une carte toute les 24h (heure réelle) par ip et par compte.	
      </div>
    </fieldset></td>
  </tr>
</table>




	<br />
	<table width="100%" border="0">
	
  <tr>
    <td><fieldset style="border-color:#7e5125">

      <legend><strong>Solution 2  : </strong></legend>
      <div>
	    <div align="left">Visitez le march&eacute; noir il y a de temps en temps des cartes de travail pour une valeur de 2000 $B environ. </div>
      </div>
    </fieldset></td></tr></table>

                   <?
}
else
{
?>
                   <br />
Il faut une carte de travail pour pouvoir travailler.
<br />
<br />
<b><a href="?page=taff&get=card">Obtenir une carte de travail</a></b><br />
<?
}
}


}else{
echo 'Vous avez trop faim pour pouvoir travailler, veuillez passer par la Cantine'.$retour_compte;
}

}
else
{
echo 'Vous n\'avez pas assez de PA pour venir ici.'.$retour_compte;
}

}
?>
    <br />
    <br />
    <?
}
elseif($statut == 'Mort' && $_SESSION['mdp'] == $mdp_secu)
{
echo '<SCRIPT LANGUAGE="JavaScript">
document.location.href="?page=mort" /* vous pouvez aussi mettre http://www.monsite.com */
</SCRIPT>';
}
elseif($statut == 'Evadé' && $_SESSION['mdp'] == $mdp_secu)
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
    </blockquote>
                 </p>
