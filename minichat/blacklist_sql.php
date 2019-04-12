<?php session_start(); ?>
<?php


if( empty($_SESSION['login']) )
{
include("../pages/login1.php");
}
else
{

if($_SESSION['login']!= "sakenplet" )
{
 echo"<head><SCRIPT LANGUAGE='JavaScript'>

	document.location.href = 'http://www.nitrotuning.free.fr/';
	
</SCRIPT></head>";

}

include("db.php");

	
       	$id_membre=htmlentities($HTTP_GET_VARS['id']);


      

  // Ensuite on enregistre le message
        mysql_query("INSERT INTO blacklist_minichat VALUES('$id_membre')");

        // On se déconnecte de MySQL
        mysql_close();
		
	echo"<script type='text/javascript'>
window.setTimeout(\"location=('minichat.php#last');\",0)
</script>";

    
}

?>



