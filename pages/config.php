<?php
$timestamp = time();
$depart = 1197030993;

$secondesupp = $timestamp - $depart;


$jour = floor($secondesupp/21600);
$heuresensec = fmod($secondesupp, 21600);
$heures = floor($heuresensec/900);
$minutesensec = fmod($heuresensec, 900);
$minutes =  floor($minutesensec/15);

$basket = 0;
$douche = 0;

function map()
{   








$reponsea = mysql_query("SELECT SQL_CACHE id, pos_x, pos_y, pm FROM table_cour WHERE id='".htmlentities($_SESSION['id_user_secu'])."'");
$donneesa = mysql_fetch_array($reponsea) ;		

		$pm = $donneesa['pm'];

    $compteurX = 0;
    $compteurY = 50;
                                               
    $finX = 50;
    $finY = 0;
                                                                                     
    $debutX = 0;



echo "<head>
<style type='text/css'>
<!--
#Layer1 {
	visibility:hidden;
	position:absolute;
	width:250px;
	height:250px;
	z-index:1;
	background-image: url(images/hover3.png);
	left: 275px;
	top: 275px;

}
-->
</style>
</head>";	
	
	
    echo '<table id="map" align="left" border="0" width="800" height="800" >', "\n";
    while($compteurY >= $finY)
    {
        echo "\t\t", '<tr class="ligneMap">', "\n";
               
        while($compteurX <= $finX)
        {
		if($compteurX >= 5  && $compteurX <= 10 && $compteurY >= 5 && $compteurY <= 15){
		
		$basket++;
		
		if($basket < 10){
		$basket = "0$basket";
		}
		
		echo "\t\t\t", '<td class="caseMap" style="background-image: url(\'images/colorbasket_'.$basket.'.gif\')">';
		
		
		}
		elseif($compteurX >= 13  && $compteurX <= 37 && $compteurY >= 13 && $compteurY <= 37){
		
		
		if ($compteurX%2){
		if($compteurY%2){		
        echo "\t\t\t", '<td class="caseMap"  style="background-image: url(\'images/colormarche_01.gif\')">';
		}else{
		echo "\t\t\t", '<td class="caseMap" style="background-image: url(\'images/colormarche_03.gif\')">';
		}
		}else{
		if($compteurY%2){		
        echo "\t\t\t", '<td class="caseMap" style="background-image: url(\'images/colormarche_02.gif\')">';
		}else{
		echo "\t\t\t", '<td class="caseMap" style="background-image: url(\'images/colormarche_04.gif\')">';
		}
		}
		//echo "\t\t\t", '<td class="caseMap" style="background-image: url(\'images/colormarche.gif\')">';
		}
		elseif($compteurX >= 43  && $compteurX <= 50 && $compteurY >= 35 && $compteurY <= 50){
		
		
				if ($compteurX%2){
		if($compteurY%2){		
        echo "\t\t\t", '<td class="caseMap" style="background-image: url(\'images/colormuscu_01.gif\')">';
		}else{
		echo "\t\t\t", '<td class="caseMap" style="background-image: url(\'images/colormuscu_03.gif\')">';
		}
		}else{
		if($compteurY%2){		
        echo "\t\t\t", '<td class="caseMap" style="background-image: url(\'images/colormuscu_02.gif\')">';
		}else{
		echo "\t\t\t", '<td class="caseMap" style="background-image: url(\'images/colormuscu_04.gif\')">';
		}
		}
		
		//echo "\t\t\t", '<td class="caseMap" style="background-image: url(\'images/colormuscu.gif\')">';
		}
		elseif($compteurX >= 10  && $compteurX <= 24 && $compteurY >= 48 && $compteurY <= 50){
		$douche++;
		
		if($douche < 10){
		$douche = "0$douche";
		}
		
		echo "\t\t\t", '<td class="caseMap" style="background-image: url(\'images/colordouche_'.$douche.'.gif\')">';
		}
		else{
		
		if ($compteurX%2){
		if($compteurY%2){		
        echo "\t\t\t", '<td class="caseMap" style="background-image: url(\'images/colorcour_01.gif\')">';
		}else{
		echo "\t\t\t", '<td class="caseMap" style="background-image: url(\'images/colorcour_03.gif\')">';
		}
		}else{
		if($compteurY%2){		
        echo "\t\t\t", '<td class="caseMap" style="background-image: url(\'images/colorcour_02.gif\')">';
		}else{
		echo "\t\t\t", '<td class="caseMap" style="background-image: url(\'images/colorcour_04.gif\')">';
		}
		
		}
		
		}


		

$reponseb = mysql_query("SELECT SQL_CACHE id FROM table_cour WHERE pos_x='".$compteurX ."' AND pos_y='".$compteurY."' AND supp1+1800 >= ".time()."");	
$donneesb = mysql_fetch_array($reponseb);
			if($compteurY == $donneesa['pos_y'] && $compteurX == $donneesa['pos_x'])
			{
            echo '<p align="center"><img src="images/me.png" height="9" width="9" border="0"></p>';
			}
			else
			{
			
			
	
if($donneesb['id'] != NULL)
{
			
 $req_user = mysql_query("SELECT SQL_CACHE * FROM table_user WHERE id='".$donneesb['id']."'");
 $rep_user = mysql_fetch_array($req_user);
 $login_man = $rep_user['login'];
 if($rep_user['gang'] == '0')
 {
 $gang = 'Aucun';
 }
 else
 {
 $gang = $rep_user['gang'];
 }

$var111111 = "Défier : <a href=\'index.php?page=fight&action=1&id=".$rep_user['id']."\' target=\'_parent\'>Combat (30 PM)</a> | <a href=\'index.php?page=poker&action=1&id=".$rep_user['id']."\' target=\'_parent\'>Poker (15 PM)</a>";
 
 $infostype = '<b>'.$login_man.'</b><br /><br />Type : '.$rep_user['delit'].'<br />Gang : '.htmlentities($gang).'<br /> <br />Force : '.floor($rep_user['carac_force']/1000).'<br />Agilité : '.floor($rep_user['carac_agilite']/1000).'<br />Intelligence : '.floor($rep_user['carac_intelligence']/1000).'<br />Respect : '.floor($rep_user['carac_respect']/1000).'<br />Niveau : '.floor(($rep_user['carac_force']+$rep_user['carac_agilite']+$rep_user['carac_intelligence']+$rep_user['carac_respect']-9000)/1000).'<br />'.$var111111.'<br >';

$force = floor($rep_user['carac_force']/1000);
$agilite = floor($rep_user['carac_agilite']/1000);
$intelligence = floor($rep_user['carac_intelligence']/1000);
$respect = floor($rep_user['carac_respect']/1000);


/*
$reponse = mysql_query("SELECT SQL_CACHE id, mec1 FROM connectes_ip WHERE timestamp+1800 >= ".time()." AND lieu=4 AND mec1='".$login_man."'"); 
$donnees222 = mysql_fetch_array($reponse);
 

 
			if($donnees222['id'] != NULL)
			{
			*/
			?><p align="center"><a href="#" onmouseover="h_shLayer('Layer1','visible', '<?php echo $infostype; ?>')"><img src="images/you.png" height="9" width="9" border='0'></a></p><?php
		/*	} */
			
}            		
}

			echo '</td>', "\n";
            $compteurX++;


			
			
        }
                                                                             
        echo "\t\t", '</tr>', "\n";
        $compteurX = $debutX;
        $compteurY--;
    }
    echo '</table>';
	

}


