<? session_start();



$_SESSION['code_secu'] = '78d57ds35f7sd563gf7s35dfgds63g7f2hg4c354vdfg7';


if($_GET['page'] == 'compte')
{

$timestamp_expire = time() + 365*24*3600;
setcookie('login_breakingout', 'hehe', $timestamp_expire);

}

if($_GET['page'] == 'compte')
{
$timestamp_expire2 = time() + 3600*48;
setcookie('pub', 'dejavu', $timestamp_expire2);
}

if($_POST['secuhelp'] == 'ok' && $_GET['page'] == 'help_player')
{
$timestamp_expire3 = time() + 86400;
setcookie('secuhelp', $_GET['id'], $timestamp_expire3);
}



?>


<?
if($_GET['page'] == '' || $_GET['page'] == 'inscription' || $_GET['page'] == 'hof' || $_GET['page'] == 'bannieres' || $_GET['page'] == 'liens' || $_GET['page'] == 'jeu')
{
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="Content-Language" content="fr">
<meta name="reply-to" content="sandoche@gmail.com">
<meta name="category" content="Jeux">
<meta name="robots" content="index, follow">
<meta name="Keywords" content="breakingout, evasion, break out, breaking out, prison break rpg, rpg prison, prison break, jeu prison break, breaking out rpg, breakout, pbrpg, bo, prisonbreak rpg, prisonbreak jeu">
<meta name="description" content="Evadez-vous d'une prison haute sécurité">
<meta name="revisit-after" content="15 days">
<meta name="author" lang="fr" content="Sakenplet">
<meta name="copyright" content="Sakenplet">
<meta name="identifier-url" content="http://www.breakingout.fr"> 
<meta name="expires" content="never">
<link rel="shortcut icon" type="image/png" href="favicon.ico" />
<title>/// BREAKING OUT /// Evadez-vous d'une prison haute s&eacute;curit&eacute;</title>


<style type="text/css">
<!--
body {
	background-color: #0C0F00;
}
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color:white;
}
.Style1 {color: #FFFFFF}
#Layer1 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:1;
	left: 738px;
	top: 74px;
}
#Layer2 {
	position:absolute;
	width:152px;
	height:102px;
	z-index:1;
	left: 397px;
	top: 100px;
}
a:link {
	color: #FF9900;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #FF9900;
}
a:hover {
	text-decoration: none;
	color: #99FF00;
}
a:active {
	text-decoration: none;
	color: #FF9900;
}
-->
</style>

</head>

<body>
<p>&nbsp;</p>
<table width="826" height="411" border="0" align="center" cellpadding="0" cellspacing="0" id="Tableau_01">
  <tr>
    <td colspan="3"><img src="images/ext_top.gif" width="826" height="186" alt="" />
    <div id="Layer2"><span class="Style1">
	<? include("pages/config.php"); 
	
	
	if($heures < 10)
		{
		$heures = '0'.$heures;
		}
		if($minutes < 10)
		{
		$minutes = '0'.$minutes;
		}
	
echo '<b>JOUR : </b>'.$jour.'<br /><b>HEURE : </b>'.$heures.'h'.$minutes.'<br />';
			
			include("pages/db.php");
			
			$retour = mysql_query("SELECT COUNT(*) AS id FROM connectes_ip WHERE timestamp+1800 >= ".time()." AND lieu=4");
			$donnees123 = mysql_fetch_array($retour);
			$connec = $donnees123['id'];
			
			
			$retour2 = mysql_query("SELECT COUNT(*) AS id FROM table_user WHERE statut='Prisonnier'");
			$donnees124 = mysql_fetch_array($retour2);
			$inscrit = $donnees124['id'];
			
			echo '<br />Il y a <b>'.$inscrit.'</b> détenus<br /><b>'.$connec.'</b> sont connectés';
	?>
	</span></div></td>
  </tr>
  <tr>
    <td align="right" valign="top"><img src="images/ext_menu.gif" alt="" width="290" height="225" border="0" usemap="#menu" /></td>
    <td width="490" valign="top" background="images/ext_fond.gif">
<?
	
 switch($_GET['page']){

	case "inscription":
?><img src="images/inscript.gif" alt="hof" /><?
	break;
	
	case "hof":
?><img src="images/hall_of_fame.gif" alt="hof" /><?
	break;
	
	case "bannieres":
?><img src="images/banniere.gif" alt="banniere" /><?
	break;
	
	case "liens":
?><img src="images/liens.gif" alt="liens" /><?
	break;

	case "jeu":
?><img src="images/jeux.gif" alt="jeu" /><?
	break;
	
	default:
	
	}
		?>	
	<table width="490" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="46" rowspan="3"><img src="images/space.gif" width="46" height="1" alt="" />
		
		</td>
      <tr>
        <td><br />
