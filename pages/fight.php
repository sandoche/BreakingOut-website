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

		$sql = "select * from table_user where login='".htmlentities($_SESSION['login'])."'";
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		$data = mysql_fetch_assoc($req);

		
		$reponse1 = mysql_query("SELECT SQL_CACHE * FROM table_user WHERE login='".htmlentities($_SESSION['login'])."'"); 
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
		$moral = $donnees1['moral'];
		$faim = $donnees1['faim'];
		$hygiene = $donnees1['hygiene'];
		$mdp_secu = $donnees1['mdp'];
		}



		$reponsea = mysql_query("SELECT * FROM table_cour WHERE id='".htmlentities($_SESSION['id_user_secu'])."'");
		
		while ($donneesa = mysql_fetch_array($reponsea) )
		{	
		$id_yop = $donneesa['id'];
		$posx = $donneesa['pos_x'];
		$posy = $donneesa['pos_y'];
		$pm = $donneesa['pm'];
		}
		
if($statut == 'Prisonnier'  && $_SESSION['mdp'] == $mdp_secu)
{		
		
if($time_trou > $secondesupp)
		{
?>
<style type="text/css">
<!--
.style5 {font-size: 9px}
.Style6 {color: #FF0000}
.Style7 {color: #000000}
-->
</style>

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
<span class="titre">>>> MES COMBATS</span><br />
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

$reponse123123 = mysql_query("SELECT SQL_CACHE * FROM table_fight WHERE defie='".$login_man."' AND defieur='".htmlentities($_SESSION['login'])."' ORDER BY supp5 DESC LIMIT 0,1"); 
$donnees123123 = mysql_fetch_array($reponse123123);

$thisday = floor(($donnees123123['supp5'])/21600);

if($jour != $thisday)
{
 
if($id_yop_2 != NULL && $donnees222['id'] != NULL && htmlentities($_GET['id']) != $_SESSION['id_user_secu'])
{

if($distance == 1)
{

if($moral >= 15 && $faim >= 15)
{



?>
<br />
<table width="100%" border="0">
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
			  echo '<input name="id_man" type="hidden" value="'.htmlentities($_GET['id']).'" />';
			  
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
  echo '<br /><br />Votre moral  ou votre faim est trop faible pour combattre.'.$retour_cour;
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
   echo 'Vous avez déjà défié ce prisonnier aujourd\'hui.'.$retour_cour;
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
$my_name = htmlentities(strtolower($_SESSION['login']));
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

mysql_query("INSERT INTO table_fight VALUES ('', '".$my_name."', '".$name."', '".htmlentities($_POST['vol'])."', '0', '".htmlentities($_POST['attaque'])."', '".htmlentities($_POST['defense'])."', '".htmlentities($_SESSION['id_user_secu'])."', '".htmlentities($_POST['id_man'])."', '".$secondesupp."', '0', '0', '0', '0')");
mysql_query("UPDATE table_cour SET pm=pm-30 WHERE id='".htmlentities($_SESSION['id_user_secu'])."'");

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

$moi = htmlentities(strtolower($_SESSION['login']));

if($moi_verif == $moi)
{
if($resultat_0 == 0)
{

mysql_query("DELETE FROM table_fight WHERE id='".htmlentities($_GET['id'])."'"); 

echo 'Le défi a été annulé.<br /><br />';

mysql_query("UPDATE table_cour SET pm=pm+15 WHERE id='".htmlentities($_SESSION['id_user_secu'])."'");
mysql_query("UPDATE table_user SET carac_respect=carac_respect-5 WHERE id='".htmlentities($_SESSION['id_user_secu'])."'");
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

$moi = htmlentities(strtolower($_SESSION['login']));

if($moi_verif == $moi)
{
if($resultat_0 == 0)
{

mysql_query("DELETE FROM table_fight WHERE id='".htmlentities($_GET['id'])."'"); 

echo 'Le défi a été refusé.<br /><br />';

mysql_query("UPDATE table_user SET carac_respect=carac_respect-10 WHERE id='".$id_secu_user."'");
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

/////////////////////////////////////////////////

$reponsea = mysql_query("SELECT SQL_CACHE * FROM table_fight WHERE id='".htmlentities($_GET['id'])."'");
$donneesa = mysql_fetch_array($reponsea);
$online_secu_var = $donneesa['supp1'];
$defieur = $donneesa['defieur'];
$defie = strtolower($donneesa['defie']);
$vol = $donneesa['vol'];
$attaque_2 = $donneesa['attaque'];
$defense_2 = $donneesa['defense'];
$pv_round1_2 = $donneesa['pv_defieur'];
$pv_round1 = $donneesa['pv_defie'];
$resultat_old_2 = $donneesa['resultat_2'];
$resultat_old = $donneesa['resultat'];


if($vol == 1){ $type_value = 1.5; }
else { $type_value = 1; }


if($defie == strtolower($_SESSION['login']))
{

$reponseman = mysql_query("SELECT SQL_CACHE * FROM table_user WHERE login='".$defieur."'"); 
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
$delit_2 = $donneesman['delit'];
$avatar_2 = $donneesman['avatar'];
$gang_2 = $donneesman['gang'];
$moral_2 = $donneesman['moral'];
$hygiene_2 = $donneesman['hygiene'];
$faim_2 = $donneesman['faim'];
$delit_2 = $donneesman['delit'];
$gang_2 = $donneesman['gang'];
				}
				
				
				
$reponse6 = mysql_query("SELECT SQL_CACHE * FROM table_object WHERE pseudo='".htmlentities($_SESSION['login'])."'"); 
				while ($donnees6 = mysql_fetch_array($reponse6) )
{
$forcesupp=$forcesupp+$donnees6['force'];
$agilitesupp=$agilitesupp+$donnees6['agilite'];
$intellisupp=$intellisupp+$donnees6['intelligence'];
$respectsupp=$respectsupp+$donnees6['respect'];
}


$reponse7 = mysql_query("SELECT SQL_CACHE * FROM table_object WHERE pseudo='".$defieur."'"); 
				while ($donnees7 = mysql_fetch_array($reponse7) )
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

$niveau1 = floor(($carac_force+$carac_agilite+$carac_intelligence+$carac_respect-9000)/1000);
$niveau2 = floor(($carac_force_2+$carac_agilite_2+$carac_intelligence_2+$carac_respect_2-9000)/1000);
				
$diff = $niveau1 - $niveau2;

if($diff <= 5 && $diff >= -5)
{

if($_GET['step'] == 1 && $online_secu_var == 1){


if($_GET['defense'] == 1 || $_GET['defense'] == 2 || $_GET['defense'] == 3)
{

if($attaque_2 == 1) { $attaque_echo = 'Tête'; 
$bonus = rand(1,10);
} 
elseif ($attaque_2 == 2) { $attaque_echo = 'Corps';
$bonus = rand(1,5);
}
else { $attaque_echo = 'Jambes'; 
$bonus = rand(5,15);
}

$coeff_faim = (1/85) * $faim_2 + (70/85);


$defense = $_GET['defense'];

if($attaque_2 == $defense)
{

$pv_perte_2 = floor((rand(1,5))*$type_value);
$pv_perte = 0;
$moral_perte_2 = floor((rand(1,10))*$type_value);
$moral_perte = -5;
$faim_perte_2 = floor((rand(5,10))*$type_value);
$faim_perte = 0;
$hygiene_perte_2 = floor((rand(5,10))*$type_value);
$hygiene_perte = rand(5,10);

$resultat_2 = 'Santé : -'.$pv_perte_2.'<br />Moral : -'.$moral_perte_2.'<br />Faim : -'.$faim_perte_2.'<br />Hygiene : -'.$hygiene_perte_2;
$resultat = 'Santé : 0<br />Moral : +5<br />Faim : -0<br />Hygiene : -'.$hygiene_perte;

}
else
{

$valeur_fight = ($forcetotal_2/1000) - ($agilitetotal/1000);


if($valeur_fight >= 0) 
{
$pv_perte = floor($valeur_fight*$type_value*$coeff_faim)+(rand(1,5))+$bonus;
$moral_perte = floor($valeur_fight*$type_value)+(rand(1,10));
$faim_perte = floor($valeur_fight*$type_value)+(rand(5,10));
$hygiene_perte = floor($valeur_fight*$type_value)+(rand(5,10));
$pv_perte_2 = 0;
$moral_perte_2 = -10;
$faim_perte_2 = 0;
$hygiene_perte_2 = rand(5,10);
$moral_perte_2_echo = '+10';
}
else 
{
$pv_perte = floor(1*$type_value*$coeff_faim)+5;
$moral_perte = floor(1*$type_value)+(rand(1,5));
$faim_perte = floor(1*$type_value)+(rand(1,5));
$hygiene_perte = floor(1*$type_value)+(rand(1,5));
$pv_perte_2 = rand(1,5);
$moral_perte_2 = 0;
$faim_perte_2 = rand(1,5);
$hygiene_perte_2 = rand(5,10);
$moral_perte_2_echo = '0';
}

$resultat_2 = 'Santé : -'.$pv_perte_2.'<br />Moral : '.$moral_perte_2_echo.'<br />Faim : -'.$faim_perte_2.'<br />Hygiene : -'.$hygiene_perte_2;
$resultat = 'Santé : -'.$pv_perte.'<br />Moral : -'.$moral_perte.'<br />Faim : -'.$faim_perte.'<br />Hygiene : -'.$hygiene_perte;


}

if($_GET['defense'] == 1) { $def_echo = 'Tête'; } 
elseif ($_GET['defense'] == 2) { $def_echo = 'Corps';}
else { $def_echo = 'Jambes'; }

$pv_2 = $pv_2 - $pv_perte_2;					
$hygiene_2 = $hygiene_2 - $hygiene_perte_2;
$moral_2 = $moral_2 - $moral_perte_2;
$faim_2 = $faim_2 - $faim_perte_2;
$pv = $pv - $pv_perte;							
$hygiene = $hygiene - $hygiene_perte;		
$moral = $moral - $moral_perte;
$faim = $faim - $faim_perte;

if($pv_2 < 0){
$pv_2 = 1;
}
if($hygiene_2 < 0){
$hygiene_2 = 1;
}
if($moral_2 < 0){
$moral_2 = 1;
}
if($faim_2 < 0){
$faim_2 = 1;
}
if($pv < 0){
$pv = 1;
}
if($hygiene < 0){
$hygiene = 1;
}
if($moral < 0){
$moral = 1;
}
if($faim < 0){
$faim = 1;
}

mysql_query("UPDATE table_fight SET pv_defieur=".$pv_perte_2." , pv_defie=".$pv_perte." , resultat='".$resultat."' , resultat_2='".$resultat_2."' WHERE id='".htmlentities($_GET['id'])."'");

mysql_query("UPDATE table_user SET pv=".$pv.", hygiene=".$hygiene.", moral='".$moral."', faim='".$faim."' WHERE login='".htmlentities($_SESSION['login'])."'");
mysql_query("UPDATE table_user SET pv=".$pv_2.", hygiene=".$hygiene_2.", moral='".$moral_2."', faim='".$faim_2."' WHERE login='".$defieur."'");

?>
<table width="100%" border="0">
  <tr>
    <td><fieldset style="border-color:#7e5125">

      <legend><strong>Combat  : </strong></legend>
      <div>

<table width="100%" border="0">
  <tr>
    <td width="45%"><div align="center"><strong><? echo $defieur; ?></strong><br />
    <img src="<?
			if($avatar_2 == '0')
			{
			echo 'avatars/no_avatar.png';
			}
			else
			{
			echo $avatar_2;
			}
			?>" title="" border="1" height="100" width="100"></div></td>
    <td><h1 align="center">VS</h1></td>
    <td width="45%"><div align="center"><strong><? echo htmlentities($_SESSION['login']); ?></strong><br />
    <img src="<?
			if($avatar == '0')
			{
			echo 'avatars/no_avatar.png';
			}
			else
			{
			echo $avatar;
			}
			?>" title="Avatar de <? echo htmlentities($_SESSION['login']); ?>" border="1" height="100" width="100"></div></td>
  </tr>
  <tr>
    <td><div align="center">Niveau <? echo $niveau2; ?><br />Gang : <? if ($gang_2 == '0')
			  {
			  echo 'Aucun';
			  }else{echo $gang_2; } ?></div></td>
    <td>&nbsp;</td>
    <td><div align="center">Niveau <? echo $niveau1; ?> <br />Gang : <? if ($gang == '0')
			  {
			  echo 'Aucun';
			  }else{echo $gang; } ?></div></td>
  </tr>
  <tr>
    <td><div align="center">
	<table>

<tr>
<td><span class="style2">Santé :</span></td>
<td><img src="images/barre1.png" height="10" width="<? echo $pv_2; ?>">
<? echo $pv_2; ?></td>
</tr>

<tr>
<td><span class="style2">Hygiène :</span></td>
<td>			  <img src="images/barre2.png" height="10" width="<? echo $hygiene_2; ?>">
			  <? echo $hygiene_2; ?></td>

</tr>

<tr>
<td><span class="style2">Moral :</span></td>
<td>			  <img src="images/barre3.png" height="10" width="<? echo $moral_2; ?>">
			  <? echo $moral_2; ?></td>
</tr>

<tr>
<td><span class="style2">Faim :</span></td>
<td><img src="images/barre4.png" height="10" width="<? echo $hygiene_2; ?>">
			  <? echo $faim_2; ?> </td>

</tr>

	</table>
	</div></td>
    <td>&nbsp;</td>
    <td><center><table>
      <tr>
        <td><span class="style2">Sant&eacute; :</span></td>
        <td><img src="images/barre1.png" height="10" width="<? echo $pv;?>" /> <? echo $pv;?></td>
      </tr>
      <tr>
        <td><span class="style2">Hygi&egrave;ne :</span></td>
        <td><img src="images/barre2.png" height="10" width="<? echo $hygiene;?>" /> <? echo $hygiene;?></td>
      </tr>
      <tr>
        <td><span class="style2">Moral :</span></td>
        <td><img src="images/barre3.png" height="10" width="<? echo $moral;?>" /> <? echo $moral;?></td>
      </tr>
      <tr>
        <td><span class="style2">Faim :</span></td>
        <td><img src="images/barre4.png" height="10" width="<? echo $faim;?>" /> <? echo $faim;?> </td>
      </tr>
    </table></center></td>
  </tr>
</table>
<br />

</div>
     </fieldset></td></tr></table></p><br />

<table width="100%" border="0">
  <tr>
    <td><fieldset style="border-color:#7e5125">

      <legend><strong>Actions  : </strong></legend>
      <div>
	  
<table width="100%" border="0">
  <tr>
    <td width="45%">Attaque : <? echo $attaque_echo; ?> </td>
    <td width="10%">&nbsp;</td>
    <td width="45%">D&eacute;fense :  <? echo $def_echo; ?></td>
  </tr>
  <tr>
    <td><b>Résultat :<br /></b><? echo $resultat_2; ?></td>
    <td>&nbsp;</td>
    <td><b>Résultat :<br /></b><? echo $resultat; ?></td>
  </tr>
  <tr>
    <td>Défense : ???</td>
    <td>&nbsp;</td>
    <td>Attaque : <a href="?page=fight&action=4&step=2&id=<? echo htmlentities($_GET['id']); ?>&attaque=1&old_def=<? echo htmlentities($_GET['defense']); ?>">T&ecirc;te</a> | <a href="?page=fight&action=4&step=2&id=<? echo htmlentities($_GET['id']); ?>&attaque=2&old_def=<? echo htmlentities($_GET['defense']); ?>">Corps</a> | <a href="?page=fight&action=4&step=2&id=<? echo htmlentities($_GET['id']); ?>&attaque=3&old_def=<? echo htmlentities($_GET['defense']); ?>">Jambes</a></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
  </div>
     </fieldset></td></tr></table></p><br />
<p>&nbsp;</p>
<p>
<br />
<?
mysql_query("UPDATE table_fight SET supp1=2 WHERE id='".htmlentities($_GET['id'])."'");

}else{
echo 'Vous n\'avez pas choisis d\'attaque, vous déclarez forfait et vous perdrez 0.100 XP en respect.'.$retour1;
}

}
elseif($_GET['step'] == 2 && $online_secu_var == 2) {

if($_GET['attaque'] == 1 || $_GET['attaque'] == 2 || $_GET['attaque'] == 3)
{

if($defense_2 == 1) { $defense_echo = 'Tête'; 
$bonus = rand(1,10);
} 
elseif ($defense_2 == 2) { $defense_echo = 'Corps';
$bonus = rand(1,5);
}
else { $defense_echo = 'Jambes'; 
$bonus = rand(5,10);
}

if($attaque_2 == 1) { $attaque_echo = 'Tête'; 
$bonus = rand(1,10);
} 
elseif ($attaque_2 == 2) { $attaque_echo = 'Corps';
$bonus = rand(1,5);
}
else { $attaque_echo = 'Jambes'; 
$bonus = rand(5,10);
}

$coeff_faim = (1/85) * $faim + (70/85);


$attaque = $_GET['attaque'];

if($defense_2 == $attaque)
{

$pv_perte = floor((rand(1,5))*$type_value);
$pv_perte_2 = 0;
$moral_perte = floor((rand(1,10))*$type_value);
$moral_perte_2 = -5;
$faim_perte = floor((rand(5,10))*$type_value);
$faim_perte_2 = 0;
$hygiene_perte = floor((rand(5,10))*$type_value);
$hygiene_perte_2 = rand(5,10);



$resultat = 'Santé : -'.$pv_perte.'<br />Moral : -'.$moral_perte.'<br />Faim : -'.$faim_perte.'<br />Hygiene : -'.$hygiene_perte;
$resultat_2 = 'Santé : 0<br />Moral : +5<br />Faim : -0<br />Hygiene : -'.$hygiene_perte_2;

}
else
{

$valeur_fight = ($forcetotal/1000) - ($agilitetotal_2/1000);


if($valeur_fight >= 0) 
{
$pv_perte_2 = floor($valeur_fight*$type_value*$coeff_faim)+(rand(1,5))+$bonus;
$moral_perte_2 = floor($valeur_fight*$type_value)+(rand(1,10));
$faim_perte_2 = floor($valeur_fight*$type_value)+(rand(5,10));
$hygiene_perte_2 = floor($valeur_fight*$type_value)+(rand(5,10));
$pv_perte = 0;
$moral_perte = -10;
$faim_perte = 0;
$hygiene_perte = rand(5,10);
$moral_perte_echo = '+10';
}
else 
{
$pv_perte_2 = floor(1*$type_value*$coeff_faim)+5;
$moral_perte_2 = floor(1*$type_value)+(rand(1,5));
$faim_perte_2 = floor(1*$type_value)+(rand(1,5));
$hygiene_perte_2 = floor(1*$type_value)+(rand(1,5));
$pv_perte = rand(1,5);
$moral_perte = 0;
$faim_perte = rand(1,5);
$hygiene_perte = rand(5,10);
$moral_perte_echo = '0';
}




$resultat = 'Santé : -'.$pv_perte.'<br />Moral : '.$moral_perte_echo.'<br />Faim : -'.$faim_perte.'<br />Hygiene : -'.$hygiene_perte;
$resultat_2 = 'Santé : -'.$pv_perte_2.'<br />Moral : -'.$moral_perte_2.'<br />Faim : -'.$faim_perte_2.'<br />Hygiene : -'.$hygiene_perte_2;


}

if($_GET['attaque'] == 1) { $att_echo = 'Tête'; } 
elseif ($_GET['attaque'] == 2) { $att_echo = 'Corps';}
else { $att_echo = 'Jambes'; }

$pv_2 = $pv_2 - $pv_perte_2;					
$hygiene_2 = $hygiene_2 - $hygiene_perte_2;
$moral_2 = $moral_2 - $moral_perte_2;
$faim_2 = $faim_2 - $faim_perte_2;
$pv = $pv - $pv_perte;							
$hygiene = $hygiene - $hygiene_perte;		
$moral = $moral - $moral_perte;
$faim = $faim - $faim_perte;

if($pv_2 < 0){
$pv_2 = 1;
}
if($hygiene_2 < 0){
$hygiene_2 = 1;
}
if($moral_2 < 0){
$moral_2 = 1;
}
if($faim_2 < 0){
$faim_2 = 1;
}
if($pv < 0){
$pv = 1;
}
if($hygiene < 0){
$hygiene = 1;
}
if($moral < 0){
$moral = 1;
}
if($faim < 0){
$faim = 1;
}

mysql_query("UPDATE table_fight SET pv_defieur=".$pv_2." , pv_defie=".$pv." , resultat='".$resultat."' , resultat_2='".$resultat_2."' WHERE id='".htmlentities($_GET['id'])."'");

mysql_query("UPDATE table_user SET pv=".$pv.", hygiene=".$hygiene.", moral='".$moral."', faim='".$faim."' WHERE id=".$id_secu_user.""); ############" BUG ICI ????
mysql_query("UPDATE table_user SET pv=".$pv_2.", hygiene=".$hygiene_2.", moral='".$moral_2."', faim='".$faim_2."' WHERE login='".$defieur."'");

$perte_total_pv_2 = $pv_round1_2 + $pv_perte_2;
$perte_total_pv = $pv_round1 + $pv_perte;

if($perte_total_pv >= $perte_total_pv_2) { //Joueur 2 qui gagne
$gagnant = $defieur;
$perdant = htmlentities($_SESSION['login']);
$diff_coeff = $niveau1 - $niveau2;
$force_utile = $carac_force_2;
$agilite_utile = $carac_agilite_2;
$intelligence_utile = $carac_intelligence_2;
$respect_utile = $carac_respect_2;
$gang_vic = $gang_2;
$gang_def = $gang;
}else { //Joueur 1 qui gagne
$gagnant = htmlentities($_SESSION['login']);
$perdant = $defieur;
$diff_coeff = $niveau2 - $niveau1;
$force_utile = $carac_force;
$agilite_utile = $carac_agilite;
$intelligence_utile = $carac_intelligence;
$respect_utile = $carac_respect;
$gang_vic = $gang;
$gang_def = $gang_2;
}

if($diff_coeff <= 0)
{
$bonus_xp = 1;
}
else
{
$bonus_xp = (1/8)* $diff_coeff + (11/8); 
}

$max_gain_force = ((-1/725) * $force_utile + (1490/29)) * $bonus_xp + 2;
$max_gain_agilite = ((-1/725) * $agilite_utile + (1490/29)) * $bonus_xp + 2;
$max_gain_intelligence = ((-1/725) * $intelligence_utile + (1490/29)) * $bonus_xp + 2;
$max_gain_respect = ((-1/725) * $respect_utile + (1490/29)) * $bonus_xp + 2;

$gain_force = rand(1,$max_gain_force);
$gain_agilite = rand(1,$max_gain_agilite);
$gain_intelligence = rand(1,$max_gain_intelligence);
$gain_respect = rand(1,$max_gain_respect);

mysql_query("UPDATE table_user SET carac_force=carac_force+".$gain_force." , carac_agilite=carac_agilite+".$gain_agilite." , carac_intelligence=carac_intelligence+'".$gain_intelligence."' , carac_respect=carac_respect+'".$gain_respect."' WHERE login='".$gagnant."'");
mysql_query("UPDATE table_gang SET points=points+1 WHERE nom='".$gang_vic."'");
mysql_query("UPDATE table_gang SET points=points-1 WHERE nom='".$gang_def."'");

$resultat_final = "Le prisonnier ".$gagnant." a remporté le combat et a gagné :<br />".($gain_force/1000)." XP de force, ".($gain_agilite/1000)." XP d'agilité, ".($gain_intelligence/1000)." XP d'intelligence, et ".($gain_respect/1000)." XP de respect.";

mysql_query("UPDATE table_user SET stat_combats=stat_combats+1 WHERE login='".$gagnant."'");
mysql_query("UPDATE table_user SET stat_combats=stat_combats+1 WHERE login='".$perdant."'");
mysql_query("UPDATE table_user SET stat_combats_gagne=stat_combats_gagne+1 WHERE login='".$gagnant."'");

$trou_max = ($intellitotal_2 + $intellitotal)/200;
$trou = rand(1, $trou_max);

if($trou == 2)
{
if($respecttotal_2 >= $respecttotal){ // SESSION LOGIN PREND
$victime = htmlentities($_SESSION['login']);
}
else{	//defieur prend
$victime = $defieur;
}
//Victime au trou
$timetrou = $secondesupp + 21600*3;
mysql_query("UPDATE table_user SET stat_infractions=stat_infractions+1 WHERE login='".htmlentities($_SESSION['login'])."'");
mysql_query("UPDATE table_user SET stat_infractions=stat_infractions+1 WHERE login='".$defieur."'");
mysql_query("UPDATE table_user SET stat_trou=stat_trou+1 WHERE login='".$victime."'");
mysql_query("UPDATE table_user SET time_trou=".$timetrou." WHERE login='".$victime."'");

$trou = 'Les gardes vous arrêtent, '.$victime.' est designé comme coupable il va au trou pour 3 jours.';

}
else{
$trou = '';

}

if($gagnant == $defieur && $vol != 1)
{

if($delit_2 == 'Pickpocket'){
$maxvol = 15;
}else{
$maxvol = round(((-199/49000) * $intellitotal_2 + 9999/49)+ 14);
}

$vol_tentative = rand(1,$maxvol);
if($vol_tentative == 2){
$vol_ok = 1;
}else{
$vol_ok = 0;
}

if($vol == 2 && $vol_ok == 1) //Vol d'objet
{
$reponsevol = mysql_query("SELECT * FROM table_object WHERE pseudo='".htmlentities($_SESSION['login'])."' AND volable=1 LIMIT 0,1"); 
					while ($donneesvol = mysql_fetch_array($reponsevol) )
				{
				$i2++;
				$id = $donneesvol['id'];
				$nom = $donneesvol['nom'];
				}
		
		if($i2 != 0)
		{
		mysql_query("UPDATE table_object SET pseudo='".$defieur."' WHERE id=".$id."");
		
		$vol_echo = $defieur." a volé ".$nom." à ".htmlentities($_SESSION['login']).".";
		}
		else
		{
		$vol_echo = $defieur." a essayé de voler un objet mais ".htmlentities($_SESSION['login'])." n\'en n\'avait pas.";
		}
}
elseif($vol == 3 && $vol_ok == 1) // Vol d'argent
{
$max_vol = $portemonnaie/3;
		
		$gain = rand(1,$max_vol);
		
		$SB = '$B';
		
		$vol_echo = $defieur." a volé ".$gain." ".$SB." à ".htmlentities($_SESSION['login'])."";	
		
		mysql_query("UPDATE table_user SET portemonnaie=portemonnaie-".$gain." WHERE id=".$id_secu_user."");
		mysql_query("UPDATE table_user SET portemonnaie=portemonnaie+".$gain." WHERE login='".$defieur."'");
}

}


$resultat_final = $resultat_final.'<br />'.$vol_echo.'<br />'.$trou;


?>
<table width="100%" border="0">
  <tr>
    <td><fieldset style="border-color:#7e5125">

      <legend><strong>Combat  : </strong></legend>
      <div>

<table width="100%" border="0">
  <tr>
    <td width="45%"><div align="center"><strong><? echo $defieur; ?></strong><br />
    <img src="<?
			if($avatar_2 == '0')
			{
			echo 'avatars/no_avatar.png';
			}
			else
			{
			echo $avatar_2;
			}
			?>" title="" border="1" height="100" width="100"></div></td>
    <td><h1 align="center">VS</h1></td>
    <td width="45%"><div align="center"><strong><? echo htmlentities($_SESSION['login']); ?></strong><br />
    <img src="<?
			if($avatar == '0')
			{
			echo 'avatars/no_avatar.png';
			}
			else
			{
			echo $avatar;
			}
			?>" title="Avatar de <? echo htmlentities($_SESSION['login']); ?>" border="1" height="100" width="100"></div></td>
  </tr>
  <tr>
    <td><div align="center">Niveau <? echo $niveau2; ?><br />Gang : <? if ($gang_2 == '0')
			  {
			  echo 'Aucun';
			  }else{echo $gang_2; } ?></div></td>
    <td>&nbsp;</td>
    <td><div align="center">Niveau <? echo $niveau1; ?> <br />Gang : <? if ($gang == '0')
			  {
			  echo 'Aucun';
			  }else{echo $gang; } ?></div></td>
  </tr>
  <tr>
    <td><div align="center">
	<table>

<tr>
<td><span class="style2">Santé :</span></td>
<td><img src="images/barre1.png" height="10" width="<? echo $pv_2; ?>">
<? echo $pv_2; ?></td>
</tr>

<tr>
<td><span class="style2">Hygiène :</span></td>
<td>			  <img src="images/barre2.png" height="10" width="<? echo $hygiene_2; ?>">
			  <? echo $hygiene_2; ?></td>

</tr>

<tr>
<td><span class="style2">Moral :</span></td>
<td>			  <img src="images/barre3.png" height="10" width="<? echo $moral_2; ?>">
			  <? echo $moral_2; ?></td>
</tr>

<tr>
<td><span class="style2">Faim :</span></td>
<td><img src="images/barre4.png" height="10" width="<? echo $hygiene_2; ?>">
			  <? echo $faim_2; ?> </td>

</tr>

	</table>
	</div></td>
    <td>&nbsp;</td>
    <td><center><table>
      <tr>
        <td><span class="style2">Sant&eacute; :</span></td>
        <td><img src="images/barre1.png" height="10" width="<? echo $pv;?>" /> <? echo $pv;?></td>
      </tr>
      <tr>
        <td><span class="style2">Hygi&egrave;ne :</span></td>
        <td><img src="images/barre2.png" height="10" width="<? echo $hygiene;?>" /> <? echo $hygiene;?></td>
      </tr>
      <tr>
        <td><span class="style2">Moral :</span></td>
        <td><img src="images/barre3.png" height="10" width="<? echo $moral;?>" /> <? echo $moral;?></td>
      </tr>
      <tr>
        <td><span class="style2">Faim :</span></td>
        <td><img src="images/barre4.png" height="10" width="<? echo $faim;?>" /> <? echo $faim;?> </td>
      </tr>
    </table></center></td>
  </tr>
</table>
<br />

</div>
     </fieldset></td></tr></table></p><br />

<table width="100%" border="0">
  <tr>
    <td><fieldset style="border-color:#7e5125">

      <legend><strong>Actions  : </strong></legend>
      <div>
	  
<table width="100%" border="0">
  <tr>
    <td width="45%">Attaque : <? echo $attaque_echo; ?> </td>
    <td width="10%">&nbsp;</td>
    <td width="45%">D&eacute;fense :  <? 
if($_GET['old_def'] == 1) { echo 'Tête'; } 
elseif ($_GET['old_def'] == 2) { echo 'Corps';}
else { echo 'Jambes'; } ?></td>
  </tr>
  <tr>
    <td><b>Résultat :<br /></b><? echo $resultat_old_2; ?></td>
    <td>&nbsp;</td>
    <td><b>Résultat :<br /></b><? echo $resultat_old; ?></td>
  </tr>
  <tr>
    <td>Défense : <?  echo $defense_echo; ?></td>
    <td>&nbsp;</td>
    <td>Attaque : <? echo $att_echo; ?>  </tr>
    <tr>
    <td><b>R&eacute;sultat :<br />
    </b><? echo $resultat_2; ?></td>
    <td>&nbsp;</td>
    <td><b>R&eacute;sultat :<br />
    </b><? echo $resultat; ?></td>
  </tr>
  <tr>
    <td><div align="center"><p style="color:#FF0000"><? echo $perte_total_pv_2; ?>PV perdus</p> 
    </div></td>
    <td>&nbsp;</td>
    <td><div align="center" ><p style="color:#FF0000"><? echo $perte_total_pv; ?>PV perdus</p>
    </div></td>
  </tr>
</table>
<br />
<?
echo $resultat_final;
?><br /><br /><a href="?page=fight">Retour</a><br />

<br />
  </div>
     </fieldset></td></tr></table></p><br />
<p>&nbsp;</p>
<p>
<br />

<?

mysql_query("UPDATE table_fight SET supp1=3 WHERE id='".htmlentities($_GET['id'])."'");

mysql_query("UPDATE table_fight SET resultat='".addslashes($resultat_final)."'  WHERE id='".htmlentities($_GET['id'])."'");

}else{
echo 'Vous n\'avez pas choisis d\'attaque, vous déclarez forfait et vous perdrez 0.100 XP en respect.'.$retour1;
}


}
elseif($_GET['step'] == NULL && $online_secu_var == 0) {
$_SESSION['step2'] = 0;
$_SESSION['id_fight'] = $_GET['id'];



?>


<table width="100%" border="0">
  <tr>
    <td><fieldset style="border-color:#7e5125">

      <legend><strong>Combat  : </strong></legend>
      <div>

<table width="100%" border="0">
  <tr>
    <td width="45%"><div align="center"><strong><? echo $defieur; ?></strong><br />
    <img src="<?
			if($avatar_2 == '0')
			{
			echo 'avatars/no_avatar.png';
			}
			else
			{
			echo $avatar_2;
			}
			?>" title="" border="1" height="100" width="100"></div></td>
    <td><h1 align="center">VS</h1></td>
    <td width="45%"><div align="center"><strong><? echo htmlentities($_SESSION['login']); ?></strong><br />
    <img src="<?
			if($avatar == '0')
			{
			echo 'avatars/no_avatar.png';
			}
			else
			{
			echo $avatar;
			}
			?>" title="Avatar de <? echo htmlentities($_SESSION['login']); ?>" border="1" height="100" width="100"></div></td>
  </tr>
  <tr>
    <td><div align="center">Niveau <? echo $niveau2; ?><br />Gang : <? if ($gang_2 == '0')
			  {
			  echo 'Aucun';
			  }else{echo $gang_2; } ?></div></td>
    <td>&nbsp;</td>
    <td><div align="center">Niveau <? echo $niveau1; ?> <br />Gang : <? if ($gang == '0')
			  {
			  echo 'Aucun';
			  }else{echo $gang; } ?></div></td>
  </tr>
  <tr>
    <td><div align="center">
	<table>

<tr>
<td><span class="style2">Santé :</span></td>
<td><img src="images/barre1.png" height="10" width="<? echo $pv_2; ?>">
<? echo $pv_2; ?></td>
</tr>

<tr>
<td><span class="style2">Hygiène :</span></td>
<td>			  <img src="images/barre2.png" height="10" width="<? echo $hygiene_2; ?>">
			  <? echo $hygiene_2; ?></td>

</tr>

<tr>
<td><span class="style2">Moral :</span></td>
<td>			  <img src="images/barre3.png" height="10" width="<? echo $moral_2; ?>">
			  <? echo $moral_2; ?></td>
</tr>

<tr>
<td><span class="style2">Faim :</span></td>
<td><img src="images/barre4.png" height="10" width="<? echo $hygiene_2; ?>">
			  <? echo $faim_2; ?> </td>

</tr>

	</table>
	</div></td>
    <td>&nbsp;</td>
    <td><center><table>
      <tr>
        <td><span class="style2">Sant&eacute; :</span></td>
        <td><img src="images/barre1.png" height="10" width="<? echo $pv;?>" /> <? echo $pv;?></td>
      </tr>
      <tr>
        <td><span class="style2">Hygi&egrave;ne :</span></td>
        <td><img src="images/barre2.png" height="10" width="<? echo $hygiene;?>" /> <? echo $hygiene;?></td>
      </tr>
      <tr>
        <td><span class="style2">Moral :</span></td>
        <td><img src="images/barre3.png" height="10" width="<? echo $moral;?>" /> <? echo $moral;?></td>
      </tr>
      <tr>
        <td><span class="style2">Faim :</span></td>
        <td><img src="images/barre4.png" height="10" width="<? echo $faim;?>" /> <? echo $faim;?> </td>
      </tr>
    </table></center></td>
  </tr>
</table>
<br />

</div>
     </fieldset></td></tr></table></p><br />

<table width="100%" border="0">
  <tr>
    <td><fieldset style="border-color:#7e5125">

      <legend><strong>Actions  : </strong></legend>
      <div>
	  
<table width="100%" border="0">
  <tr>
    <td width="45%">Attaque : ??? </td>
    <td width="10%">&nbsp;</td>
    <td width="45%">D&eacute;fense : <a href="?page=fight&action=4&step=1&id=<? echo htmlentities($_GET['id']); ?>&defense=1">T&ecirc;te</a> | <a href="?page=fight&action=4&step=1&id=<? echo htmlentities($_GET['id']); ?>&defense=2">Corps</a> | <a href="?page=fight&action=4&step=1&id=<? echo htmlentities($_GET['id']); ?>&defense=3">Jambes</a> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
  </div>
     </fieldset></td></tr></table></p><br />
<p>&nbsp;</p>
<p>
<br />


  <?
  
mysql_query("UPDATE table_fight SET supp1=1 WHERE id='".htmlentities($_GET['id'])."'");
}
else
{
echo 'Ce défi a déjà été effectué.'.$retour1;
}


}else
{
echo 'Il est impossible de se battre contre un prisonnier avec 5 niveau de plus ou de moins. Le défi a été supprimé.'.$retour1;
mysql_query("DELETE FROM table_fight WHERE id='".htmlentities($_GET['id'])."'"); 
}

}
else
{
echo 'Ce défi n\'existe pas.'.$retour1;
}
///////////////////////////////////////////////////

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
            <td><strong>Niveau</strong></td>
            <td><strong>Date</strong></td>
            <td><strong>Accepter</strong></td>
            <td><strong>Refuser*</strong></td>
          </tr>
		  <?
		  $my_name = htmlentities(strtolower($_SESSION['login']));
		  		 $g = 0;
				 $reponse2 = mysql_query("SELECT * FROM table_fight WHERE id_man='".htmlentities($_SESSION['id_user_secu'])."' AND 	supp1=0 ORDER BY supp5"); 
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
    <table width="100%" border="0">
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
				
				$reponse = mysql_query("SELECT * FROM table_fight WHERE id_moi='".htmlentities($_SESSION['id_user_secu'])."' AND supp1=0 ORDER BY supp5 DESC"); 
				while ($donnees = mysql_fetch_array($reponse) )
				{
				
				
				$secondesupp3 = $donnees['supp5'];


$jour3 = floor($secondesupp3/21600);

				if($jour3+84 < $jour)
				{
				mysql_query("DELETE FROM table_fight WHERE id='".$donnees['id']."'"); 
				mysql_query("UPDATE table_user SET carac_respect=carac_respect-5 WHERE id=".$id_secu_user."");
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
			  $reponse3 = mysql_query("SELECT * FROM table_fight WHERE (id_moi='".htmlentities($_SESSION['id_user_secu'])."' OR id_man='".htmlentities($_SESSION['id_user_secu'])."') AND 	supp1=3 ORDER BY id DESC LIMIT 0,5"); 
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
	<br />
	<br />
Attention : tout défi acceptés et non terminés (c'est à dire défense et attaque non effectués après acceptation) entraineront la perte de 0.200 XP de respect.<br />
<br />On ne peut défier qu'un prisonnier avec une différence de niveau de plus ou moins 5.
  <?
  
  
  		$secu_triche = mysql_query("SELECT * FROM table_fight WHERE defie='".htmlentities($_SESSION['login'])."'AND (supp1=1 OR supp1=2)");
				while ($donnes_secu_triche = mysql_fetch_array($secu_triche) )
		{	
		$id = $donnes_secu_triche['id'];
		mysql_query("DELETE FROM table_fight WHERE id='".$id."'"); 
		mysql_query("UPDATE table_user SET carac_respect=carac_respect-200 WHERE id='".htmlentities($_SESSION['id_user_secu'])."'");
		}
  
  
}

}
?>
  <br />
  
  <br />

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
