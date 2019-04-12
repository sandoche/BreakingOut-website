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


<br /><br />
REGLER ALLOPASSES!!! et liens de redirection en fonction de la racine avant upload !!
<br /><br /><br /><br />



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
	
	case "chat":
echo 'Tchat'; 
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

  

  include("pages/config.php");
  include("db.php");
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
.a2 {   background-color: #ececec; 
}
-->

</style>
</head>

<body>
<center>
<table width="800" border="0">

  <tr>
    <td width="100" valign="top"><?
	
	if( !empty($_SESSION['login']) )
{
?>

      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p><a  href="?page=fight">Mes Combats
          <? nouveaux_defis(table_fight); ?>
      </a></p>
      <p><a  href="?page=poker">Mes Parties
        <? nouveaux_defis(table_poker); //nouveaux_defis(table_poker); ?>
      </a></p>
      <p><a href="?page=cour">Cour</a></p>
      <p><a href="?page=taff">Salle de travail</a></p>
      <p><a href="?page=chat">Tchat</a></p>
      <?
}


?></td>
	<td width="600">
	
	<? 

		
		
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
			?>
      <br />
      <br />
      <a href="?page=compte">JOUER</a> - <a href="?page=gangs">GANGS</a> - <a href="?page=classement">CLASSEMENT</a> - <a href="?page=joueurs">LES JOUEURS</a> - <a href="http://breakingout.free.fr/forum">FORUM</a> <br />
      <br />
      <?
	


		

		

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
	
	case "error1":
    	include("pages/error1.php");
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
	
	case "chat":
    	include("pages/chat.php");
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
?>
      <script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
      </script>
      <script type="text/javascript">
      </script></td>
	  
	  <td width="100" bgcolor="#FFFFFF" valign="top"><?
	  
	if( !empty($_SESSION['login']) )
{
?>

        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p><a href="?page=compte">Cellule</a></p>
        <p><a href="?page=doc">Infirmerie**</a></p>
        <p><a href="?page=cantine"> Cantine</a></p>
        <p><a href="?page=evasion">Mon gang </a></p>
        <p><a  href='?page=messagerie'><a  href="?page=compte&amp;lieu=1">Mes objets</a></p>
      <?
}
	  
	  ?></td>
  </tr>
</table>
</center>
<script type="text/javascript">_uacct = "UA-209634-3";
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