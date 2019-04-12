<?
include("db.php");




if(isset($_POST) && !empty($_POST['login']) && !empty($_POST['mdp'])) {
  extract($_POST);

  $sql = "select mdp from table_user where login='".$login."'";
  $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

  $data = mysql_fetch_assoc($req);

$pass = $data['mdp'];  
//$_SESSION['carburant'] = $data['carburant'];
//$_SESSION['portemonnaie'] = $data['portemonnaie'];	
$hash = md5($_POST['mdp']);

  if($pass != $hash) {
    echo '<p>Mauvais login / password. Merci de recommencer</p>';
    include('login1.php'); // On inclus le formulaire d'identification
  }
   else {

 

        $_SESSION['login'] = $login;
		$_SESSION['mdp'] = $hash;
		
	



$reponse = mysql_query("SELECT * FROM table_user WHERE login='$login'");
while ($donnees = mysql_fetch_array($reponse) )
{
$date_peine_de_mort = $donnees['date_peine_de_mort'];
$fin_peine = $donnees['fin_peine'];
$prochaine_dla = $donnees['prochaine_dla'];
$statut = $donnees['statut'];
$id_user_secu = $donnees['id'];
$rencontre1 = $donnees['rencontre1'];
$rencontre2 = $donnees['rencontre2'];
}

$_SESSION['id_user_secu'] = $id_user_secu;

if($date_peine_de_mort <= $secondesupp && $date_peine_de_mort != 0)
{
$reponse = mysql_query("UPDATE table_user SET statut='Mort' WHERE login='$login'");
$statut = 'Mort';
}


if($secondesupp >= $prochaine_dla)
{
//Repousser dla
$prochaine_dla1 = $secondesupp + 21600;
$reponse = mysql_query("UPDATE table_user SET prochaine_dla=$prochaine_dla1 WHERE login='$login'");
//Donner x pa !
$pa = 20;
$reponse = mysql_query("UPDATE table_user SET pa=$pa WHERE login='$login'");
$reponse = mysql_query("UPDATE table_user SET moral=moral-13 WHERE login='$login'");
$reponse = mysql_query("UPDATE table_user SET faim=faim-3 WHERE login='$login'");
$reponse = mysql_query("UPDATE table_user SET hygiene=hygiene-3 WHERE login='$login'");

if($rencontre1 == 1 && $rencontre2 <= $secondesupp){
$reponse = mysql_query("UPDATE table_user SET rencontre1=0 WHERE login='$login'");
}


}

$ip = $_SERVER["REMOTE_ADDR"];
mysql_query("DELETE FROM connectes_ip WHERE mec1='".$_SESSION['login']."' AND lieu=4");
mysql_query("INSERT INTO connectes_ip VALUES ('', '".$_SESSION['login']."', '1', '4', '".$ip."', '".time()."', '0', '0', '0', '0')");

mysql_query("DELETE FROM ip_secu WHERE pseudo='".$_SESSION['login']."'");
mysql_query("INSERT INTO ip_secu VALUES ('', '".time()."', '".$_SESSION['login']."', '".$ip."')");


if($statut == 'Prisonnier')
{
echo '<SCRIPT LANGUAGE="JavaScript">
document.location.href="?page=compte" /* vous pouvez aussi mettre http://www.monsite.com */
</SCRIPT>';
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

  
}

else {
  echo '<p>Vous avez oublié de remplir un champ.</p>';
   include('login1.php'); // On inclut le formulaire d'identification
}



?>
