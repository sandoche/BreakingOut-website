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

		$sql = "select * from table_user where login='".$_SESSION['login']."'";
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		$data = mysql_fetch_assoc($req);

		
		$reponse1 = mysql_query("SELECT * FROM table_user WHERE login='".$_SESSION['login']."'"); 
				while ($donnees1 = mysql_fetch_array($reponse1) )
		{
		$id = $donnees1['id'];
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
		}
		
if($statut == 'Prisonnier')
{		
		
if($time_trou > $secondesupp)
{ 
?>
<table border=0><tbody><tr><td width=8 style='background-color:#f3e8dd'></td><td width=273 style='background-color:#ececec'><b><font color=#845d29>T</font>R<font color=#845d29>O</font>U</b></td></tr></tbody></table><br />
<br />
<p>Bienvenue au TROU <?php $nom_rpg  = strtoupper($nom_rpg);
echo $nom_rpg.' '.$prenom_rpg; ?>, (<?php echo $_SESSION['login']; ?>) prisonnier N°<?php echo $id; ?>
<br /><br />Vous y resterez jusqu'au
<?php
			  $secondesupp1 = $time_trou;
			  
			  $jour1 = floor($secondesupp1/21600);
$heuresensec1 = fmod($secondesupp1, 21600);
$heures1 = floor($heuresensec1/900);
$minutesensec1 = fmod($heuresensec1, 900);
$minutes1 =  floor($minutesensec1/15);

echo ' jour '.$jour1.' à '.$heures1.'h'.$minutes1.'.';
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
<table border=0><tbody><tr><td width=8 style='background-color:#f3e8dd'></td><td width=273 style='background-color:#ececec'><b><font color=#845d29>C</font>O<font color=#845d29>U</font>R</b></td></tr></tbody></table>

</td>
</tr></table>
<br />



	<?php

	
$reponsea = mysql_query("SELECT * FROM table_cour WHERE id='".$_SESSION['id_user_secu']."'");
		
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

$reponseb = mysql_query("SELECT * FROM table_cour WHERE pos_x='".$posx."' OR pos_y='".$posy."' ");
		
		while ($donneesb = mysql_fetch_array($reponseb) )
		{
		$d++;
		}
		

		
if($d == 0)
{

mysql_query("INSERT INTO table_cour VALUES('".$_SESSION['id_user_secu']."', '".$posx."', '".$posy."', '100', '', '', '', '', '', '')");


}

} WHILE($d == 0);

}


		
 
	
	
$cases = intval($_POST['cases']);

if($cases >= 1)
{

	
	
    if ($_POST['direction'] == 'haut')
    {
        if ($posy+$cases < 51)
        {
            $posy=$posy+$cases;
			
$reponsec = mysql_query("SELECT SQL_CACHE * FROM table_cour WHERE pos_y='".$posy."' AND pos_x='".$posx."'");
$donneesc = mysql_fetch_array($reponsec) ;		
$donneesc['id'];

$var152 = verif_connec($donneesc['id']);

if(($donneesc['id'] == NULL) OR $var152 != TRUE)
{


			
mysql_query("UPDATE table_cour SET pos_y='".$posy."' WHERE id='".$_SESSION['id_user_secu']."'");	
	
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
	 
	 
$reponsec = mysql_query("SELECT SQL_CACHE * FROM table_cour WHERE pos_y='".$posy."' AND pos_x='".$posx."'");
$donneesc = mysql_fetch_array($reponsec) ;		

$var152 = verif_connec($donneesc['id']);

if(($donneesc['id'] == NULL) OR $var152 != TRUE)
{	 
	 
mysql_query("UPDATE table_cour SET pos_y='".$posy."' WHERE id='".$_SESSION['id_user_secu']."'");	
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
			
$reponsec = mysql_query("SELECT SQL_CACHE * FROM table_cour WHERE pos_y='".$posy."' AND pos_x='".$posx."'");
$donneesc = mysql_fetch_array($reponsec) ;		
$donneesc['id'];

$var152 = verif_connec($donneesc['id']);

if(($donneesc['id'] == NULL) OR $var152 != TRUE)
{
			
mysql_query("UPDATE table_cour SET pos_x='".$posx."' WHERE id='".$_SESSION['id_user_secu']."'");	
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
		
$reponsec = mysql_query("SELECT SQL_CACHE * FROM table_cour WHERE pos_y='".$posy."' AND pos_x='".$posx."'");
$donneesc = mysql_fetch_array($reponsec) ;		

$var152 = verif_connec($donneesc['id']);

if(($donneesc['id'] == NULL) OR $var152 != TRUE)
{
		
            
mysql_query("UPDATE table_cour SET pos_x='".$posx."' WHERE id='".$_SESSION['id_user_secu']."'");
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

	


//map();

    ?>
<iframe src="map.php#me" height="450" width="450" frameborder="0"></iframe>
		<br />
<form id="form1" name="form1" method="post" action="?page=cour">
<center><table border="0">
		<tr>
			<td></td>
			<td><label><input name="direction" type="radio" value="haut" /> HAUT</label></td>
			<td></td>
		</tr>
		<tr>
			<td><label><input name="direction" type="radio" value="gauche" />GAUCHE</label></td>
			<td><input type="text" name="cases" value="0" size="5"/></td>
			<td><label><input name="direction" type="radio" value="droite" /> DROITE</label></td>
		</tr>
		<tr>
			<td></td>
			<td><label><input name="direction" type="radio" value="bas" /> BAS</label></td>
			<td></td>
		</tr>
</table>
<br />
<input type="submit" name="Submit3" value="Courir" /></center>
</form>		

<br />


</html>
<?php
echo $cool;

}
else
{
//map();
?>
<iframe src="map.php#me" height="450" width="450" frameborder="0"></iframe>
		<br />
<form id="form1" name="form1" method="post" action="?page=cour">
<center><table border="0">
		<tr>
			<td></td>
			<td><label><input name="direction" type="radio" value="haut" /> HAUT</label></td>
			<td></td>
		</tr>
		<tr>
			<td><label><input name="direction" type="radio" value="gauche" />GAUCHE</label></td>
			<td><input type="text" name="cases" value="0" size="5"/></td>
			<td><label><input name="direction" type="radio" value="droite" /> DROITE</label></td>
		</tr>
		<tr>
			<td></td>
			<td><label><input name="direction" type="radio" value="haut" si /> BAS</label></td>
			<td></td>
		</tr>
</table>
<br />
<input type="submit" name="Submit3" value="Courir" /></center>
</form>		
<?php
}

mysql_close();
}
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