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
-->
</style>

<body>
<span class="titre">>>> GANGS</span>
<p align="center"><a href="index.php?page=gangs&create=1">Cr&eacute;er un gang</a>  - <a href="index.php?page=gangs">Liste des gangs</a> </p>
<p><br />

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
		
if($_GET['admin'] == "espace_admin_reserve_chef_de_gang")
{

$chef = strtolower($chef);
$chef182 = strtolower($_SESSION['login']);

if($chef == $chef182)
{



if($_GET['action'] == 1) //Accepter
{

$reponse2 = mysql_query("SELECT * FROM table_user WHERE id=".htmlentities($_GET['player']).""); 
				while ($donnees2 = mysql_fetch_array($reponse2) )
		{
		$player_a_acc = $donnees2['login'];
		}

mysql_query("UPDATE table_user SET gang='".$nom."' WHERE login='".$player_a_acc."'");
	
	echo $player_a_acc.' a bien été accepté au sein du gang.<br /><br />';
	
	echo '<a href="index.php?page=gang&id='.$id.'&admin=espace_admin_reserve_chef_de_gang">Retour</a>';


}
elseif($_GET['action'] == 2) //Renvoyer
{

$reponse2 = mysql_query("SELECT * FROM table_user WHERE id=".htmlentities($_GET['player']).""); 
				while ($donnees2 = mysql_fetch_array($reponse2) )
		{
		$player_a_renvoyer = $donnees2['login'];
		$actif = $donnees2['champsuppd'];
		}
		
$chef1 = strtolower($chef);
$login1 = strtolower($player_a_renvoyer);

	if($chef1 != $login1)
	{

	if($actif == 0)
	{
	
	mysql_query("UPDATE table_user SET gang='0' WHERE login='".$player_a_renvoyer."'");
	
	echo $player_a_renvoyer.' a bien été renvoyé du gang.<br /><br />';
	
	//$reponse123 = mysql_query("UPDATE table_gangs SET membres=membres-1 WHERE nom='".$nom."'");
	
	echo '<a href="index.php?page=gang&id='.$id.'&admin=espace_admin_reserve_chef_de_gang">Retour</a>';
	}
	else
	{
	echo 'Ce prisonnier ne peut pas être renvoyé du gang car il a activé votre gang pour s\'évader.<br /><br />';
	echo '<a href="index.php?page=gang&id='.$id.'&admin=espace_admin_reserve_chef_de_gang">Retour</a>';
	}
	}
	
else
{
echo "Le chef ne peut pas être renvoyé.";
}	
		
}
elseif($_GET['action'] == 3) // Changer description
{

if($_POST['description'] != NULL)
{

$new_description = htmlentities($_POST['description']);

$new_description = stripslashes($new_description); 
$new_description = htmlentities($new_description); 
$new_description = nl2br($new_description); 


$reponse1 = mysql_query("UPDATE table_gang SET description='".$new_description."' WHERE nom='".$nom."'");
if( !$reponse1 )   exit("Vous avez mis un caractère interdit.");


echo 'La description de votre gang a bien été changée.<br /><br />';
echo '<a href="index.php?page=gang&id='.$id.'&admin=espace_admin_reserve_chef_de_gang">Retour</a>';

}
else
{
echo "Veuillez remplir correctement les champs";
}


}
elseif($_GET['action'] == 4) //Changer type recrutement
{

if($_POST['recrutement'] != NULL)
{

echo "Votre choix a été mis à jour.<br /><br />";
$reponse1 = mysql_query("UPDATE table_gang SET recrutement='".htmlentities($_POST['recrutement'])."' WHERE nom='".$nom."'");

}

else
{
echo "Vous avez pas séléctionné de réponse.<br /><br />";
}
echo '<a href="index.php?page=gang&id='.$id.'&admin=espace_admin_reserve_chef_de_gang">Retour</a>';

}
elseif($_GET['action'] == 5) //Supprimer gang
{

if($_POST['delete'] == "OUI")
{


		$reponse1 = mysql_query("SELECT * FROM table_user WHERE login='".$_SESSION['login']."'"); 
				while ($donnees1 = mysql_fetch_array($reponse1) )
		{
		$actif = $donnees1['champsuppd'];
		}

if($actif == 0)
{

		$reponse5 = mysql_query("SELECT * FROM table_user WHERE gang='".$nom."'"); 
				while ($donnees5 = mysql_fetch_array($reponse5) )
		{
		$user = $donnees5['login'];
		mysql_query("UPDATE table_user SET gang='0' WHERE login='".$user."'");
		}
				$reponse5 = mysql_query("SELECT * FROM table_user WHERE gang='_".$nom."'"); 
				while ($donnees5 = mysql_fetch_array($reponse5) )
		{
		$user = $donnees5['login'];
		mysql_query("UPDATE table_user SET gang='0' WHERE login='".$user."'");
		}

		mysql_query("DELETE FROM `table_gang` WHERE `id` = $id");
		
	echo "Le gang a été supprimé.";
}
else
{
echo 'Vous avez activé votre gang pour l\'evasion, la suppression du gang est donc impossible.<br/><br/><a href="index.php?page=gang&id='.$id.'&admin=espace_admin_reserve_chef_de_gang">Retour</a>';
}	

}
else
{
echo "Le gang n'a pas été supprimé, vous avez mal recopié OUI.<br /><br />";

echo '<a href="index.php?page=gang&id='.$id.'&admin=espace_admin_reserve_chef_de_gang">Retour</a>';
}
}

else
{


echo 'Bienvenue dans votre espace admin, '.$_SESSION['login'];
?>

<script language="JavaScript" type="text/javascript">

/*function storeCaret(text)

{ // voided

}

*/

function AddText(startTag,defaultText,endTag) 

{

   with(document.poster)

   {

      if (description.createTextRange) 

      {

         var text;

         description.focus(description.caretPos);

         description.caretPos = document.selection.createRange().duplicate();

         if(description.caretPos.text.length>0)

         {

            //gère les espace de fin de sélection. Un double-click sélectionne le mot

            //+ un espace qu'on ne souhaite pas forcément...

            var sel = description.caretPos.text;

            var fin = '';

            while(sel.substring(sel.length-1, sel.length)==' ')

            {

               sel = sel.substring(0, sel.length-1)

               fin += ' ';

            }

            description.caretPos.text = startTag + sel + endTag + fin;

         }

         else

            description.caretPos.text = startTag+defaultText+endTag;

      }

      else description.value += startTag+defaultText+endTag;

   }

}

</script>




<p><strong>Description :</strong></p>

<form id="form1" name="poster" method="post" action="index.php?page=gang&id=<? echo $id; ?>&admin=espace_admin_reserve_chef_de_gang&action=3"> 
<? echo "


<P style=\"MARGIN-TOP:4px;\"><a href=\"javascript:AddText(':happy:','','');\"><img src=\"smiley/happy.gif\" border=\"0\"></a>

   <a href=\"javascript:AddText(':sad:','','');\"><img src=\"smiley/sad.gif\" border=\"0\"></a>

   <a href=\"javascript:AddText(':hehe:','','');\"><img src=\"smiley/hehe.gif\" border=\"0\"></a>

   <a href=\"javascript:AddText(':blink:','','');\"><img src=\"smiley/blink.gif\" border=\"0\"></a>

   <a href=\"javascript:AddText(':tirlang:','','');\"><img src=\"smiley/tirlang.gif\" border=\"0\"></a>

   <a href=\"javascript:AddText(':dry:','','');\"><img src=\"smiley/dry.gif\" border=\"0\"></a>

   <a href=\"javascript:AddText(':rolleyes:','','');\"><img src=\"smiley/rolleyes.gif\" border=\"0\"></a>

     <a href=\"javascript:AddText(':biggrin:','','');\"><img src=\"smiley/biggrin.gif\" border=\"0\"></a>

   <a href=\"javascript:AddText(':laugh:','','');\"><img src=\"smiley/laugh.gif\" border=\"0\"></a>

   <a href=\"javascript:AddText(':mad:','','');\"><img src=\"smiley/mad.gif\" border=\"0\"></a>

   <a href=\"javascript:AddText(':ph34r:','','');\"><img src=\"smiley/ph34r.gif\" border=\"0\"></a>

  <font face=verdana size=1> [<a href=\"javascript:AddText('[b]','','[/b]');\"><b>G</b></a> ] [ <a href=\"javascript:AddText('[u]','','[/u]');\"><u>S</u></a> ] [ <a href=\"javascript:AddText('[i]','','[/i]');\"><i>I</i></a> ]

";

?><br />Couleurs : 
<font face="verdana" size="1"> [<a href="javascript:AddText('[color=red]','','[/color]');"><b>Rouge</b></a>]
<font face="verdana" size="1"> [<a href="javascript:AddText('[color=green]','','[/color]');"><b>Vert</b></a>]
<font face="verdana" size="1"> [<a href="javascript:AddText('[color=blue]','','[/color]');"><b>Bleu</b></a>]
<font face="verdana" size="1"> [<a href="javascript:AddText('[color=yellow]','','[/color]');"><b>Jaune</b></a>]
<font face="verdana" size="1"> [<a href="javascript:AddText('[color=purple]','','[/color]');"><b>Violet</b></a>]
<font face="verdana" size="1" > [<a href="javascript:AddText('[color=olive]','','[/color]');"><b>Olive</b></a>]
<font face="verdana" size="1" > [<a href="javascript:AddText('[color=orange]','','[/color]');"><b>Orange</b></a>]


<form id="form2" name="form2" method="post" action="index.php?page=gang&id=<? echo $id; ?>&admin=espace_admin_reserve_chef_de_gang&action=3"> 
  <label>
  <textarea name="description" cols="50" rows="5"><? echo addslashes($description); ?></textarea>
  </label>
  <label> <br />
  <input type="submit" name="Submit2" value="Changer" />
  </label>

</form>
<form id="form3" name="form3" method="post" action="index.php?page=gang&id=<? echo $id; ?>&admin=espace_admin_reserve_chef_de_gang&action=4">
  Vous recrutez ? 
  <label>
  <input name="recrutement" type="radio" value="1" />
  </label>
  <label>
  Oui
  <input name="recrutement" type="radio" value="2" />
  Peut-&ecirc;tre
  </label>
  <label>
  <input name="recrutement" type="radio" value="3" />
  </label>
  Non
  <label> <br />
  <input type="submit" name="Submit3" value="Changer" />
  </label>
</form>
<p><br />
Votre gang comporte <strong><? echo $membres; ?></strong> membres :</p>
<table width="100%" border="0">
  <tr>
    <td width="37%" align="left" valign="top"><span class="style7">Pseudo du joueur</span></td>
	<td width="29%" align="left" valign="top"><span class="style7">Type</span></td>
    <td width="13%" align="left" valign="top"><span class="style3"><strong>N&deg;ID</strong></span></td>
    <td width="6%" align="left" valign="top"><span class="style3"><strong>Niveau</strong></span></td>
	<td width="15%" align="left" valign="top">&nbsp;</td>
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
	<td width="29%" align="left" valign="top"><? echo $donnees2['delit']; ?></td>
    <td width="13%" align="left" valign="top"><? echo $donnees2['id']; ?></td>
    <td width="6%" align="left" valign="top"><? $niveau = ($carac_force+$carac_agilite+$carac_intelligence+$carac_respect-9000)/1000;
echo floor($niveau); ?></td>
	<td width="15%" align="left" valign="top"><?
	
$chef1 = strtolower($chef);
$login1 = strtolower($donnees2['login']);

	if($chef1 == $login1)
	{
    echo 'Chef';
	}
	else
	{	
	echo '<a href="index.php?page=gang&id='.$id.'&admin=espace_admin_reserve_chef_de_gang&player='.$donnees2['id'].'&action=2">Renvoyer</a>';
	}
	
	?>	</td>
  </tr>
<?	
}

$reponse2 = mysql_query("SELECT * FROM table_user WHERE gang='_".$nom."'"); 
				while ($donnees2 = mysql_fetch_array($reponse2) )
		{
		$carac_vit = $donnees2['carac_vit'];
		$carac_acc = $donnees2['carac_acc'];
		$carac_tdr = $donnees2['carac_tdr'];
		$carac_man = $donnees2['carac_man'];


?>
  <tr>
    <td width="37%" align="left" valign="top"><? echo $donnees2['login'].' (en attente de validation)'; ?></td>
    <td width="29%" align="left" valign="top"><? echo $donnees2['delit']; ?></td>
	<td width="13%" align="left" valign="top"><? echo $donnees2['id']; ?></td>
    <td width="6%" align="left" valign="top"><? $niveau = ($carac_force+$carac_agilite+$carac_intelligence+$carac_respect-9000)/1000;
echo floor($niveau); ?></td>
	<td width="15%" align="left" valign="top"><? echo '<a href="index.php?page=gang&id='.$id.'&admin=espace_admin_reserve_chef_de_gang&player='.$donnees2['id'].'&action=1">Accepter</a>';?> - <? echo '<a href="index.php?page=gang&id='.$id.'&admin=espace_admin_reserve_chef_de_gang&player='.$donnees2['id'].'&action=2">Renvoyer</a>';?></td>
  </tr>
<?
}

?>

</table>
<br /><br /><br />
<form id="form4" name="form4" method="post" action="index.php?page=gang&id=<? echo $id; ?>&admin=espace_admin_reserve_chef_de_gang&action=5">
  <label> Supprimer le gang ? 

  <input type="text" name="delete" />
(Tappez OUI pour le supprimer) <br />
Attention cette op&eacute;ration est irr&eacute;versible tout les joueurs de votre gang se retrouverons sans gangs. <br />
  <input type="submit" name="Submit4" value="Supprimer" />
  </label>
</form>
<br />
<br />
<?
}
}

else
{
echo 'Cet espace est reservé au chef du gang.';
}


}
else
{		
		
if($_GET['post'] == 1)
{
if($recrutement  != 3)
{


$reponse2 = mysql_query("SELECT * FROM table_user WHERE login='".$_SESSION['login']."'"); 
				while ($donnees2 = mysql_fetch_array($reponse2) )
		{
		$statut = $donnees2['statut'];
		}

if($statut == 'Prisonnier')
{

$motiv = htmlentities($_POST['textfield']);

$enattente = '_'.$nom;


$reponse1 = mysql_query("UPDATE table_user SET gang='".$enattente."' WHERE login='".$_SESSION['login']."'");

//$reponse123 = mysql_query("UPDATE table_gangs SET membres=membres+1 WHERE nom='".$nom."'");


//envoyer un mail au chef
$joueura = $_SESSION['login'];

$reponse = mysql_query("SELECT * FROM table_user WHERE login='".$chef."'");
		
		while ($donnees = mysql_fetch_array($reponse) )
		{
		$to = $donnees['email'];
		}

	$from = 'no-reply@breakingout.com';
	$subject = 'Demande d\'adhésion à votre gang.';
	$Message = "Le prisonnier $joueura demande a faire parti de votre gang.
	
	Vous pouvez l'accepter ou le refuser en vous connectant dans le panneau d'administration de votre gang.
	
	Sa motivation est la suivante :
	$motiv
	
	http://www.breakingout.fr";
	$headers = $from;

	mail($to, $subject, $Message);

echo "<br />Votre demande a bien été envoyée.<br /><br />".$retour;

}
else
{
echo 'Seul les prisonniers peuvent adhérer à un gang.'.$retour;
}

}
else
{
echo " Ce gang ne recrute pas de nouveaux prisonniers.".$retour;
}
}
else
{		

		if($id != NULL)
		{
		
		
	$message = preg_replace('!\[b\](.+)\[/b\]!isU', '<strong>$1</strong>', $description);

    $message = preg_replace('!\[i\](.+)\[/i\]!isU', '<em>$1</em>', $message);

	$message = preg_replace('!\[u\](.+)\[/u\]!isU', '<u>$1</u>', $message);

	$message = preg_replace('!\[color=(red|green|blue|yellow|purple|olive|orange)\](.+)\[/color\]!isU', '<span style="color:$1">$2</span>', $message);

	$description = preg_replace('!\:(happy|sad|hehe|huh|tirlang|dry|rolleyes|cool|biggrin|laugh|mad|ph34r|blink):!isU', '<img src="smiley/$1.gif">', $message);
		
?>
  
    <span class="style1"><? echo $nom; ?></span></p>
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

	  if($recrutement == 1)
	  {
echo "<img src='images/dot_green.gif' /> Ce gang recrute des prisonniers.";
	  }
	  elseif($recrutement  == 2)
	  {
echo "<img src='images/dot_orange.gif' /> Ce gang est suceptible de recruter des prisonniers.";	  
	  }
	  else
	  {
echo "<img src='images/dot_red.gif' /> Ce gang ne recrute pas.";	  
	  }
	 
echo "<br /><br />";
	 
if( empty($_SESSION['login']) )
{
echo "Vous devez être identifié pour entrer dans ce gang ou dans l'espace administration du gang.<br>";
}
else
{

$chef = strtolower($chef);
$chef182 = strtolower($_SESSION['login']);

if($chef == $chef182)
{
echo '<a href="index.php?page=gang&id='.$id.'&admin=espace_admin_reserve_chef_de_gang">Espace Admin</a>';
}
else
{

		$reponse3 = mysql_query("SELECT * FROM table_user WHERE login='".$_SESSION['login']."'"); 
				while ($donnees3 = mysql_fetch_array($reponse3) )
		{
		$crew = $donnees3['gang'];
		}

		
		if($crew == '0')
		{
		
		
?>
<form action="index.php?page=gang&id=<? echo $id; ?>&post=1" method="post" name="form1" id="form1">
  <p><strong>  Devenir membre</strong></p>
  <p>Message au chef du crew :<br /> 
    <label>
    <textarea name="textfield" cols="50" rows="5"></textarea>
    </label>
    <br />
    <label>
    <input type="submit" name="Submit" value="Postuler" />
    </label>
  </p>
</form>

<?
		}
		else
		{
		echo 'Vous ne pouvez pas entrer dans ce gang car vous êtes déjà dans un gang, veuillez vous y désinscrire pour pouvoir postuler.';
		}


		
}

}

}	
		
		
		else
		{
		echo "Ce gang n'existe pas.";
		}


}		



}
}
else
{
echo "Ce gang n'existe pas.";
}


mysql_close();
?>
</body>
