<? session_start();

include("db.php");

$retour = '<br /><br /><a href="index.php?page=gangs">Retour</a>';
?>
<style type="text/css">
<!--
.style1 {
	color: #000000;
	font-weight: bold;
}
.style3 {color: #BBBBBB}
.style7 {color: #BBBBBB; font-weight: bold; }
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #EAEAEA;
	background-color:#1b1b1b;
}
-->
</style>
<br />
<br />
<p align="center">
  <?

if($_GET['id'] != NULL)
{



$id = $_GET['id'];

		$reponse1 = mysql_query("SELECT * FROM table_gang WHERE id='".$id."'"); 
				while ($donnees1 = mysql_fetch_array($reponse1) )
		{
		$id = $donnees1['id'];
		$date = $donnees1['date'];
		$nom = $donnees1['nom'];
		$chef = $donnees1['chef'];
		$recrutement  = $donnees1['recrutement'];
		$points  = $donnees1['points'];
		$description = $donnees1['description'];
		}

$retour1 = mysql_query("SELECT COUNT(*) AS id FROM table_user WHERE gang='".$nom."'");	
	$donnees1 = mysql_fetch_array($retour1);
	$membres = $donnees1['id'];	

function jour_prison($var)
{
$jour = floor($var/21600);
echo 'Jour '.$jour;
}


?>
  
<p><span class="style3">Cr&eacute;&eacute; le <? 
echo jour_prison($date);
	  ?></span><br />
Son responsable est <strong><? echo $chef; ?></strong></p>
<p><strong>Description :</strong>
<? echo $description; ?></p><br />
<p>Ce gang comporte <strong><? echo $membres; ?></strong> membres :</p>
<table width="100%" border="0">
  <tr>
    <td width="37%" align="left" valign="top"><span class="style7">Pseudo du joueur</span></td>
	<td width="30%" align="left" valign="top"><span class="style3"><strong>Type</strong></span></td>
    <td width="12%" align="left" valign="top"><span class="style3"><strong>N&deg;ID</strong></span></td>
    <td width="13%" align="left" valign="top"><span class="style3"><strong>Niveau</strong></span></td>
	<td width="8%" align="left" valign="top"><span class="style3"><strong>Infos</strong></span></td>
  </tr>

<?
$reponse2 = mysql_query("SELECT * FROM table_user WHERE gang='".$nom."'"); 
				while ($donnees2 = mysql_fetch_array($reponse2) )
		{
		$carac_force = $donnees2['carac_force'];
		$carac_agilite = $donnees2['carac_agilite'];
		$carac_intelligence = $donnees2['carac_intelligence'];
		$carac_respect = $donnees2['carac_respect'];

?>
  <tr>
    <td width="37%" align="left" valign="top"><? echo $donnees2['login']; ?></td>
	<td width="30%" align="left" valign="top"><? echo $donnees2['delit']; ?></td>
    <td width="12%" align="left" valign="top"><? echo $donnees2['id']; ?></td>
    <td width="13%" align="left" valign="top"><? $niveau = ($carac_force+$carac_agilite+$carac_intelligence+$carac_respect-9000)/1000;
echo floor($niveau); ?></td>
	<td width="8%" align="left" valign="top"><a href="view_player.php?id=<? echo $donnees2['id']; ?>" target="_blank" >Voir</a></td>
  </tr>
<?	
}

$reponse2 = mysql_query("SELECT * FROM table_user WHERE gang='_".$nom."'"); 
				while ($donnees2 = mysql_fetch_array($reponse2) )
		{
		$carac_force = $donnees2['carac_force'];
		$carac_agilite = $donnees2['carac_agilite'];
		$carac_intelligence = $donnees2['carac_intelligence'];
		$carac_respect = $donnees2['carac_respect'];


?>
  <tr>
    <td width="37%" align="left" valign="top"><? echo $donnees2['login'].' (en attente de validation)'; ?></td>
	<td width="30%" align="left" valign="top"><? echo $donnees2['delit']; ?></td>
    <td width="12%" align="left" valign="top"><? echo $donnees2['id']; ?></td>
    <td width="13%" align="left" valign="top"><? $niveau = ($carac_force+$carac_agilite+$carac_intelligence+$carac_respect-9000)/1000;
echo floor($niveau); ?></td>
	<td width="8%" align="left" valign="top"><a href="view_player.php?id=<? echo $donnees2['id']; ?>" target="_blank" >Voir</a></td>
  </tr>
<?
}
?>

</table><br />
<?

	 
echo "<br /><br />";
	 

}
else
{
echo "Ce gang n'existe pas.";
}




mysql_close();
?>
