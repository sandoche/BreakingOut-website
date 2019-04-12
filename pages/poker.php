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
$retour = '<br /><br /><a href="?page=poker&action=1">Retour</a>';
$retour1 = '<br /><br /><a href="?page=poker">Retour</a>';

		$sql = "select * from table_user where login='".htmlentities($_SESSION['login'])."'";
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		$data = mysql_fetch_assoc($req);

		//WHERE id=".$id_secu_user."");
		
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
		$mdp_secu = $donnees1['mdp'];
		}
		
		$reponsea = mysql_query("SELECT * FROM table_cour WHERE id='".$id_secu_user."'");
		
		while ($donneesa = mysql_fetch_array($reponsea) )
		{	
		$id_yop = $donneesa['id'];
		$posx = $donneesa['pos_x'];
		$posy = $donneesa['pos_y'];
		$pm = $donneesa['pm'];
		}
		
		
if($statut == 'Prisonnier' && $_SESSION['mdp'] == $mdp_secu)
{
		
if($time_trou > $secondesupp)
{
?>

<span class="titre">>>> TROU</span><br />
<br />
<p>Bienvenue au TROU <? $nom_rpg  = strtoupper($nom_rpg);
echo $nom_rpg.' '.$prenom_rpg; ?>, (<? echo htmlentities($_SESSION['login']); ?>) prisonnier N°<? echo $id; ?>
<br /><br />Vous y resterez jusqu'au
<?
			  $secondesupp1 = $time_trou;
			  
			  $jour1 = floor($secondesupp1/21600);
$heuresensec1 = fmod($secondesupp1, 21600);
$heures1 = floor($heuresensec1/900);
$minutesensec1 = fmod($heuresensec1, 900);
$minutes1 =  floor($minutesensec1/15);

echo ' jour '.$jour1.' à '.$heures1.'h'.$minutes1.'.';

include("pages/trou.php");
			  ?>

<?
}
else
{

include("pages/liens_imp.php");
?>
<table width="100%">
<tr><td width="70%" valign="top">
<span class="titre">>>> POKER</span><br />
</td>
<td width="30%"><img src="images/poker.png"></td></table>
<?
if($_GET['action'] == 1)
{

if($pm >= 15)
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
$reponse123123 = mysql_query("SELECT SQL_CACHE * FROM table_poker WHERE defie='".$login_man."' AND defieur='".htmlentities($_SESSION['login'])."' ORDER BY date DESC LIMIT 0,1"); 
$donnees123123 = mysql_fetch_array($reponse123123);

$thisday = floor(($donnees123123['date'])/21600);

if($jour != $thisday) ########################
{
 
if($id_yop_2 != NULL && $donnees222['id'] != NULL && htmlentities($_GET['id']) != $_SESSION['id_user_secu'])
{

if($distance == 1)
{

if($moral >= 15 && $faim >= 5 && $hygiene >= 20)
{

$reponsesecu = mysql_query("SELECT SQL_CACHE * FROM table_poker WHERE defieur='".htmlentities($_SESSION['login'])."' AND resultat='5'"); 
				while ($donneesecu = mysql_fetch_array($reponsesecu) )
{
$idAA = $donneesecu['id'];
$card_1 = $donneesecu['card_1'];
$card_2 = $donneesecu['card_2'];
$card_3 = $donneesecu['card_3'];
$card_4 = $donneesecu['card_4'];
$card_5 = $donneesecu['card_5'];
$card_6 = $donneesecu['card_6'];
$card_7 = $donneesecu['card_7'];
$card_8 = $donneesecu['card_8'];
$card_9 = $donneesecu['card_9'];
$card_10 = $donneesecu['card_10'];
}



$name = strtolower($login_man);
$my_name = htmlentities(strtolower($_SESSION['login']));

if($idAA == NULL)
{

$card_1 = rand(1,13);
$card_2 = rand(1,13);
$card_3 = rand(1,13);
$card_4 = rand(1,13);
$card_5 = rand(1,13);
$card_6 = rand(1,13);
$card_7 = rand(1,13);
$card_8 = rand(1,13);
$card_9 = rand(1,13);
$card_10 = rand(1,13);

}
else
{
mysql_query("DELETE FROM table_poker WHERE id='".$idAA."'"); 
}

mysql_query("INSERT INTO table_poker VALUES ('', '".$my_name."', '".$name."', '0', '5', '".$secondesupp."', '0', '".$card_1."', '".$card_2."', '".$card_3."', '".$card_4."', '".$card_5."', '".$card_6."', '".$card_7."', '".$card_8."', '".$card_9."', '".$card_10."', '', '')");

$reponse6 = mysql_query("SELECT SQL_CACHE * FROM table_object WHERE pseudo='".htmlentities($_SESSION['login'])."'"); 
				while ($donnees6 = mysql_fetch_array($reponse6) )
{
$intellisupp=$intellisupp+$donnees6['intelligence'];
}


$intellitotal = $intellisupp+$carac_intelligence;


$cartes_retourne = (10/49000) * $intellitotal  - (10/49);
$carte_retourne = floor($cartes_retourne)+1;

$_SESSION['adversaire'] = $login_man; 

?>
<br />
<table width="100%" border="0">
  <tr>
    <td><fieldset style="border-color:#7e5125">

      <legend><strong>Jouer au poker   : </strong></legend>
      <div><form id="form1" name="form1" method="post" action="?page=poker&action=2">
        <table width="100%" border="0">
          <tr>
            <td>Surnom du prisonnier d&eacute;fi&eacute; </td>
            <td><label>
			 <input type="hidden" name="time" value="<? echo $secondesupp; ?>"/>
              <input type="hidden" name="name" value="<? echo $login_man; ?>"/>
			  <? echo $login_man; ?>
            </label></td>
          </tr>
		            <tr>
            <td>Argent mis en jeu (entre 5 et 50 $B) </td>
            <td><label></label><label>
            <input name="sakenbuy" type="text" size="6" maxlength="2" />
            $B</label></td>
          </tr>
<tr>
<td>Choisissez une carte :</td><td></td>
</tr>
<tr>
<td><label>
        <input name="card_select" type="radio" value="1"  />
		<?
		if ($carte_retourne >= 1)
		{
		echo '<img src="images/cards/'.rand(1,4).'/card_'.$card_1.'.png" />';
		}
		else
		{
        echo '<img src="images/cards/card_0.png" />';
		}
		?>
		</label>
		<label>
        <input name="card_select" type="radio" value="2"  />
		<?
		if ($carte_retourne >= 2)
		{
		echo '<img src="images/cards/'.rand(1,4).'/card_'.$card_2.'.png" />';
		}
		else
		{
        echo '<img src="images/cards/card_0.png" />';
		}
		?>
		</label>
		<label>
        <input name="card_select" type="radio" value="3"  />
		<?
		if ($carte_retourne >= 3)
		{
		echo '<img src="images/cards/'.rand(1,4).'/card_'.$card_3.'.png" />';
		}
		else
		{
        echo '<img src="images/cards/card_0.png" />';
		}
		?>
		</label>
		<label>
        <input name="card_select" type="radio" value="4"  />
		<?
		if ($carte_retourne >= 4)
		{
		echo '<img src="images/cards/'.rand(1,4).'/card_'.$card_4.'.png" />';
		}
		else
		{
        echo '<img src="images/cards/card_0.png" />';
		}
		?>
		</label>
		<label>
        <input name="card_select" type="radio" value="5"  />
		<?
		if ($carte_retourne >= 5)
		{
		echo '<img src="images/cards/'.rand(1,4).'/card_'.$card_5.'.png" />';
		}
		else
		{
        echo '<img src="images/cards/card_0.png" />';
		}
		?>
		</label>
		<label>
		        <input name="card_select" type="radio" value="6"  />
		<?
		if ($carte_retourne >= 6)
		{
		echo '<img src="images/cards/'.rand(1,4).'/card_'.$card_6.'.png" />';
		}
		else
		{
        echo '<img src="images/cards/card_0.png" />';
		}
		?>
		</label>
		<label>
		        <input name="card_select" type="radio" value="7"  />
		<?
		if ($carte_retourne >= 7)
		{
		echo '<img src="images/cards/'.rand(1,4).'/card_'.$card_7.'.png" />';
		}
		else
		{
        echo '<img src="images/cards/card_0.png" />';
		}
		?>
		</label>
		<label>
		        <input name="card_select" type="radio" value="8"  />
		<?
		if ($carte_retourne >= 8)
		{
		echo '<img src="images/cards/'.rand(1,4).'/card_'.$card_8.'.png" />';
		}
		else
		{
        echo '<img src="images/cards/card_0.png" />';
		}
		?>
		</label>
		<label>
		        <input name="card_select" type="radio" value="9"  />
		<?
		if ($carte_retourne >= 9)
		{
		echo '<img src="images/cards/'.rand(1,4).'/card_'.$card_9.'.png" />';
		}
		else
		{
        echo '<img src="images/cards/card_0.png" />';
		}
		?>
		</label>
		<label>
		        <input name="card_select" type="radio" value="10"  />
		<?
		if ($carte_retourne >= 10)
		{
		echo '<img src="images/cards/'.rand(1,4).'/card_'.$card_10.'.png" />';
		}
		else
		{
        echo '<img src="images/cards/card_0.png" />';
		}
		?>
		</label>
		
		</td><td></td>
</tr>
		            <tr>
            <td>&nbsp;</td>
            <td><label>
              <input type="submit" name="Submit" value="GO" />
            </label></td>
          </tr>
        </table>
      </form>
        <p>Le but est d'avoir la carte la plus forte (le roi est le plus fort, l'as le plus faible).</p>
      </div>
    </fieldset></td></tr></table></p><br />
</p>
<p>
  <?
  
    }else{
  echo '<br /><br />Votre moral, votre faim, ou votre santé est trop faible pour combattre.'.$retour_cour;
  }
   }
   else
   {
   echo '<br /><br />Vous êtes trop éloigné du joueur défié.'.$retour_cour;
   }
   }else{
   echo '<br /><br />Ce joueur n\'est pas connecté ou n\'est pas dans la cour.'.$retour_cour;
   }
   
   }else{
   echo 'Vous avez déjà défié ce prisonnier au poker aujourd\'hui.'.$retour_cour;
   }
  
  }
  else
  {
  echo '<br /><br />Vous n\'avez pas assez de PM pour effectuer cette action.'.$retour_cour;
  }
}
elseif($_GET['action'] == 2)
{


if($pm >= 15)
{


if($_POST['name'] != NULL && $_POST['sakenbuy'] != NULL && $_POST['card_select'] >= 1 && $_POST['card_select'] <= 10 && $_POST['time'] != NULL)
{
$name = htmlentities(strtolower($_POST['name']));
$my_name = strtolower($_SESSION['login']);
$name = htmlentities($name);

$numero = 'card_'.$_POST['card_select'];

$reponseX = mysql_query("SELECT * FROM table_poker WHERE defieur='".$my_name."' AND defie='".$name."' AND date=".htmlentities($_POST['time'])." AND resultat='5'"); 
				while ($donneesX = mysql_fetch_array($reponseX) )
		{
		$idX = $donneesX['id'];
		$card_bonne = $donneesX["$numero"];
		}


$i=0;

if($idX != 0)
{
if($name != $my_name)
{
$reponse = mysql_query("SELECT * FROM table_user WHERE login='".$name."'"); 
				while ($donnees = mysql_fetch_array($reponse) )
		{
		$i++;
		$statut = $donnees['statut'];
		$portemonnaie_2 = $donnees['portemonnaie'];
		}
		
if($i != 0)
{

if($statut == 'Prisonnier' && strtolower($_SESSION['adversaire']) == $name)
{

if($_POST['sakenbuy'] >= 5 && $_POST['sakenbuy'] <= 50)
{
if($portemonnaie >= $_POST['sakenbuy'])
{
if($portemonnaie_2 >= $_POST['sakenbuy'])
{

mysql_query("UPDATE table_cour SET pm=pm-15 WHERE id='".htmlentities($_SESSION['id_user_secu'])."'");

mysql_query("UPDATE table_poker SET mise=".htmlentities($_POST['sakenbuy']).", resultat='0', defieur_card='".$card_bonne."' WHERE id=".$idX.""); 

echo 'Votre défi a été lancé, il a été mis dans la liste d\'attente de votre adversaire et dans la votre.'.$retour1;

}
else
{
echo 'Votre adversaire n\'a pas assez de $B dans son portemonnaie.'.$retour_cour; 
}
}
else
{
echo 'Vous n\'avez pas assez de $B dans votre portemonnaie.'.$retour_cour;
}
}
else
{
echo 'Veuillez miser entre 5 et 50 $B.'.$retour_cour;
}
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
echo 'Erreur, le défi n\'a pas été lancé veuillez recommencer.'.$retour_cour;
}

}
else
{
echo '<br /><br />Vous avez mal rempli le formulaire.'.$retour_cour;


}


}
else
  {
  echo '<br /><br />Vous n\'avez pas assez de pa pour effectuer cette action.'.$retour_compte;
  }



  
  }
  elseif($_GET['action'] == 3) //Supprimer ou annuler
  {
  
 if($_GET['id'] != NULL)
{

if($_GET['type'] == 1) //Annulation
{

$reponse = mysql_query("SELECT * FROM table_poker WHERE id='".htmlentities($_GET['id'])."'"); 
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

mysql_query("DELETE FROM table_poker WHERE id='".htmlentities($_GET['id'])."'"); 
mysql_query("UPDATE table_user SET pa=pa+1 WHERE id=".$id_secu_user."");

echo 'Le défi a été annulé.<br /><br />';

mysql_query("UPDATE table_user SET carac_respect=carac_respect-5 WHERE id=".$id_secu_user."");
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


$reponse = mysql_query("SELECT * FROM table_poker WHERE id='".htmlentities($_GET['id'])."'"); 
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

mysql_query("DELETE FROM table_poker WHERE id='".htmlentities($_GET['id'])."'"); 

echo 'Le défi a été refusé.<br /><br />';

mysql_query("UPDATE table_user SET carac_respect=carac_respect-5 WHERE id=".$id_secu_user."");
echo 'Votre respect a baissé de 0,005 XP.'.$retour1;


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
  elseif($_GET['action'] == 4) //Go partie !
  {
  
if($_GET['step'] == 2)
{


if($_POST['name'] != NULL && $_POST['card_select'] >= 1 && $_POST['card_select'] <= 10 && $_POST['time'] != NULL && $_POST['id'] != NULL && $_GET['id'] == $_POST['id'])
{

$numero = 'card_'.$_POST['card_select'];

  $reponse = mysql_query("SELECT * FROM table_poker WHERE id='".htmlentities($_GET['id'])."'"); 
				while ($donnees = mysql_fetch_array($reponse) )
				{
				$idX = $donnees['id'];
				$defieur = $donnees['defieur'];
				$defieur = strtolower($defieur);
				$defie = $donnees['defie'];
				$defie = strtolower($defie);
				$mise = $donnees['mise'];
				$defieur_card = $donnees['defieur_card'];
				$resultat = $donnees['resultat'];
				$defie_card  = $donnees["$numero"];
				}

$my_name = strtolower($_SESSION['login']);				
				
if($resultat == '10' && $defie == $my_name)
{


//
$reponse_defie = mysql_query("SELECT * FROM table_user WHERE login='".$defie."'"); 
				while ($donnees_defie = mysql_fetch_array($reponse_defie) )
		{
		$carac_intelligence_defie = $donnees_defie['carac_intelligence'];
		$carac_respect_defie = $donnees_defie['carac_respect'];
		}

$reponse6_defie = mysql_query("SELECT SQL_CACHE * FROM table_object WHERE pseudo='".$defie."'"); 
				while ($donnees6_defie = mysql_fetch_array($reponse6_defie) )
{
$intellisupp_defie = $intellisupp_defie+$donnees6_defie['intelligence'];
$respectsupp_defie = $respectsupp_defie+$donnees6_defie['respect'];
}


$intellitotal_defie = $intellisupp_defie+$carac_intelligence_defie;		
$respecttotal_defie = $respectsupp_defie+$carac_respect_defie;		
	
//
$reponse_defieur = mysql_query("SELECT * FROM table_user WHERE login='".$defieur."'"); 
				while ($donnees_defieur = mysql_fetch_array($reponse_defieur) )
		{
		$carac_intelligence_defieur = $donnees_defieur['carac_intelligence'];
		$carac_respect_defieur = $donnees_defieur['carac_respect'];
		}
		
$reponse6_defieur = mysql_query("SELECT SQL_CACHE * FROM table_object WHERE pseudo='".$defieur."'"); 
				while ($donnees6_defieur = mysql_fetch_array($reponse6_defieur) )
{
$intellisupp_defieur = $intellisupp_defieur+$donnees6_defieur['intelligence'];
$respectsupp_defieur = $respectsupp_defieur+$donnees6_defieur['respect'];
}


$intellitotal_defieur = $intellisupp_defieur+$carac_intelligence_defieur;		
$respecttotal_defieur = $respectsupp_defieur+$carac_respect_defieur;				
		
		

if($defieur_card > $defie_card)
{
$gagnant = $defieur;
$perdant = $defie;
$phrase = "$defieur a joué sa carte $defieur_card et a gagné contre $defie qui a joué $defie_card.";
}
elseif($defieur_card < $defie_card)
{
$gagnant = $defie;
$perdant = $defieur;
$phrase = "$defie a joué sa carte $defie_card et a gagné contre $defieur qui a joué $defieur_card.";
}
else
{

$jet_defieur = rand(1, $intellitotal_defieur);
$jet_defie = rand(1, $intellitotal_defie);

if($jet_defieur >= $jet_defie){
$gagnant = $defieur;
$perdant = $defie;
$phrase = "$defieur a joué sa carte $defieur_card et a gagné contre $defie qui a joué $defie_card l'égalité.";
}
else{
$gagnant = $defie;
$perdant = $defieur;
$phrase = "$defie a joué sa carte $defie_card et a gagné contre $defieur qui a joué $defieur_card après l'égalité.";
}

}


$trou_max = ($intellitotal_defieur + $intellitotal_defie)/200;
$trou = rand(1, $trou_max);

if($trou == 2)
{
if($respecttotal_defieur >= $respecttotal_defie){ 
$victime = $defie;
}
else{	//defieur prend
$victime = $defieur;
}
//Victime au trou
$timetrou = $secondesupp + 21600*3;
mysql_query("UPDATE table_user SET stat_infractions=stat_infractions+1 WHERE login='".$defie."'");
mysql_query("UPDATE table_user SET stat_infractions=stat_infractions+1 WHERE login='".$defieur."'");
mysql_query("UPDATE table_user SET stat_trou=stat_trou+1 WHERE login='".$victime."'");
mysql_query("UPDATE table_user SET time_trou=".$timetrou." WHERE login='".$victime."'");

$trou = 'Les gardes vous arrêtent, '.$victime.' est designé comme coupable il va au trou pour 3 jours.';

}
else{
$trou = '';

$akenBuy = '$B';

$gain = "$gagnant a gagné $mise $akenBuy";

mysql_query("UPDATE table_user SET portemonnaie=portemonnaie+".$mise." WHERE login='".$gagnant."'");
mysql_query("UPDATE table_user SET portemonnaie=portemonnaie-".$mise." WHERE login='".$perdant."'");

}


$xp_intelligence = rand(1,5);
$echo_xp_gain_intelligence = $xp_intelligence/1000;

$gain_XP= "$gagnant a gagné $echo_xp_gain_intelligence XP d'intelligence.";

$resultat = "$phrase<br />$trou<br />$gain<br />$gain_XP";

mysql_query("UPDATE table_user SET stat_parties_poker=stat_parties_poker+1 WHERE login='".$perdant."'");
mysql_query("UPDATE table_user SET stat_parties_poker=stat_parties_poker+1 WHERE login='".$gagnant."'");
mysql_query("UPDATE table_user SET stat_parties_poker_gagne=stat_parties_poker_gagne+1 WHERE login='".$gagnant."'");
mysql_query("UPDATE table_user SET carac_intelligence=carac_intelligence+".$xp_intelligence." WHERE login='".$gagnant."'");
mysql_query("UPDATE table_user SET stat_sous_poker_gagne=stat_sous_poker_gagne-".$mise." WHERE login='".$perdant."'");
mysql_query("UPDATE table_user SET stat_sous_poker_gagne=stat_sous_poker_gagne+".$mise." WHERE login='".$gagnant."'");


mysql_query("UPDATE table_poker SET resultat='".addslashes($resultat)."' WHERE id=".$idX.""); 	 ######################

mysql_query("UPDATE table_poker SET defie_card='".$defie_card."'WHERE id=".$idX.""); 	

echo $resultat.''.$retour1;

mysql_query("UPDATE table_user SET moral=moral+5 WHERE login='".$gagnant."'");
mysql_query("UPDATE table_user SET moral=moral-5 WHERE login='".$perdant."'");

}
else
{
echo 'Ce défi n\'existe pas.'.$retour1;
}
						


}
else
{
echo 'Ce défi n\'existe pas ou vous n\'avez pas choisi de carte.'.$retour1; 

}




}
else
{  
  
  
  if($_GET['id'] != NULL)
  {
  
  $reponse = mysql_query("SELECT * FROM table_poker WHERE id='".htmlentities($_GET['id'])."'"); 
				while ($donnees = mysql_fetch_array($reponse) )
				{
				$idX = $donnees['id'];
				$defieur = $donnees['defieur'];
				$defieur = strtolower($defieur);
				$defie = $donnees['defie'];
				$defie = strtolower($defie);
				$mise = $donnees['mise'];
				$resultat = $donnees['resultat'];
				}
  
  $my_name = strtolower($_SESSION['login']);
				
if($resultat == '0') 
{
	if($defie == $my_name)
	{

mysql_query("UPDATE table_poker SET resultat='10'WHERE id=".$idX.""); 	
	

$card_1 = rand(1,13);
$card_2 = rand(1,13);
$card_3 = rand(1,13);
$card_4 = rand(1,13);
$card_5 = rand(1,13);
$card_6 = rand(1,13);
$card_7 = rand(1,13);
$card_8 = rand(1,13);
$card_9 = rand(1,13);
$card_10 = rand(1,13);

mysql_query("UPDATE table_poker SET card_1=$card_1 , card_2=$card_2 , card_3=$card_3 , card_4=$card_4 , card_5=$card_5 , card_6=$card_6 , card_7=$card_7 , card_8=$card_8 , card_9=$card_9 , card_10=$card_10 WHERE id=".$idX.""); 	

$reponse6 = mysql_query("SELECT SQL_CACHE * FROM table_object WHERE pseudo='".htmlentities($_SESSION['login'])."'"); 
				while ($donnees6 = mysql_fetch_array($reponse6) )
{
$intellisupp=$intellisupp+$donnees6['intelligence'];
}


$intellitotal = $intellisupp+$carac_intelligence;


$cartes_retourne = (10/49000) * $intellitotal  - (10/49);
$carte_retourne = floor($cartes_retourne)+1;

$login_man = $defieur;

?>
<br />

<table width="100%" border="0">
  <tr>
    <td><fieldset style="border-color:#7e5125">

      <legend><strong>Jouer au poker   : </strong></legend>
      <div><form id="form1" name="form1" method="post" action="?page=poker&action=4&step=2&id=<? echo $idX; ?>">
        <table width="100%" border="0">
          <tr>
            <td>D&eacute;fieur</td>
            <td><label>
			 <input type="hidden" name="time" value="<? echo $secondesupp; ?>"/>
              <input type="hidden" name="name" value="<? echo $login_man; ?>"/>
			  <? echo $login_man; ?>
			  <input type="hidden" name="id" value="<? echo $idX; ?>"/>
            </label></td>
          </tr>
<tr>
<td>Choisissez une carte :</td><td></td>
</tr>
<tr>
<td><label>
        <input name="card_select" type="radio" value="1"  />
		<?
		if ($carte_retourne >= 1)
		{
		echo '<img src="images/cards/'.rand(1,4).'/card_'.$card_1.'.png" />';
		}
		else
		{
        echo '<img src="images/cards/card_0.png" />';
		}
		?>
		</label>
		<label>
        <input name="card_select" type="radio" value="2"  />
		<?
		if ($carte_retourne >= 2)
		{
		echo '<img src="images/cards/'.rand(1,4).'/card_'.$card_2.'.png" />';
		}
		else
		{
        echo '<img src="images/cards/card_0.png" />';
		}
		?>
		</label>
		<label>
        <input name="card_select" type="radio" value="3"  />
		<?
		if ($carte_retourne >= 3)
		{
		echo '<img src="images/cards/'.rand(1,4).'/card_'.$card_3.'.png" />';
		}
		else
		{
        echo '<img src="images/cards/card_0.png" />';
		}
		?>
		</label>
		<label>
        <input name="card_select" type="radio" value="4"  />
		<?
		if ($carte_retourne >= 4)
		{
		echo '<img src="images/cards/'.rand(1,4).'/card_'.$card_4.'.png" />';
		}
		else
		{
        echo '<img src="images/cards/card_0.png" />';
		}
		?>
		</label>
		<label>
        <input name="card_select" type="radio" value="5"  />
		<?
		if ($carte_retourne >= 5)
		{
		echo '<img src="images/cards/'.rand(1,4).'/card_'.$card_5.'.png" />';
		}
		else
		{
        echo '<img src="images/cards/card_0.png" />';
		}
		?>
		</label>
		<label>
		        <input name="card_select" type="radio" value="6"  />
		<?
		if ($carte_retourne >= 6)
		{
		echo '<img src="images/cards/'.rand(1,4).'/card_'.$card_6.'.png" />';
		}
		else
		{
        echo '<img src="images/cards/card_0.png" />';
		}
		?>
		</label>
		<label>
		        <input name="card_select" type="radio" value="7"  />
		<?
		if ($carte_retourne >= 7)
		{
		echo '<img src="images/cards/'.rand(1,4).'/card_'.$card_7.'.png" />';
		}
		else
		{
        echo '<img src="images/cards/card_0.png" />';
		}
		?>
		</label>
		<label>
		        <input name="card_select" type="radio" value="8"  />
		<?
		if ($carte_retourne >= 8)
		{
		echo '<img src="images/cards/'.rand(1,4).'/card_'.$card_8.'.png" />';
		}
		else
		{
        echo '<img src="images/cards/card_0.png" />';
		}
		?>
		</label>
		<label>
		        <input name="card_select" type="radio" value="9"  />
		<?
		if ($carte_retourne >= 9)
		{
		echo '<img src="images/cards/'.rand(1,4).'/card_'.$card_9.'.png" />';
		}
		else
		{
        echo '<img src="images/cards/card_0.png" />';
		}
		?>
		</label>
		<label>
		        <input name="card_select" type="radio" value="10"  />
		<?
		if ($carte_retourne >= 10)
		{
		echo '<img src="images/cards/'.rand(1,4).'/card_'.$card_10.'.png" />';
		}
		else
		{
        echo '<img src="images/cards/card_0.png" />';
		}
		?>
		</label>		</td><td></td>
</tr>
		            <tr>
            <td>&nbsp;</td>
            <td><label>
              <input type="submit" name="Submit" value="GO" />
            </label></td>
          </tr>
        </table>
      </form>
        <p>Le but est d'avoir la carte la plus forte (le roi est le plus fort, l'as le plus faible).<br />
        Si vous ne choisissez pas de carte vous perdrez 0.015 de respect. </p>
      </div>
    </fieldset></td></tr></table></p><br />
</p>
<p>
  <?
  



}
else
{
echo 'Erreur page poker a signaler sur le forum !!!.'.$retour1;
}


	}
	else
	{
	echo 'Ce défi n\'existe pas.'.$retour1;
	}
} 
else
{
echo 'Ce défi à déjà été terminé.'.$retour1;
}
  
  
/*
   }
   else
{
echo 'Ce défi n\'existe pas..'.$retour1;
}

*/
}

  }
  else
  {
  
?>
<table width="100%" border="0">
  <tr>
    <td><fieldset style="border-color:#7e5125">

      <legend><strong>D&eacute;fis re&ccedil;us en attente: </strong></legend>
      <div>
        <table width="100%" border="0">
          <tr>
            <td><strong>Joueur d&eacute;fiant </strong></td>
            <td><strong>Mise</strong></td>
            <td><strong>Date</strong></td>
            <td><strong>Accepter</strong></td>
            <td><strong>Refuser*</strong></td>
          </tr>
		  <?
		  $my_name = strtolower($_SESSION['login']);
		  		 $g = 0;
				 $reponse2 = mysql_query("SELECT * FROM table_poker WHERE defie='".$my_name."' AND resultat='0' ORDER BY date"); 
				while ($donnees2 = mysql_fetch_array($reponse2) )
				{
				
				$g++;
		  ?>
          <tr>
            <td><? echo $donnees2['defieur']; ?></td>
            <td><? echo $donnees2['mise']; ?> $B</td>
            <td><?
$secondesupp = $donnees2['date'];


$jour = floor($secondesupp/21600);

echo 'Jour '.$jour;
				  ?></td>
            <td><a href='index.php?page=poker&action=4&id=<? echo $donnees2['id']; ?>'>Accepter</a></td>
            <td><a href='index.php?page=poker&action=3&id=<? echo $donnees2['id']; ?>&type=2'>Refuser</a></td>
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
    <table width="100%" border="0">
      <tr>
        <td><fieldset style="border-color:#7e5125">
          <legend><strong>D&eacute;fis lanc&eacute;s en attente: </strong></legend>
          <div>
            
              <table width="100%" border="0">
                <tr>
                  <td><strong>Joueur d&eacute;fi&eacute; </strong></td>
                  <td><strong></strong> </td>
                  <td><strong>Mise</strong></td>
                  <td><strong>Date</strong></td>
                  <td>&nbsp;</td>
                  <td><strong>Annuler*</strong></td>
                </tr>
				
				<?
				
				$my_name = strtolower($_SESSION['login']);
				$f = 0;
				
				$reponse = mysql_query("SELECT * FROM table_poker WHERE defieur='".$my_name."' AND resultat='0' ORDER BY date DESC"); 
				while ($donnees = mysql_fetch_array($reponse) )
				{
				
$secondesupp5 = $donnees['date'];


$jour5 = floor($secondesupp5/21600);				
				
				if($jour5+84 < $jour)
				{
				mysql_query("DELETE FROM table_poker WHERE id='".$donnees['id']."'"); 
				mysql_query("UPDATE table_user SET carac_respect=carac_respect-5 WHERE id=".$id_secu_user."");
				}
				
				$f++;
				?>
				<tr>
                  <td><? echo $donnees['defie']; ?></td>
                  <td>&nbsp;</td>
                  <td><? echo $donnees['mise']; ?> $B</td>
                  <td><?


echo 'Jour '.$jour5;
				  ?></td>
                  <td></td>
                  <td><a href='index.php?page=poker&action=3&id=<? echo $donnees['id']; ?>&type=1'>Annuler</a></td>
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
    <table width="100%" border="0">
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
			  $reponse3 = mysql_query("SELECT * FROM table_poker WHERE (defieur='".htmlentities($_SESSION['login'])."' OR defie='".htmlentities($_SESSION['login'])."') AND resultat!='0' AND  resultat!='5' AND resultat!='10' ORDER BY id DESC LIMIT 0,5"); 
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
    </p>
    <br />
    *En annulant ou en refusant un défi votre caractéristiques de respect diminuera.
<?
}
}
?>
  <br /><br />

  <?

  }
elseif($statut == 'Mort'  && $_SESSION['mdp'] == $mdp_secu)
{
echo '<SCRIPT LANGUAGE="JavaScript">
document.location.href="?page=mort" /* vous pouvez aussi mettre http://www.monsite.com */
</SCRIPT>';
}
elseif($statut == 'Evadé'  && $_SESSION['mdp'] == $mdp_secu)
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
