<? session_start();
?>
<html>
<head>
<noscript>
<meta http-equiv="Refresh" content="0;URL=http://www.allopass.com/check/error_code.php4?DOC_ID=366131&SITE_ID=110164">
</noscript>
<script type="text/javascript" language="Javascript" src="http://www.allopass.com/check/chk.php4?IDD=366131&IDS=110164"></script>
<title>Soudoyer un garde</title>
</head>
<?

include("db.php");

$can1 = 0;
$can2 = 0;
$ip = $_SERVER["REMOTE_ADDR"];	



$reponsea = mysql_query("SELECT * FROM table_soudoyeur WHERE ip='".$_SERVER["REMOTE_ADDR"]."' AND timestamp+86400>".time()."");
		
		while ($donneesa = mysql_fetch_array($reponsea) )
		{
		$can1++;	
		}
		
$reponse2 = mysql_query("SELECT * FROM table_soudoyeur WHERE id_user='".htmlentities($_SESSION['id_user_secu'])."' AND timestamp+86400>".time()."");
		
		while ($donnees2 = mysql_fetch_array($reponse2) )
		{
		$can2++;	
		}

		

if($can1 == 0 && $can2 == 0)
{


	include("db.php");
	
$ip = $_SERVER["REMOTE_ADDR"];	
	
mysql_query("INSERT INTO table_soudoyeur VALUES ('', '".htmlentities($_SESSION['id_user_secu'])."', '".htmlentities($_SESSION['login'])."', '".$ip."', '".time()."')");
	

mysql_query("UPDATE table_user SET time_trou=0 WHERE id=".htmlentities($_SESSION['id_user_secu'])."");

echo '<script type="text/javascript">
window.location.href="http://www.breakingout.fr/index.php?page=compte" 
</script>';

}
else
{
echo '<script type="text/javascript">
window.location.href="http://www.breakingout.fr/index.php?page=error1" 
</script>';
}

?> 