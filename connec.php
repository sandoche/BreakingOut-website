<? session_start();
if( empty($_SESSION['login']) )
{
include("pages/login1.php");
}
else
{

include("db.php");

$retour = mysql_query("SELECT COUNT(*) AS id FROM connectes_ip WHERE timestamp+120 >= ".time()." AND lieu=1");
$donnees123 = mysql_fetch_array($retour);
$connec = $donnees123['id'];
?>
<head>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
a:link {
	color: #FF0066;
	text-decoration: none;
}
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #EAEAEA;
	background-color: #1b1b1b;
}
a:visited {
	text-decoration: none;
	color: #FF0066;
}
a:hover {
	text-decoration: none;
	color: #FF9900;
}
a:active {
	text-decoration: none;
	color: #FF0066;
}
.abc{
	background-image: url(images/design_03.png);
	background-repeat: no-repeat;
	
}
#Layer1 {
	position:absolute;
	width:100%;
	height:103px;
	z-index:1;
	left: 0;
	top: 50px;
}
.abcd:hover{
	background-image: url(images/hover.png);
}
.abcd2:hover{
	background-image: url(images/hover1.png);
}
.Style4 {font-size: 12px}
#Layer2 {
	position:absolute;
	width:100%;
	height:100px;
	z-index:1;
	visibility: hidden;
	top: 50px;
}
-->
</style>
<?
if($connec > 1)
{
echo 'Il y a '.$connec.' connectés :';
}else {
echo 'Il y a '.$connec.' connecté :';
}

echo '<br />';

if($_GET['i'] == 2)
{
echo '<meta http-equiv="Refresh" content="20;connec.php" />';

}
else
{
echo '<SCRIPT LANGUAGE="JavaScript">
document.location.href="connec.php?i=2" /* vous pouvez aussi mettre http://www.monsite.com */
</SCRIPT>';
}

	 $reponse = mysql_query("SELECT * FROM connectes_ip WHERE timestamp+120 >= ".time()." AND lieu=1"); 
		while ($donnees = mysql_fetch_array($reponse) )
		{
		echo ''.$donnees['mec1'].' | ';
		}



}
?>
</head>
