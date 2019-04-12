<?php
session_start();

include("pages/config.php");

if( empty($_SESSION['login']) )
{
	echo '<SCRIPT LANGUAGE="JavaScript">
document.location.href="index.php" /* vous pouvez aussi mettre http://www.monsite.com */
</SCRIPT>';
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
		$time_trou = $donnees1['time_trou'];
		$statut = $donnees1['statut'];
		$mdp_secu = $donnees1['mdp'];
	}

	if($statut == 'Prisonnier' && $_SESSION['mdp'] == $mdp_secu)
	{		
		
		if($time_trou > $secondesupp)
		{ 
?>
<table border=0><tbody><tr><td width=8 style='background-color:#f3e8dd'></td><td width=273 style='background-color:#ececec'><b><font color=#845d29>T</font>R<font color=#845d29>O</font>U</b></td></tr></tbody></table><br />
<br />
<p>Bienvenue au TROU <?php $nom_rpg  = strtoupper($nom_rpg);
echo $nom_rpg.' '.$prenom_rpg; ?>, (<?php echo htmlentities($_SESSION['login']); ?>) prisonnier N°<?php echo $id; ?>
<br /><br />Vous y resterez jusqu'au
<?php
			  $secondesupp1 = $time_trou;
			  
			  $jour1 = floor($secondesupp1/21600);
$heuresensec1 = fmod($secondesupp1, 21600);
$heures1 = floor($heuresensec1/900);
$minutesensec1 = fmod($heuresensec1, 900);
$minutes1 =  floor($minutesensec1/15);

echo ' jour '.$jour1.' à '.$heures1.'h'.$minutes1.'.';



include("pages/trou.php");
			  ?>

<?php
}
else
{

?>



		
<style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
}
a:link {
	color: #7e5125;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #7e5125;
}
a:hover {
	text-decoration: none;
	color: #cc0000;
}
a:active {
	text-decoration: none;
	color: #7e5125;
}


		
		.ligneMap {
        height: 15px;
        clear: left;
}
.caseMap {
        width: 15px;
        height: 15px;
        /*background-image: url('images/fond.png');*/
                padding-bottom: 5px;
}
#map
{
        border-collapse:collapse;
}
-->
</style>
<script type="text/javascript">
function h_shLayer(n,e,contenu){//v1.0 2002-2003 Copyright www.hiwit.org
	if (document.getElementById){
		document.getElementById(n).style.visibility=e;
		document.getElementById(n).innerHTML = "<p align=\"right\"  ><a href=\"#\" onmouseover=\"h_shLayer('Layer1','hidden','','')\">Fermer</a></p><p align=\"left\" style='padding: 12px;'>" + contenu + "</p>";
	}
	else
	{  
		document.all[n].style.visibility=e;
		document.all[n].innerHTML = "<p align=\"right\"><a href=\"#\" onmouseover=\"h_shLayer('Layer1','hidden','','')\">Fermer</a></p><p align=\"left\">" + contenu + "</p>";
	}
}
</script>
    </head>
 
	
		
<body marginwidth="0" marginheight="0" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">




<?php
$ip = $_SERVER["REMOTE_ADDR"];
mysql_query("DELETE FROM connectes_ip WHERE mec1='".htmlentities($_SESSION['login'])."' AND lieu=4");
mysql_query("INSERT INTO connectes_ip VALUES ('', '".htmlentities($_SESSION['login'])."', '4', '4', '".$ip."', '".time()."', '0', '0', '0', '0')");

map();
?>
<div id="Layer1"></div>	
<?php
}

mysql_close();

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


}
?>