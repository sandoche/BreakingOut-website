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
$retour = '<br /><br /><a href="?page=poker&action=1">Retour</a>';
$retour1 = '<br /><br /><a href="?page=poker">Retour</a>';

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
		}
if($statut == 'Prisonnier')
{
		
if($time_trou > $secondesupp)
{
?>

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

<?
}
else
{

include("pages/liens_imp.php");
?>
<table width="100%">
<tr><td width="70%" valign="top">
<table border=0><tbody><tr><td width=8 style='background-color:#f3e8dd'></td><td width=273 style='background-color:#ececec'><b><font color=#845d29>J</font>EUX<font color=#845d29> D</font>'ARGENT</b></td></tr></tbody></table>

</td>
<td width="30%"><img src="images/poker.png"></td></table>
<?
if($_GET['action'] == 1)
{

if($pa >= 2)
{

?>
<br />
<table width="450" border="0">
  <tr>
    <td><fieldset style="border-color:#7e5125">

      <legend><strong>Jouer au poker   : </strong></legend>
      <div><form id="form1" name="form1" method="post" action="?page=poker&action=2">
        <table width="100%" border="0">
          <tr>
            <td>Surnom du prisonnier d&eacute;fi&eacute; </td>
            <td><label>
              <input type="text" name="name" />
            </label></td>
          </tr>
		            <tr>
            <td>Argent mis en jeu (entre 5 et 50 $B) </td>
            <td><label></label><label>
            <input name="sakenbuy" type="text" size="6" maxlength="2" />
            $B</label></td>
          </tr>

		            <tr>
            <td>&nbsp;</td>
            <td><label>
              <input type="submit" name="Submit" value="GO" />
            </label></td>
          </tr>
        </table>
      </form>
        <p>*Augmente les chances d'aller au trou. </p>
      </div>
    </fieldset></td></tr></table></p><br />
	<table width="450" border="0">
	
  <tr>
    <td><fieldset style="border-color:#7e5125">

      <legend><strong>Joueurs connectés : </strong></legend>
      <div>
	  <center><iframe src="connec_poker.php" height="300" width="420" frameborder="0"></iframe></center>
	</div>
    </fieldset></td></tr></table></p>
<p>
  <?
  }
  else
  {
  echo '<br /><br />Vous n\'avez pas assez de pa pour effectuer cette action.'.$retour_compte;
  }
}
elseif($_GET['action'] == 2)
{

if($pa >= 2)
{

if($_POST['name'] != NULL && $_POST['sakenbuy'] != NULL)
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
		$portemonnaie_2 = $donnees['portemonnaie'];
		}
		
if($i != 0)
{

if($statut == 'Prisonnier')
{

if($_POST['sakenbuy'] >= 5 && $_POST['sakenbuy'] <= 50)
{
if($portemonnaie >= $_POST['sakenbuy'])
{
if($portemonnaie_2 >= $_POST['sakenbuy'])
{

mysql_query("UPDATE table_user SET pa=pa-2 WHERE login='".$_SESSION['login']."'");
mysql_query("INSERT INTO table_poker VALUES ('', '".$my_name."', '".$name."', '".htmlentities($_POST['sakenbuy'])."','0' ,'".$secondesupp."', '')");
echo 'Votre défi a été lancé, il a été mis dans la liste d\'attente de votre adversaire et dans la votre.'.$retour1;

}
else
{
echo 'Votre adversaire n\'a pas assez de $B dans son portemonnaie.'.$retour; 
}
}
else
{
echo 'Vous n\'avez pas assez de $B dans votre portemonnaie.'.$retour; 
}
}
else
{
echo 'Veuillez miser entre 5 et 50 $B.'.$retour; 
}
}
else
{
echo 'Ce prisonnier n\'existe pas.'.$retour; 
}


}
else
{
echo 'Ce prisonnier n\'existe pas.'.$retour; 
}

}
else
{
echo 'Vous ne pouvez pas vous défier, sinon allez a l\'hopital psychiatrique.'.$retour;
}

}
else
{
echo '<br /><br />Vous avez mal rempli le formulaire.'.$retour;
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
mysql_query("UPDATE table_user SET pa=pa+1 WHERE login='".$_SESSION['login']."'");

echo 'Le défi a été annulé.<br /><br />';

mysql_query("UPDATE table_user SET carac_respect=carac_respect-5 WHERE login='".$_SESSION['login']."'");
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

mysql_query("UPDATE table_user SET carac_respect=carac_respect-5 WHERE login='".$_SESSION['login']."'");
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
  
  if($_GET['id'] != NULL)
  {
  
  $reponse = mysql_query("SELECT * FROM table_poker WHERE id='".htmlentities($_GET['id'])."'"); 
				while ($donnees = mysql_fetch_array($reponse) )
				{
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
	  
 
  $reponseman = mysql_query("SELECT * FROM table_user WHERE login='".$defieur."'"); 
					while ($donneesman = mysql_fetch_array($reponseman) )
				{			
$carac_intelligence_2 = $donneesman['carac_intelligence'];
				}

				
				$reponse6 = mysql_query("SELECT * FROM table_object WHERE pseudo='".$_SESSION['login']."'"); 
				while ($donnees6 = mysql_fetch_array($reponse6) )
{
$intellisupp=$intellisupp+$donnees6['intelligence'];
}

$reponse7 = mysql_query("SELECT * FROM table_object WHERE pseudo='".$defieur."'"); 
				while ($donnees6 = mysql_fetch_array($reponse7) )
{
$intellisupp_2=$intellisupp_2+$donnees7['intelligence'];
}


$intellitotal = $intellisupp+$carac_intelligence;

$intellitotal_2 = $intellisupp_2+$carac_intelligence_2;

   
   $jet1 = rand(1,$intellitotal);
   $jet2 = rand(1,$intellitotal_2);
   
   $xp_intelligence = rand(1,20);
   $echo_xp = $xp_intelligence/1000;
   
 $SB = '$B';  
   
if($jet1 >= $jet2)
{


$me = $_SESSION['login'];
$resultat = "$me a gagné $mise $SB contre $defieur. <br />Son intelligence s\'est amélioré de $echo_xp.";
mysql_query("UPDATE table_user SET stat_parties_poker=stat_parties_poker+1 WHERE login='".$defieur."'");
mysql_query("UPDATE table_user SET stat_parties_poker=stat_parties_poker+1 WHERE login='".$_SESSION['login']."'");
mysql_query("UPDATE table_user SET stat_parties_poker_gagne=stat_parties_poker_gagne+1 WHERE login='".$_SESSION['login']."'");
mysql_query("UPDATE table_user SET carac_intelligence=carac_intelligence+".$xp_intelligence." WHERE login='".$_SESSION['login']."'");
mysql_query("UPDATE table_user SET portemonnaie=portemonnaie-".$mise." WHERE login='".$defieur."'");
mysql_query("UPDATE table_user SET portemonnaie=portemonnaie+".$mise." WHERE login='".$_SESSION['login']."'");
mysql_query("UPDATE table_user SET stat_sous_poker_gagne=stat_sous_poker_gagne+".$mise." WHERE login='".$_SESSION['login']."'");
mysql_query("UPDATE table_user SET stat_sous_poker_gagne=stat_sous_poker_gagne-".$mise." WHERE login='".$defieur."'");

echo $resultat.''.$retour1;

mysql_query("UPDATE table_poker SET resultat='".$resultat."' WHERE id='".htmlentities($_GET['id'])."'"); 

}
elseif($jet2 > $jet1)
{

$me = $_SESSION['login'];
$resultat = "$defieur a gagné $mise $SB contre $me.<br />Son intelligence s\'est amélioré de $echo_xp.";
mysql_query("UPDATE table_user SET stat_parties_poker=stat_parties_poker+1 WHERE login='".$defieur."'");
mysql_query("UPDATE table_user SET stat_parties_poker=stat_parties_poker+1 WHERE login='".$_SESSION['login']."'");
mysql_query("UPDATE table_user SET stat_parties_poker_gagne=stat_parties_poker_gagne+1 WHERE login='".$defieur."'");
mysql_query("UPDATE table_user SET carac_intelligence=carac_intelligence+".$xp_intelligence." WHERE login='".$defieur."'");
mysql_query("UPDATE table_user SET portemonnaie=portemonnaie-".$mise." WHERE login='".$_SESSION['login']."'");
mysql_query("UPDATE table_user SET portemonnaie=portemonnaie+".$mise." WHERE login='".$defieur."'");
mysql_query("UPDATE table_user SET stat_sous_poker_gagne=stat_sous_poker_gagne+".$mise." WHERE login='".$defieur."'");
mysql_query("UPDATE table_user SET stat_sous_poker_gagne=stat_sous_poker_gagne-".$mise." WHERE login='".$_SESSION['login']."'");

echo $resultat.''.$retour1;

mysql_query("UPDATE table_poker SET resultat='".$resultat."' WHERE id='".htmlentities($_GET['id'])."'"); 

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
  
   }
   else
{
echo 'Ce défi n\'existe pas..'.$retour1;
}


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
    <table width="450" border="0">
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
				mysql_query("UPDATE table_user SET pa=pa+2 WHERE login='".$_SESSION['login']."'");
				mysql_query("UPDATE table_user SET carac_respect=carac_respect-5 WHERE login='".$_SESSION['login']."'");
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
			  $reponse3 = mysql_query("SELECT * FROM table_poker WHERE (defieur='".$_SESSION['login']."' OR defie='".$_SESSION['login']."') AND resultat!='0' ORDER BY id DESC LIMIT 0,5"); 
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
	<table width="450" border="0">
	
  <tr>
    <td><fieldset style="border-color:#7e5125">

      <legend><strong>Joueurs connectés :<a href="?page=poker&amp;action=1">[Jouer au poker (2 Pa)] </a></strong></legend>
      <div>
	  <center><iframe src="connec_poker.php" height="300" width="420" frameborder="0"></iframe></center>
	</div>
    </fieldset></td></tr></table></p>
	<br />*En annulant ou en refusant un défi votre caractéristiques de respect diminuera.
<?
}
}
?>
  <br /><br />

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
