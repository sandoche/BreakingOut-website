<? session_start();

include("db.php");
?>
<style type="text/css">
<!--
.Style2 {
font-size: 11px;
}
.style44{
color:#ffe7b7;
}
-->
</style>

<p class="Style2">Le meilleur prisonnier est <? 

$reponse1 = mysql_query("SELECT * FROM table_user WHERE statut='Prisonnier' ORDER BY  carac_force+carac_intelligence+carac_agilite+carac_respect DESC LIMIT 0, 1"); 
				while ($donnees1 = mysql_fetch_array($reponse1) )
		{
		$joueurs = $donnees1['login'];
		$carac_force = $donnees1['carac_force'];
		$carac_intelligence = $donnees1['carac_intelligence'];
		$carac_agilite = $donnees1['carac_agilite'];
		$carac_respect = $donnees1['carac_respect'];
		$niveau = ($carac_force + $carac_intelligence + $carac_agilite + $carac_respect)/1000 - 9;
		$niveau = floor($niveau);		
		}
		
		echo "<b class='style44'>".$joueurs." (Niveau ".$niveau." général)</b><br />";
?>
  <br />
Le prisonnier qui a la meilleure force est 
<? 
$reponse2 = mysql_query("SELECT * FROM table_user WHERE statut='Prisonnier' ORDER BY carac_force DESC LIMIT 0, 1"); 
				while ($donnees2 = mysql_fetch_array($reponse2) )
		{
		$joueurs = $donnees2['login'];
		$niveau = floor($donnees2['carac_force']/1000);
		}
		
		echo "<b class='style44'>".$joueurs." <br />(Niveau ".$niveau." en Force)</b>";
?>
<br />
Le prisonnier qui a la meilleure agilité est 
<? 
$reponse3 = mysql_query("SELECT * FROM table_user WHERE statut='Prisonnier' ORDER BY carac_agilite DESC LIMIT 0, 1"); 
				while ($donnees3 = mysql_fetch_array($reponse3) )
		{
		$joueurs = $donnees3['login'];
		$niveau = floor($donnees3['carac_agilite']/1000);
		}
		
		echo "<b class='style44'>".$joueurs." <br />(Niveau ".$niveau." en Agilité)</b>";
?>
<br />
Le prisonnier qui a la meilleure intelligence est
<? 
$reponse4 = mysql_query("SELECT * FROM table_user WHERE statut='Prisonnier' ORDER BY carac_intelligence DESC LIMIT 0, 1"); 
				while ($donnees4 = mysql_fetch_array($reponse4) )
		{
		$joueurs = $donnees4['login'];
		$niveau = floor($donnees4['carac_intelligence']/1000);
		}
		
		echo "<b class='style44'>".$joueurs." <br />(Niveau ".$niveau." en Intelligence)</b>";
?>
<br />
Le prisonnier qui a le meilleur respect est
<? 
$reponse5 = mysql_query("SELECT * FROM table_user WHERE statut='Prisonnier' ORDER BY carac_respect DESC LIMIT 0, 1"); 
				while ($donnees5 = mysql_fetch_array($reponse5) )
		{
		$joueurs = $donnees5['login'];
		$niveau = floor($donnees5['carac_respect']/1000);
		}
		
		echo "<b class='style44'>".$joueurs." <br />(Niveau ".$niveau." en respect)</b>";
?>
</p>
<p class="Style2">Le prisonnier le plus riche est <? 
$reponse6 = mysql_query("SELECT * FROM table_user WHERE statut='Prisonnier' ORDER BY portemonnaie DESC LIMIT 0, 1"); 
				while ($donnees6 = mysql_fetch_array($reponse6) )
		{
		$joueurs = $donnees6['login'];
		$portemonnaie = $donnees6['portemonnaie'];
		}
		
		echo '<b class="style44">'.$joueurs.' <br />('.$portemonnaie.' $B)</b>';
?>
  <br />
Le prisonnier qui a fait le plus de combats est  
<? 
$reponse7 = mysql_query("SELECT * FROM table_user WHERE statut='Prisonnier' ORDER BY stat_combats DESC LIMIT 0, 1"); 
				while ($donnees7 = mysql_fetch_array($reponse7) )
		{
		$joueurs = $donnees7['login'];
		$valeur = $donnees7['stat_combats'];
		}
		
		echo '<b class="style44">'.$joueurs.' <br />('.$valeur.' combats)</b>';
?>
<br />
Le prisonnier qui a gagné le plus de combats est
<? 
$reponse8 = mysql_query("SELECT * FROM table_user WHERE statut='Prisonnier' ORDER BY stat_combats_gagne DESC LIMIT 0, 1"); 
				while ($donnees8 = mysql_fetch_array($reponse8) )
		{
		$joueurs = $donnees8['login'];
		$valeur = $donnees8['stat_combats'];
		$valeur1 = $donnees8['stat_combats_gagne'];
		}
		
		echo '<b class="style44">'.$joueurs.' <br />('.$valeur1.' combats gagnés sur '.$valeur.')</b>';
