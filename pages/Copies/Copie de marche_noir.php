<? session_start();?>
<?
if( empty($_SESSION['login']) )
{
include("login1.php");
}
else
{

include("db.php");

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
?><table width="100%">
<tr><td width="70%" valign="top">
<table border=0><tbody><tr><td width=8 style='background-color:#f3e8dd'></td><td width=273 style='background-color:#ececec'><b><font color=#845d29>M</font>ARCHE<font color=#845d29> N</font>OIR</b></td></tr></tbody></table>
</td>
<td width="30%"><img src="images/marche_noir.png"></td></table>
<p>Bienvenue au marché noir <? $nom_rpg  = strtoupper($nom_rpg);
echo $nom_rpg.' '.$prenom_rpg; ?>, (<? echo $_SESSION['login']; ?>) prisonnier N°<? echo $id; ?>
<?
if($pa >= 0)
{


if($_GET['buy'] != NULL)
{

if(empty($_SESSION['secuvar']))
{
//mysql_query("UPDATE table_user SET pa=pa-2 WHERE login='".$_SESSION['login']."'");
$_SESSION['secuvar'] = TRUE;
}




$reponse = mysql_query("SELECT * FROM table_object WHERE id=".htmlentities($_GET['buy']).""); 
				while ($donnees = mysql_fetch_array($reponse) )
		{
		$nom = $donnees['nom'];
		$pseudo = $donnees['pseudo'];
		$prix = $donnees['prix'];
		}

if($pseudo == 'marche_noir')
{

if($pa >= 0)
{

if($prix <= $portemonnaie)
{
mysql_query("UPDATE table_user SET pa=pa-2 WHERE login='".$_SESSION['login']."'");
mysql_query("UPDATE table_user SET portemonnaie=portemonnaie-".$prix." WHERE login='".$_SESSION['login']."'");
mysql_query("UPDATE table_object SET pseudo='".$_SESSION['login']."' WHERE id=".htmlentities($_GET['buy'])."");	
echo '<br /><br /><b>Votre achat s\'est déroulé avec succès.<br /></b>'; 
$ip = $_SERVER["REMOTE_ADDR"];
mysql_query("INSERT INTO connectes_ip VALUES ('', '".$_SESSION['login']."', '0', '0', '".$ip."', '".time()."', 'marche_noir', '".$_SESSION['login']."', '".htmlentities($_GET['buy'])."', '".$prix."')");

}
else
{
echo 'Vous n\'avez pas assez de PA.<br /><br /><a href="?page=marche">Retour</a>';
}

}
else
{
echo '<br /><br /><b>Vous n\'avez pas assez de $B.<br /></b>'; 
}

		$sql = "select * from table_user where login='".$_SESSION['login']."'";
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		$data = mysql_fetch_assoc($req);

		
		$reponse1 = mysql_query("SELECT * FROM table_user WHERE login='".$_SESSION['login']."'"); 
				while ($donnees1 = mysql_fetch_array($reponse1) )
		{
		$portemonnaie = $donnees1['portemonnaie'];
		}
?>
<br /><br />Vous avez <? echo $portemonnaie; ?> $B dans votre poche.
<br /><br />
<table width="450" border="0">
  <tr>
    <td><fieldset style="border-color:#7e5125">
      <legend><strong>Objet mis en ventes  : </strong></legend>
      <div><br />

        <table width="100%" border="0">
          <tr>
            <td width="36%" valign="bottom"><table width="100%" border="0">
              <tr>
                <td width="70%"><strong>Nom</strong></td>
                <td width="30%"><strong>Prix</strong></td>
              </tr>
            </table></td>
            <td width="43%" valign="bottom"><strong>Caract&eacute;ristiques ajout&eacute;s <br />
            </strong>
              <table width="100%" border="0">
                <tr>
                  <td width="25%"><span class="style10">Force</span></td>
                  <td width="25%"><span class="style10">Agilit&eacute;</span></td>
                  <td width="25%"><span class="style10">Intelligence</span></td>
                  <td width="25%"><span class="style10">Respect</span></td>
                </tr>
            </table></td>
			
            <td width="1%" valign="bottom">&nbsp;</td>
            <td width="20%" valign="bottom"><strong>Acheter</strong></td>
          </tr>
        </table> 
		<table width="100%" border="0">      
		<?
			
$i = 0;		
		
			$reponse2 = mysql_query("SELECT * FROM table_object WHERE pseudo='marche_noir'"); 
				while ($donnees2 = mysql_fetch_array($reponse2) )
		{
		
		$i++;
		?>
        
          <tr>
            <td width="36%" valign="bottom"><table width="100%" border="0">
              <tr>
                <td width="70%"><? 

				
			
				
				echo $donnees2['nom']; ?></td>
                <td width="30%"><? echo $donnees2['prix']; ?> $B</td>
              </tr>
            </table></td>
            <td width="43%" valign="bottom"><table width="100%" border="0">
                <tr>
                  <td width="25%">+<? echo $donnees2['force']/1000; ?></td>
                  <td width="25%">+<? echo $donnees2['agilite']/1000; ?></td>
                  <td width="25%">+<? echo $donnees2['intelligence']/1000; ?></td>
                  <td width="25%">+<? echo $donnees2['respect']/1000; ?></td>
                </tr>
				
            </table></td>
            <td width="1%" valign="bottom">		    </td>
<td width="20%" valign="bottom"><a href='?page=marche&buy=<? echo $donnees2['id']; ?>'>Acheter</a></td>

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
		</p>
	  </div>
    </fieldset></td>
  </tr>
</table><br />
<?

}

else
{
echo '<br /><br />Cet objet ne fait pas ou plus partis du marché noir.<br /><br />'; ?>
<br /><br />Vous avez <? echo $portemonnaie; ?> $B dans votre poche.
<br /><br />
<table width="450" border="0">
  <tr>
    <td><fieldset style="border-color:#7e5125">
      <legend><strong>Objet mis en ventes  : </strong></legend>
      <div><br />

        <table width="100%" border="0">
          <tr>
            <td width="36%" valign="bottom"><table width="100%" border="0">
              <tr>
                <td width="70%"><strong>Nom</strong></td>
                <td width="30%"><strong>Prix</strong></td>
              </tr>
            </table></td>
            <td width="43%" valign="bottom"><strong>Caract&eacute;ristiques ajout&eacute;s <br />
            </strong>
              <table width="100%" border="0">
                <tr>
                  <td width="25%"><span class="style10">Force</span></td>
                  <td width="25%"><span class="style10">Agilit&eacute;</span></td>
                  <td width="25%"><span class="style10">Intelligence</span></td>
                  <td width="25%"><span class="style10">Respect</span></td>
                </tr>
            </table></td>
			
            <td width="1%" valign="bottom">&nbsp;</td>
            <td width="20%" valign="bottom"><strong>Acheter</strong></td>
          </tr>
        </table> 
		<table width="100%" border="0">      
		<?
			
$i = 0;		
		
			$reponse2 = mysql_query("SELECT * FROM table_object WHERE pseudo='marche_noir'"); 
				while ($donnees2 = mysql_fetch_array($reponse2) )
		{
		
		$i++;
		?>
        
          <tr>
            <td width="36%" valign="bottom"><table width="100%" border="0">
              <tr>
                <td width="70%"><? 

				
			
				
				echo $donnees2['nom']; ?></td>
                <td width="30%"><? echo $donnees2['prix']; ?> $B</td>
              </tr>
            </table></td>
            <td width="43%" valign="bottom"><table width="100%" border="0">
                <tr>
                  <td width="25%">+<? echo $donnees2['force']/1000; ?></td>
                  <td width="25%">+<? echo $donnees2['agilite']/1000; ?></td>
                  <td width="25%">+<? echo $donnees2['intelligence']/1000; ?></td>
                  <td width="25%">+<? echo $donnees2['respect']/1000; ?></td>
                </tr>
				
            </table></td>
            <td width="1%" valign="bottom">		    </td>
<td width="20%" valign="bottom"><a href='?page=marche&buy=<? echo $donnees2['id']; ?>'>Acheter</a></td>

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
		</p>
	  </div>
    </fieldset></td>
  </tr>
</table><br /><?
}
		


}
else
{




//mysql_query("UPDATE table_user SET pa=pa-2 WHERE login='".$_SESSION['login']."'");
$_SESSION['secuvar'] = TRUE;

?>
<br /><br />Vous avez <? echo $portemonnaie; ?> $B dans votre poche.
<br /><br />
<table width="450" border="0">
  <tr>
    <td><fieldset style="border-color:#7e5125">
      <legend><strong>Objet mis en ventes  : </strong></legend>
      <div><br />

        <table width="100%" border="0">
          <tr>
            <td width="36%" valign="bottom"><table width="100%" border="0">
              <tr>
                <td width="70%"><strong>Nom</strong></td>
                <td width="30%"><strong>Prix</strong></td>
              </tr>
            </table></td>
            <td width="43%" valign="bottom"><strong>Caract&eacute;ristiques ajout&eacute;s <br />
            </strong>
              <table width="100%" border="0">
                <tr>
                  <td width="25%"><span class="style10">Force</span></td>
                  <td width="25%"><span class="style10">Agilit&eacute;</span></td>
                  <td width="25%"><span class="style10">Intelligence</span></td>
                  <td width="25%"><span class="style10">Respect</span></td>
                </tr>
            </table></td>
			
            <td width="1%" valign="bottom">&nbsp;</td>
            <td width="20%" valign="bottom"><strong>Acheter*</strong></td>
          </tr>
        </table> 
		<table width="100%" border="0">      
		<?
			
$i = 0;		
		
			$reponse2 = mysql_query("SELECT * FROM table_object WHERE pseudo='marche_noir'"); 
				while ($donnees2 = mysql_fetch_array($reponse2) )
		{
		
		$i++;
		?>
        
          <tr>
            <td width="36%" valign="bottom"><table width="100%" border="0">
              <tr>
                <td width="70%"><? 

				
			
				
				echo $donnees2['nom']; ?></td>
                <td width="30%"><? echo $donnees2['prix']; ?> $B</td>
              </tr>
            </table></td>
            <td width="43%" valign="bottom"><table width="100%" border="0">
                <tr>
                  <td width="25%">+<? echo $donnees2['force']/1000; ?></td>
                  <td width="25%">+<? echo $donnees2['agilite']/1000; ?></td>
                  <td width="25%">+<? echo $donnees2['intelligence']/1000; ?></td>
                  <td width="25%">+<? echo $donnees2['respect']/1000; ?></td>
                </tr>
				
            </table></td>
            <td width="1%" valign="bottom">		    </td>
<td width="20%" valign="bottom"><a href='?page=marche&buy=<? echo $donnees2['id']; ?>'>Acheter</a></td>

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
		</p>
		<br /><br />
		*Un achat côute 2 PA.
	  </div>
    </fieldset></td>
  </tr>
</table><br />
<?


}

}
else
{
echo '<br /><br />Vous n\'avez pas assez de PA pour effectuer cette action.<br /><br /><a href="?page=compte">Retour</a>';
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