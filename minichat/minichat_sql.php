<?php session_start(); ?>
<?php



if( empty($_SESSION['login']) )
{
include("../pages/login1.php");
}
else
{

include("db.php");

	
	$ip_adresse = $_SERVER['REMOTE_ADDR'];
        // On utilise la fonction PHP htmlentities pour éviter d'enregistrer du code HTML dans la table
        $message = htmlentities (addslashes($_POST['message']));
       	$id = 0;

	$pseudo = htmlentities ($_SESSION['login']);

      /*
  // Ensuite on enregistre le message
$req_blist="select * from blacklist_minichat where id_membre='$id_membre'"; 
$result_blist = mysql_query($req_blist);
$blist=mysql_num_rows($result_blist);

$flood2=0;
$blist = 0;

// GESTION DU FLOOD
if($_SESSION['login']!= "sakenplet" ) 
{
$req_flood1="select MAX(id) from minichat"; 
$result_flood1 = mysql_query($req_flood1);
$idmax = mysql_fetch_row($result_flood1);
 
       $req_flood2="select * from minichat where id='$idmax[0]' AND id_membre='$id_membre'"; 
$result_flood2 = mysql_query($req_flood2);
$flood2=mysql_num_rows($result_flood2);
}
// FIN GESTION DU FLOOD


if(($blist==0) && ($flood2==0))
{
*/
 mysql_query("INSERT INTO minichat VALUES('', '$id_membre', '$pseudo', '$message', '$ip_adresse')");

        // On se déconnecte de MySQL
        mysql_close();
		
	echo"<script type='text/javascript'>
window.setTimeout(\"location=('minichat.php');\",0)
</script>";
/*
else
{
	echo"<script type='text/javascript'>
window.setTimeout(\"location=('minichat.php');\",0)
</script>";

*/



}


?>



