<? session_start();?>

<?
include("db.php");
?>
<style type="text/css">
<!--
.style1 {
	color: #BBBBBB;
	font-weight: bold;
}
-->
</style>

<span class="titre">>>> CLASSEMENT</span><br />
<br />
<form id="form1" name="form1" method="post" action="?page=classement&search=1">
  Rechercher un prisonnier : 
  <label>
  <input type="text" name="playername" />
  </label>
  <label>
  <input type="submit" name="Submit" value="Rechercher" />
  </label>
</form>
<br />
<br />

<?
if($_GET['search'] == 1)
{

$player_name = htmlentities($_POST['playername']);



$reponse2 = mysql_query("SELECT * FROM table_user WHERE statut='Prisonnier' ORDER BY carac_force+carac_intelligence+carac_agilite+carac_respect DESC"); 
				while ($donnees2 = mysql_fetch_array($reponse2))
		{
		$joueur = strtolower($donnees2['login']);
		
		$id1 = $donnees2['id'];
		
		$i++;
		$array[$i] = $joueur;


		}
		


$reponse1 = mysql_query("SELECT * FROM table_user WHERE login='".$player_name."' AND statut='Prisonnier' ORDER BY carac_force+carac_intelligence+carac_agilite+carac_respect DESC"); 
				while ($donnees1 = mysql_fetch_array($reponse1) )
		{
		$id = $donnees1['id'];
		$joueurs = $donnees1['login'];
		$nom_rpg = $donnees1['nom_rpg'];
		$nom_rpg  = strtoupper($nom_rpg);
		$prenom_rpg = $donnees1['prenom_rpg'];
		$carac_force = $donnees1['carac_force'];
		$carac_intelligence = $donnees1['carac_intelligence'];
		$carac_agilite = $donnees1['carac_agilite'];
		$carac_respect = $donnees1['carac_respect'];
		$niveau = ($carac_force + $carac_intelligence + $carac_agilite + $carac_respect)/1000 - 9;
		$niveau = floor($niveau);
		$firstlettre = $joueurs[0];
		
		
if($joueurs = $player_name)
{

?>
<table width="100%" border="0" cellpadding="1">
  <tr>
    <td width="15%"><span class="style1">Classement</span></td>
    <td width="25%"><span class="style1">Prisonnier</span></td>
    <td width="15%"><span class="style1">Niveau</span></td>
    <td width="10%"><span class="style1">Force</span></td>
    <td width="10%"><span class="style1">Agilité</span></td>
    <td width="10%"><span class="style1">Intelligence</span></td>
    <td width="10%"><span class="style1">Respect</span></td>
    <td width="10%"><span class="style1">N&deg;</span></td></tr>
<tr><td width="15%"><? 

$retour = mysql_query("SELECT COUNT(*) AS id FROM table_user");
$donnees = mysql_fetch_array($retour);
$nbre_entre = $donnees['id'];

$i = 1;


$position = array_search($player_name, $array);
echo $position;

	
	?></td>
    <td width="25%"><? echo '<b>'.$joueurs.'</b>'; ?></td>
    <td width="15%"><? echo $niveau; ?></td>
    <td width="10%"><? echo floor($carac_force/1000); ?></td>
    <td width="10%"><? echo floor($carac_agilite/1000); ?></td>
    <td width="10%"><? echo floor($carac_intelligence/1000); ?></td>
    <td width="10%"><? echo floor($carac_respect/1000); ?></td>
    <td width="10%"><? echo $id; ?></td>

<?	
}
?>
<?





}
if($joueurs == NULL)
{
echo "<table>Ce prisonnier n'existe pas.<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />";
}
}
else
{
?>

<table width="100%" border="0" cellpadding="1">
  <tr>
    <td width="15%"><span class="style1">Classement</span></td>
    <td width="25%"><span class="style1">Prisonnier</span></td>
    <td width="15%"><span class="style1">Niveau</span></td>
    <td width="10%"><span class="style1">Force</span></td>
    <td width="10%"><span class="style1">Agilité</span></td>
    <td width="10%"><span class="style1">Intelligence</span></td>
    <td width="10%"><span class="style1">Respect</span></td>
    <td width="10%"><span class="style1">N&deg;</span></td></tr>

<?



$p = htmlentities($_GET['p']*20);


$a = $p; 
$b = $a + 20;
$i = $a + 1; 


$reponse1 = mysql_query("SELECT * FROM table_user WHERE statut='Prisonnier' ORDER BY carac_force+carac_intelligence+carac_agilite+carac_respect DESC LIMIT $a , 20"); 
				while ($donnees1 = mysql_fetch_array($reponse1) )
		{
		$id = $donnees1['id'];
		$joueurs = $donnees1['login'];
		$nom_rpg = $donnees1['nom_rpg'];
		$nom_rpg  = strtoupper($nom_rpg);
		$prenom_rpg = $donnees1['prenom_rpg'];
		$carac_force = $donnees1['carac_force'];
		$carac_intelligence = $donnees1['carac_intelligence'];
		$carac_agilite = $donnees1['carac_agilite'];
		$carac_respect = $donnees1['carac_respect'];
		$niveau = ($carac_force + $carac_intelligence + $carac_agilite + $carac_respect)/1000 - 9;
		$niveau = floor($niveau);
		

?>

    <td width="15%"><? echo $i++; ?></td>
    <td width="25%"><? echo '<b>'.$joueurs.'</b>'; ?></td>
    <td width="15%"><? echo $niveau; ?></td>
    <td width="10%"><? echo floor($carac_force/1000); ?></td>
    <td width="10%"><? echo floor($carac_agilite/1000); ?></td>
    <td width="10%"><? echo floor($carac_intelligence/1000); ?></td>
    <td width="10%"><? echo floor($carac_respect/1000); ?></td>
    <td width="10%"><? echo $id; ?></td>
  </tr>


<?	
	
		}
$retour = mysql_query("SELECT COUNT(*) AS id FROM table_user");
$donnees = mysql_fetch_array($retour);

?>
<br>
<?


$nbre_entré = $donnees['id'];



}

mysql_close();
?>
</table><br>Page :
<?

for($d = 0; $j < $nbre_entré ; $j++ )
{
if( !($j%20) )
echo '<a href="index.php?page=classement&p='.($j/20).'">'.($j/20+1).'</a> | ' ;
}

?>
