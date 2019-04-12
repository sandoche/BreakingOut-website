<? session_start();

include("db.php");

$reponse1 = mysql_query("SELECT * FROM table_user WHERE id='".htmlentities($_GET['id'])."'"); 
				while ($donnees1 = mysql_fetch_array($reponse1) )
		{
		$id = $donnees1['id'];
		$login1 = $donnees1['login'];
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
		$champsuppc = $donnees1['champsuppc'];
		}
		
?>
<title><? $nom_rpg  = strtoupper($nom_rpg);
echo $nom_rpg.' '.$prenom_rpg; ?>, (<? echo $login1; ?>) prisonnier N°<? echo $id; ?></title>
<style type="text/css">
<!--
.style1 {color: #000099}
.style2 {color: #666666}
.style8 {font-size: 10px; font-weight: bold; }
.style10 {color: #666666; font-size: 10px; }
.style11 {color: #000000}

body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
a:link {
	color: #FF0066;
	text-decoration: none;
}
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #EAEAEA;
	background-color: #232323;
}
a:visited {
	text-decoration: none;
	color: #FF0066;
}
a:hover {
	text-decoration: none;
	color: #FF9900;
}
a:active {
	text-decoration: none;
	color: #FF0066;
}
.abc{
	background-image: url(images/design_03.png);
	background-repeat: no-repeat;
	
}
#Layer1 {
	position:absolute;
	width:100%;
	height:103px;
	z-index:1;
	left: 0;
	top: 50px;
}
.abcd:hover{
	background-image: url(images/hover.png);
}
.abcd2:hover{
	background-image: url(images/hover1.png);
}
.Style4 {font-size: 12px}
#Layer2 {
	position:absolute;
	width:100%;
	height:100px;
	z-index:1;
	visibility: hidden;
	top: 50px;
}
.titre {
	color: #FF9933;
	font-weight: bold;
}
-->
</style>

<center>
<table width="600" border="0">
  <tr>
    <td><fieldset style="border-color:#7e5125">
      <legend><strong><? $nom_rpg  = strtoupper($nom_rpg);
echo $nom_rpg.' '.$prenom_rpg; ?>, (<? echo $login1; ?>) prisonnier N°<? echo $id; ?> <a href='index.php?page=messagerie&ecrire=1&mec=<? echo $login1; ?>'>  [Envoyer un message]</a></strong></legend>
<div>

<table width="100%" border="0">
          <tr>
            <td>
			<span class="style2"><b>Statut : </b></span><? echo $statut; ?>
			<br /><br />
			<span class="style2"><b>Type : </b></span><? echo $delit; ?>
			<br />
			
              <span class="style2"><b>Gang : </b></span><? if ($gang == '0')
			  {
			  echo 'Aucun';
			  }else{echo $gang; } ?>
			  <br />
			  <br />
        <table width="100%" border="0">
          <tr>
            <td width="46%"><span class="style2"><b>Caract&eacute;ristiques : </b></span>
              <table width="100%" border="0">
                <tr>
                  <td width="52%"><span class="style8">Force</span></td>
                  <td width="48%"><? echo floor($carac_force/1000); ?></td>
                </tr>
                <tr>
                  <td><span class="style8">Agilit&eacute;</span></td>
                  <td><? echo floor($carac_agilite/1000); ?></td>
                </tr>
                <tr>
                  <td><span class="style8">Intelligence</span></td>
                  <td><? echo floor($carac_intelligence/1000); ?></td>
                </tr>
                <tr>
                  <td height="21"><span class="style8">Respect</span></td>
                  <td><? echo floor($carac_respect/1000); ?></td>
                </tr>
              </table></td>
            <td width="54%" align="left" valign="top"><span class="style2"><br />
                <span class="style11">               </span></span> </td>
          </tr>
        </table>
		Niveau g&eacute;n&eacute;ral : <?
$niveau = floor(($carac_force+$carac_agilite+$carac_intelligence+$carac_respect-9000)/1000);
echo $niveau; ?>
		    </td>
            <td><span class="style2"><b>Avatar :</b></span><br />
            <img src='<?
			if($avatar == '0')
			{
			echo 'avatars/no_avatar.png';
			}
			else
			{
			echo $avatar;
			}
			?>' width="100" height="100" border="1" title="Avatar de <? $login1; ?>" />
			<br />
			<br />
						<span class="style2"><b>Description :</b></span>
			<br /><? echo $description; ?></td>
			

          </tr>
        </table>
<br />
      <b><span class="style2">Statistiques : </span></b>
      <div>
	  <span class="style2">Combats gagnés : </span><? echo $stat_combats_gagne; ?>/<? echo $stat_combats; ?><br />
	  
	  <span class="style2">Parties de poker gagnés : </span><? echo $stat_parties_poker_gagne; ?>/<? echo $stat_parties_poker ?><br />
	  <span class="style2">Argent gagné au poker : </span><? echo $stat_sous_poker_gagne; ?><br />
	  <span class="style2">Nombre de passages au trou : </span><? echo $stat_trou; ?><br />
	  <span class="style2">Nombre d'infractions : </span><? echo $stat_infractions; ?><br />
	  <span class="style2">Nombre de réanimation à l'infirmerie : </span><? echo $champsuppc; ?><br />
	   <span class="style2">Nombre d'évasions réussie : </span><? echo $evasion_etape; ?><br />
	  </div>
<br />
<table width="100%" border="0">
  <tr>
    <td><fieldset style="border-color:#7e5125">
      <legend><strong>Ses objets : </strong></legend>
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
          </tr>
        </table> 
		<table width="100%" border="0">      
		<?
			
$i = 0;		
		
			$reponse2 = mysql_query("SELECT * FROM table_object WHERE pseudo='".$login1."'"); 
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
		  
		  
      </div>
    </fieldset></td>
  </tr>
</table><br />	  
</div>
</td>
</tr>
</table>
</center>
			