<? session_start();?>
<?
if( empty($_SESSION['login']) )
{
include("login1.php");
}
else
{

/////////////// AIDE EXTERNE A FAIRE

include("db.php");

$retour_compte = '<br /><br /><a href="?page=compte">Retour</a>';
$retour = '<br /><br /><a href="?page=evasion">Retour</a>';
$retour1 = '<br /><br /><a href="?page=poker">Retour</a>';

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
		$gang_ok = $donnees1['champsuppd'];
		$trou_cellule = $donnees1['champsuppe'];
		$trou_tuyau = $donnees1['champsuppg'];
		$mdp_secu = $donnees1['mdp'];
		$hygiene = $donnees1['hygiene'];
		$moral = $donnees1['moral'];
		$faim = $donnees1['faim'];
		$infirmiere = $donnees1['supp3'];
		$aide_externe = $donnees1['supp4'];
		}
		
if($statut == 'Prisonnier'  && $_SESSION['mdp'] == $mdp_secu)
{		
		
$reponse61 = mysql_query("SELECT * FROM table_gang WHERE nom='".$gang."'"); 
				while ($donnees61 = mysql_fetch_array($reponse61) )
{
$trou_salle = $donnees61['champsupp1'];
}
		
$visallen = 0;
$carte_pi = 0;
		
	$moi = htmlentities($_SESSION['login']);
		
$reponse6 = mysql_query("SELECT * FROM table_object WHERE pseudo='".htmlentities($_SESSION['login'])."'"); 
				while ($donnees6 = mysql_fetch_array($reponse6) )
{

if($donnees6['nom'] == 'Vis Allen Schweizer')
{
$visallen++;
}


if($donnees6['nom'] == 'Carte de travail')
{
$carte_pi++;
}


}		

$total_gang = 0;

$reponse7 = mysql_query("SELECT * FROM table_user WHERE gang='".$gang."'"); 
				while ($donnees7 = mysql_fetch_array($reponse7) )
{
if($donnees7['delit'] == 'Meurtrier du vice président')
{
$total_gang=$total_gang+1;
}
elseif($donnees7['delit'] == 'Mafieu')
{
$total_gang=$total_gang+10;
}
elseif($donnees7['delit'] == 'Tueur en serie')
{
$total_gang=$total_gang+100;
}
elseif($donnees7['delit'] == 'Pickpocket')
{
$total_gang=$total_gang+1000;
}
elseif($donnees7['delit'] == 'Trafiquant armes et drogues')
{
$total_gang=$total_gang+10000;
}
elseif($donnees7['delit'] == 'Braqueur de supermarché')
{
$total_gang=$total_gang+100000;
}
elseif($donnees7['delit'] == 'Voleur de millions de dollars')
{
$total_gang=$total_gang+1000000;
}
elseif($donnees7['delit'] == 'Tête pensante')
{
$total_gang=$total_gang+10000000;
}

}

		
	
		
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
<span class="titre">>>> MON GANG</span><br />

<td width="30%"><img src="images/evader.png"></td></table>
 <?
if($pa >= 0) 
{
?>
<?
if($_GET['action'] == 1) //Vis Allen Schweizer
{
if($pa >= 12)
{

if($visallen == 0)
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
	
	if($delit == "Tête pensante")
{
mysql_query("UPDATE table_user SET pa=pa-12 WHERE id=".$id_secu_user."");
//mysql_query("UPDATE table_user SET champsuppc=1 WHERE login='".$_SESSION['login']."'");	
echo 'Vous avez reperé grâce au plan de la prison la vis, et vous venez de la prendre.'.$retour;
$reponse = mysql_query("INSERT INTO table_object VALUES ('', '".$nom_objet."',  '".$force."',  '".$agilite."',  '".$intelligence."',  '".$respect."',  '".$prix."',  '".$danger."',  '".htmlentities($_SESSION['login'])."',  '".$volable."', '', '', '')");
}
	else
{
$imax = (10000 - $carac_intelligence)/1000;

if($imax <= 1)
{
$imax = 1;
}

$chance = rand(0,$imax);

if($chance == 1)
{
mysql_query("UPDATE table_user SET pa=pa-12 WHERE id=".$id_secu_user."");
//mysql_query("UPDATE table_user SET champsuppc=1 WHERE login='".$_SESSION['login']."'");	
echo 'Vous avez reperé la vis, et vous venez de la prendre.'.$retour;
$reponse = mysql_query("INSERT INTO table_object VALUES ('', '".$nom_objet."',  '".$force."',  '".$agilite."',  '".$intelligence."',  '".$respect."',  '".$prix."',  '".$danger."',  '".htmlentities($_SESSION['login'])."',  '".$volable."', '', '', '')");
}
else
{
mysql_query("UPDATE table_user SET pa=pa-12 WHERE id=".$id_secu_user."");
echo 'Vous n\'avez pas réussi a trouver la vis, revenez plus tard.'.$retour;
}
}
	}
	else
	{

echo 'Vous detenez déjà la Vis Allen Schweizer.'.$retour;
	}

	
	
}else{
echo 'Vous n\'avez pas assez de PA pour venir ici.'.$retour;
}	
	
}
elseif($_GET['action'] == 2) //Trou dans la cellule
{


if($pa >= 12)
{


if($visallen >= 1)
	{

	if($moral >= 45 && $faim >= 45)
{
	
$rand_max1 = $carac_intelligence/100;

$flic = rand(0,$rand_max1);

if($flic == 1)
{
$timetrou = $secondesupp + 151200;
echo 'Vous vous êtes fait choppé entrain de creuser le trou, vous allez au trou pendant 7 jours  et votre moral et abaissé a 10.<br />';
mysql_query("UPDATE table_user SET stat_trou=stat_trou+1 WHERE login='".$moi."'");
mysql_query("UPDATE table_user SET stat_infractions=stat_infractions+1 WHERE login='".$moi."'");
mysql_query("UPDATE table_user SET time_trou=".$timetrou." WHERE login='".$moi."'");

if($delit != 'Meurtrier du vice président')
{
mysql_query("UPDATE table_user SET fin_peine=fin_peine+7776000 WHERE login='".$moi."'");
echo 'La durée de la peine est prolongée de 1 an et votre moral et abaissé a 10.';
}

mysql_query("UPDATE table_user SET moral=10 WHERE login='".$moi."'");



echo '<br /><br /><a href="?page=compte&lieu=1">Retour</a>';

mysql_query("UPDATE table_user SET pa=pa-12 WHERE id=".$id_secu_user."");
}
else
{
if($trou_cellule <= 1000)
{
$trou_max_creuse = $carac_force/600;

$creuse = rand(1, $trou_max_creuse);

mysql_query("UPDATE table_user SET champsuppe=champsuppe+".$creuse." WHERE login='".$moi."'");

$new_trou_cellule = ($trou_cellule + $creuse)/10;

if($new_trou_cellule >= 100)
{
$new_trou_cellule = 100.0;
}

echo 'Le trou dans la cellule est à '.$new_trou_cellule.' % de sa perçée.<br /><br />';

$xp_force = rand(10, 20);
mysql_query("UPDATE table_user SET carac_force=carac_force+".$xp_force." WHERE id=".$id_secu_user."");
$echo_xp_force = $xp_force/1000;


if($_GET['outil'] == 1){
$perte_truc = rand(0,10);
$pertes = "$perte_truc de moral";
mysql_query("UPDATE table_user SET moral=moral-".$perte_truc." WHERE login='".$moi."'");
}elseif($_GET['outil'] == 2){
$perte_truc = rand(0,10);
$pertes = "$perte_truc d'hygiene";
mysql_query("UPDATE table_user SET hygiene=hygiene-".$perte_truc." WHERE login='".$moi."'");
}else{
$perte_truc = rand(0,10);
$pertes = "$perte_truc de faim";
mysql_query("UPDATE table_user SET faim=faim-".$perte_truc." WHERE login='".$moi."'");
}

echo 'Votre force augmente de '.$echo_xp_force.' XP et vous perdez '.$pertes.'. '.$retour;

mysql_query("UPDATE table_user SET pa=pa-12 WHERE id=".$id_secu_user."");




}
else
{
echo 'Le trou a déjà été creusé.'.$retour;
}
}	
	}else{
	echo 'Vous ne pouvez pas effectuer cette action car votre moral ou votre faim est trop faible.'.$retour; 
	}
	
	}
	else
	{
	echo 'Vous ne pouvez pas effectuer cette action car vous n\'avez pas la Vis Allen Schweizer'.$retour;
	}
	
	}else{
echo 'Vous n\'avez pas assez de PA pour venir ici.'.$retour;
}
	
}
elseif($_GET['action'] == 3) //Trou dans la salle de travail
{

if($pa >= 12)
{


if($gang_ok == 1)
	{
	
	if($carte_pi == 1)
	{
	
	if($hygiene >= 20 && $faim >= 70)
{
	
	$rand_max1 = $carac_intelligence/100;

$flic = rand(0,$rand_max1);

if($flic == 1)
{
$timetrou = $secondesupp + 151200;
echo 'Vous vous êtes fait choppé entrain de creuser le trou, vous allez au trou pendant 7 jours  et votre moral et abaissé a 10.<br />';
mysql_query("UPDATE table_user SET stat_trou=stat_trou+1 WHERE login='".$moi."'");
mysql_query("UPDATE table_user SET time_trou=".$timetrou." WHERE login='".$moi."'");
mysql_query("UPDATE table_user SET stat_infractions=stat_infractions+1 WHERE login='".$moi."'");

if($delit != 'Meurtrier du vice président')
{
mysql_query("UPDATE table_user SET fin_peine=fin_peine+7776000 WHERE login='".$moi."'");
echo 'La durée de la peine est prolongée de 1 an et votre moral est abaissé à 10.';

}
mysql_query("UPDATE table_user SET moral=10 WHERE login='".$moi."'");
echo '<br /><br /><a href="?page=compte&lieu=1">Retour</a>';

mysql_query("UPDATE table_user SET pa=pa-12 WHERE id=".$id_secu_user."");
}
else
{
if($trou_salle <= 1000)
{
$trou_max_creuse = $carac_force/900;

$creuse = rand(1, $trou_max_creuse);

mysql_query("UPDATE table_gang SET champsupp1=champsupp1+".$creuse." WHERE nom='".$gang."'");

$new_trou_salle = ($trou_salle + $creuse)/10;

if($new_trou_salle >= 100)
{
$new_trou_salle = 100.0;
}

echo 'Le trou dans la salle de travail est à '.$new_trou_salle.' % de sa perçée.<br /><br />';

$xp_force = rand(10, 20);
mysql_query("UPDATE table_user SET carac_force=carac_force+".$xp_force." WHERE id=".$id_secu_user."");
$echo_xp_force = $xp_force/1000;

if($_GET['outil'] == 1){
$perte_truc = rand(0,10);
$pertes = "$perte_truc de moral";
mysql_query("UPDATE table_user SET moral=moral-".$perte_truc." WHERE login='".$moi."'");
}elseif($_GET['outil'] == 2){
$perte_truc = rand(0,10);
$pertes = "$perte_truc d'hygiene";
mysql_query("UPDATE table_user SET hygiene=hygiene-".$perte_truc." WHERE login='".$moi."'");
}else{
$perte_truc = rand(0,10);
$pertes = "$perte_truc de faim";
mysql_query("UPDATE table_user SET faim=faim-".$perte_truc." WHERE login='".$moi."'");
}

echo 'Votre force augmente de '.$echo_xp_force.' XP et vous perdez '.$pertes.'.'.$retour;

mysql_query("UPDATE table_user SET pa=pa-12 WHERE id=".$id_secu_user."");


}
else
{
echo 'Le trou a déjà été creusé.'.$retour;
}
}	

}else{
echo 'Vous ne pouvez pas effectuer cette action car votre hygiene ou votre faim est trop faible.'.$retour; 
}
	
	}
	else
	{
	echo 'Vous ne pouvez pas effectuer cette action car vous n\'avez pas la Carte de travail.'.$retour;
	}
	}
	
	else
	{
	echo 'Vous ne pouvez pas effectuer cette action car votre gang n\'a pas été validé.'.$retour;
	}

	
	}else{
echo 'Vous n\'avez pas assez de PA pour venir ici.'.$retour;
}
	

}
elseif($_GET['action'] == 4) //Trou de la tuyauterie à l'infirmerie*
{

if($pa >= 12)
{


if($pv <= 40)
{

if($moral >= 70 && $hygiene >= 20){

	$rand_max1 = $carac_intelligence/300;

$flic = rand(0,$rand_max1);

if($flic == 1)
{
$timetrou = $secondesupp + 151200;
echo 'Vous vous êtes fait choppé entrain de creuser le trou, vous allez au trou pendant 7 jours et votre moral et abaissé a 10.<br />';
mysql_query("UPDATE table_user SET stat_trou=stat_trou+1 WHERE login='".$moi."'");
mysql_query("UPDATE table_user SET time_trou=".$timetrou." WHERE login='".$moi."'");
mysql_query("UPDATE table_user SET stat_infractions=stat_infractions+1 WHERE login='".$moi."'");

if($delit != 'Meurtrier du vice président')
{
mysql_query("UPDATE table_user SET fin_peine=fin_peine+7776000 WHERE login='".$moi."'");
echo 'La durée de la peine est prolongée de 1 an et votre moral et abaissé a 10.';
}

mysql_query("UPDATE table_user SET moral=10 WHERE login='".$moi."'");

echo '<br /><br /><a href="?page=compte&lieu=1">Retour</a>';

mysql_query("UPDATE table_user SET pa=pa-12 WHERE id=".$id_secu_user."");
}
else
{
if($trou_tuyau <= 1000)
{
$rand_max2 = $carac_intelligence/500;

$creuse = rand(1, $rand_max2);

mysql_query("UPDATE table_user SET champsuppg=champsuppg+".$creuse." WHERE login='".$moi."'");

$new_trou_salle = ($trou_tuyau + $creuse)/10;

if($new_trou_salle >= 100)
{
$new_trou_salle = 100.0;
}


if($_GET['outil'] == 1){
$perte_truc = rand(0,10);
$pertes = "$perte_truc d'hygiene";
mysql_query("UPDATE table_user SET hygiene=hygiene-".$perte_truc." WHERE login='".$moi."'");
}else{
$perte_truc = rand(0,10);
$pertes = "$perte_truc de faim";
mysql_query("UPDATE table_user SET faim=faim-".$perte_truc." WHERE login='".$moi."'");
}

echo 'Le trou dans l\'infirmerie est à '.$new_trou_salle.' % de sa perçée.<br /><br />';
$xp_intell = rand(10, 20);
mysql_query("UPDATE table_user SET carac_intelligence=carac_intelligence+".$xp_intell." WHERE id=".$id_secu_user."");
$echo_xp_intell = $xp_intell/1000;

echo 'Votre intelligence augmente de '.$echo_xp_intell.' XP mais vous perdez '.$pertes.'.'.$retour;


mysql_query("UPDATE table_user SET pa=pa-12 WHERE id=".$id_secu_user."");

mysql_query("UPDATE table_user SET pv=100 WHERE id=".$id_secu_user."");
}
else
{
echo 'Le trou a déjà été creusé.'.$retour;
}
}

}else{
echo 'Votre moral ou votre hygiene est trop faible pour effectuer cette action'.$retour;
}

}
else
{
echo 'Il faut avoir moins de 40 Points de vie pour accomplir cette action. '.$retour;
}

}else{
echo 'Vous n\'avez pas assez de PA pour venir ici.'.$retour;
}


}
elseif($_GET['action'] == 5) //S'évader par l'infirmerie*
{

if($pa >= 12)
{


if($trou_cellule >= 1000 && $trou_salle >= 1000 && $trou_tuyau >= 1000 && $gang_ok = 1 && $pv <= 40 && $heures >= 0 && $heures <= 4 && $infirmiere >= 1000 && $aide_externe >= 1000)
{

if($moral >= 90 && $hygiene >= 90 && $faim >= 90)
{



$reponse62 = mysql_query("SELECT * FROM table_gang WHERE nom='".$gang."'"); 
				while ($donnees62 = mysql_fetch_array($reponse62) )
{
$chef = $donnees62['chef'];
$gang1 = $donnees62['nom'];
}

echo 'Vous avez réussi à vous évader.';

if($chef == $moi)
{

		$reponse21 = mysql_query("SELECT * FROM table_user WHERE gang='".$gang1."'"); 
				while ($donnees21 = mysql_fetch_array($reponse21) )
		{
		$new_chef = $donnees21['login'];
		$email_this = $donnees21['email'];
		}
		
			
		mysql_query("UPDATE table_gang SET chef='".$new_chef."' WHERE nom='".$gang1."'");
		
		echo '<br />Le prisonnier '.$new_chef.' à été nommé chef du gang.';
	
	$to = $email_this;
	$from = 'no-reply@breakingout.com';
	$subject = 'Vous avez été nommé chef du gang !';
	$Message = "Le prisonnier ".$moi." s'est evadé, vous devenez donc chef du gang.
		
	à Bientôt sur http://www.breakingout.fr";
	$headers = $from;

	mail($to, $subject, $Message);

} 

mysql_query("UPDATE table_user SET gang='0' WHERE id=".$id_secu_user."");
mysql_query("UPDATE table_user SET statut='Evadé' WHERE id=".$id_secu_user."");
mysql_query("UPDATE table_user SET time=$secondesupp WHERE id=".$id_secu_user."");
mysql_query("UPDATE table_user SET evasion_etape=evasion_etape+1 WHERE id=".$id_secu_user."");

echo '<br /><br /><a href="?page=compte">Continuer</a>.';


}else{
echo 'Votre moral, votre faim ou votre hygiene est trop faible pour pouvoir vous évader.'.$retour;
}


}
else
{
echo 'Vous ne pouvez pas vous évader tout de suite : <br />';
echo 'Il faut que tout les chemins soient ouverts (trou de la cellule, de la salle de travail, du tuyau de l\'infirmerie), que vous ayez une relation a 100% avec l\'infirmière, que l\'aide exterieure soit à 100%, que vous ayez moins de 40 Points de Vie pour acceder a l\'infirmerie et enfin qu\'il soit entre 0h00 et 4h59.';
}

}else{
echo 'Vous n\'avez pas assez de PA pour venir ici.'.$retour;
}




}
elseif($_GET['action'] == 6) //Verifier le gang
{
	if($total_gang == 11111111)
	{
	echo 'Votre gang a été validé.'.$retour;
	mysql_query("UPDATE table_user SET champsuppd=1 WHERE id=".$id_secu_user."");
	}
	else
	{
	echo 'Vous ne pouvez pas valider votre gang : Il faut être dans un gang constitué de 8 membres : Meurtrier du vice président, Mafieu, Tueur en serie, Pickpocket, Trafiquant armes et drogues, Braqueur de supermarché, Voleur de millions de dollars, Tête pensante.'.$retour;
	}

	

}
elseif($_GET['action'] == 7){

if($_GET['parler'] >= 1 && $_GET['parler'] <= 4){

$id = $_GET['parler'];
$nom_x = "question_$id";

		$reponse21 = mysql_query("SELECT * FROM table_infirmiere WHERE id_joueur='".$id_secu_user."'"); 
				while ($donnees21 = mysql_fetch_array($reponse21) )
		{
		$id_choisi = $donnees21["$nom_x"];
		}

		
$reponse22 = mysql_query("SELECT * FROM table_texte_infirmiere WHERE id='".$id_choisi."'"); 
				while ($donnees22 = mysql_fetch_array($reponse22) )
{
$question = $donnees22['question'];
$reponse1 = $donnees22['reponse1'];
$palier = $donnees22['palier'];
$reponse2 = $donnees22['reponse2'];
$points = $donnees22['points'];
}	

echo '<span style="color: #FF0000"><b>Vous :</b><br />'.$question.'</span><br /><br />';

$moral_supp = rand(0,10);


if($infirmiere >= $palier){
echo '<span style="color: #3300FF"><b>Elle :</b><br />'.$reponse2.'</span>';
echo '<br /><br />Vous prenez '.($points/10).' en relation et votre moral augmente de '.$moral_supp.'.'.$retour;
mysql_query("UPDATE table_user SET supp3=supp3+".$points." WHERE id=".$id_secu_user."");
mysql_query("UPDATE table_user SET moral=moral+".$moral_supp." WHERE id=".$id_secu_user."");
}else{
echo '<span style="color: #3300FF"><b>Elle :</b><br />'.$reponse1.'</span>';
echo '<br /><br />Vous prenez -'.($points/10).' en relation et votre moral baisse de '.$moral_supp.'.'.$retour;
mysql_query("UPDATE table_user SET supp3=supp3-".$points." WHERE id=".$id_secu_user."");
mysql_query("UPDATE table_user SET moral=moral-".$moral_supp." WHERE id=".$id_secu_user."");
}

mysql_query("DELETE FROM table_infirmiere WHERE id_joueur='".$id_secu_user."'");
mysql_query("UPDATE table_user SET pa=pa-6 WHERE id=".$id_secu_user."");
}

else{
if($pa >= 6){


$i=0;

$retour_this = mysql_query("SELECT COUNT(*) AS id FROM table_texte_infirmiere");
$donnees_this = mysql_fetch_array($retour_this);
$total = $donnees_this['id'];

		$reponse21 = mysql_query("SELECT * FROM table_infirmiere WHERE id_joueur='".$id_secu_user."'"); 
				while ($donnees21 = mysql_fetch_array($reponse21) )
		{
		$question_1 = $donnees21['question_1'];
		$question_2 = $donnees21['question_2'];
		$question_3 = $donnees21['question_3'];
		$question_4 = $donnees21['question_4'];
		$i++;
		}

		if($i == 0){
		$question_1 = rand(1,$total);
		$question_2 = rand(1,$total);
		$question_3 = rand(1,$total);
		$question_4 = rand(1,$total);		
		mysql_query("INSERT INTO table_infirmiere VALUES ('', '".$id_secu_user."',  '".$question_1."',  '".$question_2."',  '".$question_3."',  '".$question_4."', '', '')");
		}

		
echo 'Choississez une phrase à lui dire [d\'autres phrases seront rajoutés le plus vite possible] :<br /><br />';		
$reponse21 = mysql_query("SELECT * FROM table_texte_infirmiere WHERE id='".$question_1."'"); 
				while ($donnees21 = mysql_fetch_array($reponse21) )
{
echo '1. <a href="?page=evasion&action=7&parler=1">'.$donnees21['question'].'</a><br /><br />';
}	
$reponse21 = mysql_query("SELECT * FROM table_texte_infirmiere WHERE id='".$question_2."'"); 
				while ($donnees21 = mysql_fetch_array($reponse21) )
{
echo '2. <a href="?page=evasion&action=7&parler=2">'.$donnees21['question'].'</a><br /><br />';
}		
$reponse21 = mysql_query("SELECT * FROM table_texte_infirmiere WHERE id='".$question_3."'"); 
				while ($donnees21 = mysql_fetch_array($reponse21) )
{
echo '3. <a href="?page=evasion&action=7&parler=3">'.$donnees21['question'].'</a><br /><br />';
}		
$reponse21 = mysql_query("SELECT * FROM table_texte_infirmiere WHERE id='".$question_4."'"); 
				while ($donnees21 = mysql_fetch_array($reponse21) )
{
echo '4. <a href="?page=evasion&action=7&parler=4">'.$donnees21['question'].'</a><br /><br />';
}			

}
}


}
else
{
echo '<br />Mon gang : ';
			  if ($gang == '0')
			  {
			  echo 'Aucun';
			  }else{
			  echo $gang;
			  $reponseXD = mysql_query("SELECT * FROM table_gang WHERE nom='".$gang."'");	
			  $donneesXD = mysql_fetch_array($reponseXD);
			  echo '<iframe src="view_gang.php?id='.$donneesXD['id'].'" height="500" width="95%" frameborder="0"></iframe>';
			  
			  }
?>
<br />
<br />
<table width="100%" border="0">
  <tr>
    <td width="51%"><strong>Vis Allen Schweizer</strong></td>
    <td width="15%"><? if($visallen <= 0)
	{
	echo 'EN ATTENTE';
	}
	else
	{
	echo 'OK';
	}
	?> </td>
    <td width="34%"><a href="?page=evasion&action=1">Chercher  (12 PA)</a></td>
  </tr>
  <tr>
    <td><strong>Gang avec 8 membres de type diff&eacute;rent** </strong></td>
    <td><?	if($gang_ok == 1)
	{
	echo 'OK';
	}
	else
	{
	echo 'EN ATTENTE';
	}
	?></td>
    <td><a href="?page=evasion&action=6">Valider son gang</a></td>
  </tr>
</table>
<p>

<table width="100%" border="0">
  <tr>
    <td width="51%"><strong>Trou dans la cellule </strong></td>
    <td width="15%"><?
if($trou_cellule <= 1000)
{
	echo $trou_cellule/10; 
}
else
{
echo '100,0';
}
?> %</td>
    <td width="34%">Creuser  (12 PA) choix de l'outil : <br />
    <a href="?page=evasion&amp;action=2&amp;outil=1">Pioche</a> &ndash; <a href="?page=evasion&amp;action=2&amp;outil=2">Marteau</a> &ndash; <a href="?page=evasion&amp;action=2&amp;outil=3">B&ecirc;che</a></td>
  </tr>
  <tr>
    <td><strong>Trou dans la salle de travail*** </strong></td>
    <td><?
if($trou_salle <= 1000)
{
	echo $trou_salle/10; 
}
else
{
echo '100,0';
}
?> %</td>
    <td>Creuser (12 PA) choix de l'outil : <br />
    <a href="?page=evasion&amp;action=3&amp;outil=1">Pioche</a> &ndash; <a href="?page=evasion&amp;action=3&amp;outil=2">Marteau</a> &ndash; <a href="?page=evasion&amp;action=3&amp;outil=3">B&ecirc;che</a></td>
  </tr>
  <tr>
    <td><strong>Trou de la tuyauterie &agrave; l'infirmerie* </strong></td>
    <td><?
if($trou_tuyau <= 1000)
{
	echo $trou_tuyau/10; 
}
else
{
echo '100,0';
}
?> %</td>
    <td>Creuser (12 PA) choix de l'outil :<br />
    <a href="?page=evasion&amp;action=4&outil=1">Acide phosphorique</a> - <a href="?page=evasion&amp;action=4&outil=2">Acide Sulfurique</a></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="100%" border="0">
  <tr>
    <td width="51%"><strong>Relation avec l'infirmi&egrave;re </strong></td>
    <td width="15%"><?
if($infirmiere <= 1000)
{
	echo $infirmiere/10; 
}
else
{
echo '100,0';
}
?>
      %</td>
    <td width="34%"><a href="?page=evasion&amp;action=7">Parler avec l'infirmi&egrave;re<br />
    (6 PA/parole) </a> </td>
  </tr>
  
  
    <tr>
    <td width="51%"><strong>Aide exterieure </strong></td>
    <td width="15%"><?
if($aide_externe <= 1000)
{
	echo $aide_externe/10; 
}
else
{
echo '100,0';
}
?>
      %</td>
    <td width="34%">Partager le lien suivant :
	<br />http://breakingout.fr/?page=help_player&id=<?

echo base64_encode($id_secu_user);

?></td>
  </tr>
  
  
  
  
  
</table>
<p>&nbsp;</p>
<p><a href="?page=evasion&action=5">S'&eacute;vader par l'infirmerie (12 PA)*</a>
<p><br />*Il faut avoir moins de 40 Points de vie pour accomplir cette action. <br />
<br />**Il faut être dans un gang constitué de 8 membres : Meurtrier du vice président, Mafieu, Tueur en serie, Pickpocket, Trafiquant armes et drogues, Braqueur de supermarché, Voleur de millions de dollars, Tête pensante.   <br />
<br />***Ce trou est commun à tout les prisonniers du gang.
 

 
  
  <?
}
}else{
echo 'Vous n\'avez pas assez de PA pour venir ici.'.$retour_compte;
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
