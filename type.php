<style type="text/css">
<!--
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
.footer {
	color: black;
	font-weight: bold;
}
-->
</style>
<?
$ok = 0;

 switch($_GET['man']){
 
 	case "1": //Meutrier du vice président
$name = 'Meutrier du vice président';
$carac_force = 4000;
$carac_agilite = 2000;
$carac_respect = 2000;
$carac_intelligence = 2000;
$portemonnaie = 250;
$objet = 'Carte de travail';
$duree_peine = 'Peine de mort dans 5 ans';
 	break; 
	
	case "2": //Mafieu
$name = 'Mafieu';
$carac_force = 2000;
$carac_agilite = 1000;
$carac_respect = 5000;
$carac_intelligence = 2000;
$portemonnaie = 500;
$objet = 'Lame de rasoir';
$duree_peine = '8 ans';
	break; 
	
	case "3": //Tueur en serie
$name = 'Tueur en serie';
$carac_force = 4000;
$carac_agilite = 4000;
$carac_respect = 1000;
$carac_intelligence = 1000;
$portemonnaie = 0;
$objet = 'Bout de verre';
$duree_peine = '22 ans';
	break; 
	
 	case "4": //Pickpocket 
$name = 'Pickpocket';
$carac_force = 2000;
$carac_agilite = 4000;
$carac_respect = 1000;
$carac_intelligence = 3000;
$portemonnaie = 300;
$objet = 'Aucun';
$duree_peine = '2 ans';
	break; 
	
 	case "5": //Trafiquant d'armes et drogues
$name = 'Trafiquant d\'armes et drogues';
$carac_force = 3000;
$carac_agilite = 2000;
$carac_respect = 3000;
$carac_intelligence = 2000;
$portemonnaie = 250;
$objet = 'Ciseaux';
$duree_peine = '5 ans';
	break; 
	
 	case "6": //Braqueur de supermarché 
$name = 'Braqueur de supermarché';
$carac_force = 3000;
$carac_agilite = 5000;
$carac_respect = 1000;
$carac_intelligence = 1000;
$portemonnaie = 0;
$objet = 'Couteau';
$duree_peine = '2 ans';
	break; 
	
 	case "7": //Voleur d'un million de dollars
$name = 'Voleur d\'un million de dollars';
$carac_force = 2000;
$carac_agilite = 1000;
$carac_respect = 3000;
$carac_intelligence = 4000;
$portemonnaie = 1500;
$objet = 'Aucun';
$duree_peine = '15 ans';
	break; 
	
	case "8": //Tête pensante
$name = 'Tête pensante';
$carac_force = 2000;
$carac_agilite = 2000;
$carac_respect = 1000;
$carac_intelligence = 5000;
$portemonnaie = 200;
$objet = 'Plan de la prison';
$duree_peine = '3 ans';
	break; 
	
	default:	
$ok = 1;
    break;	
	
  }

?><style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
-->
</style>
<table width="180" border="0" cellpadding="10">
  <tr>
    <td height="180" align="left" valign="middle" bgcolor="#333333">
<? if($ok == 0)
{

$force = $carac_force/1000;
$agilite = $carac_agilite/1000;
$intelligence = $carac_intelligence/1000;
$respect = $carac_respect/1000;

echo '
<strong>'.$name.'<br />
      <br />
    </strong>Force '.$force.'<br />
     Agilité '.$agilite.'<br />
    Intelligence '.$intelligence.'<br />
    Respect '.$respect.'<br />
    <br />
    Argent : '.$portemonnaie.' $B<br />
    Objets : '.$objet.'<br />
    <br />';


}
else
{
echo 'Veuillez choisir un personnage pour voir ses caractéristiques.';
}
?>  
  </tr>
</table>
