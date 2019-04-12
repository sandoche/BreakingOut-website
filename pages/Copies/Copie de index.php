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

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<? //<link rel="Shortcut Icon" href="favicon.ico"> ?>
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

<title>*Breaking Out* -<?
		
		echo $var;

		

 switch($_GET['page']){


	
	case "cour":
echo 'Cour'; 
	break;
	
		case "cantine":
echo 'Cantine'; 
	break;
	
	case "fight":
echo 'Combats'; 
	break;
	
	case "poker":
echo 'Poker'; 
	break;

	case "gangs":
echo 'Gangs'; 
	break;

	case "gang":
echo 'Gangs'; 
	break;	
	
	case "doc":
echo 'Infirmerie'; 
	break;

	case "evasion":
echo 'Evasion';   
	break;

	case "taff":
echo 'Industrie pénitentiaire'; 
	break;
	
	case "profil":
echo 'Mon Compte';    
    break;  	
	
	case "stats":
echo 'Statistiques';   
    break;  


	case "compte":
echo 'Mon compte';   
	break;
		
	case "login1":
echo 'Jouer';
    break;

	case "classement":
echo 'Classement';
    break;
	
	case "joueurs":
echo 'Les joueurs';
    break;
	
	case "hof":
echo 'Hall of fame';
    break;		

	case "liens":
echo 'Liens';
    break;	
	
	case "regles":
echo 'Reglementation';
	break; 
	
	case "inscription":
echo 'Inscription';
	break;
	
	case "news":
echo 'News';
	break; 
	
	default:	

    break;	
	
  }


?>- [Evadez-vous d'une prison haute sécurité]</title>
<style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
}
a:link {
	color: #7e5125;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #7e5125;
}
a:hover {
	text-decoration: none;
	color: #cc0000;
}
a:active {
	text-decoration: none;
	color: #7e5125;
}
-->
</style>
</head>

<body>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head><body leftmargin="0" topmargin="0" bgcolor="#ffffff" marginheight="0" marginwidth="0">
<!-- ImageReady Slices (design.psd) -->
<table id="Tableau_01" border="0" cellpadding="0" cellspacing="0" height="769" width="800">
	<tbody><tr>
		<td colspan="24" background="design_fichiers/design_01.gif" height="158" width="800">
			</td>
	</tr>
	<tr>
		<td colspan="2">
			<img src="design_fichiers/design_02.gif" alt="" height="19" width="100"></td>
		<td>		  <img src="design_fichiers/news.gif" alt="news" height="19" width="39"  border="0"></td>
		<td colspan="2">
		  <img src="design_fichiers/reglement.gif" alt="reglement" height="19" width="77" border="0"></td>
		<td>
			<img src="design_fichiers/design_05.gif" alt="" height="19" width="10"></td>
		<td colspan="2">
		  <img src="design_fichiers/inscription.gif" alt="inscription" height="19" width="75"  border="0"></td>
		<td>
			<img src="design_fichiers/design_07.gif" alt="" height="19" width="10"></td>
		<td colspan="2">
			<a href="?page=compte">
			<img src="design_fichiers/jouer.gif" alt="jouer" height="19" width="40" border="0"></a></td>
		<td>
			<img src="design_fichiers/design_09.gif" alt="" height="19" width="8"></td>
		<td>
			<a href="?page=gangs">
			<img src="design_fichiers/gangs.gif" alt="gangs" height="19" width="45"  border="0" ></a></td>
		<td>
			<img src="design_fichiers/design_11.gif" alt="" height="19" width="9"></td>
		<td colspan="2">
			<a href="?page=classement">
			<img src="design_fichiers/classement.gif" alt="classement" height="19" width="71"  border="0"></a></td>
		<td>
			<img src="design_fichiers/design_13.gif" alt="" height="19" width="5"></td>
		<td>
			<a href="?page=joueurs">
			<img src="design_fichiers/joueurs.gif" alt="joueurs" height="19" width="57"  border="0"></a></td>
		<td>
			<img src="design_fichiers/design_15.gif" alt="" height="19" width="7"></td>
		<td>
		  <img src="design_fichiers/hall_of_fame.gif" alt="hall_of_fame" height="19" width="79"  border="0" ></td>
		<td>
		  <img src="design_fichiers/lien.gif" alt="liens" height="19" width="47" border="0"></td>
		<td>
			<a href="http://breakingout.free.fr/forum/" target="_blank">
			<img src="design_fichiers/forum.gif" alt="forum" height="19" width="50" border="0"></a></td>
		<td colspan="2" background="design_fichiers/design_19.gif" height="19" width="20"></td>
	</tr>
	<tr>
