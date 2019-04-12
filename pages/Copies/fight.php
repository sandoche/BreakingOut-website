<? session_start();?>
<?
if( empty($_SESSION['login']) )
{
include("login1.php");
}
else
{

include("db.php");

$retour_compte = '<br /><br /><a href="?page=compte">Retour</a>';
$retour_cour = '<br /><br /><a href="?page=cour">Retour</a>';
$retour = '<br /><br /><a href="?page=fight&action=1">Retour</a>';
$retour1 = '<br /><br /><a href="?page=fight">Retour</a>';

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
		$carac_force = $donnees1['carac_force'];
		$carac_agilite = $donnees1['carac_agilite'];
		$carac_intelligence = $donnees1['carac_intelligence'];
		$carac_respect = $donnees1['carac_respect'];
		$stat_combats_gagne = $donnees1['stat_combats_gagne'];
		$stat_combats = $donnees1['stat_combats'];
		$stat_infractions = $donnees1['stat_infractions'];
		$stat_trou = $donnees1['stat_trou'];
		$stat_parties_poker_gagne = $donnees1['stat_parties_poker_gagne'];
		$stat_parties_poker = $donnees1['stat_parties_poker'];
		$stat_sous_poker_gagne = $donnees1['stat_sous_poker_gagne'];
		$time_trou = $donnees1['time_trou'];
		$date_peine_de_mort = $donnees1['date_peine_de_mort'];
		$evasion_etape = $donnees1['evasion_etape'];
		$job = $donnees1['job'];
		$statut = $donnees1['statut'];
		$date_inscription = $donnees1['date_inscription'];
		$time = $donnees1['time'];
		$gang = $donnees1['gang'];
		$pa = $donnees1['pa'];
		$avatar = $donnees1['avatar'];
		$description = $donnees1['description'];
		$moral = $donnees1['moral'];
		$faim = $donnees1['faim'];
		}
		
		
		$reponsea = mysql_query("SELECT * FROM table_cour WHERE id='".$_SESSION['id_user_secu']."'");
		
		while ($donneesa = mysql_fetch_array($reponsea) )
		{	
		$id_yop = $donneesa['id'];
		$posx = $donneesa['pos_x'];
		$posy = $donneesa['pos_y'];
		$pm = $donneesa['pm'];
		}
		