<?
	
 switch($_GET['page']){

	case "inscription":
    	include("pages/inscription.php");
	break;
	
	case "hof":
    	include("pages/hall_of_fame.php");
	break;
	
	case "bannieres":
    	include("pages/bannieres.php");
	break;
	
	case "liens":
    	include("pages/liens.php");
	break;

	case "jeu":
    	include("pages/jeu.php");
	break;
	
	default:
		?>
		<table>
		<form id="form1" name="form1" method="post" action="?page=login">
	<td width="428"><input type="text" name="login" />
          <img src="images/identifiant.gif" width="148" height="20" /> </td>
      </tr>
      <tr>
        <td><input type="password" name="mdp" />
          <img src="images/mdp.gif" width="148" height="22" /> </td>
      </tr></table>
	  <input type="submit" name="Submit" value="Connecter" />
	    <br />
		</form>
	    <?
		include("pages/accueil.php");
	break;
	
	}
	
?>
		  <p></p></td>
      </tr>
    </table>
      <p>&nbsp;</p>    </td>
    <td><img src="images/space.gif" width="46" height="1" alt="" /></td>
  </tr>
</table>
<br /><br /> <center>

<!-- Creation 468x60 Click-FR v3-->
<center><script LANGUAGE="JavaScript" SRC="http://adserver.click-fr.com/print.js?l=19937&s=29279&w=468&h=60&r=20&t=0"></script>
<noscript><a href="http://adserver.click-fr.com/click.htm?l=19937&s=29279&b=auto&nbre=123" target="_blank"><img border=0 width=468 height=60 SRC="http://adserver.click-fr.com/print.js?l=19937&s=29279&w=468&h=60&nbre=123&t=4" alt="*** Visitez notre Sponsor ! ***"></a></noscript>
<font size=1><br><a href=http://www.click-fr.com target=_blank>Membre de Click-FR®, Réseau francophone Paie-Par-Click</a></font>
</center>
<!-- Fin Creation Click-FR v3-->
<br /><center>
 <script language='JavaScript' src='http://www.clicjeux.net/banniere.php?id=1025'></script>
</center> <br />
<br /><a href='http://www.clicjeux.net' target=_blank><img src='http://www.clicjeux.net/bouton.gif' border=0></a>
<!-- Bubblestat V1.5 -->
<script language="javascript" src="http://in.bubblestat.com/bs.bub?cs=emnjs2vru6w)&cp=&js">
</script><noscript><a href="http://www.bubblestat.com" target="_blank"><img src="http://in.bubblestat.com/bs.bub?cs=emnjs2vru6w)&cp=" border="0" alt="Bubblestat" title="Bubblestat® : outil statistique gratuit de mesure d'audience des sites Internet">
</a>
</noscript>
<!-- Bubblestat (fin) -->
<!-- CLIC JEU ICI --->
</center>

<map name="menu" id="menu">
<area shape="rect" coords="79,1,303,81" href="?" />
<area shape="rect" coords="168,94,291,112" href="?page=jeu" />
<area shape="rect" coords="168,119,294,137" href="?page=hof" />
<area shape="rect" coords="168,144,325,161" href="?page=bannieres" /><area shape="rect" coords="166,169,343,187" href="?page=liens" />
<area shape="rect" coords="163,195,333,213" href="http://breakingout.free.fr/forum/" target="_blank"/>
</map>