<script type="text/javascript">
<!-- Debut


var name = navigator.appName


if (name == "Microsoft Internet Explorer")
document.write('<td rowspan="8" background="design_fichiers/design_20.gif" height="591" width="68"></td>');

else
document.write('<?
	if($_GET['page'] == 'fight' || $_GET['page'] == 'poker' || $_GET['page'] == 'compte' || $_GET['page'] == 'stats' || $_GET['page'] == 'profil' || $_GET['page'] == 'inscription' || $_GET['page'] == 'news')
	{	
	echo '<td rowspan="8" background="design_fichiers/design_20.gif"  width="68"></td>';
	}
	else
	{
	echo '<td rowspan="8" background="design_fichiers/design_20.gif" height="591" width="68"></td>';
	}
	?>
');


// fin du script -->
</script> 
	
		
		<td rowspan="4" background="design_fichiers/extensiible-gauche-2.gif"  width="32"></td>
		<td colspan="2" background="design_fichiers/design_22.gif" height="85" width="114"></td>
		<td colspan="3" rowspan="4" background="design_fichiers/extensible-gauche.gif"  width="49"></td>
		<td colspan="15" rowspan="4" valign="top" >

		<br />
<?
	


		
		include("pages/config.php");
		

 switch($_GET['page']){

	case "messagerie":
    	include("pages/messagerie.php");
	break;
	
	case "mort":
    	include("pages/mort.php");
	break;
	
	case "evade":
    	include("pages/evade.php");
	break;

	case "cour":
    	include("pages/cour.php");
	break;
	
	case "fight":
    	include("pages/fight.php");
	break;
	
	case "poker":
    	include("pages/poker.php");
	break;
	
	case "getcard":
    	include("pages/getcard.php");
	break;
	
	
	case "error":
    	include("pages/error.php");
	break;

	case "gangs":
    	include("pages/les_gangs.php");
	break;

	case "gang":
    	include("pages/view_gang.php");
	break;	
	
	case "doc":
    	include("pages/docteur.php");
	break;

	case "evasion":
    	include("pages/evasion.php");
	break;

	case "taff":
    	include("pages/taff.php");
	break;
	
	case "profil":
        include("pages/profil.php");
    break;  	
	
	case "stats":
        include("pages/stats.php");
    break;  

	case "login":
        include("pages/login.php");
    break;

	case "deco":
        include("pages/deco.php");
    break;
	
	case "cantine":
        include("pages/cantine.php");
    break;
	
	case "compte":
		include("pages/compte.php");
	break;

	case "deleted":
        include("pages/deleted.php");
    break;			

	case "login1":
        include("pages/login1.php");
    break;

	case "classement":
        include("pages/classement.php");
    break;
	
	case "joueurs":
        include("pages/joueurs.php");
    break;
	

	default:	
        include("pages/news.php");
    break;	
	
  }

//  echo '<img src="design_fichiers/corps_du_site.gif" alt="corps_du_site" height="524" width="466">';
?><br /><br />
			</td>
		<td rowspan="4" background="design_fichiers/extensible-droit-.gif"  width="28">
		</td>
		<td rowspan="8" height="591"></td>
	</tr>
	<tr>
		<td colspan="2" background="design_fichiers/etat_jeu.gif" height="81" width="114" valign="TOP"><br />
		<? 
			echo '<b>JOUR : </b>'.$jour.'<br /><b>HEURE : </b>'.$heures.'h'.$minutes.'<br />';
			
			include("db.php");
			
			$retour = mysql_query("SELECT COUNT(*) AS id FROM connectes_ip WHERE timestamp+1800 >= ".time()." AND lieu=4");
			$donnees123 = mysql_fetch_array($retour);
			$connec = $donnees123['id'];
			
			$retour2 = mysql_query("SELECT COUNT(*) AS id FROM table_user WHERE statut='Prisonnier'");
			$donnees124 = mysql_fetch_array($retour2);
			$inscrit = $donnees124['id'];
			
			echo '<br />Il y a <b>'.$inscrit.'</b> détenus<br /><b>'.$connec.'</b> sont connectés';
			?><br /><br />
		</td>
	</tr>
	<tr>
		<td colspan="2" background="design_fichiers/design_28.gif"  height="29" width="114"></td>
	</tr>

	<tr><script type="text/javascript">
<!-- Debut


var name = navigator.appName


if (name == "Microsoft Internet Explorer")
document.write('<td colspan="2" background="design_fichiers/partenaires.gif"  height="329" width="114"  valign="top">');

else
document.write('<?
	if($_GET['page'] == 'fight' && $_GET['action'] == NULL || $_GET['page'] == 'poker' && $_GET['action'] == NULL || $_GET['page'] == 'stats' || $_GET['page'] == 'profil' || $_GET['page'] == 'news')
	{
		echo '<td colspan="2" background="design_fichiers/partenaires.gif"  width="114"  valign="top">';	
	}
		else
		{
		
		if(($_SESSION['login'] != NULL && $_GET['lieu'] == NULL && $_GET['page'] == 'compte') || ($_GET['page'] == 'inscription' && $_GET['step'] == NULL))
		{
		echo '<td colspan="2" background="design_fichiers/partenaires.gif" width="114"  valign="top">';
		}
		
		else
		{
		
		echo '<td colspan="2" background="design_fichiers/partenaires.gif"  height="329" width="114"  valign="top">';
		}
		}
		
		
		?>');


// fin du script -->
</script> 	
		<br />
		<a href="http://bout.webowin.fr/index.php?page=liens&id=1" target="_blank">Webowin</a>
		<br />
		</td>
		
	</tr>
	

	<tr>
		<td colspan="22">
			<img src="design_fichiers/design_30.gif" alt="" height="23" width="689"></td>
	</tr>
	<tr>
		<td colspan="4" rowspan="2">
			<img src="design_fichiers/design_31.gif" alt="" height="27" width="148"></td>
		<td colspan="5">
			<img src="design_fichiers/design_32.gif" alt="" height="17" width="115"></td>
		<td colspan="5">
			<a href="mailto:webmaster@webowin.fr">
				<img src="design_fichiers/snakehill.gif" alt="snakehill" border="0" height="17" width="93"></a></td>
		<td colspan="8" rowspan="2">
			<img src="design_fichiers/design_34.gif" alt="" height="27" width="333"></td>
	</tr>
	<tr>
		<td colspan="10">
			<img src="design_fichiers/design_35.gif" alt="" height="10" width="208"></td>
	</tr>
	<tr>
		<td colspan="22">
			<img src="design_fichiers/design_36.gif" alt="" height="17" width="689"></td>
	</tr>
	<tr>
		<td>
			<img src="design_fichiers/spacer.gif" alt="" height="1" width="68"></td>
		<td>
			<img src="design_fichiers/spacer.gif" alt="" height="1" width="32"></td>
		<td>
			<img src="design_fichiers/spacer.gif" alt="" height="1" width="39"></td>
		<td>
			<img src="design_fichiers/spacer.gif" alt="" height="1" width="75"></td>
		<td>
			<img src="design_fichiers/spacer.gif" alt="" height="1" width="2"></td>
		<td>
			<img src="design_fichiers/spacer.gif" alt="" height="1" width="10"></td>
		<td>
			<img src="design_fichiers/spacer.gif" alt="" height="1" width="37"></td>
		<td>
			<img src="design_fichiers/spacer.gif" alt="" height="1" width="38"></td>
		<td>
			<img src="design_fichiers/spacer.gif" alt="" height="1" width="10"></td>
		<td>
			<img src="design_fichiers/spacer.gif" alt="" height="1" width="20"></td>
		<td>
			<img src="design_fichiers/spacer.gif" alt="" height="1" width="20"></td>
		<td>
			<img src="design_fichiers/spacer.gif" alt="" height="1" width="8"></td>
		<td>
			<img src="design_fichiers/spacer.gif" alt="" height="1" width="45"></td>
		<td>
			<img src="design_fichiers/spacer.gif" alt="" height="1" width="9"></td>
		<td>
			<img src="design_fichiers/spacer.gif" alt="" height="1" width="11"></td>
		<td>
			<img src="design_fichiers/spacer.gif" alt="" height="1" width="60"></td>
		<td>
			<img src="design_fichiers/spacer.gif" alt="" height="1" width="5"></td>
		<td>
			<img src="design_fichiers/spacer.gif" alt="" height="1" width="57"></td>
		<td>
			<img src="design_fichiers/spacer.gif" alt="" height="1" width="7"></td>
		<td>
			<img src="design_fichiers/spacer.gif" alt="" height="1" width="79"></td>
		<td>
			<img src="design_fichiers/spacer.gif" alt="" height="1" width="47"></td>
		<td>
			<img src="design_fichiers/spacer.gif" alt="" height="1" width="50"></td>
		<td>
			<img src="design_fichiers/spacer.gif" alt="" height="1" width="28"></td>
		<td background="design_fichiers/spacer.gif" height="1" width="43"></td>
	</tr>
</tbody></table>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-209634-3";
urchinTracker();
</script>
</body>
</html>
<?
if($_GET['page'] == 'compte')
{
ob_end_flush();
}
?>