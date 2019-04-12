<? session_start();?>
<?
if( empty($_SESSION['login']) )
{
include("login1.php");
}
else
{


		
if($statut == 'Prisonnier'  && $_SESSION['mdp'] == $mdp_secu)
{		
		
if($time_trou > $secondesupp)
{
?>
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

$retour_x = '<br /><br /><a href="?page=cour&action=baston">Retour</a>';
?>

<p>Bienvenue au marché noir <? $nom_rpg  = strtoupper($nom_rpg);
echo $nom_rpg.' '.$prenom_rpg; ?>, (<? echo htmlentities($_SESSION['login']); ?>) prisonnier N°<? echo $id; ?>
<?
if($pa >= 0)
{

?><br /><br />
<b>Baston générales :</b>
Participer - <a href="?page=cour&action=baston&baston_page=1">Organiser</a> - Resultats
<br /><br />
<?
if($_GET['baston_page'] == 1){

if($niveau >= 0){

?>
####################

<?

}else{
echo 'Il faut un niveau minimum général de 30 pour pouvoir organiser une baston général.'.$retour_x;
}

}
?>





<?



}
else
{
echo '<br /><br />Vous n\'avez pas assez de PA pour effectuer cette action.<br /><br /><a href="?page=compte">Retour</a>';
}

?>
 <br /><br />
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
 

}
?>