</body>
</html>
<?
}else{
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script>
function h_shLayer(n,e){//v1.0 2002-2003 Copyright www.hiwit.org
  if (document.getElementById)  document.getElementById(n).style.visibility=e;
  else document.all[n].style.visibility=e;
}
</script>

<STYLE TYPE="text/css">
.T0{color:#bb0000;font-size:20px;font-family:Verdana,sans serif;font-weight:bold;}
.T1{color:#bb0000;font-size:13px;font-family:Verdana,sans serif;text-align:left;}
.L0{color:#000000;font-size:13px;font-family:Verdana,sans serif;text-align:left; background-color:#f0f0f0;}
.L1{color:#000000;font-size:13px;font-family:Verdana,sans serif;text-align:right;background-color:#f0f0f0;}
.L2{color:#000000;font-size:13px;font-family:Verdana,sans serif;text-align:left; background-color:#c0c0f0;}
.S0{color:#0000bb;font-size:13px;font-family:Verdana,sans serif;font-weight:bold;}
.S1{color:#0000bb;font-size:15px;font-family:Verdana,sans serif;font-weight:bold;}
PRE{color:#000000;font-size:13px;font-family:Courier;margin:0px;}
.Bl{color:#0000ff;font-size:13px;font-family:Verdana,sans serif;}
.Rg{color:#f00000;font-size:15px;font-family:Verdana,sans serif;font-weight:bold;}
</STYLE>
<SCRIPT SRC="gfbulle.js" LANGUAGE ="javascript"></SCRIPT>
<script language="JavaScript">
<!--
var Color = 0; // Pour alternace des couleurs de ligne
//-----------------------------------------------
// Génération de lignes pour obtenir la ScrollBar
//-----------------------------------------------
function WriteLigne(num_){
  var Html  = "";
  var szHref= "<A HREF='#" +num_ +"' ";
  var szOver= "OnMouseOver=\"return(BulleWrite('Bulle sur Ligne <B><FONT COLOR=\\'#FF0000\\'>" +num_ +"</FONT></B>'));\"";
  var szOut = "OnMouseOut =\"return(BulleHide ());\">";
  Color = 1-Color;
  Html += "<div class=L" +(1 +Color)+">";
  Html += szHref + szOver +szOut +"Ligne n° " +num_ +"</A></div>";
  document.write( Html);
}
//-->
</script>


<title>*Breaking Out V2* -<?
		
		//echo $var;

		
switch($_GET['page']){

	case "messagerie":
	$title = 'Messagerie';
	$included = 'pages/messagerie.php';	
	$header_logo = 'cellule';
	break;
	
	case "mort":
	$title = 'Vous êtes mort';
	$included = 'pages/mort.php';
	$header_logo = 'cour';
	break;
	
	case "evade":
	$title = 'Vous êtes mort';
	$included = 'pages/evade.php';
	$header_logo = 'cour';
	break;

	case "cour": 
	$title = 'Cour';
    $included = 'pages/cour.php';
	if($_GET['action'] == 'marche'){
	$header_logo = 'marche';
	}else{
	$header_logo = 'cour';
	}
	break;
	
	case "fight":
	$title = 'Fight';
	$included = 'pages/fight.php';
	$header_logo = 'fight';
	break;
	
	case "poker":
	$title = 'Fight';
	$included = 'pages/poker.php';
	$header_logo = 'poker';
	break;
	
	case "getcard":
	$title = 'Carte de travail';
	$included = 'pages/getcard.php';
	$header_logo = 'taff';
	break;
	
	
	case "error":
	$included = 'pages/error.php';
	$header_logo = 'taff';
	break;
	
	case "error1":
 	$included = 'pages/error1.php';
	$header_logo = 'taff';
	break;

	case "gangs":
	$title = 'Gangs';
  	$included = 'pages/les_gangs.php';
	$header_logo = 'fight';
	break;

	case "gang":
	$title = 'Gang';
	$included = 'pages/view_gang.php';
	$header_logo = 'fight';
	break;	
	
	case "doc":
	$title = 'Fight';
	$included = 'pages/docteur.php';
	$header_logo = 'infirmerie';
	break;
	
	case "chat":
	$title = 'Cour (Chat)';
	$included = 'pages/chat.php';
	$header_logo = 'cour';
	break;

	case "evasion": 
	$title = 'Mon gang/Evasion';
	$included = 'pages/evasion.php';
	if($_GET['action'] == 7){
	$header_logo = 'infirmerie';
	}else{
	$header_logo = 'taff';
	}
	break;

	case "taff":
	$title = 'Salle de travail';
	$included = 'pages/taff.php';
	$header_logo = 'taff';
	break;
	
	case "profil":
	$title = 'Mon profil';
	$included = 'pages/profil.php';
	$header_logo = 'cellule';
    break;  	
	
	case "login":
	$title = 'Indentification';
	$included = 'pages/login.php';
	$header_logo = 'non_identifie';
    break;

	case "deco":
	$title = 'Déconnexion';
	$included = 'pages/deco.php';
	$header_logo = 'non_identifie';
    break;
	
	case "cantine":
	$title = 'Cantine';
	$included = 'pages/cantine.php';
	$header_logo = 'cantine';
    break;
	
	case "compte":
	$title = 'Cellule';
	$included = 'pages/compte.php';
		if($_GET['lieu'] == 4){
	$header_logo = 'rencontre';
	}else{
	$header_logo = 'cellule';
	}
	$record_test = 1;
	break;

	case "deleted":
	$title = 'Supression';
	$included = 'pages/deleted.php';
	$header_logo = 'non_identifie';
    break;			

	case "login1":
	$title = 'Indentification';
	$included = 'pages/login1.php';
	$header_logo = 'non_identifie';
    break;

	case "classement":
	$title = 'Classement';
	$included = 'pages/classement.php';
	$header_logo = 'non_identifie';
    break;
	
	case "joueurs":
	$title = 'Joueurs';
	$included = 'pages/joueurs.php';
	$header_logo = 'non_identifie';
    break;
	
	case "help_player":
	$title = 'Aide exterieure';
	$included = 'pages/help_player.php';
	$header_logo = 'non_identifie';
    break;	

	default:
	$included = 'pages/news.php';
	$header_logo = 'non_identifie';
    break;	
	
  }		
		
		

echo $title;

  

  include("pages/config.php");
  include("db.php");
?>- [Evadez-vous ou mourrez dans cet univers impitoyable]</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="Content-Language" content="fr">
<meta name="reply-to" content="sandoche@gmail.com">
<meta name="category" content="Jeux">
<meta name="robots" content="index, follow">
<meta name="Keywords" content="breakingout, evasion, break out, breaking out, prison break rpg, rpg prison, prison break, jeu prison break, breaking out rpg, breakout, pbrpg, bo, prisonbreak rpg, prisonbreak jeu">
<meta name="description" content="Evadez-vous d'une prison haute sécurité">
<meta name="revisit-after" content="15 days">
<meta name="author" lang="fr" content="Sakenplet">
<meta name="copyright" content="Sakenplet">
<meta name="identifier-url" content="http://www.breakingout.fr"> 
<meta name="expires" content="never">
<link rel="shortcut icon" type="image/png" href="favicon.ico" />
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
.titre {
	color: #FF9933;
	font-weight: bold;
}
.footer {
	color: black;
	font-weight: bold;
}
-->
</style></head>

<body  background="images/bg.gif">

<div id="Layer1" align="left">
  <center>
  <table width="750" border="0">
    <tr>
      <td align="left">
	  <br /><br /><? 

		
		
		if($heures < 10)
		{
		$heures = '0'.$heures;
		}
		if($minutes < 10)
		{
		$minutes = '0'.$minutes;
		}
		
			echo '<b>JOUR : </b>'.$jour.'<br /><b>HEURE : </b>'.$heures.'h'.$minutes.'<br />';
			
			
			$retour = mysql_query("SELECT COUNT(*) AS id FROM connectes_ip WHERE timestamp+1800 >= ".time()." AND lieu=4");
			$donnees123 = mysql_fetch_array($retour);
			$connec = $donnees123['id'];
			
			$retour2 = mysql_query("SELECT COUNT(*) AS id FROM table_user WHERE statut='Prisonnier'");
			$donnees124 = mysql_fetch_array($retour2);
			$inscrit = $donnees124['id'];
			
			echo '<br />Il y a <b>'.$inscrit.'</b> détenus<br /><b>'.$connec.'</b> sont connectés';
			
			if($record_test == 1)
			{
			$retour3 = mysql_query("SELECT record FROM table_record_connexions WHERE id=1");
			$donnees125 = mysql_fetch_array($retour3);
			$record = $donnees125['record'];
			
			
			if($record < $connec){
			
			$reponseliste = mysql_query("SELECT * FROM connectes_ip WHERE timestamp+1800 >= ".time()." AND lieu=4"); 
				while ($donneesliste = mysql_fetch_array($reponseliste) )
			{
			$liste .= $donneesliste['mec1'].' - ';
			}
		
			mysql_query("UPDATE table_record_connexions SET record='".$connec."' WHERE id='1'");
			mysql_query("UPDATE table_record_connexions SET date='".$secondesupp."' WHERE id='1'");
			mysql_query("UPDATE table_record_connexions SET presents='".$liste."' WHERE id='1'");
			
			}
			
			}
			?></td>
    </tr>
  </table></center>
  <p>&nbsp;</p>
</div>

<div id="Layer2" type="hidden">
<center>
  <table width="750" border="0">
    <tr>
      <td align="center" background="images/hover2.png">
	  <a href="#" onClick="h_shLayer('Layer2','hidden')">Fermer</a>
	  <br />
	  <img src="images/map_<?
	  
	  if($heures >= 6 && $heures <= 22){
	  echo 'jour';
	  }else{
	  echo 'nuit';	  
	  }
	  
	  
	  ?>.png" alt="map" border="0" usemap="#Map"/><br />
	  <br />
	  </td>
	</tr>
</table>
</center>
</div>





<center>
<!-- ImageReady Slices (design.psd) -->
<table id="Table_01" width="850" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td background="images/design_01.png" width="850" height="34" valign="top"><table width="100%" border="0">
          <tr>
            <td class="abcd" width="20%"><div align="center"><a href="?page=compte">JOUER</a></div></td>
            <td class="abcd" width="20%"><div align="center"><a href="?page=gangs">GANGS</a></div></td>
            <td class="abcd" width="20%"><div align="center"><a href="?page=classement">CLASSEMENT</a></div></td>
            <td class="abcd" width="20%"><div align="center"><a href="?page=joueurs">JOUEURS</a></div></td>
            <td class="abcd" width="20%"><div align="center"><a href="http://breakingout.free.fr/forum">FORUM</a></div></td>
          </tr>
        </table></td>
	</tr>
	<tr>
	  <td background="images/design_02_<? echo $header_logo; ?>.png" width="850" height="242"  valign="top"><img src="couche/design_02.png" alt="img" width="850" height="242" /></td>
	</tr>
	<tr>
		<td bgcolor="#232323" valign="top" class="abc" ><center><table width="95%" border="0">
            <tr>
              <td >

			 <br /> 
			 
			 <?
			  if( !empty($_SESSION['login']) )
{
			 ?>
			 <table width="100%" border="0">
               <tr>
                 
                 <td width="100%" nowrap="nowrap" background="images/flech_fond.png"><table width="100%" border="0">
                   <tr>
                     <td width="23%"><a href="#" onClick="h_shLayer('Layer2','visible')"><img src="images/bouton_navig.png" alt="menu_navig" width="181" height="162" border="0" /></a></td>
                     <td width="77%">
					 <div align="left">
					 
					 <table width="94%" border="0">
                       <tr>
                         <td width="20%" class="abcd2"><div align="center"><span class="Style4"><a  href="?page=fight">Mes Combats
                           <? nouveaux_defis(table_fight); ?>
                         </a></span></div></td>
                         <td width="20%" class="abcd2"><div align="center"><span class="Style4"><a  href="?page=poker">Mes Parties
                           <? nouveaux_defis(table_poker); ?>
                         </a></span></div></td>
                         <td width="20%" class="abcd2"><div align="center"><span class="Style4"><a  href='?page=messagerie'>Messagerie
                           <? messages_new(1); ?>
                         </a></span></div></td>
                         <td width="20%" class="abcd2"><div align="center"><span class="Style4"><a  href="?page=compte&amp;lieu=1">Mes objets</a></span></div></td>
                         <td width="20%" class="abcd2"><div align="center"><span class="Style4"><a  href='?page=deco'>Deconnexion</a></span></div></td>
                       </tr>
                     </table>    
					 </div>
					 <br /></td>
                   </tr>
                 </table>                 
                    </td>
               </tr>
             </table>
			 <?
			 }
			 ?>
			 
			 
			 
			 <div align="left">
			 <?
			 include("$included");
			 ?>
				 <!---
			   </p>
			 </div>
			 <div align="left">
                <p>&nbsp;</p>
                </div></td>
				

            </tr>
          </table>
		  </center> -->
		  <br /><br />
<!-- Creation 468x60 Click-FR v3-->
<center><script LANGUAGE="JavaScript" SRC="http://adserver.click-fr.com/print.js?l=19937&s=29279&w=468&h=60&r=20&t=0"></script>
<noscript><a href="http://adserver.click-fr.com/click.htm?l=19937&s=29279&b=auto&nbre=123" target="_blank"><img border=0 width=468 height=60 SRC="http://adserver.click-fr.com/print.js?l=19937&s=29279&w=468&h=60&nbre=123&t=4" alt="*** Visitez notre Sponsor ! ***"></a></noscript>
<font size=1><br><a href=http://www.click-fr.com target=_blank>Membre de Click-FR®, Réseau francophone Paie-Par-Click</a></font></center>
<!-- Fin Creation Click-FR v3-->
<br /><center>
 <script language='JavaScript' src='http://www.clicjeux.net/banniere.php?id=1025'></script>
</center> <br />
<br />
<a href='http://www.clicjeux.net' target=_blank><img src='http://www.clicjeux.net/bouton.gif' border=0></a>
<!-- Bubblestat V1.5 -->
<script language="javascript" src="http://in.bubblestat.com/bs.bub?cs=emnjs2vru6w)&cp=&js">
</script><noscript><a href="http://www.bubblestat.com" target="_blank"><img src="http://in.bubblestat.com/bs.bub?cs=emnjs2vru6w)&cp=" border="0" alt="Bubblestat" title="Bubblestat® : outil statistique gratuit de mesure d'audience des sites Internet">
</a>
</noscript>
<!-- Bubblestat (fin) --></td>
<table>	
	</tr>
	<tr>
		<td background="images/design_04_<? echo $header_logo; ?>.png" width="850" height="53"/><div align="center" class="footer">www.breakingout.fr © Tous droits reservés</div>
		</td>
	</tr>
</table>

<!-- End ImageReady Slices -->
</center>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
      </script>
      <script type="text/javascript">
      </script>
<script type="text/javascript">_uacct = "UA-209634-3";
urchinTracker();
</script>




<map name="Map" id="Map">
  <area shape="poly" coords="136,476" href="#" /><area shape="poly" coords="145,471,143,452,167,373,187,363,206,374,188,467" href="?page=doc" onmouseover="return(BulleWrite('<b>Infirmerie</b><br /><span class=Style4>En cas de problème de santé une infirmiere prendra soin de vous</span>.'));" onmouseout="return(BulleHide ());" />
<area shape="poly" coords="290,522,192,521,230,346,346,347,358,457,294,487" href="?page=cour" onmouseover="return(BulleWrite('<b>La Cour</b><br /><span class=Style4>Venez dans la cour pour rencontrer et defier des prisonniers ainsi que pour faire vos achat et ventes dans le marché noir, faire du sport, ou même vous laver dans les douches</span>.'));" onmouseout="return(BulleHide ());" />
<area shape="poly" coords="445,525,416,349,345,346,357,458,416,478,423,527" href="?page=chat" onmouseover="return(BulleWrite('<b>La Cour (chat)</b><br /><span class=Style4>Venez ici pour discuter avec les occupant de la prison</span>.'));" onmouseout="return(BulleHide ());" />
<area shape="poly" coords="451,489,470,491,493,513,558,511,559,447,553,433,565,416,557,377,569,367,547,307,533,300,503,299,496,308,473,307,446,315,438,313,436,378" href="?page=compte" onmouseover="return(BulleWrite('<b>La Cellule</b><br /><span class=Style4>Votre espace vital, où vous êtes emprisonné et là où tout se joue</span>.'));" onmouseout="return(BulleHide ());" />
<area shape="poly" coords="391,269,459,267,459,258,449,245,387,246,386,258" href="?page=taff" onmouseover="return(BulleWrite('<b>Salle de travail</b><br /><span class=Style4>Un peu de travail ne fait pas de mal, bien au contraire</span>.'));" onmouseout="return(BulleHide ());" />
<area shape="poly" coords="413,302,435,303,436,286,431,280,412,279,409,292"  href="?page=evasion" onmouseover="return(BulleWrite('<b>Mon gang</b><br /><span class=Style4>Vous avez un gang ? Vous voulez sortir de cette prison ? Venez ici !</span>'));" onmouseout="return(BulleHide ());" />
<area shape="poly" coords="259,334,265,294,264,278,201,279,174,321,178,338,258,333" href="?page=cantine" onmouseover="return(BulleWrite('<b>Cantine</b><br /><span class=Style4>En prison, manger est primordial pour la survie.</span>'));" onmouseout="return(BulleHide ());" />
</map></body>
</html>
<?


}

/*
if( !empty($_SESSION['login']) )
{
include("db.php");

$result = addslashes($result);

//mysql_query("INSERT INTO table_log VALUES ('', '".htmlentities($_SESSION['login'])."', '".htmlentities($_GET['page'])."', '".htmlentities($_GET['action'])."', '".htmlentities($_GET['don'])."', '".htmlentities($_GET['lieu'])."', '".$result."', '".$xp_force."', '".$xp_agilite."', '".$xp_intelligence."', '".$xp_respect."', '', '".time()."', '".$jour."', '".$_SERVER["REMOTE_ADDR"]."')"); 
}
*/
?>

