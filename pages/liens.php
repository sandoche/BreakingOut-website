<?
include("db.php");

if($_GET['id'] != NULL)
{
$reponse = mysql_query("SELECT * FROM table_lien WHERE id=".htmlentities($_GET['id']).""); 
while ($donnees = mysql_fetch_array($reponse) )
{
$donnees['url'];

mysql_query("UPDATE table_lien SET visites=visites+1 WHERE id=".htmlentities($_GET['id']).""); 

echo '<SCRIPT LANGUAGE="JavaScript">
document.location.href="'.$donnees['url'].'" /* vous pouvez aussi mettre http://www.monsite.com */
</SCRIPT>';
}
}

?>
<center>
<table width="410" cellpadding="10" height="25" bordercolor="#000066" align="left" cellspacing="0" id="table3">

<?
include("db.php");

$reponse = mysql_query("SELECT * FROM table_lien"); 



while ($donnees = mysql_fetch_array($reponse) )
{
?>

<tr>

<td onMouseOut="javascript:this.style.background=''" onMouseOver="javascript:this.style.background='#333333'" class="menu" height="19">
<b><a href='?page=liens&id=<? echo $donnees['id']; ?>' target='_blank'><? echo $donnees['nom']; ?></a></b> : <? echo $donnees['description']; ?> </td>

<?
}

mysql_close(); 
?>
</tr>
</table>
</center>