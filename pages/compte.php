<? session_start();


?>
<?
if( empty($_SESSION['login']) )
{
include("login1.php");
}
else
{

   


include("db.php");




$retour_compte = '<br /><br /><a href="?page=compte">Retour</a>';

		$sql = "select * from table_user where login='".htmlentities($_SESSION['login'])."'";
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		$data = mysql_fetch_assoc($req);

		
		$reponse1 = mysql_query("SELECT * FROM table_user WHERE login='".htmlentities($_SESSION['login'])."'"); 
				while ($donnees1 = mysql_fetch_array($reponse1) )
		{
		$id = $donnees1['id'];
		$id_secu_user = $donnees1['id'];
		$id_user_secu = $donnees1['id'];
		$email = $donnees1['email'];
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
		$age_depart = $donnees1['age_depart'];
		$gang_ok = $donnees1['champsuppd'];
		$hygiene = $donnees1['hygiene'];
		$moral = $donnees1['moral'];
		$faim = $donnees1['faim'];
		$rencontre1 = $donnees1['rencontre1'];
		$rencontre2 = $donnees1['rencontre2'];
		$supp1 = $donnees1['supp1'];
		$champsuppc = $donnees1['champsuppc'];
		$mdp_secu = $donnees1['mdp'];
		}
		
	
$ip = $_SERVER["REMOTE_ADDR"];
mysql_query("DELETE FROM connectes_ip WHERE mec1='".htmlentities($_SESSION['login'])."' AND lieu=4");
mysql_query("INSERT INTO connectes_ip VALUES ('', '".htmlentities($_SESSION['login'])."', '4', '4', '".$ip."', '".time()."', '0', '0', '0', '0')");
	
$niveau = ($carac_force+$carac_agilite+$carac_intelligence+$carac_respect-9000)/1000;		

		
if($statut == 'Prisonnier' && $_SESSION['mdp'] == $mdp_secu)
{


if($pv <= 0)
{
if($_GET['anim'] == 1)
{
echo 'INFIRMERIE<br /><br />';
mysql_query("UPDATE table_user SET carac_force=carac_force-200 WHERE id=".$id_secu_user."");
mysql_query("UPDATE table_user SET carac_agilite=carac_agilite-200 WHERE id=".$id_secu_user."");
mysql_query("UPDATE table_user SET carac_intelligence=carac_intelligence-200 WHERE id=".$id_secu_user."");
mysql_query("UPDATE table_user SET carac_respect=carac_respect-200 WHERE id=".$id_secu_user."");

mysql_query("UPDATE table_user SET pv=100 WHERE id=".$id_secu_user."");

mysql_query("UPDATE table_user SET champsuppc=champsuppc+1 WHERE id=".$id_secu_user."");


echo 'Vous avez été réanimé, vous perdez 0,200 XP de force, d\'agilité, d\'intelligence et de respect.<br /><br /><a href="?page=compte">Continuer</a>';
echo '<br /><br />';

if($carac_force <= 1000){
mysql_query("UPDATE table_user SET carac_force=1000 WHERE id=".$id_secu_user."");
}
if($carac_agilite <= 1000){
mysql_query("UPDATE table_user SET carac_agilite=1000 WHERE id=".$id_secu_user."");
}
if($carac_intelligence <= 1000){
mysql_query("UPDATE table_user SET carac_intelligence=1000 WHERE id=".$id_secu_user."");
}
if($carac_respect <= 1000){
mysql_query("UPDATE table_user SET carac_respect=1000 WHERE id=".$id_secu_user."");
}

}
else
{
echo 'INFIRMERIE<br /><br />';
echo 'Votre santé est de 0/100, vous êtes mort.<br />Vous pouvez cependant vous faire réanimer mais vous perdrez 0,800 XP.<br /><br /><a href="?page=compte&anim=1">Réanimer</a>';
echo '<br /><br />';
}

}
else
{


?>
<style type="text/css">
<!--
.style1 {color: #000099}
.style2 {color: #666666}
.style8 {font-size: 10px; font-weight: bold; }
.style10 {color: #666666; font-size: 10px; }
.style11 {color: #000000}
-->
</style>

<?
if($time_trou > $secondesupp)
{
?>
<span class="titre">>>> TROU</span>
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

$_SESSION['trou'] = "ok";

include("pages/trou.php");
			  ?>

<?
}
else
{

include("pages/liens_imp.php");
?>

<span class="titre">>>> CELLULE</span>
<br />
<p>Bienvenue dans votre cellule <? $nom_rpg  = strtoupper($nom_rpg);
echo $nom_rpg.' '.$prenom_rpg; ?>, (<? echo htmlentities($_SESSION['login']); ?>
) prisonnier N°<? echo $id; ?>
<br /><br />
<?
if($_GET['lieu'] == 1){


		

if($_GET['don'] != NULL)
{



if($pa >= 1)
{

if($niveau < 4)
{
echo 'Pour donner un objet, il faut avoir un niveau supérieur ou égal a 4.';
}
else
{


			$reponse3 = mysql_query("SELECT * FROM table_object WHERE id='".htmlentities($_GET['don'])."'"); 
				while ($donnees3 = mysql_fetch_array($reponse3) )
		{
		$nom1 = strtolower($donnees3['nom']);
		$pseudo1 = strtolower($donnees3['pseudo']);
		$danger = $donnees3['danger'];
		}

		$loginmin = strtolower($_SESSION['login']);
		
		if($pseudo1 == $loginmin)
		{

		if($nom1 != 'Plan de la prison')
		{
		
		if($_POST['pseudo_guy'] != NULL)
		{
$i = 0;		
		
$reponse4 = mysql_query("SELECT * FROM table_user WHERE login='".htmlentities($_POST['pseudo_guy'])."'"); 
				while ($donnees4 = mysql_fetch_array($reponse4) )
		{
		$i++;
		$pseudo_man = $donnees4['login'];
		$carac_intelligence1 = $donnees4['carac_intelligence'];
		$carac_respect1 = $donnees4['carac_respect'];
		$email1 = $donnees4['email'];
		}
		
if($i != 0)
{

mysql_query("UPDATE table_user SET pa=pa-1 WHERE id=".$id_secu_user."");

if($danger >= 1)
{

$intellisupp = 0;
$intellisupp1 = 0;
$respectsupp = 0;
$respectsupp1 = 0;

$reponse6 = mysql_query("SELECT * FROM table_object WHERE pseudo='".htmlentities($_SESSION['login'])."'"); 
				while ($donnees6 = mysql_fetch_array($reponse6) )
		{
$intellisupp=$intellisupp+$donnees6['intelligence'];
$respectsupp=$respectsupp+$donnees6['respect'];

		}

$reponse5 = mysql_query("SELECT * FROM table_object WHERE pseudo='".htmlentities($_POST['pseudo_guy'])."'"); 
				while ($donnees5 = mysql_fetch_array($reponse5) )
		{
$intellisupp1=$intellisupp1+$donnees5['intelligence'];
$respectsupp1=$respectsupp1+$donnees5['respect'];

		}
		
$max = round(($carac_intelligence + $carac_intelligence1 + $intellisupp + $intellisupp1)/100);

$respect_moi = $carac_respect + $respectsupp;
$respect_mec = $carac_respect1 + $respectsupp1;


$flic = rand(0, $max);



if($flic == 1)
{

if($respect_moi >= $respect_mec)
{

echo 'Votre objet a été intercepté par la police.<br />';

$mano = htmlentities($_POST['pseudo_guy']);
$moi = htmlentities($_SESSION['login']);

$timetrou = $secondesupp + 21600;
echo 'Votre camarade '.$mano.' est désigné comme coupable, il passera 1 jour au trou !<br /><br /><a href="?page=compte&lieu=1">Retour</a>';
mysql_query("UPDATE table_user SET stat_trou=stat_trou+1 WHERE login='".$mano."'");
mysql_query("UPDATE table_user SET time_trou=".$timetrou." WHERE login='".$mano."'");

	$to = $email1;
	$from = 'no-reply@breakingout.com';
	$subject = 'Vous avez été envoyé au trou';
	$Message = "Le prisonnier ".htmlentities($_SESSION['login'])." vous a envoyé un objet qui a été intercepté par la police.
	Vous avez été désigné coupable vous irez donc 1 journée au trou !
	
	à Bientôt sur http://www.breakingout.fr";
	$headers = $from;

	mail($to, $subject, $Message);

}else{

$timetrou = $secondesupp + 21600;
echo 'Vous êtes désigné comme coupable, vous passez 1 jour au trou !<br /><br /><a href="?page=compte&lieu=1">Retour</a>';
mysql_query("UPDATE table_user SET stat_trou=stat_trou+1 WHERE login='".$moi."'");
mysql_query("UPDATE table_user SET time_trou=".$timetrou." WHERE login='".$moi."'");

}

mysql_query("UPDATE table_user SET stat_infractions=stat_infractions+1 WHERE login='".$mano."'");
mysql_query("UPDATE table_user SET stat_infractions=stat_infractions+1 WHERE login='".$moi."'");
mysql_query("UPDATE table_object SET pseudo='police' WHERE id=".htmlentities($_GET['don'])."");




}
else
{
mysql_query("UPDATE table_object SET pseudo='".$pseudo_man."' WHERE id=".htmlentities($_GET['don'])."");	

echo 'Votre objet a bien été donné à '.$pseudo_man.'<br /><br /><a href="?page=compte&lieu=1">Retour</a><br /><br /><br /><br />';

$obj = htmlentities($_GET['don']);
$ip = $_SERVER["REMOTE_ADDR"];
mysql_query("INSERT INTO connectes_ip VALUES ('', '".htmlentities($_SESSION['login'])."', '0', '0', '".$ip."', '".time()."', '".htmlentities($_SESSION['login'])."', '".$pseudo_man."', '".$obj."', '0')");

}

}
else 
{

mysql_query("UPDATE table_object SET pseudo='".$pseudo_man."' WHERE id=".htmlentities($_GET['don'])."");	

echo 'Votre objet a bien été donné à '.$pseudo_man.'<br /><br /><a href="?page=compte&lieu=1">Retour</a><br /><br /><br /><br />';

$obj = htmlentities($_GET['don']);
$ip = $_SERVER["REMOTE_ADDR"];
mysql_query("INSERT INTO connectes_ip VALUES ('', '".htmlentities($_SESSION['login'])."', '0', '0', '".$ip."', '".time()."', '".htmlentities($_SESSION['login'])."', '".$pseudo_man."', '".$obj."', '0')");


	$to = $email1;
	$from = 'no-reply@breakingout.com';
	$subject = 'Vous avez reçu un objet';
	$Message = "Le prisonnier ".htmlentities($_SESSION['login'])." vous a envoyé un objet.
	
	à Bientôt sur http://www.breakingout.fr";
	$headers = $from;

	mail($to, $subject, $Message);


}




}
else
{
echo 'Ce joueur n\'existe pas.<br /><br /><a href="?page=compte&lieu=1">Retour</a><br /><br /><br /><br />';
}
	
		}
		else
		{
		echo 'Ce joueur n\'existe pas.<br /><br /><a href="?page=compte&lieu=1">Retour</a><br /><br /><br /><br />';
		}
		
		}
		else
		{
		echo 'Cet objet ne peut pas être ni vendu ni donné.<br /><br /><a href="?page=compte&lieu=1">Retour</a><br /><br /><br /><br />';
		}		
		
		}
		else
		{
		echo 'Cet objet n\'est pas en votre possession.<br /><br /><a href="?page=compte&lieu=1">Retour</a><br /><br /><br /><br />';

}
}
}

else
{
echo 'Vous n\'avez pas assez de PA pour effectuer cette action.<br /><br /><a href="?page=compte&lieu=1">Retour</a><br /><br /><br /><br />';
}

}
elseif($_GET['vendre'] != NULL)
{

$i = 0;

if($_GET['type'] == 'dope')
{


$reponsedope = mysql_query("SELECT * FROM table_stupefiant WHERE id='".htmlentities($_GET['vendre'])."'");
				while ($donneesdope = mysql_fetch_array($reponsedope) )
{

$i++;

if((strtolower($donneesdope['pseudo'])) == (strtolower(htmlentities($_SESSION['login']))))
{


$reponsedope2 = mysql_query("SELECT * FROM table_stupefiant WHERE nom='".$donneesdope['nom']."' AND pseudo='marche_noir'");
				while ($donneesdope2 = mysql_fetch_array($reponsedope2) )
				{
				$donneesdope2['prix'];
				
				//Modif prix
				mysql_query("DELETE FROM table_stupefiant WHERE id='".htmlentities($_GET['vendre'])."'");
				mysql_query("UPDATE table_user SET portemonnaie=portemonnaie+".$donneesdope2['prix']." WHERE id=".$id_secu_user."");
				
				$reduction = rand(2,6);
				
//mysql_query("UPDATE table_stupefiant SET prix=prix-$reduction WHERE id='".$reponsedope2['id']."'");
mysql_query("UPDATE table_stupefiant SET prix=prix-$reduction WHERE id='".$donneesdope2['id']."'");				
				echo 'La transaction a bien été éffectuée.<br /><br /><a href="?page=compte&lieu=1">Retour</a>';

				}

}
else
{
echo 'Ce stupéfiant ne vous appartient pas.<br /><br /><a href="?page=compte&lieu=1">Retour</a>';
}

}
if($i == NULL)
{
echo 'Ce stupéfiant ne vous appartient pas.<br /><br /><a href="?page=compte&lieu=1">Retour</a>';
}

}
else
{


if($pa >= 1)
{

if($niveau < 4)
{
echo 'Pour vendre un objet, il faut avoir un niveau supérieur ou égal a 4.';
}
else
{

			$reponse3 = mysql_query("SELECT * FROM table_object WHERE id='".htmlentities($_GET['vendre'])."'"); 
				while ($donnees3 = mysql_fetch_array($reponse3) )
		{
		$pseudo1 = strtolower($donnees3['pseudo']);
		$nom1 = strtolower($donnees3['nom']);
		$prix = strtolower($donnees3['prix']);
		}

$loginmin = htmlentities(strtolower($_SESSION['login']));
		
		if($pseudo1 == $loginmin)
		{
		
		if($nom1 != 'Plan de la prison' && $nom1 != 'Vis Allen Schweizer')
		{

mysql_query("UPDATE table_user SET portemonnaie=portemonnaie+".$prix." WHERE id=".$id_secu_user."");
mysql_query("UPDATE table_user SET pa=pa-1 WHERE id=".$id_secu_user."");
mysql_query("UPDATE table_object SET pseudo='marche_noir' WHERE id=".htmlentities($_GET['vendre'])."");			

echo 'Votre objet a été mis au marché noir, vous recevez '.$prix.' $B.<br /><br /><a href="?page=compte&lieu=1">Retour</a><br /><br /><br /><br />';

$obj = htmlentities($_GET['vendre']);
$ip = $_SERVER["REMOTE_ADDR"];
mysql_query("INSERT INTO connectes_ip VALUES ('', '".htmlentities($_SESSION['login'])."', '0', '0', '".$ip."', '".time()."', '".htmlentities($_SESSION['login'])."', 'marche_noir', '".$obj."', '0')");
	
		}
		else
		{
		echo 'Cet objet ne peut pas être ni vendu.<br /><br /><a href="?page=compte&lieu=1">Retour</a><br /><br /><br /><br />';
		}
		
		}
		else
		{
		echo 'Cet objet n\'est pas en votre possession.<br /><br /><a href="?page=compte&lieu=1">Retour</a><br /><br /><br /><br />';
		}

}
		
}
else
{
echo 'Vous n\'avez pas assez de PA pour effectuer cette action.<br /><br /><a href="?page=compte&lieu=1">Retour</a><br /><br /><br /><br />';
}

}

}
elseif($_GET['conso'] != NULL)
{
 

 
$reponsedope = mysql_query("SELECT * FROM table_stupefiant WHERE id='".htmlentities($_GET['conso'])."' AND pseudo='".htmlentities($_SESSION['login'])."'");
				while ($donneesdope = mysql_fetch_array($reponsedope) )
{

$i++;


///////// IF MORAL+MORAL plus de 100 moral = 100
if($moral+$donneesdope['moral'] >= 100)
{
mysql_query("UPDATE table_user SET moral=100 WHERE id=".$id_secu_user."");
}
else
{
mysql_query("UPDATE table_user SET moral=moral+".$donneesdope['moral']." WHERE id=".$id_secu_user."");
}		

	
				echo 'La consommation s\' est bien déroulée votre moral a augmenté.<br /><br /><a href="?page=compte&lieu=1">Retour</a>';

mysql_query("DELETE FROM table_stupefiant WHERE id='".htmlentities($_GET['conso'])."'");
}


if($i == NULL)
{
echo 'Ce stupéfiant ne vous appartient pas.<br /><br /><a href="?page=compte&lieu=1">Retour</a>';
}
 
 
}
else
{



?>
<table width="100%" border="0">
  <tr>
    <td><fieldset style="border-color:#7e5125">
      <legend><strong>Mes objets : </strong></legend>
      <div><br />

        <table width="100%" border="0">
          <tr>
            <td width="29%" valign="bottom"><table width="100%" border="0">
              <tr>
                <td width="70%"><strong>Nom</strong></td>
                <td width="30%"><strong>Prix</strong></td>
              </tr>
            </table></td>
            <td width="39%" valign="bottom"><strong>Caract&eacute;ristiques ajout&eacute;s <br />
            </strong>
              <table width="100%" border="0">
                <tr>
                  <td width="25%"><span class="style10">Force</span></td>
                  <td width="25%"><span class="style10">Agilit&eacute;</span></td>
                  <td width="25%"><span class="style10">Intelligence</span></td>
                  <td width="25%"><span class="style10">Respect</span></td>
                </tr>
            </table></td>
			
            <td width="16%" valign="bottom"><strong>Don**</strong></td>
            <td width="16%" valign="bottom"><strong>Vente*</strong></td>
          </tr>
        </table> 
		<table width="100%" border="0">      
		<?
			
$i = 0;		
		
			$reponse2 = mysql_query("SELECT * FROM table_object WHERE pseudo='".htmlentities($_SESSION['login'])."'"); 
				while ($donnees2 = mysql_fetch_array($reponse2) )
		{
		
		$i++;
		?>
        
          <tr>
            <td width="29%" valign="bottom"><table width="100%" border="0">
              <tr>
                <td width="70%"><? 

				
			
				
				echo $donnees2['nom']; ?></td>
                <td width="30%"><? echo $donnees2['prix']; ?> $B</td>
              </tr>
            </table></td>
            <td width="39%" valign="bottom"><table width="100%" border="0">
                <tr>
                  <td width="25%">+<? echo $donnees2['force']/1000; ?></td>
                  <td width="25%">+<? echo $donnees2['agilite']/1000; ?></td>
                  <td width="25%">+<? echo $donnees2['intelligence']/1000; ?></td>
                  <td width="25%">+<? echo $donnees2['respect']/1000; ?></td>
                </tr>
				
            </table></td>
            <td width="16%" valign="bottom">
             
			  <? if($donnees2['nom'] == 'Plan de la prison')
			  {
			  echo 'Impossible';
			  }
			  else
			  {
			  ?>
			  <form action="?page=compte&lieu=1&don=<? echo $donnees2['id']; ?>" method="post">
              <label>
			  <input name="pseudo_guy" type="text" size="10" />
			  </label>
			  </form>
			  <? } ?>
</td>
<td width="16%" valign="bottom">
						  <? if($donnees2['nom'] == 'Plan de la prison' || $donnees2['nom'] == 'Vis Allen Schweizer')
			  {
			  echo 'Impossible';
			  }
			  else
			  {
			  ?>
            <a href="?page=compte&lieu=1&vendre=<? echo $donnees2['id']; ?>">Vendre</a></td>
			 <? } ?>
          </tr>
		  <? 
		  }
		  ?>
        </table>
		<p>
		  <?
		if($i == 0)
		{
		echo 'Aucun objet';
		}
		?>
		  
		  <br />
		  
		  
		  <br />
		  *Vendre l'objet au march&eacute; noir.<br />
		  **Mettez le nom de la personne &agrave; qui vous voulez donner l'objet, et appuyez sur entr&eacute;e. </p>
		<p>Le don et la ventes d'objets coutent 1 PA. </p>
      </div>
    </fieldset></td>
  </tr>
</table><br />
<br />
<table width="100%" border="0">
  <tr>
    <td><fieldset style="border-color:#7e5125">
      <legend><strong>Stupéfiants  : </strong></legend>
      <div><br />

        <table width="100%" border="0">
          <tr>
              
                <td width="20%"><strong>Nom</strong></td>
                <td width="20%"><strong>Prix actuel</strong></td>
				<td width="25%"><strong>Moral ajouté</strong></td>
				<td width="10%"><strong>Consommer*</strong></td>
                <td width="25%"><strong>Vendre</strong></td>
          </tr>
			
			<?
				$reponsedope = mysql_query("SELECT * FROM table_stupefiant WHERE pseudo='".htmlentities($_SESSION['login'])."'");
				while ($donneesdope = mysql_fetch_array($reponsedope) )
		{
			?><tr>
	             <td width="20%"><? echo $donneesdope['nom']; ?></td>
                <td width="20%"><? 

$reponse6 = mysql_query("SELECT * FROM table_stupefiant WHERE nom='".$donneesdope['nom']."' && pseudo='marche_noir'"); 
		$donnees6 = mysql_fetch_array($reponse6);
		echo $donnees6['prix'];
		

				?> $B</td>
				<td width="25%">+<? echo $donneesdope['moral']; ?></td>
				<td width="10%"><a href="?page=compte&lieu=1&conso=<? echo $donneesdope['id']; ?>">Consommer</a></td>
                <td width="25%"><a href="?page=compte&lieu=1&vendre=<? echo $donneesdope['id']; ?>&type=dope">Vendre</a></td>	
				
			</tr>
			<?
			}
			?>
		</table>
			<br />
			*La consommation côute 1 PA.
		  <br />
		</p>
	  </div>
    </fieldset></td>
  </tr>
</table>
<?
}
}
elseif($_GET['lieu'] == 2)
{
if($pa >= 1)
{
mysql_query("UPDATE table_user SET pa=pa-1 WHERE id=".$id_secu_user."");

$xp_intelligence = rand(1, 5);
$echo_xp_intelligence = $xp_intelligence/1000;

mysql_query("UPDATE table_user SET carac_intelligence=carac_intelligence+".$xp_intelligence." WHERE id=".$id_secu_user."");
echo '<table width="100%">
<tr><td width="70%" valign="top">';
echo 'Vous lisez un extrait de la bible, vous gagnez '.$echo_xp_intelligence.' XP d\'intelligence.<a href="?page=compte&lieu=2"> Continuer la lecture (1 PA).</a>'.$retour_compte;
echo '</td>
<td width="30%"><img src="images/bible.png"></td></table>';


}
else
{
echo 'Vous n\'avez pas assez de PA pour effectuer cette action.<br /><br /><a href="?page=compte">Retour</a>';
}

}
elseif($_GET['lieu'] == 3)
{


if($pa >= 2)
{
mysql_query("UPDATE table_user SET pa=pa-2 WHERE id=".$id_secu_user."");

$xp_force = rand(1, 7);
$xp_agilite = rand(1, 7);

$echo_xp_force = $xp_force/1000;
$echo_xp_agilite = $xp_agilite/1000;

mysql_query("UPDATE table_user SET carac_force=carac_force+".$xp_force." WHERE id=".$id_secu_user."");
mysql_query("UPDATE table_user SET carac_agilite=carac_agilite+".$xp_agilite." WHERE id=".$id_secu_user."");


echo '<table width="100%"><tr><td width="70%" valign="top">';
echo 'Vous faites du sport dans votre cellule, vous gagnez '.$echo_xp_force.' XP de force, '.$echo_xp_agilite.' XP d\'agilité.<a href="?page=compte&lieu=3"> Continuer le sport (2 PA).</a>'.$retour_compte;

echo '</td><td width="30%"><img src="images/sport_cell.png"></td></table>';


}
else
{
echo 'Vous n\'avez pas assez de PA pour effectuer cette action.<br /><br /><a href="?page=compte">Retour</a>';
}

}elseif($_GET['lieu'] == 4){


 
if($pa >= 7) {

if($hygiene >= 90){
if($rencontre1 == 0){

$moral_gain = rand(10,60);

echo 'Votre demande a été acceptée, vous discutez avec des membres de votre famille, vous gagnez '.$moral_gain.' de moral. '.$retour_compte;

mysql_query("UPDATE table_user SET pa=pa-7 WHERE id=".$id_secu_user."");
mysql_query("UPDATE table_user SET moral=moral+".$moral_gain." WHERE id=".$id_secu_user."");
$prochaine = $secondesupp + 21600*14;
mysql_query("UPDATE table_user SET rencontre1=1 WHERE id=".$id_secu_user."");
mysql_query("UPDATE table_user SET rencontre2=".$prochaine." WHERE id=".$id_secu_user."");
mysql_query("UPDATE table_user SET supp1=supp1+1 WHERE id=".$id_secu_user."");




}
else{
echo 'Vous avez déjà fait une rencontre récemment, les rencontres sont limités a une toutes les 2 semaines'.$retour_compte;
}
}
else{
echo 'Vous êtes trop sale pour pouvoir faire une recontre avec votre famille.'.$retour_compte;
}

}else{
echo 'Vous n\'avez pas asssez de PA pour effectuer cette action'.$retour_compte;
}

}else {
?>
<table width="100%" border="0">
  <tr>
    <td><fieldset style="border-color:#7e5125">
      <legend><strong>Informations : </strong></legend>
      <div>

        <table width="100%" border="0">
          <tr>
            <td><span style="color:<?

			
			if($pa >= 11)//vert
			{
			echo '#21a617'; 
			}
			elseif($pa < 11 && $pa > 5) //orange
			{
			echo '#f8a014';
			}
			else //rouge
			{
			echo '#cc0000';
			}
			
			?>">Vous avez <b><? echo $pa; ?></b> Points d'Action aujourd'hui. </span><br /><br />
              Vous aurez vos prochains points d'action <?
			  $secondesupp1 = $prochaine_dla;
			  
			  $jour1 = floor($secondesupp1/21600);
$heuresensec1 = fmod($secondesupp1, 21600);
$heures1 = floor($heuresensec1/900);
$minutesensec1 = fmod($heuresensec1, 900);
$minutes1 =  floor($minutesensec1/15);

echo 'le jour '.$jour1.' à '.$heures1.'h'.$minutes1.'.';
			  ?><br />
              <br />
              <span class="style2">Age : </span><?
			  
			  $secondes_en_prison = $secondesupp1 - $date_inscription;
			  $jour_en_prison = floor($secondes_en_prison/21600);
			  $annees_en_prison = floor($jour_en_prison/365);
			  
			  $age = $age_depart + $annees_en_prison;
			  echo $age;
			  ?><br />
<br />

<table>
<tr>
<td><span class="style2">Sant&eacute; :</span></td>
<td><img src="images/barre1.png" width="<? echo 2*$pv; ?>" height="10">
<? echo $pv; ?></td>
</tr>

<tr>
<td><span class="style2">Hygiène :</span></td>
<td>			  <img src="images/barre2.png" width="<? echo 2*$hygiene; ?>" height="10">
			  <? echo $hygiene; ?></td>
</tr>

<tr>
<td><span class="style2">Moral :</span></td>
<td>			  <img src="images/barre3.png" width="<? echo 2*$moral; ?>" height="10">
			  <? echo $moral; ?></td>
</tr>

<tr>
<td><span class="style2">Faim :</span></td>
<td><img src="images/barre4.png" width="<? echo 2*$faim; ?>" height="10">
			  <? echo $faim; ?> </td>
</tr>       	                
			  
</table>
<p><br />			  
              <span class="style2">Portemonnaie : </span>
              <? echo $portemonnaie; ?> 
              $B <br />
              <span class="style2">Gang : </span>
              <?

if($_GET['gang'] == 'quitter')
{

if($gang_ok == 1)
{
echo 'Vous ne pouvez pas quitter le gang car vous l\'avez activé pour l\'evasion.<br />';
}
else
{

$di = 0;

		$reponse1 = mysql_query("SELECT * FROM table_gang WHERE chef='".htmlentities($_SESSION['login'])."'"); 
				while ($donnees1 = mysql_fetch_array($reponse1) )
		{
		$di++;
		}
		
				if($di == 0)
{
echo 'Vous venez de quitter votre gang.<br />';
mysql_query("UPDATE table_user SET gang='0' WHERE login='".htmlentities($_SESSION['login'])."'");
$gang == 'Aucun';
}
else
{
echo 'Vous ne pouvez pas quitter le gang car vous en êtes le chef.<br />';
}

}
}


			  if ($gang == '0')
			  {
			  echo 'Aucun';
			  }else{echo $gang;?> 
              <a href="?page=compte&gang=quitter">- Quitter le gang -</a>
              <? } ?>
		    </p><p><span class="style2">Arriv&eacute;e en prison : </span> Jour
            <? 	  
			  $secondes_en_prison = $date_inscription;
			  $jour_en_prison = floor($secondes_en_prison/21600);
			  $annees_en_prison = floor($jour_en_prison/365);
			  
			  $age =  $jour_en_prison;
			  echo $age;
			  ?>
            <br />
            <span class="style2">Date d'execution : </span>
            <? 	  
			  $secondes_en_prison = $date_peine_de_mort;
			  $jour_en_prison = floor($secondes_en_prison/21600);
			  $annees_en_prison = floor($jour_en_prison/365);
			  
			  $age =  $jour_en_prison;
			  if($age == '0')
			  {
			  echo 'Pas de condamnation a mort';
			  }
			  else
			  {
			  echo 'Jour'.$age;
			  }
			  ?>
            <br />
            <br /></p></td>
            <td><span class="style2">Avatar :</span><br />
            <img src='<?
			if($avatar == '0')
			{
			echo 'avatars/no_avatar.png';
			}
			else
			{
			echo $avatar;
			}
			?>' width="100" height="100" border="1" title="Avatar de <? echo htmlentities($_SESSION['login']); ?>" />
			<br /><a href="?page=profil">[Mon Profil]</a></td>
          </tr>
        </table>
        <span class="style2">Actions :<br />
        </span>
        <table width="100%" border="0">
          <tr>
            <td width="33%"><a href="?page=compte&amp;lieu=3">Faire du sport dans sa cellule</a> (2 PA) </td>
            <td width="33%"><a href="?page=compte&amp;lieu=2">Lire la bible</a> (1 PA) </td>
            <td width="34%"><a href="?page=compte&amp;lieu=4">Demander une recontre avec sa famille</a> (7 PA) </td>
          </tr>
        </table>
        <span class="style2"><br />
        </span>
        <table width="100%" border="0">
          <tr>
            <td width="46%"><span class="style2">Caract&eacute;ristiques : </span>
              <table width="100%" border="0">
                <tr>
                  <td width="52%"><span class="style8">Force</span></td>
                  <td width="48%"><? echo $carac_force/1000; ?></td>
                </tr>
                <tr>
                  <td><span class="style8">Agilit&eacute;</span></td>
                  <td><? echo $carac_agilite/1000; ?></td>
                </tr>
                <tr>
                  <td><span class="style8">Intelligence</span></td>
                  <td><? echo $carac_intelligence/1000; ?></td>
                </tr>
                <tr>
                  <td height="21"><span class="style8">Respect</span></td>
                  <td><? echo $carac_respect/1000; ?></td>
                </tr>
              </table></td>
			  <?
			  
			  $niveau = ($carac_force+$carac_agilite+$carac_intelligence+$carac_respect-9000)/1000;
			  
			  
			  if($_POST['argent'] != NULL && $_POST['pseudo_guy'] != 'Pseudo')
			  {
			  if($niveau >= 4)
			  {
			  
			  $i = 0;
			  $reponse4 = mysql_query("SELECT * FROM table_user WHERE login='".htmlentities($_POST['pseudo_guy'])."'"); 
				while ($donnees4 = mysql_fetch_array($reponse4) )
		{
		$i++;
		$pseudo_man = $donnees4['login'];
		$carac_intelligence1 = $donnees4['carac_intelligence'];
		$carac_respect1 = $donnees4['carac_respect'];
		$email1 = $donnees4['email'];
		}
			  
			  if($i == 0)
			  {
			  echo 'Ce joueur n\'existe pas.<br /><br />';
			  }
			  else
			  {
			  
			  if($_POST['argent'] >= $portemonnaie)
			  {
			  echo 'Vous n\'avez pas assez d\'argent.<br /><br />';
			  }
			  else
			  {
			  
			$moi = htmlentities($_SESSION['login']);
			$mano = htmlentities($_POST['pseudo_guy']);
			  
$intellisupp = 0;
$intellisupp1 = 0;
$respectsupp = 0;
$respectsupp1 = 0;

$reponse6 = mysql_query("SELECT * FROM table_object WHERE pseudo='".htmlentities($_SESSION['login'])."'"); 
				while ($donnees6 = mysql_fetch_array($reponse6) )
		{
$intellisupp=$intellisupp+$donnees6['intelligence'];
$respectsupp=$respectsupp+$donnees6['respect'];

		}

$reponse5 = mysql_query("SELECT * FROM table_object WHERE pseudo='".$mano."'"); 
				while ($donnees5 = mysql_fetch_array($reponse5) )
		{
$intellisupp1=$intellisupp1+$donnees5['intelligence'];
$respectsupp1=$respectsupp1+$donnees5['respect'];

		}
		
$max = round(($carac_intelligence + $carac_intelligence1 + $intellisupp + $intellisupp1)/100);

$respect_moi = $carac_respect + $respectsupp;
$respect_mec = $carac_respect1 + $respectsupp1;

$flic = rand(0, $max);

if($flic == 1)
{

if($respect_moi >= $respect_mec)
{

echo 'Votre argent a été intercepté par la police.<br />';

$mano = htmlentities($_POST['pseudo_guy']);
$moi = htmlentities($_SESSION['login']);


$timetrou = $secondesupp + 21600;
echo 'Votre camarade '.$mano.' est désigné comme coupable, il passera 1 jour au trou !<br /><br /><a href="?page=compte&lieu=1">Retour</a>';
mysql_query("UPDATE table_user SET stat_trou=stat_trou+1 WHERE login='".$mano."'");
mysql_query("UPDATE table_user SET time_trou=".$timetrou." WHERE login='".$mano."'");


	$to = $email1;
	$from = 'no-reply@breakingout.com';
	$subject = 'Vous avez été envoyé au trou';
	$Message = "Le prisonnier ".htmlentities($_SESSION['login'])." vous a envoyé de l'argent qui a été intercepté par la police.
	Vous avez été désigné coupable vous irez donc 1 journée au trou !
	
	à Bientôt sur http://www.breakingout.fr";
	$headers = $from;

	mail($to, $subject, $Message);


}else{

$timetrou = $secondesupp + 21600;
echo 'Vous êtes désigné comme coupable, vous passez 1 jour au trou !<br /><br /><a href="?page=compte&lieu=1">Retour</a>';
mysql_query("UPDATE table_user SET stat_trou=stat_trou+1 WHERE login='".$moi."'");
mysql_query("UPDATE table_user SET time_trou=".$timetrou." WHERE login='".$moi."'");

}

mysql_query("UPDATE table_user SET stat_infractions=stat_infractions+1 WHERE login='".$mano."'");
mysql_query("UPDATE table_user SET stat_infractions=stat_infractions+1 WHERE login='".$moi."'");
mysql_query("UPDATE table_user SET portemonnaie=portemonnaie-".htmlentities($_POST['argent'])." WHERE login='".$moi."'");




}
else
{
			  echo 'Votre argent a bien été reçu.';
			  mysql_query("UPDATE table_user SET portemonnaie=portemonnaie-".htmlentities($_POST['argent'])." WHERE login='".$moi."'");
			  mysql_query("UPDATE table_user SET portemonnaie=portemonnaie+".htmlentities($_POST['argent'])." WHERE login='".$mano."'");
			  
			  
$ip = $_SERVER["REMOTE_ADDR"];
mysql_query("INSERT INTO connectes_ip VALUES ('', '".htmlentities($_SESSION['login'])."', '0', '0', '".$ip."', '".time()."', '".htmlentities($_SESSION['login'])."', '".$mano."', '0', '".htmlentities($_POST['argent'])."')");

$SB = '$B';

	$to = $email1;
	$from = 'no-reply@breakingout.com';
	$subject = 'Vous avez reçu de l\'argent';
	$Message = "Le prisonnier ".htmlentities($_SESSION['login'])." vous a envoyé ".htmlentities($_POST['argent'])." ".$SB."
	
	à Bientôt sur http://www.breakingout.fr";
	$headers = $from;

	mail($to, $subject, $Message);
			  }
			  
			  }
			  }
			  
			  }else{
			  echo '<b>Vous devez avoir un niveau supérieur à 4 pour faire un don de $B</b><br /><br />';
			  }
			  }			  
			  ?>
            <td width="54%" align="left" valign="top"><span class="style2">Don de $akenBuy :<br />
                <span class="style11"><form id="form1" name="form1" method="post" action="?page=compte&don=1">
				<input type="text" name="argent" value="0" />$B à <input type="text" name="pseudo_guy" value="Pseudo" />
				<input type="submit" name="Submit" value="Envoyer" />
				</form></span></span> </td>
          </tr>
        </table>
        <p>Niveau g&eacute;n&eacute;ral : <?
echo $niveau; ?>
		<br />
          <br />
        </p>
      </div>
    </fieldset></td>
  </tr>
</table>
<br />
<? /*
<table width="450" border="0">
  <tr>
    <td>  <fieldset style="border-color:#7e5125">
    <legend><strong>Actions : </strong></legend>
    <div>
<table width="100%">
<tr>
<td width="25%"><img src="images/travail.png"></td>
<td width="25%"><a href="?page=taff">Travailler</a> <br />(4 PA*)</td>
<td width="25%"><img src="images/se_battre.png"></td>
<td width="25%"><a href="?page=fight&amp;action=1">Se battre</a><br /> (4 PA*)</td>
</tr>
<tr>
<td width="25%"><img src="images/evader.png"></td>
<td width="25%"><a href="?page=evasion">S'&eacute;vader</a> <br />(12 PA*)</td>
<td width="25%"><img src="images/poker.png"></td>
<td width="25%"><a href="?page=poker&amp;action=1">Jouer au poker</a><br /> (2 PA*)</td>
</tr>
<tr>
<td width="25%"><img src="images/marche_noir.png"></td>
<td width="25%"><a href="?page=marche">Aller au march&eacute; noir</a><br /> (0 PA)</td>
<td width="25%"><img src="images/cours.png"></td>
<td width="25%"><a href="?page=cours">Discuter dans la cour</a> <br />(0 PA) </td>
</tr>
<tr>
<td width="25%"><img src="images/sport_cell.png"></td>
<td width="25%"><a href="?page=compte&amp;lieu=3">Faire du sport dans la cellule</a><br /> (2 PA)</td>
<td width="25%"><img src="images/sport_cours.png"></td>
<td width="25%"><a href="?page=cours&amp;lieu=1">Faire du sport dans la cour</a> <br />(4 PA*)</td>
</tr>
<tr>
<td width="25%"><img src="images/bible.png"></td>
<td width="25%"><a href="?page=compte&amp;lieu=2">Lire un passage de la bible</a><br /> (1 PA) </td>
<td width="25%"><img src="images/infirmerie.png"></td>
<td width="25%"><a href="?page=doc">Aller &agrave; l'infirmerie**</a><br />(6 PA*)</td>
</tr>
</table>
  </div>
  </fieldset></td>
  </tr>
</table> */
?>

<table width="100%" border="0"> <tr> <td><fieldset style="border-color:#7e5125"> <legend><strong>Statistiques : </strong></legend>
<div> <span class="style2">Combats gagn&eacute;s : </span>
<? echo $stat_combats_gagne; ?>
/<? echo $stat_combats; ?>
<br /> 
<span class="style2">Parties de poker gagn&eacute;s : </span>
<? echo $stat_parties_poker_gagne; ?>
/<? echo $stat_parties_poker ?>
<br /> <span class="style2">Argent gagn&eacute; au poker : </span>
<? echo $stat_sous_poker_gagne; ?>
<br /> <span class="style2">Nombre de passages au trou : </span>
<? echo $stat_trou; ?>
<br /> <span class="style2">Nombre de rencontre avec sa famille : </span>
<? echo $supp1; ?>
<br /> <span class="style2">Nombre d'infractions : </span>
<? echo $stat_infractions; ?>
<br /> <span class="style2">Nombre de r&eacute;animation &agrave; l'infirmerie : </span>
<? echo $champsuppc; ?>
<br /> <span class="style2">Nombre d'&eacute;vasions r&eacute;ussie : </span>
<? echo $evasion_etape; ?>
<br /> <span class="style2">Nombre de filleuls : </span>
<? 
$retour1234 = mysql_query("SELECT COUNT(*) AS id FROM table_parrain WHERE parrain_id='".$id_secu_user."'");
$donnees1234 = mysql_fetch_array($retour1234);
$filieuls = $donnees1234['id'];

echo $filieuls;

 ?><br /><br />
 Lien de parrainage : http://breakingout.fr/?page=inscription&p=<? echo $id_secu_user; ?>
 <br />
<br /></div></fieldset></td></tr> </table>
<p>&nbsp;</p>
<p>*Les Points D'actions seront retir&eacute;s seulement une fois l'action faite. <br />
  **Seulement si la sant&eacute; est inf&eacute;rieure a 40. <br />
  <br />
  
  
  <?
  
  $_SESSION['secuvar'] = '';
  
  }
  }
  ?>
 <br /><br /> 
<?
/*


====Pense bête : 

-Finir texte infirmière !!!!!

-Bannière pub pour le site

-Rafraichissage PM
-Aprés évasion
*/
}



}
elseif($statut == 'Mort' && $_SESSION['mdp'] == $mdp_secu)
{
echo '<SCRIPT LANGUAGE="JavaScript">
document.location.href="?page=mort" /* vous pouvez aussi mettre http://www.monsite.com */
</SCRIPT>';
}
elseif($statut == 'Evadé' && $_SESSION['mdp'] == $mdp_secu)
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
