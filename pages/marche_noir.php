<? session_start();?>
<?
if( empty($_SESSION['login']) )
{
include("login1.php");
}
else
{


		
if($statut == 'Prisonnier'  && $_SESSION['mdp'] == $mdp_secu)
{		
		
if($time_trou > $secondesupp)
{
?>
<span class="titre">>>> TROU</span><br />
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

include("pages/trou.php");
			  ?>

<?
}
else
{
?>


<img src="images/marche_noir.png">
<p>Bienvenue au marché noir <? $nom_rpg  = strtoupper($nom_rpg);
echo $nom_rpg.' '.$prenom_rpg; ?>, (<? echo htmlentities($_SESSION['login']); ?>) prisonnier N°<? echo $id; ?>
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


if($_GET['type'] == "dope")
{
$reponse = mysql_query("SELECT * FROM table_stupefiant WHERE id='".htmlentities($_GET['buy'])."'"); 
				while ($donnees = mysql_fetch_array($reponse) )
		{
		$id = $donnees['id'];
		$nom = $donnees['nom'];
		$pseudo = $donnees['pseudo'];
		$prix = $donnees['prix']+10;
		$moral = $donnees['moral'];
		}
}
else
{



$reponse = mysql_query("SELECT * FROM table_object WHERE id=".htmlentities($_GET['buy']).""); 
				while ($donnees = mysql_fetch_array($reponse) )
		{
		
		$nom = $donnees['nom'];
		$pseudo = $donnees['pseudo'];
		$prix = $donnees['prix'];
		}
		
}

if($pseudo == 'marche_noir')
{

if($pa >= 0)
{

if($prix <= $portemonnaie)
{
if($_GET['type'] == "dope" && $niveau >= 6 || $delit == 'Trafiquant armes et drogues')
{

mysql_query("UPDATE table_user SET portemonnaie=portemonnaie-".$prix." WHERE login='".htmlentities($_SESSION['login'])."'");
mysql_query("INSERT INTO table_stupefiant VALUES ('', '".htmlentities($_SESSION['login'])."', '".$nom."', '".$moral."', '0', '".$donnees['id']."', '0')");
echo '<br /><br /><b>Votre achat s\'est déroulé avec succès.<br /></b>'; 
$augmentation = rand(1,3);
mysql_query("UPDATE table_stupefiant SET prix=prix+$augmentation WHERE id='".$id."'");

}
elseif($_GET['type'] == "dope")
{
echo '<b><br /><br />Il faut avoir un niveau supérieur à 6 pour pouvoir acheter des stupéfiants</b><br /><br />';
}
else
{
mysql_query("UPDATE table_user SET pa=pa-2 WHERE login='".htmlentities($_SESSION['login'])."'");
mysql_query("UPDATE table_user SET portemonnaie=portemonnaie-".$prix." WHERE login='".htmlentities($_SESSION['login'])."'");
mysql_query("UPDATE table_object SET pseudo='".htmlentities($_SESSION['login'])."' WHERE id=".htmlentities($_GET['buy'])."");	
echo '<br /><br /><b>Votre achat s\'est déroulé avec succès.<br /></b>'; 
$ip = $_SERVER["REMOTE_ADDR"];
mysql_query("INSERT INTO connectes_ip VALUES ('', '".htmlentities($_SESSION['login'])."', '0', '0', '".$ip."', '".time()."', 'marche_noir', '".htmlentities($_SESSION['login'])."', '".htmlentities($_GET['buy'])."', '".$prix."')");
}
}
else
{
echo '<br /><br />Vous n\'avez pas assez de $B.<br /><br /><a href="?page=cour&action=marche">Retour</a>';
}

}
else
{
echo '<br /><br /><b>Vous n\'avez pas assez de $B.<br /></b>'; 
}



		$sql = "select * from table_user where login='".htmlentities($_SESSION['login'])."'";
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		$data = mysql_fetch_assoc($req);

		
		$reponse1 = mysql_query("SELECT * FROM table_user WHERE login='".htmlentities($_SESSION['login'])."'"); 
				while ($donnees1 = mysql_fetch_array($reponse1) )
		{
		$portemonnaie = $donnees1['portemonnaie'];
		}
		

?>


<br /><br />Vous avez <? echo $portemonnaie; ?> $B dans votre poche.
<br /><br />
<table width="100%" border="0">
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
<td width="20%" valign="bottom"><a href='?page=cour&action=marche&buy=<? echo $donnees2['id']; ?>'>Acheter</a></td>

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



<table width="100%" border="0">
  <tr>
    <td><fieldset style="border-color:#7e5125">
      <legend><strong>Stupéfiants  : </strong></legend>
      <div><br />

        <table width="100%" border="0">
          <tr>
              
                <td width="30%"><strong>Nom</strong></td>
                <td width="20%"><strong>Prix</strong></td>
				<td width="25%"><strong>Moral ajouté</strong></td>
                <td width="25%"><strong>Acheter*</strong></td>
            </tr>
			
			<?
				$reponsedope = mysql_query("SELECT * FROM table_stupefiant WHERE pseudo='marche_noir'"); 
				while ($donneesdope = mysql_fetch_array($reponsedope) )
		{
			?><tr>
	             <td width="30%"><? echo $donneesdope['nom']; ?></td>
                <td width="20%"><? echo $donneesdope['prix']; ?> $B</td>
				<td width="25%">+<? echo $donneesdope['moral']; ?></td>
                <td width="25%"><a href="?page=cour&action=marche&buy=<? echo $donneesdope['id']; ?>&type=dope">Acheter</a></td>	
				
			</tr>
			<?
			}
			?>
			<br />
			
			</table><br />*Vous payerez en plus la taxe de 10 $B.
		  <br />
		</p>
	  </div>
    </fieldset></td>
  </tr>
</table>


<?


}
else
{
echo '<br /><br />Cet objet ne fait pas ou plus partis du marché noir.<br /><br />'; ?>
<br /><br />Vous avez <? echo $portemonnaie; ?> $B dans votre poche.
<br /><br />
<table width="100%" border="0">
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
<td width="20%" valign="bottom"><a href='?page=cour&action=marche&buy=<? echo $donnees2['id']; ?>'>Acheter</a></td>

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



<table width="100%" border="0">
  <tr>
    <td><fieldset style="border-color:#7e5125">
      <legend><strong>Stupéfiants  : </strong></legend>
      <div><br />

        <table width="100%" border="0">
          <tr>
              
                <td width="30%"><strong>Nom</strong></td>
                <td width="20%"><strong>Prix</strong></td>
				<td width="25%"><strong>Moral ajouté</strong></td>
                <td width="25%"><strong>Acheter*</strong></td>
            </tr>
			
			<?
				$reponsedope = mysql_query("SELECT * FROM table_stupefiant WHERE pseudo='marche_noir'"); 
				while ($donneesdope = mysql_fetch_array($reponsedope) )
		{
			?><tr>
	             <td width="30%"><? echo $donneesdope['nom']; ?></td>
                <td width="20%"><? echo $donneesdope['prix']; ?> $B</td>
				<td width="25%">+<? echo $donneesdope['moral']; ?></td>
                <td width="25%"><a href="?page=cour&action=marche&buy=<? echo $donneesdope['id']; ?>&type=dope">Acheter</a></td>	
				
			</tr>
			<?
			}
			?>
			</table>
			<br />*Vous payerez en plus la taxe de 10 $B.
		  <br />
		</p>
	  </div>
    </fieldset></td>
  </tr>
</table><?
}
		


}
else
{




//mysql_query("UPDATE table_user SET pa=pa-2 WHERE login='".$_SESSION['login']."'");
$_SESSION['secuvar'] = TRUE;

?>
<br /><br />Vous avez <? echo $portemonnaie; ?> $B dans votre poche.
<br /><br />
<table width="100%" border="0">
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
<td width="20%" valign="bottom"><a href='?page=cour&action=marche&buy=<? echo $donnees2['id']; ?>'>Acheter</a></td>

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



<table width="100%" border="0">
  <tr>
    <td><fieldset style="border-color:#7e5125">
      <legend><strong>Stupéfiants  : </strong></legend>
      <div><br />

        <table width="100%" border="0">
          <tr>
              
                <td width="30%"><strong>Nom</strong></td>
                <td width="20%"><strong>Prix</strong></td>
				<td width="25%"><strong>Moral ajouté</strong></td>
                <td width="25%"><strong>Acheter</strong></td>
            </tr>
			
			<?
				$reponsedope = mysql_query("SELECT * FROM table_stupefiant WHERE pseudo='marche_noir'"); 
				while ($donneesdope = mysql_fetch_array($reponsedope) )
		{
			?><tr>
	             <td width="30%"><? echo $donneesdope['nom']; ?></td>
                <td width="20%"><? echo $donneesdope['prix']; ?> $B</td>
				<td width="25%">+<? echo $donneesdope['moral']; ?></td>
                <td width="25%"><a href="?page=cour&action=marche&buy=<? echo $donneesdope['id']; ?>&type=dope">Acheter</a></td>	
				
			</tr>
			<?
			}
			?>
			</table>
			<br />*Vous payerez en plus la taxe de 10 $B.
		  <br />
		</p>
	  </div>
    </fieldset></td>
  </tr>
</table>





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
 

}
?>