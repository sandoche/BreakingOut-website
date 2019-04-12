<? session_start();
?>
<html>
<head>
<noscript>
<meta http-equiv="Refresh" content="0;URL=http://www.allopass.com/check/error_code.php4?DOC_ID=310302&SITE_ID=110164">
</noscript>
<script type="text/javascript" language="Javascript" src="http://www.allopass.com/check/chk.php4?IDD=310302&IDS=110164"></script>
<title>Carte de travail</title>
</head>
<?

include("db.php");

$can1 = 0;
$can2 = 0;
$ip = $_SERVER["REMOTE_ADDR"];	



$reponsea = mysql_query("SELECT * FROM table_pi_card WHERE ip='".$_SERVER["REMOTE_ADDR"]."' AND timestamp+86400>".time()."");
		
		while ($donneesa = mysql_fetch_array($reponsea) )
		{
		$can1++;	
		}
		
$reponse2 = mysql_query("SELECT * FROM table_pi_card WHERE id_user='".htmlentities($_SESSION['id_user_secu'])."' AND timestamp+86400>".time()."");
		
		while ($donnees2 = mysql_fetch_array($reponse2) )
		{
		$can2++;	
		}

		

if($can1 == 0 && $can2 == 0)
{


	include("db.php");
	
$ip = $_SERVER["REMOTE_ADDR"];	
	
mysql_query("INSERT INTO table_pi_card VALUES ('', '".htmlentities($_SESSION['id_user_secu'])."', '".htmlentities($_SESSION['login'])."', '".$ip."', '".time()."')");
	
$nom_objet = 'Carte de travail';
$force = 0;
$agilite = 0;
$intelligence = 0;
$respect = 1000;
$prix = 1600;
$danger = 0;
$volable = 0;
$champsupp1 = '';
$champsupp2 = '';
$champsupp3 = '';

echo $can1.'<br />'.$can2;

mysql_query("INSERT INTO table_object VALUES ('', '".$nom_objet."',  '".$force."',  '".$agilite."',  '".$intelligence."',  '".$respect."',  '".$prix."',  '".$danger."',  '".$_SESSION['login']."',  '".$volable."', '', '', '')");

echo '<script type="text/javascript">
window.location.href="http://www.breakingout.fr/index.php?page=taff&get=card" 
</script>';

}
else
{
echo '<script type="text/javascript">
window.location.href="http://www.breakingout.fr/index.php?page=error" 
</script>';
}

?> 