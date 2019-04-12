<?php
session_start();



if( empty($_SESSION['login']) )
{
include("login1.php");
}
else
{
$retour_compte = '<br /><br /><a href="?page=compte">Retour</a>';
include("db.php");

		$sql = "select * from table_user where login='".htmlentities($_SESSION['login'])."'";
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		$data = mysql_fetch_assoc($req);

		
		$reponse1 = mysql_query("SELECT * FROM table_user WHERE login='".htmlentities($_SESSION['login'])."'"); 
				while ($donnees1 = mysql_fetch_array($reponse1) )
		{
		$id = $donnees1['id'];
		$id_secu_user = $donnees1['id'];
		$id_user_secu = $donnees1['id'];
		$peine_de_mort = $donnees1['date_peine_de_mort'];
		$fin_peine = $donnees1['fin_peine'];
		$prochaine_dla = $donnees1['prochaine_dla'];
		$pv = $donnees1['pv'];
		$nom_rpg = $donnees1['nom_rpg'];
		$prenom_rpg = $donnees1['prenom_rpg'];
		$portemonnaie = $donnees1['portemonnaie'];
		$delit = $donnees1['delit'];
		$time_trou = $donnees1['time_trou'];
		$date_peine_de_mort = $donnees1['date_peine_de_mort'];
		$time = $donnees1['time'];
		$gang = $donnees1['gang'];
		$pa = $donnees1['pa'];
		$statut = $donnees1['statut'];
		$carac_force = $donnees1['carac_force'];
		$carac_agilite = $donnees1['carac_agilite'];
		$carac_intelligence = $donnees1['carac_intelligence'];
		$carac_respect = $donnees1['carac_respect'];
		$hygiene = $donnees1['hygiene'];
		$mdp_secu = $donnees1['mdp'];
		$hygiene = $donnees1['hygiene'];
		$moral = $donnees1['moral'];
		$faim = $donnees1['faim'];
		}
		
$niveau = ($carac_force+$carac_agilite+$carac_intelligence+$carac_respect-9000)/1000;		

if($statut == 'Prisonnier')
{		
		
if($time_trou > $secondesupp)
{ 
?>
<span class="titre">>>> TROU</span><br />
<br />
<p>Bienvenue au TROU <?php $nom_rpg  = strtoupper($nom_rpg);
echo $nom_rpg.' '.$prenom_rpg; ?>, (<?php echo htmlentities($_SESSION['login']); ?>) prisonnier N°<?php echo $id; ?>
<br /><br />Vous y resterez jusqu'au
<?php
			  $secondesupp1 = $time_trou;
			  
			  $jour1 = floor($secondesupp1/21600);
$heuresensec1 = fmod($secondesupp1, 21600);
$heures1 = floor($heuresensec1/900);
$minutesensec1 = fmod($heuresensec1, 900);
$minutes1 =  floor($minutesensec1/15);

echo ' jour '.$jour1.' à '.$heures1.'h'.$minutes1.'.';


include("pages/trou.php");
			  ?>

<?php
}
else
{

include("pages/liens_imp.php");


?>

    <head>

		
<style type="text/css">
<!--
		
		.ligneMap {
        height: 15px;
        clear: left;
}
.caseMap {
        width: 15px;
        height: 15px;
        /*background-image: url('images/fond.png');*/
                padding-bottom: 5px;
}
#map
{
        border-collapse:collapse;
}
-->
</style>
    </head>
	    <body>
<table width="100%">
<tr><td width="70%" valign="top">
<span class="titre">>>> COUR</span><br />
</td>
</tr></table>
<br />



	<?php

	
$reponsea = mysql_query("SELECT * FROM table_cour WHERE id='".htmlentities($_SESSION['id_user_secu'])."'");
		
		while ($donneesa = mysql_fetch_array($reponsea) )
		{	
		$id_yop = $donneesa['id'];
		$posx = $donneesa['pos_x'];
		$posy = $donneesa['pos_y'];
		$pm = $donneesa['pm'];
		}
	
	
	
	
if($id_yop == NULL)
{



do{
$posx = rand(0,50);
$posy = rand(0,50);

$d = 0;

$reponseb = mysql_query("SELECT * FROM table_cour WHERE pos_x='".$posx."' AND pos_y='".$posy."' AND supp1+1800 >= ".time()."");
		
		while ($donneesb = mysql_fetch_array($reponseb) )
		{
		$d = $donneesb['id'];
		}
		

		
if($d == 0)
{

mysql_query("INSERT INTO table_cour VALUES('".htmlentities($_SESSION['id_user_secu'])."', '".$posx."', '".$posy."', '100', '".time()."', '', '', '', '', '')");


}

} WHILE($d != 0);

}

$retour123456 = mysql_query("SELECT COUNT(*) AS id FROM table_cour WHERE pos_y='".$posy."' AND pos_x='".$posx."' AND supp1+1800 >= ".time()."");
$donnees123456 = mysql_fetch_array($retour123456);
$bug = $donnees123456['id'];

if($bug > 1){
echo '<br />Vous êtes plusieurs prisonniers sur la même case, veuillez vous déplacer : certains joueurs ne vont verront pas si vous restez sur cette case.<br /><br />';
}
		
mysql_query("UPDATE table_cour SET supp1=".time()." WHERE id='".$id_secu_user."'");
	
$cases = intval($_POST['cases']);



if($cases >= 1)
{

if($cases >= $pm)
{
$cool = 'Vous n\'avez pas assez de PM pour effectuer cette action.';
}
else
{	
	
    if ($_POST['direction'] == 'haut')
    {
        if ($posy+$cases < 51)
        {
		
		
            $posy=$posy+$cases;
			
$reponsec = mysql_query("SELECT SQL_CACHE * FROM table_cour WHERE pos_y='".$posy."' AND pos_x='".$posx."' AND supp1+1800 >= ".time()."");
$donneesc = mysql_fetch_array($reponsec) ;		

$var152 = verif_connec($donneesc['id']); //à enlever ?


if(($donneesc['id'] == NULL) OR $var152 != TRUE)
{


			
mysql_query("UPDATE table_cour SET pos_y='".$posy."' WHERE id='".htmlentities($_SESSION['id_user_secu'])."'");	
mysql_query("UPDATE table_cour SET pm=pm-".$cases." WHERE id='".htmlentities($_SESSION['id_user_secu'])."'");	
	$cool='Déplacement réussi.';
	
}
else
{
$cool='Déplacement impossible, il y a quelqu\'un à cette position.';
}
	
        }
				else
		{
$cool='Déplacement impossible.';		
		}
    }
    elseif ($_POST['direction'] == 'bas')
    {
        if ($posy-$cases >= 0)
        {
		
		
     $posy=$posy-$cases;
	 
	 
$reponsec = mysql_query("SELECT SQL_CACHE * FROM table_cour WHERE pos_y='".$posy."' AND pos_x='".$posx."' AND supp1+1800 >= ".time()."");
$donneesc = mysql_fetch_array($reponsec) ;		

$var152 = verif_connec($donneesc['id']); //à enlever ?

if(($donneesc['id'] == NULL) OR $var152 != TRUE)
{	 
	 
mysql_query("UPDATE table_cour SET pos_y='".$posy."' WHERE id='".htmlentities($_SESSION['id_user_secu'])."'");	
mysql_query("UPDATE table_cour SET pm=pm-".$cases." WHERE id='".htmlentities($_SESSION['id_user_secu'])."'");	
$cool='Déplacement réussi.';

}
else
{
$cool='Déplacement impossible, il y a quelqu\'un à cette position.';
}
	
        }
		else
		{
$cool='Déplacement impossible.';	
	
		}
    }
    elseif ($_POST['direction'] == 'gauche')
    {
        if ($posx-$cases >= 0)
        {
            $posx=$posx-$cases;
			
$reponsec = mysql_query("SELECT SQL_CACHE * FROM table_cour WHERE pos_y='".$posy."' AND pos_x='".$posx."' AND supp1+1800 >= ".time()."");
$donneesc = mysql_fetch_array($reponsec) ;		

$var152 = verif_connec($donneesc['id']); //à enlever ?


if(($donneesc['id'] == NULL) OR $var152 != TRUE)
{
			
mysql_query("UPDATE table_cour SET pos_x='".$posx."' WHERE id='".htmlentities($_SESSION['id_user_secu'])."'");
mysql_query("UPDATE table_cour SET pm=pm-".$cases." WHERE id='".htmlentities($_SESSION['id_user_secu'])."'");		
$cool='Déplacement réussi.';

}
else
{
$cool='Déplacement impossible, il y a quelqu\'un à cette position.';
}

        }      

		
				else
		{
$cool='Déplacement impossible.';		
		}
    }
    elseif ($_POST['direction'] == 'droite')
    {
        if ($posx+$cases < 51)
        {

$posx=$posx+$cases;		
		
$reponsec = mysql_query("SELECT SQL_CACHE * FROM table_cour WHERE pos_y='".$posy."' AND pos_x='".$posx."' AND supp1+1800 >= ".time()."");
$donneesc = mysql_fetch_array($reponsec) ;		

$var152 = verif_connec($donneesc['id']); //à enlever ?


if(($donneesc['id'] == NULL) OR $var152 != TRUE)
{
		
            
mysql_query("UPDATE table_cour SET pos_x='".$posx."' WHERE id='".htmlentities($_SESSION['id_user_secu'])."'");
mysql_query("UPDATE table_cour SET pm=pm-".$cases." WHERE id='".htmlentities($_SESSION['id_user_secu'])."'");	
$cool='Déplacement réussi.';	

}
else
{
$cool='Déplacement impossible, il y a quelqu\'un à cette position.';
}

        }
				else
		{
$cool='Déplacement impossible.';		
		}
    }

if($cool =='Déplacement réussi.' && $cases >= 5)
{
$xp_agilite = round((rand(0, 2)*$cases)*(2/3)+1);
$echo_xp_agilite = $xp_agilite/1000;
$cool = 'Déplacement réussi.<br /><br />Vous avez courru, vous avez gagné '.$echo_xp_agilite.' XP en agilité.'; 
mysql_query("UPDATE table_user SET carac_agilite=carac_agilite+".$xp_agilite." WHERE id='".htmlentities($_SESSION['id_user_secu'])."'");###########
}

$reponse6 = mysql_query("SELECT * FROM table_object WHERE pseudo='".htmlentities($_SESSION['login'])."'"); 
				while ($donnees6 = mysql_fetch_array($reponse6) )
{
$intellisupp=$intellisupp+$donnees6['intelligence'];
}
$intellitotal = $intellisupp+$carac_intelligence;

$max_trouvaille = 200 - round($intellitotal/1000);
$chance = rand(1, $max_trouvaille);


if($chance == 2)
{
$cool =  $cool.'<br /><br />Vous avez trouvé un objet , vous le récuperez.';

$objettype = rand(1,10);

if($objettype == 1)
{
$nom_objet = 'Vis Allen Schweizer';
$force = 300;
$agilite = 200;
$intelligence = 0;
$respect = 0;
$prix = 200;
$danger = 0;
$volable = 1;
$champsupp1 = '';
$champsupp2 = '';
$champsupp3 = '';	
}
elseif($objettype == 2)
{
$nom_objet = 'Lame de rasoir';
$force = 500;
$agilite = 0;
$intelligence = 0;
$respect = 100;
$prix = 200;
$danger = 1;
$volable = 1;
$champsupp1 = '';
$champsupp2 = '';
$champsupp3 = '';
}
elseif($objettype == 3)
{
$nom_objet = 'Bout de verre';
$force = 750;
$agilite = 0;
$intelligence = 0;
$respect = 0;
$prix = 500;
$danger = 1;
$volable = 1;
$champsupp1 = '';
$champsupp2 = '';
$champsupp3 = '';
}
elseif($objettype == 4)
{
$nom_objet = 'Ciseaux';
$force = 750;
$agilite = 250;
$intelligence = 0;
$respect = 0;
$prix = 500;
$danger = 1;
$volable = 1;
$champsupp1 = '';
$champsupp2 = '';
$champsupp3 = '';
}
elseif($objettype == 5)
{
$nom_objet = 'Cocaine -Dangeureux pour la santé-';
$force = '-1000';
$agilite = '-1000';
$intelligence = '-3000';
$respect = '5000';
$prix = 300;
$danger = 1;
$volable = 1;
$champsupp1 = '';
$champsupp2 = '';
$champsupp3 = '';
}
elseif($objettype == 6)
{
$nom_objet = 'Pile';
$force = '100';
$agilite = '100';
$intelligence = '50';
$respect = '10';
$prix = 300;
$danger = 1;
$volable = 1;
$champsupp1 = '';
$champsupp2 = '';
$champsupp3 = '';
}
elseif($objettype == 7)
{
$nom_objet = 'Clou';
$force = '1000';
$agilite = '100';
$intelligence = '50';
$respect = '0';
$prix = 100;
$danger = 1;
$volable = 1;
$champsupp1 = '';
$champsupp2 = '';
$champsupp3 = '';
}
elseif($objettype == 8)
{
$nom_objet = 'Bandana';
$force = '0';
$agilite = '0';
$intelligence = '50';
$respect = '1000';
$prix = 300;
$danger = 1;
$volable = 1;
$champsupp1 = '';
$champsupp2 = '';
$champsupp3 = '';
}
elseif($objettype == 9)
{
$nom_objet = 'Casquette';
$force = '0';
$agilite = '200';
$intelligence = '10';
$respect = '500';
$prix = 10;
$danger = 1;
$volable = 1;
$champsupp1 = '';
$champsupp2 = '';
$champsupp3 = '';
}
elseif($objettype == 10)
{
$nom_objet = 'Montre';
$force = '0';
$agilite = '100';
$intelligence = '500';
$respect = '1000';
$prix = 950;
$danger = 1;
$volable = 1;
$champsupp1 = '';
$champsupp2 = '';
$champsupp3 = '';
}

mysql_query("INSERT INTO table_object VALUES ('', '".$nom_objet."',  '".$force."',  '".$agilite."',  '".$intelligence."',  '".$respect."',  '".$prix."',  '".$danger."',  '".htmlentities($_SESSION['login'])."',  '".$volable."', '', '', '')");
}

}

?>



<?php

function remote($var)
{
?><table width="100%" border="0">
  <tr>
    <td><fieldset style="border-color:#7e5125">
      <legend><strong>Carte : </strong></legend>
      <div>
<iframe src="map.php#me" height="425" width="100%" frameborder="0"></iframe>
	</div>
	</td>
	</tr>
</table>

<br />
<br />
<table width="100%" border="0">
  <tr>
    <td><fieldset style="border-color:#7e5125">
      <legend><strong>Actions : </strong></legend>
      <div>
		<form  id="form2" name="form2" method="post" action="?page=cour&action=pm">
Il vous reste <b><iframe src="PM_compteur.php" frameborder="0" height="18" width="50"></iframe><? /*
$cases = intval($_POST['cases']);


if($cases > $var)
{
echo $var;
}
else
{	
echo $var-$cases;
} */?></b> PM. | <a href="?page=cour">Rafraichir</a> |<br />
Convertir <input name="PA" type="text" value="0" size="5"/> PA en PM (1 PA = 10 PM). 
<input type="submit" name="Submit3" value="Convertir" />
</form>
<br />
<table>
<tr>
<td width='50%' valign="top">
<b></b><br />
<a href='?page=cour&action=marche'>Consulter le marché noir (0 PM)</a><br />
<a href='?page=cour&action=basket'>Faire du basket (30 PM)</a><br />
<a href='?page=cour&action=muscu'>Faire de la musculation (30 PM)</a><br />
<a href='?page=cour&action=douche'>Prendre sa douche (10 PM)</a><br />
<? //<a href='?page=cour&action=baston'>Baston générale (0 PM)</a><br /> ?>
</td>
<td width='50%'>
<form id="form1" name="form1" method="post" action="?page=cour">
<center><table border="0">



		<tr>
			<td></td>
			<td background="images/haut.png" width="40" height="40"><label><input name="direction" type="radio" value="haut" /> </label></td>
			<td></td>
		</tr>
		<tr>
			<td background="images/gauche.png" width="40" height="40"><label><br /><input name="direction" type="radio" value="gauche" /></label></td>
			<td><input type="text" name="cases" value="0" size="2"/></td>
			<td background="images/droite.png" width="40" height="40"><label><br /><input name="direction" type="radio" value="droite" /></label></td>
		</tr>
		<tr>
			<td></td>
			<td background="images/bas.png" width="40" height="40"><label><input name="direction" type="radio" value="bas" /></label></td>
			<td></td>
		</tr>
		
</table>
<br />
<input type="submit" name="Submit3" value="Courir" /></center>
</form>	
</td >
<tr>
</table>
	</div>
	</td>
	</tr>
</table>
<br />

<?
}

?>



<?

//map();
remote($pm);
    ?>
<br />


</html>
<?php
?>
<table width="100%" border="0">
  <tr>
    <td><fieldset style="border-color:#7e5125">
      <legend><strong>Résultat de l'action : </strong></legend>
      <div>
<? 
echo $cool;

 ?>
</div>
</td>
</tr>
</table>

<?
}
else
{

?>
<?php

function remote($var)
{
?><table width="100%" border="0">
  <tr>
    <td><fieldset style="border-color:#7e5125">
      <legend><strong>Carte : </strong></legend>
      <div>
<iframe src="map.php#me" height="425" width="100%" frameborder="0"></iframe>
	</div>
	</td>
	</tr>
</table>

<br />
<br />
<table width="100%" border="0">
  <tr>
    <td><fieldset style="border-color:#7e5125">
      <legend><strong>Actions : </strong></legend>
      <div>
		<form  id="form2" name="form2" method="post" action="?page=cour&action=pm">
Il vous reste <b>
<iframe src="PM_compteur.php" frameborder="0" height="18" width="50"></iframe>

<? /*
$cases = intval($_POST['cases']);


if($cases > $var)
{
echo $var;
}
else
{	
echo $var-$cases;
} */?></b> PM. | <a href="?page=cour">Rafraichir</a> |<br />
Convertir <input name="PA" type="text" value="0" size="5"/> PA en PM (1 PA = 10 PM). 
<input type="submit" name="Submit3" value="Convertir" />
</form>
<br />
<table>
<tr>
<td width='50%' valign="top">
<b></b><br />
<a href='?page=cour&action=marche'>Consulter le marché noir (0 PM)</a><br />
<a href='?page=cour&action=basket'>Faire du basket (30 PM)</a><br />
<a href='?page=cour&action=muscu'>Faire de la musculation (30 PM)</a><br />
<a href='?page=cour&action=douche'>Prendre sa douche (10 PM)</a><br />
<? //<a href='?page=cour&action=baston'>Baston générale (0 PM)</a><br /> ?>
</td>
<td width='50%'>
<form id="form1" name="form1" method="post" action="?page=cour">
<center><table border="0">



		<tr>
			<td></td>
			<td background="images/haut.png" width="40" height="40"><label><input name="direction" type="radio" value="haut" /> </label></td>
			<td></td>
		</tr>
		<tr>
			<td background="images/gauche.png" width="40" height="40"><label><br /><input name="direction" type="radio" value="gauche" /></label></td>
			<td><input type="text" name="cases" value="0" size="2"/></td>
			<td background="images/droite.png" width="40" height="40"><label><br /><input name="direction" type="radio" value="droite" /></label></td>
		</tr>
		<tr>
			<td></td>
			<td background="images/bas.png" width="40" height="40"><label><input name="direction" type="radio" value="bas" /></label></td>
			<td></td>
		</tr>
		
		
		
		
</table>
<br />
<input type="submit" name="Submit3" value="Courir" /></center>
</form>	
</td >
<tr>
</table>
	</div>
	</td>
	</tr>
</table>
<br />

<?
}

?>
<?
remote($pm);

$result = 'Aucune action en cours.';

if(htmlentities($_GET['action']) == 'pm')
{

if(htmlentities($_POST['PA']) > $pa)
{
$result = 'Vous n\'avez pas assez de PA à convertir.';
}
else
{

$new_pm = $_POST['PA']*10;
$hehe = $new_pm+$pm;
mysql_query("UPDATE table_cour SET pm=pm+".$new_pm." WHERE id='".htmlentities($_SESSION['id_user_secu'])."'");	
mysql_query("UPDATE table_user SET pa=pa-".htmlentities($_POST['PA'])." WHERE id='".htmlentities($_SESSION['id_user_secu'])."'");	

$result = 'Vous avez convertis '.htmlentities($_POST['PA']).' PA en '.$new_pm.' PM.<br /> Vous avez donc '.$hehe.' PM.';

}


}
elseif($_GET['action'] == 'basket') //Basket
{

if($pm >= 30)  
{
if($posx >= 5 && $posx <= 10 && $posy >= 5 && $posy <= 15)
{

if($faim >= 30)
{

$xp_force = rand(1, 5);
$xp_agilite = rand(3, 8);
$xp_intelligence = rand(3, 10);
$xp_respect = rand(1, 3);

$echo_xp_force = $xp_force/1000;
$echo_xp_agilite = $xp_agilite/1000;
$echo_xp_intelligence = $xp_intelligence/1000;
$echo_xp_respect = $xp_respect/1000;

mysql_query("UPDATE table_user SET carac_force=carac_force+".$xp_force." WHERE id='".htmlentities($_SESSION['id_user_secu'])."'");
mysql_query("UPDATE table_user SET carac_agilite=carac_agilite+".$xp_agilite." WHERE id='".htmlentities($_SESSION['id_user_secu'])."'");
mysql_query("UPDATE table_user SET carac_intelligence=carac_intelligence+".$xp_intelligence." WHERE id='".htmlentities($_SESSION['id_user_secu'])."'");
mysql_query("UPDATE table_user SET carac_respect=carac_respect+".$xp_respect." WHERE id='".htmlentities($_SESSION['id_user_secu'])."'");

$result = 'Vous faites du basketball, vous gagnez '.$echo_xp_force.' XP de force, '.$echo_xp_agilite.' XP d\'agilité, '.$echo_xp_intelligence.' d\'intelligence et '.$echo_xp_respect.' XP de respect.<a href="?page=cour&action=basket"> Continuer le basketball (30 PM).</a>';

mysql_query("UPDATE table_user SET moral=moral+".rand(1, 10)." WHERE id='".$id_user_secu."'");
mysql_query("UPDATE table_user SET hygiene=hygiene-".rand(5, 10)." WHERE id='".$id_user_secu."'");


	
	mysql_query("UPDATE table_cour SET pm=pm-30 WHERE id='".htmlentities($_SESSION['id_user_secu'])."'");
	
	}
	else{
	$result = 'Vous avez trop faim pour pouvoir faire du basket.';
	}
}
else
{
$result = 'Vous devez aller sur le terrain de basket pour effectuer cette action.';
}
}
else
{
$result = 'Vous n\'avez pas assez de PM pour effectuer cette action.';
}

}
elseif($_GET['action'] == 'muscu')
{
if($pm >= 30)
{

if($posx >= 43 && $posx <= 50 && $posy >= 35 && $posy <= 50)
{

if($hygiene >= 30)
{

$xp_force = rand(5, 10);
$xp_agilite = rand(1, 5);
$xp_intelligence = rand(1, 5);
$xp_respect = rand(3, 8);

$echo_xp_force = $xp_force/1000;
$echo_xp_agilite = $xp_agilite/1000;
$echo_xp_intelligence = $xp_intelligence/1000;
$echo_xp_respect = $xp_respect/1000;

mysql_query("UPDATE table_user SET carac_force=carac_force+".$xp_force." WHERE id='".htmlentities($_SESSION['id_user_secu'])."'");
mysql_query("UPDATE table_user SET carac_agilite=carac_agilite+".$xp_agilite." WHERE id='".htmlentities($_SESSION['id_user_secu'])."'");
mysql_query("UPDATE table_user SET carac_intelligence=carac_intelligence+".$xp_intelligence." WHERE id='".htmlentities($_SESSION['id_user_secu'])."'");
mysql_query("UPDATE table_user SET carac_respect=carac_respect+".$xp_respect." WHERE id='".htmlentities($_SESSION['id_user_secu'])."'");

mysql_query("UPDATE table_user SET moral=moral+".rand(1, 10)." WHERE id='".$id_user_secu."'");
mysql_query("UPDATE table_user SET faim=faim-".rand(5, 10)." WHERE id='".$id_user_secu."'");

$result = 'Vous faites de la musculation, vous gagnez '.$echo_xp_force.' XP de force, '.$echo_xp_agilite.' XP d\'agilité, '.$echo_xp_intelligence.' d\'intelligence et '.$echo_xp_respect.' XP de respect.<a href="?page=cour&action=muscu"> Continuer la musculation (30 PM).</a>';

mysql_query("UPDATE table_cour SET pm=pm-30 WHERE id='".htmlentities($_SESSION['id_user_secu'])."'");

}else{
$result = 'Vous être trop sale pour pouvoir faire de la musculation.';
}

}
else
{
$result = 'Vous être dans la zone de musculation pour en faire.';
}

}
else
{
$result = 'Vous n\'avez pas assez de PM pour effectuer cette action.';
}
}
elseif($_GET['action'] == 'marche')
{
if($posx >= 13 && $posx <= 37 && $posy >= 13 && $posy <= 37)
{


$result = include("marche_noir.php");
$result = 'Vous êtes dans le marché noir.';


}
else
{
$result = 'Vous devez aller sur la zone du marché pour pouvoir y acceder.';
}
}
elseif($_GET['action'] == 'douche')
{
if($posx >= 10 && $posx <= 24 && $posy >= 48 && $posy <= 50)
{

if($pm >= 10)
{
$result = 'Vous prenez votre douche.';

mysql_query("UPDATE table_user SET hygiene=100 WHERE id='".htmlentities($_SESSION['id_user_secu'])."'");
mysql_query("UPDATE table_cour SET pm=pm-10 WHERE id='".htmlentities($_SESSION['id_user_secu'])."'");

}
else
{
$result = 'Vous n\'avez pas assez de PM pour effectuer cette action.';
}
}
else
{
$result = 'Vous devez aller sur la zone douche collective pour pouvoir y acceder.';
}
}
elseif($_GET['action'] == 'baston')
{

$result = 'Bientôt...';


}


echo '<table width="100%" border="0">
  <tr>
    <td><fieldset style="border-color:#7e5125">
      <legend><strong>Résultat de l\'action : </strong></legend>
      <div>
	  '.$result.'
</div>
</td>
</tr>
</table>';
}
}
?>
<br />
<br />
<table width="100%" border="0">
  <tr>
    <td><fieldset style="border-color:#7e5125">
      <legend><strong>Connectés : </strong></legend>
      <div>
<iframe src='connec_fight.php' frameborder='0' width='100%' height='400'></iframe>
</div>
</td>
</tr>
</table>
<br />
<br />
<table width="100%" border="0">
  <tr>
    <td><fieldset style="border-color:#7e5125">
      <legend><strong>Aide : </strong></legend>
      <div>
<br />Un déplacement d'une case coûte 1 PM.
<br />Pour défier un joueur il suffit de placer le curseur sur un personnage de la carte et de cliquer sur combat ou poker.
<br /><br />
</div>
</td>
</tr>
</table>
<?

mysql_close();
}


elseif($statut == 'Mort')
{
echo '<SCRIPT LANGUAGE="JavaScript">
document.location.href="?page=mort" /* vous pouvez aussi mettre http://www.monsite.com */
</SCRIPT>';
}
elseif($statut == 'Evadé')
{
echo '<SCRIPT LANGUAGE="JavaScript">
document.location.href="?page=evade" /* vous pouvez aussi mettre http://www.monsite.com */
</SCRIPT>';
}
else
{
echo 'Bug 1 veuillez prévenir l\'administrateur !';
}


}
?>