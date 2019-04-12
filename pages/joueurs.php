<?
include("db.php");
?>

<style type="text/css">
<!--
.style1 {
	color: #BBBBBB;
	font-weight: bold;
}
-->
</style>

<span class="titre">>>> JOUEURS</span><br />
 <p align="center"><a href="index.php?page=joueurs&amp;lettre=a">A</a> - <a href="index.php?page=joueurs&amp;lettre=b">B</a> - <a href="index.php?page=joueurs&amp;lettre=c">C</a> - <a href="index.php?page=joueurs&amp;lettre=d">D</a> - <a href="index.php?page=joueurs&amp;lettre=e">E</a> - <a href="index.php?page=joueurs&amp;lettre=f">F</a> - <a href="index.php?page=joueurs&amp;lettre=g">G</a> - <a href="index.php?page=joueurs&amp;lettre=h">H</a> - <a href="index.php?page=joueurs&amp;lettre=i">I</a> - <a href="index.php?page=joueurs&amp;lettre=j">J</a> - <a href="index.php?page=joueurs&amp;lettre=k">K</a> - <a href="index.php?page=joueurs&amp;lettre=l">L</a> - <a href="index.php?page=joueurs&amp;lettre=m">M</a> - <a href="index.php?page=joueurs&amp;lettre=n">N</a> - <a href="index.php?page=joueurs&amp;lettre=o">O</a> - <a href="index.php?page=joueurs&amp;lettre=p">P</a> - <a href="index.php?page=joueurs&amp;lettre=q">Q</a> - <a href="index.php?page=joueurs&amp;lettre=r">R</a> - <a href="index.php?page=joueurs&amp;lettre=s">S</a> - <a href="index.php?page=joueurs&amp;lettre=t">T</a> - <a href="index.php?page=joueurs&amp;lettre=u">U</a> - <a href="index.php?page=joueurs&amp;lettre=v">V</a> - <a href="index.php?page=joueurs&amp;lettre=w">W</a> - <a href="index.php?page=joueurs&amp;lettre=x">X</a> - <a href="index.php?page=joueurs&amp;lettre=y">Y</a> - <a href="index.php?page=joueurs&amp;lettre=z">Z</a></p>
<br><br><center> <table width="100%" border="0" cellpadding="1">
   <tr>
     <td width="23%"><span class="style1">Pseudo</span></td>
	 <td width="12%"><span class="style1">Statut</span></td>
	 <td width="36%"><span class="style1">Type</span></td>
     <td width="10%"><span class="style1">Niveau </span></td>
     <td width="16%"><span class="style1">N&deg;ID</span></td>
     <td width="13%"><span class="style1"> Infos </span></td>
   </tr>
 </table>
</center>
   <?
$i = 0;
   
		$reponse1 = mysql_query("SELECT * FROM table_user"); 
				while ($donnees1 = mysql_fetch_array($reponse1) )
		{
		$id = $donnees1['id'];
		$joueurs = $donnees1['login'];
		$firstlettre = $joueurs[0];
		$joueurs = $donnees1['login'];
		$nom_rpg = $donnees1['nom_rpg'];
		$nom_rpg  = strtoupper($nom_rpg);
		$prenom_rpg = $donnees1['prenom_rpg'];
		$carac_force = $donnees1['carac_force'];
		$carac_intelligence = $donnees1['carac_intelligence'];
		$carac_agilite = $donnees1['carac_agilite'];
		$carac_respect = $donnees1['carac_respect'];
		$niveau = ($carac_force + $carac_intelligence + $carac_agilite + $carac_respect)/1000 - 9;
		$niveau = floor($niveau);
		$statut = $donnees1['statut'];
		$delit = $donnees1['delit'];
		
		
		$lettre = htmlentities($_GET['lettre']);
		$lettre_maj = strtoupper($_GET['lettre']);

		if($firstlettre == $lettre OR $firstlettre == $lettre_maj)
		{
		
		$i++;
?>
<center> <table width="100%" border="0" cellpadding="0">
   <tr>
     <td width="23%"><? echo '<b>'.$joueurs.'</b>'; ?></td>
	 <td width="12%"><? echo $statut; ?></td>
     <td width="36%"><? echo $delit; ?></td>
	 <td width="10%"><? echo floor($niveau); ?></td>
     <td width="16%"><? echo $id; ?></td>
     <td width="13%"><a href="view_player.php?id=<? echo $id; ?>" target="_blank" >Voir</a></td>
   </tr>
 </table>
</center>
     <p>
       <?
		
	}
	
	}
	
	if($i == 0)
	{
	
	if($_GET['lettre'] == NULL){
	
	$d = 0;
	
		$reponse12 = mysql_query("SELECT * FROM victime_du_mois ORDER BY id DESC limit 0,1"); 
				while ($donnees12 = mysql_fetch_array($reponse12) )
		{
		
		$id_joueur = $donnees12['id_joueur'];
		
			$reponse13 = mysql_query("SELECT * FROM table_user WHERE id=".$id_joueur.""); 
				while ($donnees13 = mysql_fetch_array($reponse13) )
		{
	
	$avatar = $donnees13['avatar'];
	$argent = $donnees13['portemonnaie'];
	$nom = $donnees13['nom_rpg'];
	$prenom = $donnees13['prenom_rpg'];
	$pseudo_mec = $donnees13['login'];
	$carac_force = $donnees13['carac_force'];
	$carac_agilite = $donnees13['carac_agilite'];
	$carac_intelligence = $donnees13['carac_intelligence'];
	$carac_respect = $donnees13['carac_respect'];
	$portemonnaie = $donnees13['portemonnaie'];
	$niveau = ($carac_force+$carac_agilite+$carac_intelligence+$carac_respect-9000)/1000;
	
	
		}
		
	}
	if($pseudo_mec == NULL)
	{
	echo '<br /><span class="titre">>>> VICTIME DE LA SEMAINE :</span><br /><br />Il n\'y a pas encore de victime de la semaine.';
	}
	else
	{
	
	?>
       <br />
	Choisissez une lettre pour afficher la liste des joueurs<br />
	<br />
    <span class="titre">>>> VICTIME DE LA SEMAINE :</span>    </p>
     <center>
       <table width="34%" border="0">
       <tr>
         <td bgcolor="#FF6600">
		 <center><blockquote><strong><? echo $pseudo_mec.'<br /> ('.strtoupper($nom).' '.$prenom.')';  ?> </strong><br />
          <img src='<?
			if($avatar == '0')
			{
			echo 'avatars/no_avatar.png';
			}
			else
			{
			echo $avatar;
			}
			?>' width="100" height="100" border="1" title="Avatar de <? echo $pseudo_mec; ?>" /><br />
         Niveau <? echo $niveau; ?><br />
           Argent <? echo $portemonnaie; ?> $B
</blockquote></center></td>
       </tr>
     </table></center>
     <p align="center"><br />
       
       <?
	   }
	   
	}else{
	echo '<center>Il n\'y a pas de joueur correspondant à cette lettre.<br /></center>';
	}
	
	}

	
	
	
mysql_close();
?>
         </p>
   </div>