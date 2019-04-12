<span class="titre">>>> AIDE EXTERIEURE</span><br />
<?
include("pages/db.php");

if($_GET['id'] == NULL){
echo "<br/><br/>Ce prisonnier n'existe pas.<br/><br/><br/><br/>";
}else{

$id_prisonnier = htmlentities(base64_decode($_GET['id']));
$i = 0;
$j = 0;


$reponse = mysql_query("SELECT * FROM ip_secu WHERE ip='".$_SERVER["REMOTE_ADDR"]."'");
		
		while ($donnees = mysql_fetch_array($reponse) )
		{	
		$i++;
		}

if($i == 0){

$reponse2 = mysql_query("SELECT * FROM table_help WHERE id_player='".$id_prisonnier."' AND ip='".$_SERVER["REMOTE_ADDR"]."' AND timestamp+86400 >= ".time()."");
		
		while ($donnees2 = mysql_fetch_array($reponse2) )
		{	
		$j++;
		}
		
if($j > 0 OR $_COOKIE['secuhelp'] == $_GET['id']){
echo "<br/><br/>L’aide externe est limitée à 1 par jour (soit 4 jours du jeu) par personne.<br/><br/><br/><br/>";
?>
<br/><br/><br/><br/><b>Vous aussi vivez ou mourrez dans cet univers impitoyable, où vous pouvez vivre calmement ou vous battre pour survivre.</b><br />Breakingout est un jeu gratuit basé sur le scénario de la série Prison Break.
<br/><p><a href="?page=inscription&p=<? $id_prisonnier; ?>">FAITES VOUS INCARCERER IMMEDIATEMENT</a></p><br/>
<a href="screenshot/cour.PNG" target="_blank"><img src="screenshot/cour.PNG" alt="screenshot" height="177" width="250"></a>
<a href="screenshot/fight.PNG" target="_blank"><img src="screenshot/fight.PNG" alt="screenshot" height="177" width="250"></a>
<a href="screenshot/map_navigation.PNG" target="_blank"><img src="screenshot/map_navigation.PNG" alt="screenshot" height="177" width="250"></a><br/><br/>

<?
}else{

$reponse3 = mysql_query("SELECT * FROM table_user WHERE id='".$id_prisonnier."'");
$donnees3 = mysql_fetch_array($reponse3);
$aide = $donnees3['login'];

if($aide == NULL){
echo "<br/><br/>Ce prisonnier n'existe pas.<br/><br/><br/><br/>";
}else{
echo "<br/><br/>Pour aider le prisonnier <b>$aide</b> veuillez appuyer sur le bouton suivant :<br/><br/>";
?>
<form id="form1" name="form1" method="post" action="?page=help_player&id=<? echo $_GET['id']; ?>">
    <label>
    <input type="hidden" name="secuhelp" value="ok" />
    </label>
    <label>
    <input type="submit" name="Submit" value="Aider ce prisonnier" />
    </label>
</form>
<?

if($_POST['secuhelp'] == 'ok'){

echo "<br/><br/>Vous venez d'aider ce prisonnier.";

mysql_query("INSERT INTO table_help VALUES ('', '".$id_prisonnier."', '".$_SERVER["REMOTE_ADDR"]."', '".time()."', '0', '0')");
mysql_query("UPDATE table_user SET supp4=supp4+".rand(1,4)." WHERE id=".$id_prisonnier."");

}




?>
<br/><br/><br/><br/><b>Vous aussi vivez ou mourrez dans cet univers impitoyable, où vous pouvez vivre calmement ou vous battre pour survivre.</b><br />Breakingout est un jeu gratuit basé sur le scénario de la série Prison Break.
<br/><p><a href="index.php?page=inscription&p=<? echo $id_prisonnier; ?>">FAITES VOUS INCARCERER IMMEDIATEMENT</a></p><br/>
<a href="screenshot/cour.PNG" target="_blank"><img src="screenshot/cour.PNG" alt="screenshot" height="177" width="250"></a>
<a href="screenshot/fight.PNG" target="_blank"><img src="screenshot/fight.PNG" alt="screenshot" height="177" width="250"></a>
<a href="screenshot/map_navigation.PNG" target="_blank"><img src="screenshot/map_navigation.PNG" alt="screenshot" height="177" width="250"></a><br/><br/>


<?



}

}





}else{
echo "<br/><br/>Un prisonnier ne peut pas apporter une aide exterieure.<br/><br/><br/><br/>";
}

}


?>