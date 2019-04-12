<? session_start();

if($_GET['page'] == 'login')
{

$timestamp_expire = time() + 365*24*3600;
setcookie('login_breakingout', 'hehe', $timestamp_expire);

}

if($_GET['page'] == 'compte')
{
$timestamp_expire2 = time() + 3600*48;
setcookie('pub', 'dejavu', $timestamp_expire2);
}


if($_GET['page'] == 'compte')
{
ob_start("ob_gzhandler");
}
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
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="Shortcut Icon" href="favicon.ico"> 
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

			 <br /> <table width="100%" border="0">
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
			 <div align="left">
			 <?
			 include("$included");
			 ?>
			     <br /> 
				 
			   </p>
			 </div>
			 <div align="left">
                <p>&nbsp;</p>
                </div></td>
            </tr>
          </table>
		  </center>
	      <p align="left">&nbsp;</p>
      <p>&nbsp;</p></td>
	</tr>
	<tr>
		<td background="images/design_04.png" width="850" height="53"/><div align="center">www.breakingout.fr</div>
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
if($_GET['page'] == 'compte')
{
ob_end_flush();
}



?>