if($statut == 'Prisonnier')
{		
		
if($time_trou > $secondesupp)
		{
?>
<style type="text/css">
<!--
.style5 {font-size: 9px}
-->
</style>

<table border=0><tbody><tr><td width=8 style='background-color:#f3e8dd'></td><td width=273 style='background-color:#ececec'><b><font color=#845d29>T</font>R<font color=#845d29>O</font>U</b></td></tr></tbody></table><br />
<br />
<p>Bienvenue au TROU <? $nom_rpg  = strtoupper($nom_rpg);
echo $nom_rpg.' '.$prenom_rpg; ?>, (<? echo $_SESSION['login']; ?>) prisonnier N°<? echo $id; ?>
<br /><br />Vous y resterez jusqu'au
<?
			  $secondesupp1 = $time_trou;
			  
			  $jour1 = floor($secondesupp1/21600);
$heuresensec1 = fmod($secondesupp1, 21600);
$heures1 = floor($heuresensec1/900);
$minutesensec1 = fmod($heuresensec1, 900);
$minutes1 =  floor($minutesensec1/15);

echo ' jour '.$jour1.' à '.$heures1.'h'.$minutes1.'.';
			  ?>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<?
}
else
{

include("pages/liens_imp.php");
?>
<table width="100%">
<tr><td width="70%" valign="top">
<table border=0><tbody><tr><td width=8 style='background-color:#f3e8dd'></td><td width=273 style='background-color:#ececec'><b><font color=#845d29>C</font>OM<font color=#845d29>BAT</font>S</b></td></tr></tbody></table>
</td>
<td width="30%"><img src="images/se_battre.png"></td></table>

<?
if($_GET['action'] == 1)
{

if($pm >= 30)
{



$reponsed = mysql_query("SELECT * FROM table_cour WHERE id='".htmlentities($_GET['id'])."'");
		
		while ($donneesd = mysql_fetch_array($reponsed) )
		{	
		$id_yop_2 = $donneesd['id'];
		$posx_2 = $donneesd['pos_x'];
		$posy_2 = $donneesd['pos_y'];
		}
		
$distance = sqrt(pow(($posx_2-$posx),2)+pow(($posy_2-$posy),2));

$req_user = mysql_query("SELECT SQL_CACHE * FROM table_user WHERE id='".htmlentities($_GET['id'])."'");
$rep_user = mysql_fetch_array($req_user);
$login_man = $rep_user['login'];
$reponse = mysql_query("SELECT SQL_CACHE id, mec1 FROM connectes_ip WHERE timestamp+1800 >= ".time()." AND lieu=4 AND mec1='".$login_man."'"); 
$donnees222 = mysql_fetch_array($reponse);
 
if($id_yop_2 != NULL && $donnees222['id'] != NULL && htmlentities($_GET['id']) != $_SESSION['id_user_secu'])
{

if($distance == 1)
{

if($moral >= 15)
{

?>
<br />
<table width="450" border="0">
  <tr>
    <td><fieldset style="border-color:#7e5125">

      <legend><strong>Se battre  : </strong></legend>
      <div><form id="form1" name="form1" method="post" action="?page=fight&action=2">
        <table width="100%" border="0">
          <tr>
            <td>Surnom du prisonnier d&eacute;fi&eacute; </td>
            <td><label>
              <?
			  
			  echo $login_man;
			  echo '<input name="name" type="hidden" value="'.$login_man.'" />';
			  echo '<input name="id_man" type="hidden" value="'.$_GET['id'].'" />';
			  
			  ?>
            </label></td>
          </tr>
		            <tr>
            <td>Tentative de vol </td>
            <td><label>
              <input name="vol" type="radio" value="1" />
            Aucun</label>
			<label>
              <input name="vol" type="radio" value="2" />
            Objet*</label>
			
			<label>
              <input name="vol" type="radio" value="3" />
            Argent*</label></td>
          </tr>


		            <tr>
            <td valign="top">Attaque :</td>

            <td><label>
              <input name="attaque" type="radio" value="1" />
            Tête</label>
			<label>
              <input name="attaque" type="radio" value="2" />
            Corps</label>
			<label>
              <input name="attaque" type="radio" value="3" />
            Jambes</label>
<label><br /></label></tr>
<tr>
<td valign="top">			Défense :</td>
<td>
              <input name="defense" type="radio" value="1" />
            Tête</label>
			<label>
              <input name="defense" type="radio" value="2" />
            Corps</label>
			<label>
              <input name="defense" type="radio" value="3" />
            Jambes</label>
			<label><br /><br />
              <input type="submit" name="Submit" value="GO" />
            </label></td>
          </tr>
        </table>
      </form>
        <p>*Augmente les chances d'aller au trou. </p>
      </div>
    </fieldset></td></tr></table></p><br />
<p>
  <?
  }else{
  echo '<br /><br />Votre moral est trop faible pour combattre.'.$retour_cour;
  }
   }
   else
   {
   echo '<br /><br />Vous êtes trop éloigné du joueur défié.'.$retour_cour;
   }
   }else{
   echo '<br /><br />Ce joueur n\'est pas connecté ou n\'est pas dans la cour.'.$retour_cour;
   }
   
  }
  else
  {
  echo '<br /><br />Vous n\'avez pas assez de PM pour effectuer cette action.'.$retour_cour;
  }
  
  
}
elseif($_GET['action'] == 2)
{


if($pm >= 30)
{

if($_POST['name'] != NULL && $_POST['vol'] != NULL) 
{

$name = strtolower($_POST['name']);
$my_name = strtolower($_SESSION['login']);
$name = htmlentities($name);

$i=0;

if($name != $my_name)
{
$reponse = mysql_query("SELECT * FROM table_user WHERE login='".$name."'"); 
				while ($donnees = mysql_fetch_array($reponse) )
		{
		$i++;
		$statut = $donnees['statut'];
		}
		
if($i != 0) //VERIFIER PSEUDO
{

if($statut == 'Prisonnier')
{

mysql_query("INSERT INTO table_fight VALUES ('', '".$my_name."', '".$name."', '".htmlentities($_POST['vol'])."', '0', '".htmlentities($_POST['attaque'])."', '".htmlentities($_POST['defense'])."', '".htmlentities($_SESSION['id_user_secu'])."', '".htmlentities($_POST['id_man'])."', '".$secondesupp."')");
mysql_query("UPDATE table_cour SET pm=pm-30 WHERE id='".$_SESSION['id_user_secu']."'");

echo 'Votre défi a été lancé, il a été mis dans la liste d\'attente de votre adversaire et dans la votre.'.$retour_cour;

}
else
{
echo 'Ce prisonnier n\'existe pas.'.$retour_cour; 
}
}
else
{
echo 'Ce prisonnier n\'existe pas.'.$retour_cour; 
}



}
else
{
echo 'Vous ne pouvez pas vous défier, sinon allez a l\'hopital psychiatrique.'.$retour_cour;
}
}
else
{
echo '<br /><br />Vous avez mal rempli le formulaire.'.$retour_cour;
}
 }
  else
  {
  echo '<br /><br />Vous n\'avez pas assez de PM pour effectuer cette action.'.$retour_cour;
  }
}
elseif($_GET['action'] == 3) 
{

if($_GET['id'] != NULL)
{

if($_GET['type'] == 1) //Annulation
{

$reponse = mysql_query("SELECT * FROM table_fight WHERE id='".htmlentities($_GET['id'])."'"); 
while ($donnees = mysql_fetch_array($reponse) )
{
$moi_verif = strtolower($donnees['defieur']);
$resultat_0 = $donnees['resultat'];
}

$moi = strtolower($_SESSION['login']);

if($moi_verif == $moi)
{
if($resultat_0 == 0)
{

mysql_query("DELETE FROM table_fight WHERE id='".htmlentities($_GET['id'])."'"); 

echo 'Le défi a été annulé.<br /><br />';

mysql_query("UPDATE table_cour SET pm=pm+15 WHERE id='".htmlentities($_SESSION['id_user_secu'])."'");
mysql_query("UPDATE table_user SET carac_respect=carac_respect-5 WHERE id='".$_SESSION['id_user_secu']."'");
echo 'Votre respect a baissé de 0,005 XP.'.$retour1;


}
else
{
echo 'Ce défi ne peut ni être supprimé ni annulé 1.'.$retour1;
}
}
else
{
echo 'Ce défi ne peut ni être supprimé ni annulé 2.'.$retour1;
}

}
elseif($_GET['type'] == 2) //Refus                
{


$reponse = mysql_query("SELECT * FROM table_fight WHERE id='".htmlentities($_GET['id'])."'"); 
while ($donnees = mysql_fetch_array($reponse) )
{
$moi_verif = strtolower($donnees['defie']);
$resultat_0 = $donnees['resultat'];
}

$moi = strtolower($_SESSION['login']);

if($moi_verif == $moi)
{
if($resultat_0 == 0)
{

mysql_query("DELETE FROM table_fight WHERE id='".htmlentities($_GET['id'])."'"); 

echo 'Le défi a été refusé.<br /><br />';

mysql_query("UPDATE table_user SET carac_respect=carac_respect-10 WHERE login='".$_SESSION['login']."'");
echo 'Votre respect a baissé de 0,010 XP.'.$retour1;


}
else
{
echo 'Ce défi ne peut ni être supprimé ni annulé.'.$retour1;
}
}
else
{
echo 'Ce défi ne peut ni être supprimé ni annulé.'.$retour1;
}


}
else
{
echo 'Action impossible.'.$retour1;
}
}
else
{
echo 'Ce défi ne peut ni être supprimé ni annulé.'.$retour1;
}
}
elseif($_GET['action'] == 4)
{

###################################################################################################

if($_GET['id'] != NULL)
{

$reponse = mysql_query("SELECT * FROM table_fight WHERE id='".htmlentities($_GET['id'])."'"); 
				while ($donnees = mysql_fetch_array($reponse) )
				{
				$defieur = $donnees['defieur'];
				$defieur = strtolower($defieur);
				$defie = $donnees['defie'];
				$defie = strtolower($defie);
				$vol = $donnees['vol'];
				$resultat = $donnees['resultat'];
				}

				
$my_name = strtolower($_SESSION['login']);
				
if($resultat == '0') 
{
	if($defie == $my_name)
	{
	
$forcesupp = 0;
$forcesupp_2 = 0;
$agilitesupp = 0;
$agilitesupp_2 = 0;
$intellisupp = 0;
$intellisupp_2 = 0;
$respectsupp = 0;
$respectsupp_2 = 0;
	
$d = 0;
	
$reponseman = mysql_query("SELECT * FROM table_user WHERE login='".$defieur."'"); 
					while ($donneesman = mysql_fetch_array($reponseman) )
				{
$email1 = $donneesman['email'];
$nom_rpg_2 = $donneesman['nom_rpg'];
$prenom_rpg_2 = $donneesman['prenom_rpg'];
$portemonnaie_2 = $donneesman['portemonnaie'];
$carac_force_2 = $donneesman['carac_force'];
$carac_agilite_2 = $donneesman['carac_agilite'];
$carac_intelligence_2 = $donneesman['carac_intelligence'];
$carac_respect_2 = $donneesman['carac_respect'];
$pv_2 = $donneesman['pv'];
$delit = $donneesman['delit'];
$gang_2 = $donneesman['gang'];
				}

if($pv >= 0 && $pv_2 >= 0)
{
			
$reponse6 = mysql_query("SELECT * FROM table_object WHERE pseudo='".$_SESSION['login']."'"); 
				while ($donnees6 = mysql_fetch_array($reponse6) )
{
$forcesupp=$forcesupp+$donnees6['force'];
$agilitesupp=$agilitesupp+$donnees6['agilite'];
$intellisupp=$intellisupp+$donnees6['intelligence'];
$respectsupp=$respectsupp+$donnees6['respect'];
}

$reponse7 = mysql_query("SELECT * FROM table_object WHERE pseudo='".$defieur."'"); 
				while ($donnees6 = mysql_fetch_array($reponse7) )
{
$forcesupp_2=$forcesupp_2+$donnees7['force'];
$agilitesupp_2=$agilitesupp_2+$donnees7['agilite'];
$intellisupp_2=$intellisupp_2+$donnees7['intelligence'];
$respectsupp_2=$respectsupp_2+$donnees7['respect'];
}

$forcetotal = $forcesupp+$carac_force;
$agilitetotal = $agilitesupp+$carac_agilite;
$intellitotal = $intellisupp+$carac_intelligence;
$respecttotal = $respectsupp+$carac_respect;

$forcetotal_2 = $forcesupp_2+$carac_force_2;
$agilitetotal_2 = $agilitesupp_2+$carac_agilite_2;
$intellitotal_2 = $intellisupp_2+$carac_intelligence_2;
$respecttotal_2 = $respectsupp_2+$carac_respect_2;

$p1 = 0;
$p2 = 0;

$jeta1 = rand(1,$forcetotal);
$jeta2 = rand(1,$agilitetotal_2);

$jetb1 = rand(1,$agilitetotal);
$jetb2 = rand(2,$forcetotal_2);

if($jeta1 >= $jeta2)
{
$p1++;
}
elseif($jeta1 <= $jeta2)
{
$p2++;
}

if($jetb1 >= $jetb2)
{
$p1++;
}
elseif($jetb1 <= $jetb2)
{
$p2++;
}

if($p1 == 1 && $p2 == 1)
{
$jetc1 = rand(1,$intellitotal);
$jetc2 = rand(1,$intellitotal_2);

if($jetc1 >= $jetc2)
{
$winner = "p1";
$score = "2 - 1";
}
elseif($jetc1 <= $jetc2)
{
$winner = "p2";
$score = "2 - 1";
}

}
else
{
if($p1 >= $p2)
{
$winner = "p1";
$score = "2 - 0";
}
else
{
$winner = "p2";
$score = "2 - 0";
}
}


				  $reponse12 = mysql_query("SELECT * FROM table_user WHERE login='".$_SESSION['login']."'"); 
				while ($donnees12 = mysql_fetch_array($reponse12) )
				{
				$niveau_p1 = ($donnees12['carac_force']+$donnees12['carac_agilite']+$donnees12['carac_intelligence']+$donnees12['carac_respect']-9000)/1000;
				}
								  $reponse13 = mysql_query("SELECT * FROM table_user WHERE login='".$defieur."'"); 
				while ($donnees13 = mysql_fetch_array($reponse13) )
				{
				$niveau_p2 = ($donnees13['carac_force']+$donnees13['carac_agilite']+$donnees13['carac_intelligence']+$donnees13['carac_respect']-9000)/1000;
				}

$voleur = 0;

	if($vol == 1) //Aucun
	{
		if($winner == "p1")
		{
		$max_force = (40000 - $carac_force)/100;
		$max_agilite = (40000 - $carac_agilite)/100;
		$max_intelligence = (40000 - $carac_intelligence)/100;
		$max_respect = (40000 - $carac_respect)/100;
		
		$diff = $niveau_p2 - $niveau_p1;
		
		$max_force = $max_force + $max_force*$diff;
		$max_agilite = $max_agilite + $max_agilite*$diff;
		$max_intelligence = $max_intelligence + $max_intelligence*$diff;
		$max_respect = $max_respect+$max_respect*$diff;
		
		if($max_force <= 0)
		{
		$max_force = 5;
		}
		if($max_agilite <= 0)
		{
		$max_agilite = 5;
		}
		if($max_intelligence <= 0)
		{
		$max_intelligence = 5;
		}
		if($max_respect <= 0)
		{
		$max_respect = 5;
		}
		
		
		$xp_force = rand(1,$max_force);
		$xp_agilite = rand(1,$max_agilite);
		$xp_intelligence = rand(1,$max_intelligence);
		$xp_respect = rand(1,$max_respect);	
		$echo_xp_force = $xp_force/1000;
		$echo_xp_agilite = $xp_agilite/1000;
		$echo_xp_intelligence = $xp_intelligence/1000;
		$echo_xp_respect = $xp_respect/1000;


		
		$degats = rand(1,30);	
		
		mysql_query("UPDATE table_user SET stat_combats=stat_combats+1 WHERE login='".$defieur."'");
		mysql_query("UPDATE table_user SET stat_combats=stat_combats+1 WHERE login='".$_SESSION['login']."'");
		mysql_query("UPDATE table_user SET stat_combats_gagne=stat_combats_gagne+1 WHERE login='".$_SESSION['login']."'");
		mysql_query("UPDATE table_user SET carac_force=carac_force+".$xp_force." WHERE login='".$_SESSION['login']."'");
		mysql_query("UPDATE table_user SET carac_agilite=carac_agilite+".$xp_agilite." WHERE login='".$_SESSION['login']."'");
		mysql_query("UPDATE table_user SET carac_intelligence=carac_intelligence+".$xp_intelligence." WHERE login='".$_SESSION['login']."'");
		mysql_query("UPDATE table_user SET carac_respect=carac_respect+".$xp_respect." WHERE login='".$_SESSION['login']."'");
		mysql_query("UPDATE table_user SET pv=pv-".$degats." WHERE login='".$defieur."'");
		
		//$resultat = $_SESSION['login'].' gagne le combat face à '.$defieur.' avec le score de '.$score.'. <br /><br />
		//Il gagne '.$echo_xp_force.' XP de force, '.$echo_xp_agilite.' XP d\'agilité, '.$echo_xp_intelligence.' d\'intelligence et '.$echo_xp_respect.' XP de respect.';
		
		$moi = $_SESSION['login'];
		
		$resultat = "$moi gagne le combat face à $defieur avec le score de $score.<br /><br /> Il gagne $echo_xp_force XP de force, $echo_xp_agilite XP d'agilité $echo_xp_intelligence d'intelligence et $echo_xp_respect XP de respect.";
		
		$resultat = addslashes($resultat);
		
		mysql_query("UPDATE table_fight SET resultat='".$resultat."' WHERE id='".htmlentities($_GET['id'])."'"); 
			
		echo stripslashes($resultat).' '.$retour1;
		
		
		$max_trou = ($intellitotal+$intellitotal_2)/50;
		$trou = rand(0,$max_trou);
		
		if($trou == 1)
		{
		
		if($respecttotal >= $respecttotal_2)
		{
		echo '<br /><br />Les gardes vous arrêtent, votre camarade '.$defieur.' à été désigné comme coupable, il passera 3 jours au trou.'.$retour_compte;
		$timetrou = $secondesupp + 21600*3;
		mysql_query("UPDATE table_user SET stat_trou=stat_trou+1 WHERE login='".$defieur."'");
		mysql_query("UPDATE table_user SET time_trou=".$timetrou." WHERE login='".$defieur."'");
		}
		else
		{
		echo '<br /><br />Les gardes vous arrêtent, vous êtes désigné comme coupable, vous passerez 3 jours au trou.'.$retour_compte;
		$timetrou = $secondesupp + 21600*3; 
		mysql_query("UPDATE table_user SET stat_trou=stat_trou+1 WHERE login='".$_SESSION['login']."'");
		mysql_query("UPDATE table_user SET time_trou=".$timetrou." WHERE login='".$_SESSION['login']."'");
		}
		
		mysql_query("UPDATE table_user SET stat_infractions=stat_infractions+1 WHERE login='".$_SESSION['login']."'");
		mysql_query("UPDATE table_user SET stat_infractions=stat_infractions+1 WHERE login='".$defieur."'");
		
		}
		}
		else
{
		$max_force = (40000 - $carac_force_2)/100;
		$max_agilite = (40000 - $carac_agilite_2)/100;
		$max_intelligence = (40000 - $carac_intelligence_2)/100;
		$max_respect = (40000 - $carac_respect_2)/100; 
		
		$diff = $niveau_p1 - $niveau_p2;
		
		$max_force = $max_force + $max_force*$diff;
		$max_agilite = $max_agilite + $max_agilite*$diff;
		$max_intelligence = $max_intelligence + $max_intelligence*$diff;
		$max_respect = $max_respect+$max_respect*$diff;
		
		if($max_force <= 0)
		{
		$max_force = 5;
		}
		if($max_agilite <= 0)
		{
		$max_agilite = 5;
		}
		if($max_intelligence <= 0)
		{
		$max_intelligence = 5;
		}
		if($max_respect <= 0)
		{
		$max_respect = 5;
		}
		
		$xp_force = rand(1,$max_force);
		$xp_agilite = rand(1,$max_agilite);
		$xp_intelligence = rand(1,$max_intelligence);
		$xp_respect = rand(1,$max_respect);	
		$echo_xp_force = $xp_force/1000;
		$echo_xp_agilite = $xp_agilite/1000;
		$echo_xp_intelligence = $xp_intelligence/1000;
		$echo_xp_respect = $xp_respect/1000;


		
		$degats = rand(1,30);	
		
		mysql_query("UPDATE table_user SET stat_combats=stat_combats+1 WHERE login='".$defieur."'");
		mysql_query("UPDATE table_user SET stat_combats=stat_combats+1 WHERE login='".$_SESSION['login']."'");
		mysql_query("UPDATE table_user SET stat_combats_gagne=stat_combats_gagne+1 WHERE login='".$defieur."'");
		mysql_query("UPDATE table_user SET carac_force=carac_force+".$xp_force." WHERE login='".$defieur."'");
		mysql_query("UPDATE table_user SET carac_agilite=carac_agilite+".$xp_agilite." WHERE login='".$defieur."'");
		mysql_query("UPDATE table_user SET carac_intelligence=carac_intelligence+".$xp_intelligence." WHERE login='".$defieur."'");
		mysql_query("UPDATE table_user SET carac_respect=carac_respect+".$xp_respect." WHERE login='".$defieur."'");
		mysql_query("UPDATE table_user SET pv=pv-".$degats." WHERE login='".$_SESSION['login']."'");
		$moi = $_SESSION['login'];
		
		$resultat = "$defieur gagne le combat face à $moi avec le score de $score.<br /><br /> Il gagne $echo_xp_force XP de force, $echo_xp_agilite XP d'agilité $echo_xp_intelligence d'intelligence et $echo_xp_respect XP de respect.";
		
		$resultat = addslashes($resultat);
		
		mysql_query("UPDATE table_fight SET resultat='".$resultat."' WHERE id='".htmlentities($_GET['id'])."'"); 
			
		echo stripslashes($resultat).' '.$retour1;
		
		
		$max_trou = ($intellitotal+$intellitotal_2)/50;
		$trou = rand(0,$max_trou);
		
		if($trou == 1)
		{
		
		if($respecttotal >= $respecttotal_2)
		{
		echo '<br /><br />Les gardes vous arrêtent, votre camarade '.$defieur.' à été désigné comme coupable, il passera 3 jours au trou.'.$retour_compte;
		$timetrou = $secondesupp + 21600*3;
		mysql_query("UPDATE table_user SET stat_trou=stat_trou+1 WHERE login='".$defieur."'");
		mysql_query("UPDATE table_user SET time_trou=".$timetrou." WHERE login='".$defieur."'");
		}
		else
		{
		echo '<br /><br />Les gardes vous arrêtent, vous êtes désigné comme coupable, vous passerez 3 jours au trou.'.$retour_compte;
		$timetrou = $secondesupp + 21600*3; 
		mysql_query("UPDATE table_user SET stat_trou=stat_trou+1 WHERE login='".$_SESSION['login']."'");
		mysql_query("UPDATE table_user SET time_trou=".$timetrou." WHERE login='".$_SESSION['login']."'");
		}
		
		mysql_query("UPDATE table_user SET stat_infractions=stat_infractions+1 WHERE login='".$_SESSION['login']."'");
		mysql_query("UPDATE table_user SET stat_infractions=stat_infractions+1 WHERE login='".$defieur."'");
		
		}
		}
	}
	elseif($vol == 2) //Objet
	{
		
		if($winner == "p1")
		{
		
				
			
		$max_force = (40000 - $carac_force)/100;
		$max_agilite = (40000 - $carac_agilite)/100;
		$max_intelligence = (40000 - $carac_intelligence)/100;
		$max_respect = (40000 - $carac_respect)/100;
		
		$diff = $niveau_p2 - $niveau_p1;
		
		$max_force = $max_force + $max_force*$diff;
		$max_agilite = $max_agilite + $max_agilite*$diff;
		$max_intelligence = $max_intelligence + $max_intelligence*$diff;
		$max_respect = $max_respect+$max_respect*$diff;
		
		if($max_force <= 0)
		{
		$max_force = 5;
		}
		if($max_agilite <= 0)
		{
		$max_agilite = 5;
		}
		if($max_intelligence <= 0)
		{
		$max_intelligence = 5;
		}
		if($max_respect <= 0)
		{
		$max_respect = 5;
		}
		
		$xp_force = rand(1,$max_force);
		$xp_agilite = rand(1,$max_agilite);
		$xp_intelligence = rand(1,$max_intelligence);
		$xp_respect = rand(1,$max_respect);	
		$echo_xp_force = $xp_force/1000;
		$echo_xp_agilite = $xp_agilite/1000;
		$echo_xp_intelligence = $xp_intelligence/1000;
		$echo_xp_respect = $xp_respect/1000;


		
		$degats = rand(1,5);	
		
		mysql_query("UPDATE table_user SET stat_combats=stat_combats+1 WHERE login='".$defieur."'");
		mysql_query("UPDATE table_user SET stat_combats=stat_combats+1 WHERE login='".$_SESSION['login']."'");
		mysql_query("UPDATE table_user SET stat_combats_gagne=stat_combats_gagne+1 WHERE login='".$_SESSION['login']."'");
		mysql_query("UPDATE table_user SET carac_force=carac_force+".$xp_force." WHERE login='".$_SESSION['login']."'");
		mysql_query("UPDATE table_user SET carac_agilite=carac_agilite+".$xp_agilite." WHERE login='".$_SESSION['login']."'");
		mysql_query("UPDATE table_user SET carac_intelligence=carac_intelligence+".$xp_intelligence." WHERE login='".$_SESSION['login']."'");
		mysql_query("UPDATE table_user SET carac_respect=carac_respect+".$xp_respect." WHERE login='".$_SESSION['login']."'");
		mysql_query("UPDATE table_user SET pv=pv-".$degats." WHERE login='".$defieur."'");

		$moi = $_SESSION['login'];
		
		$resultat = "$moi gagne le combat face à $defieur avec le score de $score.<br /><br /> Il gagne $echo_xp_force XP de force, $echo_xp_agilite XP d'agilité $echo_xp_intelligence d'intelligence et $echo_xp_respect XP de respect.";
		
		$resultat = addslashes($resultat);
		
		mysql_query("UPDATE table_fight SET resultat='".$resultat."' WHERE id='".htmlentities($_GET['id'])."'"); 
			
		echo stripslashes($resultat).' '.$retour1;
		
		$max_trou = ($intellitotal+$intellitotal_2)/200;
		$trou = rand(0,$max_trou);
		
		if($trou == 1)
		{
		
		if($respecttotal >= $respecttotal_2)
		{
		echo '<br /><br />Les gardes vous arrêtent, votre camarade '.$defieur.' à été désigné comme coupable, il passera 4 jours au trou.'.$retour_compte;
		$timetrou = $secondesupp + 21600*4;
		mysql_query("UPDATE table_user SET stat_trou=stat_trou+1 WHERE login='".$defieur."'");
		mysql_query("UPDATE table_user SET time_trou=".$timetrou." WHERE login='".$defieur."'");
		
	$to = $email1;
	$from = 'no-reply@breakingout.com';
	$subject = 'Vous avez été envoyé au trou';
	$Message = "Le prisonnier ".$_SESSION['login']." vous vous êtes battus, les gardes vous arrêtent.
	Vous avez été désigné coupable vous irez donc 4 journées au trou !
	
	à Bientôt sur http://breakingout.net/";
	$headers = $from;

	mail($to, $subject, $Message);
		
		
		}
		else
		{
		echo '<br /><br />Les gardes vous arrêtent, vous êtes désigné comme coupable, vous passerez 4 jours au trou.'.$retour_compte;
		$timetrou = $secondesupp + 21600*4; 
		mysql_query("UPDATE table_user SET stat_trou=stat_trou+1 WHERE login='".$_SESSION['login']."'");
		mysql_query("UPDATE table_user SET time_trou=".$timetrou." WHERE login='".$_SESSION['login']."'");
		}
		
		mysql_query("UPDATE table_user SET stat_infractions=stat_infractions+1 WHERE login='".$_SESSION['login']."'");
		mysql_query("UPDATE table_user SET stat_infractions=stat_infractions+1 WHERE login='".$defieur."'");
		
		}
		}
		else
{
		$max_force = (40000 - $carac_force_2)/100;
		$max_agilite = (40000 - $carac_agilite_2)/100;
		$max_intelligence = (40000 - $carac_intelligence_2)/100;
		$max_respect = (40000 - $carac_respect_2)/100; 
		
		$diff = $niveau_p1 - $niveau_p2;
		
		$max_force = $max_force + $max_force*$diff;
		$max_agilite = $max_agilite + $max_agilite*$diff;
		$max_intelligence = $max_intelligence + $max_intelligence*$diff;
		$max_respect = $max_respect+$max_respect*$diff;
		
		if($max_force <= 0)
		{
		$max_force = 5;
		}
		if($max_agilite <= 0)
		{
		$max_agilite = 5;
		}
		if($max_intelligence <= 0)
		{
		$max_intelligence = 5;
		}
		if($max_respect <= 0)
		{
		$max_respect = 5;
		}
		
		$max_intelligence2 = (40000 - $carac_intelligence)/100;
		
		if($max_intelligence2 <= 15)
		{
		$max_intelligence2 = 15;
		}
		
		$vol = rand(0,$max_intelligence2); //Ligne 627
		
		$xp_force = rand(1,$max_force);
		$xp_agilite = rand(1,$max_agilite);
		$xp_intelligence = rand(1,$max_intelligence);
		$xp_respect = rand(1,$max_respect);	
		$echo_xp_force = $xp_force/1000;
		$echo_xp_agilite = $xp_agilite/1000;
		$echo_xp_intelligence = $xp_intelligence/1000;
		$echo_xp_respect = $xp_respect/1000;


		
		$degats = rand(1,30);	
		
		mysql_query("UPDATE table_user SET stat_combats=stat_combats+1 WHERE login='".$defieur."'");
		mysql_query("UPDATE table_user SET stat_combats=stat_combats+1 WHERE login='".$_SESSION['login']."'");
		mysql_query("UPDATE table_user SET stat_combats_gagne=stat_combats_gagne+1 WHERE login='".$defieur."'");
		mysql_query("UPDATE table_user SET carac_force=carac_force+".$xp_force." WHERE login='".$defieur."'");
		mysql_query("UPDATE table_user SET carac_agilite=carac_agilite+".$xp_agilite." WHERE login='".$defieur."'");
		mysql_query("UPDATE table_user SET carac_intelligence=carac_intelligence+".$xp_intelligence." WHERE login='".$defieur."'");
		mysql_query("UPDATE table_user SET carac_respect=carac_respect+".$xp_respect." WHERE login='".$defieur."'");
		mysql_query("UPDATE table_user SET pv=pv-".$degats." WHERE login='".$_SESSION['login']."'");
	
		
			
		
		$max_trou = ($intellitotal+$intellitotal_2)/50;
		$trou = rand(0,$max_trou);
		
		if($trou == 1)
		{
		
		if($respecttotal >= $respecttotal_2)
		{
		echo '<br /><br />Les gardes vous arrêtent, votre camarade '.$defieur.' à été désigné comme coupable, il passera 3 jours au trou.';
		$timetrou = $secondesupp + 21600*3;
		mysql_query("UPDATE table_user SET stat_trou=stat_trou+1 WHERE login='".$defieur."'");
		mysql_query("UPDATE table_user SET time_trou=".$timetrou." WHERE login='".$defieur."'");
		
		
		$to = $email1;
	$from = 'no-reply@breakingout.com';
	$subject = 'Vous avez été envoyé au trou';
	$Message = "Le prisonnier ".$_SESSION['login']." vous vous êtes battus, les gardes vous arrêtent.
	Vous avez été désigné coupable vous irez donc 4 journées au trou !
	
	à Bientôt sur http://breakingout.net/";
	$headers = $from;

	mail($to, $subject, $Message);
		
		
		
		}
		else
		{
		echo '<br /><br />Les gardes vous arrêtent, vous êtes désigné comme coupable, vous passerez 3 jours au trou.';
		$timetrou = $secondesupp + 21600*3; 
		mysql_query("UPDATE table_user SET stat_trou=stat_trou+1 WHERE login='".$_SESSION['login']."'");
		mysql_query("UPDATE table_user SET time_trou=".$timetrou." WHERE login='".$_SESSION['login']."'");
		}
		
		mysql_query("UPDATE table_user SET stat_infractions=stat_infractions+1 WHERE login='".$_SESSION['login']."'");
		mysql_query("UPDATE table_user SET stat_infractions=stat_infractions+1 WHERE login='".$defieur."'");
		
		}
		
		$max_intelligence2 = (10000 - $carac_intelligence)/100;
		
		if($max_intelligence2 <= 15)
		{
		$max_intelligence2 = 15;
		}
		
		if($delit == 'Pickpocket')
		{
		$voleur = rand(0,15);
		}
		else
		{
		$voleur = rand(0,$max_intelligence2);
		}
		
		$moi = $_SESSION['login'];
		
		
		if($voleur == 1)
		{
		
		$i2 = 0;
		
		$reponsevol = mysql_query("SELECT * FROM table_object WHERE pseudo='".$_SESSION['login']."' AND volable=1 LIMIT 0,1"); 
					while ($donneesvol = mysql_fetch_array($reponsevol) )
				{
				$i2++;
				$id = $donneesvol['id'];
				$nom = $donneesvol['nom'];
				}
		
		if($i2 != 0)
		{
		mysql_query("UPDATE table_object SET pseudo='".$defieur."' WHERE id=".$id."");
		
		$yo = "<br /><br />$defieur a volé $nom à $moi.";
		}
		else
		{
		$yo = "<br /><br />$defieur a essayer de voler un objet mais $moi n\'en n\'avait pas.";
		}
		
		}
		
		
		
		$resultat = "$defieur gagne le combat face à $moi avec le score de $score.<br /><br /> Il gagne $echo_xp_force XP de force, $echo_xp_agilite XP d'agilité $echo_xp_intelligence d'intelligence et $echo_xp_respect XP de respect. $yo";
		
		$resultat = addslashes($resultat);
		
		mysql_query("UPDATE table_fight SET resultat='".$resultat."' WHERE id='".htmlentities($_GET['id'])."'"); 
		
		echo stripslashes($resultat).$retour1;
		
		}
		
		
	}
	else //Argent
	{
		
		if($winner == "p1")
		{
		
				
			
		$max_force = (40000 - $carac_force)/100;
		$max_agilite = (40000 - $carac_agilite)/100;
		$max_intelligence = (40000 - $carac_intelligence)/100;
		$max_respect = (40000 - $carac_respect)/100;
		
		$diff = $niveau_p2 - $niveau_p1;
		
		$max_force = $max_force + $max_force*$diff;
		$max_agilite = $max_agilite + $max_agilite*$diff;
		$max_intelligence = $max_intelligence + $max_intelligence*$diff;
		$max_respect = $max_respect+$max_respect*$diff;
		
		if($max_force <= 0)
		{
		$max_force = 5;
		}
		if($max_agilite <= 0)
		{
		$max_agilite = 5;
		}
		if($max_intelligence <= 0)
		{
		$max_intelligence = 5;
		}
		if($max_respect <= 0)
		{
		$max_respect = 5;
		}
		
		$xp_force = rand(1,$max_force);
		$xp_agilite = rand(1,$max_agilite);
		$xp_intelligence = rand(1,$max_intelligence);
		$xp_respect = rand(1,$max_respect);	
		$echo_xp_force = $xp_force/1000;
		$echo_xp_agilite = $xp_agilite/1000;
		$echo_xp_intelligence = $xp_intelligence/1000;
		$echo_xp_respect = $xp_respect/1000;


		
		$degats = rand(1,5);	
		
		mysql_query("UPDATE table_user SET stat_combats=stat_combats+1 WHERE login='".$defieur."'");
		mysql_query("UPDATE table_user SET stat_combats=stat_combats+1 WHERE login='".$_SESSION['login']."'");
		mysql_query("UPDATE table_user SET stat_combats_gagne=stat_combats_gagne+1 WHERE login='".$_SESSION['login']."'");
		mysql_query("UPDATE table_user SET carac_force=carac_force+".$xp_force." WHERE login='".$_SESSION['login']."'");
		mysql_query("UPDATE table_user SET carac_agilite=carac_agilite+".$xp_agilite." WHERE login='".$_SESSION['login']."'");
		mysql_query("UPDATE table_user SET carac_intelligence=carac_intelligence+".$xp_intelligence." WHERE login='".$_SESSION['login']."'");
		mysql_query("UPDATE table_user SET carac_respect=carac_respect+".$xp_respect." WHERE login='".$_SESSION['login']."'");
		mysql_query("UPDATE table_user SET pv=pv-".$degats." WHERE login='".$defieur."'");

		$moi = $_SESSION['login'];
		
		$resultat = "$moi gagne le combat face à $defieur avec le score de $score.<br /><br /> Il gagne $echo_xp_force XP de force, $echo_xp_agilite XP d'agilité $echo_xp_intelligence d'intelligence et $echo_xp_respect XP de respect.";
		
		$resultat = addslashes($resultat);
		
		mysql_query("UPDATE table_fight SET resultat='".$resultat."' WHERE id='".htmlentities($_GET['id'])."'"); 
			
		echo stripslashes($resultat).' '.$retour1;
		
		$max_trou = ($intellitotal+$intellitotal_2)/200;
		$trou = rand(0,$max_trou);
		
		if($trou == 1)
		{
		
		if($respecttotal >= $respecttotal_2)
		{
		echo '<br /><br />Les gardes vous arrêtent, votre camarade '.$defieur.' à été désigné comme coupable, il passera 4 jours au trou.'.$retour_compte;
		$timetrou = $secondesupp + 21600*4;
		mysql_query("UPDATE table_user SET stat_trou=stat_trou+1 WHERE login='".$defieur."'");
		mysql_query("UPDATE table_user SET time_trou=".$timetrou." WHERE login='".$defieur."'");

		$to = $email1;
	$from = 'no-reply@breakingout.com';
	$subject = 'Vous avez été envoyé au trou';
	$Message = "Le prisonnier ".$_SESSION['login']." vous vous êtes battus, les gardes vous arrêtent.
	Vous avez été désigné coupable vous irez donc 4 journées au trou !
	
	à Bientôt sur http://breakingout.net/";
	$headers = $from;

	mail($to, $subject, $Message);
		
		
		}
		else
		{
		echo '<br /><br />Les gardes vous arrêtent, vous êtes désigné comme coupable, vous passerez 4 jours au trou.'.$retour_compte;
		$timetrou = $secondesupp + 21600*4; 
		mysql_query("UPDATE table_user SET stat_trou=stat_trou+1 WHERE login='".$_SESSION['login']."'");
		mysql_query("UPDATE table_user SET time_trou=".$timetrou." WHERE login='".$_SESSION['login']."'");
		}
		
		mysql_query("UPDATE table_user SET stat_infractions=stat_infractions+1 WHERE login='".$_SESSION['login']."'");
		mysql_query("UPDATE table_user SET stat_infractions=stat_infractions+1 WHERE login='".$defieur."'");
		
		}
		}
		else
{
		$max_force = (40000 - $carac_force_2)/100;
		$max_agilite = (40000 - $carac_agilite_2)/100;
		$max_intelligence = (40000 - $carac_intelligence_2)/100;
		$max_respect = (40000 - $carac_respect_2)/100; 
		
		$diff = $niveau_p1 - $niveau_p2;
		
		$max_force = $max_force + $max_force*$diff;
		$max_agilite = $max_agilite + $max_agilite*$diff;
		$max_intelligence = $max_intelligence + $max_intelligence*$diff;
		$max_respect = $max_respect+$max_respect*$diff;
		
		if($max_force <= 0)
		{
		$max_force = 5;
		}
		if($max_agilite <= 0)
		{
		$max_agilite = 5;
		}
		if($max_intelligence <= 0)
		{
		$max_intelligence = 5;
		}
		if($max_respect <= 0)
		{
		$max_respect = 5;
		}
		
		$max_intelligence2 = (10000 - $carac_intelligence)/100;
		
		if($max_intelligence2 <= 15)
		{
		$max_intelligence2 = 15;
		}
		
		if($delit == 'Pickpocket')
		{
		$voleur = rand(0,15);
		}
		else
		{
		$voleur = rand(0,$max_intelligence2);
		}
		
		
		$xp_force = rand(1,$max_force);
		$xp_agilite = rand(1,$max_agilite);
		$xp_intelligence = rand(1,$max_intelligence);
		$xp_respect = rand(1,$max_respect);	
		$echo_xp_force = $xp_force/1000;
		$echo_xp_agilite = $xp_agilite/1000;
		$echo_xp_intelligence = $xp_intelligence/1000;
		$echo_xp_respect = $xp_respect/1000;


		
		$degats = rand(1,30);	
		
		mysql_query("UPDATE table_user SET stat_combats=stat_combats+1 WHERE login='".$defieur."'");
		mysql_query("UPDATE table_user SET stat_combats=stat_combats+1 WHERE login='".$_SESSION['login']."'");
		mysql_query("UPDATE table_user SET stat_combats_gagne=stat_combats_gagne+1 WHERE login='".$defieur."'");
		mysql_query("UPDATE table_user SET carac_force=carac_force+".$xp_force." WHERE login='".$defieur."'");
		mysql_query("UPDATE table_user SET carac_agilite=carac_agilite+".$xp_agilite." WHERE login='".$defieur."'");
		mysql_query("UPDATE table_user SET carac_intelligence=carac_intelligence+".$xp_intelligence." WHERE login='".$defieur."'");
		mysql_query("UPDATE table_user SET carac_respect=carac_respect+".$xp_respect." WHERE login='".$defieur."'");
		mysql_query("UPDATE table_user SET pv=pv-".$degats." WHERE login='".$_SESSION['login']."'");
	
		
		$max_trou = ($intellitotal+$intellitotal_2)/50;
		$trou = rand(0,$max_trou);
		
		if($trou == 1)
		{
		
		if($respecttotal >= $respecttotal_2)
		{
		echo '<br /><br />Les gardes vous arrêtent, votre camarade '.$defieur.' à été désigné comme coupable, il passera 3 jours au trou.';
		$timetrou = $secondesupp + 21600*3;
		mysql_query("UPDATE table_user SET stat_trou=stat_trou+1 WHERE login='".$defieur."'");
		mysql_query("UPDATE table_user SET time_trou=".$timetrou." WHERE login='".$defieur."'");

		$to = $email1;
	$from = 'no-reply@breakingout.com';
	$subject = 'Vous avez été envoyé au trou';
	$Message = "Le prisonnier ".$_SESSION['login']." vous vous êtes battus, les gardes vous arrêtent.
	Vous avez été désigné coupable vous irez donc 3 journées au trou !
	
	à Bientôt sur http://breakingout.net/";
	$headers = $from;

	mail($to, $subject, $Message);
		
		
		}
		else
		{
		echo '<br /><br />Les gardes vous arrêtent, vous êtes désigné comme coupable, vous passerez 3 jours au trou.';
		$timetrou = $secondesupp + 21600*3; 
		mysql_query("UPDATE table_user SET stat_trou=stat_trou+1 WHERE login='".$_SESSION['login']."'");
		mysql_query("UPDATE table_user SET time_trou=".$timetrou." WHERE login='".$_SESSION['login']."'");
		}
		
		mysql_query("UPDATE table_user SET stat_infractions=stat_infractions+1 WHERE login='".$_SESSION['login']."'");
		mysql_query("UPDATE table_user SET stat_infractions=stat_infractions+1 WHERE login='".$defieur."'");
		
		}
		
	
		$moi = $_SESSION['login'];
		
		if($voleur == 1)
		{
		
		
		$max_vol = $portemonnaie/3;
		
		$gain = rand(1,$max_vol);
		
		$SB = '$B';
		
		$yo = ".<br /><br />$defieur a volé $gain $SB à $moi .";	
		
		mysql_query("UPDATE table_user SET portemonnaie=portemonnaie-".$gain." WHERE login='".$_SESSION['login']."'");
		mysql_query("UPDATE table_user SET portemonnaie=portemonnaie+".$gain." WHERE login='".$defieur."'");
		
		}
		
		
		
		$resultat = "$defieur gagne le combat face à $moi avec le score de $score.<br /><br /> Il gagne $echo_xp_force XP de force, $echo_xp_agilite XP d'agilité $echo_xp_intelligence d'intelligence et $echo_xp_respect XP de respect. $yo";
		
		$resultat = addslashes($resultat);
		
		mysql_query("UPDATE table_fight SET resultat='".$resultat."' WHERE id='".htmlentities($_GET['id'])."'"); 
		
		echo stripslashes($resultat).' '.$retour1;
		}
		
}

	if($winner == "p1")
	{
	mysql_query("UPDATE table_gang SET points=points+1 WHERE nom='".$gang."'");
	mysql_query("UPDATE table_gang SET points=points-1 WHERE nom='".$gang_2."'"); 
	}
	elseif($winner == "p2")
	{
	mysql_query("UPDATE table_gang SET points=points+1 WHERE nom='".$gang_2."'");
	mysql_query("UPDATE table_gang SET points=points-1 WHERE nom='".$gang."'"); 	
	}
	


	}
	else
	{
	echo 'Un des 2 prisonnier n\'as pas assez de points de vie pour combattre.'.$retour1;
	}
	

	
	
	
	
	}
	else
	{
	echo 'Ce défi n\'existe pas.'.$retour1;
	}
}
else
{
echo 'Ce combat a déjà été terminé.'.$retour1;
}


}
else
{
echo 'Ce défi n\'existe pas.'.$retour1;
}

###################################################################################################

}
else
{
?>
<table width="450" border="0">
  <tr>
    <td><fieldset style="border-color:#7e5125">

      <legend><strong>D&eacute;fis re&ccedil;us en attente: </strong></legend>
      <div>
        <table width="100%" border="0">
          <tr>
            <td><strong>Joueur d&eacute;fiant </strong></td>
            <td><strong>Niveau</strong></td>
            <td><strong>Date</strong></td>
            <td><strong>Accepter</strong></td>
            <td><strong>Refuser*</strong></td>
          </tr>
		  <?
		  $my_name = strtolower($_SESSION['login']);
		  		 $g = 0;
				 $reponse2 = mysql_query("SELECT * FROM table_fight WHERE id_man='".$_SESSION['id_user_secu']."' AND resultat='0' ORDER BY supp5"); 
				while ($donnees2 = mysql_fetch_array($reponse2) )
				{
				
				$g++;
		  ?>
          <tr>
            <td><? echo $donnees2['defieur']; ?></td>
            <td><?
				  $reponse12 = mysql_query("SELECT * FROM table_user WHERE login='".$donnees2['defieur']."'"); 
				while ($donnees12 = mysql_fetch_array($reponse12) )
				{
				$niveau = ($donnees12['carac_force']+$donnees12['carac_agilite']+$donnees12['carac_intelligence']+$donnees12['carac_respect']-9000)/1000;

				echo floor($niveau);
				}
				  ?></td>
            <td><?
$secondesupp2 = $donnees2['supp5'];


$jour2 = floor($secondesupp2/21600);

echo 'Jour '.$jour2;
				  ?></td>
            <td><a href='index.php?page=fight&action=4&id=<? echo $donnees2['id']; ?>'>Accepter</a></td>
            <td><a href='index.php?page=fight&action=3&id=<? echo $donnees2['id']; ?>&type=2'>Refuser</a></td>
          </tr>		  
		  <?
}
			

		  ?>
        </table><?
									if($g == 0)
							{
				echo 'Il y a aucun défi actuellement.';
				}
		?>
      </div>
    </fieldset></td></tr></table></p>
    <br />
    <table width="450" border="0">
      <tr>
        <td><fieldset style="border-color:#7e5125">
          <legend><strong>D&eacute;fis lanc&eacute;s en attente: </strong></legend>
          <div>
            
              <table width="100%" border="0">
                <tr>
                  <td><strong>Joueur d&eacute;fi&eacute; </strong></td>
                  <td><strong>Niveau</strong> </td>
                  <td><strong>Vol ?</strong></td>
                  <td><strong>Date</strong></td>
                  <td>&nbsp;</td>
                  <td><strong>Annuler*</strong></td>
                </tr>
				
				<?
				
				$my_name = strtolower($_SESSION['login']);
				$f = 0;
				
				$reponse = mysql_query("SELECT * FROM table_fight WHERE id_moi='".$_SESSION['id_user_secu']."' AND resultat='0' ORDER BY supp5 DESC"); 
				while ($donnees = mysql_fetch_array($reponse) )
				{
				
				
				$secondesupp3 = $donnees['supp5'];


$jour3 = floor($secondesupp3/21600);

				if($jour3+84 < $jour)
				{
				mysql_query("DELETE FROM table_fight WHERE id='".$donnees['id']."'"); 
				mysql_query("UPDATE table_user SET pa=pa+2 WHERE login='".$_SESSION['login']."'");
				mysql_query("UPDATE table_user SET carac_respect=carac_respect-5 WHERE login='".$_SESSION['login']."'");
				}
				?>
				<tr>
                  <td><? 
				 
				  
				  echo $donnees['defie']; 
				  
				 $f++;
				  
				  

				  ?></td>
                  <td><?
				  $reponse1 = mysql_query("SELECT * FROM table_user WHERE login='".$donnees['defie']."'"); 
				while ($donnees1 = mysql_fetch_array($reponse1) )
				{
				$niveau = ($donnees1['carac_force']+$donnees1['carac_agilite']+$donnees1['carac_intelligence']+$donnees1['carac_respect']-9000)/1000;

				echo floor($niveau);
				}
				  ?></td>
                  <td><?
				  if($donnees['vol'] == 1)
				  {
				  echo 'Aucun';
				  }
				  elseif($donnees['vol'] == 2)
				  {
				  echo 'Objet';
				  }
				  else
				  {
				  echo 'Argent';
				  }
				  ?></td>
                  <td><?


echo 'Jour '.$jour3;
				  ?></td>
                  <td></td>
                  <td><a href='index.php?page=fight&action=3&id=<? echo $donnees['id']; ?>&type=1'>Annuler</a></td>
                </tr>
				<?
				}
				
				
				?>
              </table><?
			  				
							if($f == 0)
							{
				echo 'Il y a aucun défi actuellement.';
				}
			  ?>
            
          </div>
        </fieldset></td>
      </tr>
    </table>
    <br />
    <table width="450" border="0">
      <tr>
        <td><fieldset style="border-color:#7e5125">
          <legend><strong> 5 Derniers resultats : </strong></legend>
          <div>
            <table width="100%" border="0">
              <tr>
                <td width="20%"><strong>Joueur d&eacute;fiant</strong></td>
                <td width="20%"><strong>Joueur d&eacute;fi&eacute; </strong></td>
                <td width="60%"><strong>Resultat</strong></td>
              </tr>
			  <?
			  $reponse3 = mysql_query("SELECT * FROM table_fight WHERE (id_moi='".$_SESSION['id_user_secu']."' OR id_man='".$_SESSION['id_user_secu']."') AND resultat!='0' ORDER BY id DESC LIMIT 0,5"); 
				while ($donnees3 = mysql_fetch_array($reponse3) )
				{
			  ?>
			  <tr>
                <td width="20%" valign="top"><p><font size="-2"><? echo $donnees3['defieur']; ?></font></p></td>
                <td width="20%" valign="top"><p><font size="-2"><? echo $donnees3['defie']; ?></font></p></td>
                <td width="60%" valign="top"><p><font size="-2"><? echo $donnees3['resultat']; ?></font><br />
                </p></td>
              </tr>
			  
			  <?
			  }
			  ?>
            </table>
          </div>
        </fieldset></td>
      </tr>
    </table>
    <br />
    </p>
    <br />
    *En annulant ou en refusant un défi votre caractéristiques de respect diminuera.
  <?
}

}
?>
  <br />
  
  <br />

  <?
  
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

mysql_close();

}
?>