?>
<br />
Le prisonnier qui a fait le plus de parties de poker est <? 
$reponse9 = mysql_query("SELECT * FROM table_user WHERE statut='Prisonnier' ORDER BY stat_parties_poker DESC LIMIT 0, 1"); 
				while ($donnees9 = mysql_fetch_array($reponse9) )
		{
		$joueurs = $donnees9['login'];
		$stat_courses = $donnees9['stat_parties_poker'];
		}
		
		echo '<b class="style44">'.$joueurs.' <br />('.$stat_courses.' parties de poker)</b>';
?>
  <br />
  Le prisonnier qui a gagné le plus de parties de poker est
  <? 
$reponse10 = mysql_query("SELECT * FROM table_user WHERE statut='Prisonnier' ORDER BY stat_parties_poker_gagne DESC LIMIT 0, 1"); 
				while ($donnees10 = mysql_fetch_array($reponse10) )
		{
		$joueurs = $donnees10['login'];
		$stat_victoires = $donnees10['stat_parties_poker_gagne'];
		$stat_courses = $donnees10['stat_parties_poker'];
		}
		
		echo '<b class="style44">'.$joueurs.' <br />('.$stat_victoires.' parties gagnés sur '.$stat_courses.')</b>';
?>
<br />
  Le prisonnier qui a fait le plus de passages au trou est
<? 

$reponse11_ = mysql_query("SELECT * FROM table_user WHERE statut='Prisonnier' ORDER BY stat_trou DESC LIMIT 0, 1"); 
				while ($donnees11_ = mysql_fetch_array($reponse11_) )
		{
		$joueurs = $donnees11_['login'];
		$stat_tournoi = $donnees11_['stat_trou'];
		}
		
		echo '<b class="style44">'.$joueurs.' <br />('.$stat_tournoi.' passages au trou)</b>';
?><br />
Le prisonnier qui a fait le plus d'infractions est  <? 
  
  $reponse12_ = mysql_query("SELECT * FROM table_user WHERE statut='Prisonnier' ORDER BY stat_infractions DESC LIMIT 0, 1"); 
				while ($donnees12_ = mysql_fetch_array($reponse12_) )
		{
		$joueurs = $donnees12_['login'];
		$stat_tournoi = $donnees12_['stat_infractions'];
		}
		
		echo '<b class="style44">'.$joueurs.' <br />('.$stat_tournoi.' infractions)</b>';
  ?><br />
  
  Le prisonnier qui a fait le plus de réanimations à l'infirmerie est  <? 
  
  $reponse12_ = mysql_query("SELECT * FROM table_user WHERE statut='Prisonnier' ORDER BY champsuppc DESC LIMIT 0, 1"); 
				while ($donnees12_ = mysql_fetch_array($reponse12_) )
		{
		$joueurs = $donnees12_['login'];
		$stat_tournoi = $donnees12_['champsuppc'];
		}
		
		echo '<b class="style44">'.$joueurs.' <br />('.$stat_tournoi.' réanimations)</b>';
  ?>
  
  <br />
  
  Le prisonnier qui a fait le plus de recontres familiales est  <? 
  
  $reponse12_ = mysql_query("SELECT * FROM table_user WHERE statut='Prisonnier' ORDER BY supp1 DESC LIMIT 0, 1"); 
				while ($donnees12_ = mysql_fetch_array($reponse12_) )
		{
		$joueurs = $donnees12_['login'];
		$stat_tournoi = $donnees12_['supp1'];
		}
		
		echo '<b class="style44">'.$joueurs.' <br />('.$stat_tournoi.' rencontres)</b>';
  ?><br />
      Le joueur qui a fait le plus d'evasions est
  <? 
$reponse12 = mysql_query("SELECT * FROM table_user WHERE statut='Prisonnier' ORDER BY evasion_etape DESC LIMIT 0, 1"); 
				while ($donnees12 = mysql_fetch_array($reponse12) )
		{
		$joueurs = $donnees12['login'];
		$evasion_etape = $donnees12['evasion_etape'];
		}
		
		echo '<b class="style44">'.$joueurs.' <br />('.$evasion_etape.' evasions)</b>';
?>
</p>
<span class="Style2"><br />
Le gang le plus respecté est
<? 
$reponse12 = mysql_query("SELECT * FROM table_gang ORDER BY points DESC LIMIT 0, 1"); 
				while ($donnees12 = mysql_fetch_array($reponse12) )
		{
		$joueurs = $donnees12['nom'];
		$evasion_etape = $donnees12['points'];
		}
		
		echo '<b class="style44">'.$joueurs.' <br />('.$evasion_etape.' de respect)</b>';
?>
 
  <?
mysql_close();
?>
</span>