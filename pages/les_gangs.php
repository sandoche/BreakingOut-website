<? session_start();
?>

<span class="titre">>>> GANGS</span><br /><br />
<p align="center"><a href="?page=gangs&create=1">Cr&eacute;er un gang</a>  - <a href="?page=gangs">Liste des gangs</a> </p>
<?
if($_GET['create'] == 1) //Formulaire
{
if( empty($_SESSION['login']) )
{
echo "Vous devez être identifié pour créer un gang.<br>";
include("login1.php");
}
else
{

?>
<center>
<table width="100%" border="0">
  <tr>
    <td><form id="form1" name="form1" method="post" action="?page=gangs&create=2"><center>
      <table width="100%" border="0">
        <tr>
          <td width="49%" align="left" valign="top">Nom du gang (80 caract&egrave;res max) </td>
          <td width="51%"><label>
            <input type="text" name="nom" />
          </label></td>
        </tr>
		  <tr>
          <td align="left" valign="top">Description (255 caract&egrave;res max)</td>
          <td><label>
            <textarea name="description" cols="25" rows="5"></textarea>
          </label></td>
        </tr>
		  <tr>
          <td align="left" valign="top">&nbsp;</td>
          <td><label>
            <input type="submit" name="Submit" value="Créer" />
          </label></td>
        </tr>
      </table>
      <p>
    </center>
    </form>
    </td>
  </tr>
</table>
</center>
<?
}
}
elseif($_GET['create'] == 2)
{

include("db.php");

		$reponse2 = mysql_query("SELECT * FROM table_user WHERE login='".htmlentities($_SESSION['login'])."'"); 
				while ($donnees2 = mysql_fetch_array($reponse2) )
		{
		$crew = $donnees2['gang'];
		$statut = $donnees2['statut'];
		}

if($crew == '0')
{
		
if($_POST['nom'] != NULL && $_POST['description'] != NULL && $statut == 'Prisonnier')
{
$can == 0;

$reponse1 = mysql_query("SELECT * FROM table_gang WHERE nom='".$nom."'");
		
		while ($donnees1 = mysql_fetch_array($reponse1) )
		{
		$donnemin = strtolower($donnees1['nom']);
		$nommin = htmlentities(strtolower($_POST['nom']));
		$donnemin = htmlentities($donnemin);
		$nommin = htmlentities($nommin);
		
		if($donnemin == $nommin)
		{
		$can++;
		}
		
		}

if(can == 0)
{

$nom = htmlentities($_POST['nom']);
$date = $secondesupp;
$chef = htmlentities($_SESSION['login']);
$recrutement = 1;
$points = 0;
$description = htmlentities($_POST['description']);
$membres = 0;
$champsupp1 = 0;

$nom = stripslashes($nom);

$reponse1 = mysql_query("UPDATE table_user SET gang='".$nom."' WHERE login='".htmlentities($_SESSION['login'])."'");
$reponse2 = mysql_query("INSERT INTO table_gang VALUES('', '".$nom."', '".$date."', '".$chef."', '".$recrutement."', '".$points."', '".$description."', '".$membres."', '".$champsupp1."')"); 

if( !$reponse1 )   {echo("Vous avez mis un caractère interdit.<br /><br /><a href='?page=gangs&create=1'>Retour</a>");}
elseif( !$reponse2 )   {echo("Erreur 2");}
else
{

echo "Le gang a été créé vous pouvez administrer votre gang en cliquant sur administrer (en étant déjà identifié) en bas de la page de votre gang.<br />
Vous receverez un emails à chaque fois qu'un joueur voudra entrer dans votre gang. Vous pourrez ensuite l'accepter ou refuser en vous connectant à votre panneau d'aministration du gang.<br /><br /><a href='?page=gangs'>Retour</a>";
}

}else{
echo "Le nom de votre gang a déjà été choisi.<br /><br /><a href='?page=gangs&create=1'>Retour</a>";
}

}


else
{
echo "Un de vos champs est vide.<br /><br /><a href='?page=gangs&create=1'>Retour</a>";
}

}
else
{
echo "Vous avez déjà un gang pour en créer un veuillez vous y désinscrire auparavant.<br /><br /><a href='?page=gangs&create=1'>Retour</a>";
}



}else{

include("db.php");

//Enlever le html lors de la lecture de la description !
?>
<center>
  <table width="100%" border="0">
    <tr>
      <td width="40%"><strong>Nom du gang </strong></td>
      <td width="27%"><strong>Date de cr&eacute;ation </strong></td>
      <td width="11%"><strong> Membres </strong></td>
      <td width="11%"><strong>Recrute?</strong></td>
	  <td width="11%"><strong>Respect</strong></td>
    </tr>
  
<?

$reponse9 = mysql_query("SELECT * FROM table_gang"); 
while ($donnees9 = mysql_fetch_array($reponse9) )

{

?>
    <tr>
      <td width="47%"><a href="?page=gang&id=<? echo $donnees9['id']; ?>"><? echo stripslashes($donnees9['nom']); ?></a></td>
      <td width="20%"><? $date = $donnees9['date'];
echo jour_prison($date);
	  ?></td>
      <td width="11%"><? 
	  $nom = $donnees9['nom'];
	$retour1 = mysql_query("SELECT COUNT(*) AS id FROM table_user WHERE gang='".$nom."'");	
	$donnees1 = mysql_fetch_array($retour1);
	$membres = $donnees1['id'];	
	echo $membres;
	?></td>
      <td width="11%"><?
	  if($donnees9['recrutement'] == 1)
	  {
echo "<img src='images/dot_green.gif' />";
	  }
	  elseif($donnees9['recrutement'] == 2)
	  {
echo "<img src='images/dot_orange.gif' />";	  
	  }
	  else
	  {
echo "<img src='images/dot_red.gif' />";	  
	  }
	  ?></td>
	  <td width="11%"><? echo $donnees9['points']; ?></td>
    </tr>
<?

}
?>
</table>
</center>
<?

mysql_close();
}


?>
