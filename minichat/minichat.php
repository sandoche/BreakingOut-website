<?php session_start(); ?><?phpif( empty($_SESSION['login']) ){include("../pages/login1.php");}else{include("db.php");?><SCRIPT LANGUAGE='JavaScript'>if (parent.frames.length < 1)	{	document.location.href = '../index.php';	}</SCRIPT><?echo"<META http-equiv=Reply-to content=snake_4@caramail.com><LINK rev=made href='mailto:snake_4@caramail.com'><META content=noindex,follow name=copyright><META content='MSHTML 6.00.2800.1170' name=GENERATOR><meta http-equiv='refresh' content='20'><!-- DEBUT DU SCRIPT --><SCRIPT LANGUAGE=JavaScript>function ChangeMessage(message,champ)  {  if(document.getElementById)    document.getElementById(champ).innerHTML = message;  }</SCRIPT><!-- FIN DU SCRIPT --><SCRIPT>nereidFadeObjects = new Object();nereidFadeTimers = new Object();function verif(formulaire){if((event.keyCode < 45) || (event.keyCode > 57 && event.keyCode < 65) || (event.keyCode > 91 && event.keyCode < 96) || (event.keyCode > 122)) event.returnValue = false; if((event.keyCode < 45) || (event.keyCode > 57 && event.keyCode < 65) || (event.keyCode > 91 && event.keyCode < 96) || (event.keyCode > 122)) return false;}function nereidFade(object, destOp, rate, delta){if (!document.all)return    if (object != '[object]'){  //do this so I can take a string too        setTimeout('nereidFade('+object+','+destOp+','+rate+','+delta+')',0);        return;    }            clearTimeout(nereidFadeTimers[object.sourceIndex]);        diff = destOp-object.filters.alpha.opacity;    direction = 1;    if (object.filters.alpha.opacity > destOp){        direction = -1;    }    delta=Math.min(direction*diff,delta);    object.filters.alpha.opacity+=direction*delta;    if (object.filters.alpha.opacity != destOp){        nereidFadeObjects[object.sourceIndex]=object;        nereidFadeTimers[object.sourceIndex]=setTimeout('nereidFade(nereidFadeObjects['+object.sourceIndex+'],'+destOp+','+rate+','+delta+')',rate);    }}</SCRIPT><STYLE type=text/css>html.body {background : no-repeat;}TD {	FONT-SIZE: 10px; COLOR: black; FONT-FAMILY: VERDANA}.gras {	FONT-SIZE: 10px; COLOR: black; FONT-FAMILY: verdana}.part {	FONT-SIZE: 10px; COLOR: black; font-face: Verdana}.roms {	FONT-SIZE: 10px}A:link {	COLOR: black; TEXT-DECORATION: none}A:visited {	COLOR: black; TEXT-DECORATION: none}A:active {	COLOR: black; TEXT-DECORATION: none}A:hover {	COLOR: #cc0000; TEXT-DECORATION: none}BODY {	SCROLLBAR-FACE-COLOR: white;SCROLLBAR-HIGHLIGHT-COLOR: white; SCROLLBAR-SHADOW-COLOR: white; SCROLLBAR-3DLIGHT-COLOR: #3c5d8a; SCROLLBAR-ARROW-COLOR: #3c5d8a; SCROLLBAR-TRACK-COLOR: white; SCROLLBAR-DARKSHADOW-COLOR: #3c5d8a;MARGIN-LEFT:0px;MARGIN-TOP:0px;}INPUT.formu {	BORDER-RIGHT: #3c5d8a 1px solid; BORDER-TOP: #3c5d8a 1px solid; FONT-WEIGHT: 100; FONT-SIZE: 13px; BORDER-LEFT: #3c5d8a 1px solid; COLOR: #3c5d8a; BORDER-BOTTOM: #3c5d8a 1px solid; FONT-FAMILY: Arial; BACKGROUND-COLOR: white}body {	margin-left: 0px;	margin-top: 0px;	margin-right: 0px;	margin-bottom: 0px;}a:link {	color: #FF0066;	text-decoration: none;}body,td,th {	font-family: Verdana, Arial, Helvetica, sans-serif;	font-size: 10px;	color: white;	background-color: #1b1b1b;}a:visited {	text-decoration: none;	color: #FF0066;}a:hover {	text-decoration: none;	color: #FF9900;}a:active {	text-decoration: none;	color: #FF0066;}.abc{	background-image: url(images/design_03.png);	background-repeat: no-repeat;	}#Layer1 {	position:absolute;	width:100%;	height:103px;	z-index:1;	left: 0;	top: 50px;}.abcd:hover{	background-image: url(images/hover.png);}.abcd2:hover{	background-image: url(images/hover1.png);}.Style4 {font-size: 12px}#Layer2 {	position:absolute;	width:100%;	height:100px;	z-index:1;	visibility: hidden;	top: 50px;}</STYLE></HEAD><meta http-equiv=\"Refresh\" content=\"20;URL=minichat.php\">";$ip = $_SERVER["REMOTE_ADDR"];mysql_query("DELETE FROM connectes_ip WHERE mec1='".$_SESSION['login']."' AND lieu=1");mysql_query("INSERT INTO connectes_ip VALUES ('', '".$_SESSION['login']."', '1', '1', '".$ip."', '".time()."', '0', '0', '0', '0')");$retour = mysql_query("SELECT COUNT(*) AS id FROM minichat");$donnees = mysql_fetch_array($retour);$id = $donnees['id'];$last = $id - 15;// On utilise la requ�te suivante pour r�cup�rer les 10 derniers messages :$reponse = mysql_query("SELECT * FROM minichat ORDER BY ID DESC LIMIT 0,15");// On se d�connecte de MySQLecho"<a id=\"last\"></a><table  style=\"width:190px;\" height=85 border=0 cellpading=0 cellspacing=0>";while ($donnees = mysql_fetch_array($reponse) ){$pseudo = $donnees['pseudo'];$id = $donnees['id'];$message = $donnees['message'];$message = stripslashes($message);$message = nl2br($message);    $message = preg_replace('!\[b\](.+)\[/b\]!isU', '<strong>$1</strong>', $message);    $message = preg_replace('!\[i\](.+)\[/i\]!isU', '<em>$1</em>', $message);	$message = preg_replace('!\[u\](.+)\[/u\]!isU', '<u>$1</u>', $message);	$message = preg_replace('!\[color=(red|green|blue|yellow|purple|olive)\](.+)\[/color\]!isU', '<span style="color:$1">$2</span>', $message);	$message = preg_replace('!\:(happy|sad|hehe|huh|tirlang|dry|rolleyes|cool|biggrin|laugh|mad|ph34r|blink):!isU', '<img src="smiley/$1.gif">', $message);	echo"<tr><td style=\"width:200px;\" valign=middle align=justify><b>";echo"$pseudo"; echo" :</b> $message<br><font color==#845d29>..............................................................................................</td></tr>";}echo"</table>";mysql_close();}?>