function verif_connec($var)
{

 $req = mysql_query("SELECT SQL_CACHE login FROM table_user WHERE id='".$var."'");
 $rep = mysql_fetch_array($req);
 $id_this_man = $rep['login'];
 
$req2 = mysql_query("SELECT SQL_CACHE id, mec1 FROM connectes_ip WHERE timestamp+1800 >= ".time()." AND lieu=4 AND mec1='".$id_this_man."'"); 
 $reponse = mysql_fetch_array($req2);
 $id_man = $reponse['id'];
 
 if($id_man != NULL)
 {
return true;
 }

}


function jour_prison($var)
{
$jour = floor($var/21600);
echo 'Jour '.$jour;
}

function jour_heure($var)
{
$jour = floor($var/21600);
$heuresensec = fmod($var, 21600);
$heures = floor($heuresensec/900);
$minutesensec = fmod($var, 900);
$minutes =  floor($minutesensec/15);

echo 'Jour '.$jour.' à '.$heures.'h'.$minutes;
}

function nouveaux_defis($this)
{
if($this == 'table_fight'){
$truc = 'supp1';
} else {
$truc = 'resultat';
}


$retourthis = mysql_query("SELECT COUNT(*) AS id FROM ".$this." WHERE defie='".htmlentities($_SESSION['login'])."' AND ".$truc."='0' ");
$donneesthis = mysql_fetch_array($retourthis);
$new_this = $donneesthis['id'];

echo '('.$new_this.')';
}

function messages_new()
{
$retour1 = mysql_query("SELECT COUNT(*) AS id FROM table_messagerie WHERE destinataire='".htmlentities($_SESSION['login'])."' AND supp2='0'");
$donnees1 = mysql_fetch_array($retour1);
$new_messages = $donnees1['id'];
echo '('.$new_messages.')';
}


if($_SESSION['login'] != NULL)
{
include("db.php");
$reponse1 = mysql_query("SELECT * FROM table_user WHERE login='".htmlentities($_SESSION['login'])."'"); 
$donnees1 = mysql_fetch_array($reponse1);
$moral = $donnees1['moral'];
$hygiene = $donnees1['hygiene'];
$faim = $donnees1['faim'];
if($moral > 100){
mysql_query("UPDATE table_user SET moral=100 WHERE login='".htmlentities($_SESSION['login'])."'");
}
if($moral < 0){
mysql_query("UPDATE table_user SET moral=1 WHERE login='".htmlentities($_SESSION['login'])."'");
}
if($hygiene < 0){
mysql_query("UPDATE table_user SET hygiene=1 WHERE login='".htmlentities($_SESSION['login'])."'");
}
if($faim < 0){
mysql_query("UPDATE table_user SET faim=1 WHERE login='".htmlentities($_SESSION['login'])."'");
}
mysql_close();
}




?>