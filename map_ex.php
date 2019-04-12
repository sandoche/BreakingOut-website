<?php


    $compteurX = 0;
    $compteurY = 50;
                                               
    $finX = 50;
    $finY = 0;
                                                                                     
    $debutX = 0;

echo "<head>
<style type='text/css'>
<!--
#Layer1 {
	visibility:hidden;
	position:absolute;
	width:250px;
	height:250px;
	z-index:1;
	background-image: url(images/hover3.png);
	left: 275px;
	top: 275px;

}
-->
</style>
</head>";	
	
	
    echo '<table id="map" align="left" border="0" width="800" height="800" >', "\n";
    while($compteurY >= $finY)
    {
        echo "\t\t", '<tr class="ligneMap">', "\n";
               
        while($compteurX <= $finX)
        {
		if($compteurX >= 5  && $compteurX <= 10 && $compteurY >= 5 && $compteurY <= 15){
		
		$basket++;
		
		if($basket < 10){
		$basket = "0$basket";
		}
		
		echo "\t\t\t", '<td class="caseMap" style="background-image: url(\'images/colorbasket_'.$basket.'.gif\')">';
		
		
		}
		elseif($compteurX >= 13  && $compteurX <= 37 && $compteurY >= 13 && $compteurY <= 37){
		
		
		if ($compteurX%2){
		if($compteurY%2){		
        echo "\t\t\t", '<td class="caseMap"  style="background-image: url(\'images/colormarche_01.gif\')">';
		}else{
		echo "\t\t\t", '<td class="caseMap" style="background-image: url(\'images/colormarche_03.gif\')">';
		}
		}else{
		if($compteurY%2){		
        echo "\t\t\t", '<td class="caseMap" style="background-image: url(\'images/colormarche_02.gif\')">';
		}else{
		echo "\t\t\t", '<td class="caseMap" style="background-image: url(\'images/colormarche_04.gif\')">';
		}
		}
		}
		elseif($compteurX >= 43  && $compteurX <= 50 && $compteurY >= 35 && $compteurY <= 50){
		
		
				if ($compteurX%2){
		if($compteurY%2){		
        echo "\t\t\t", '<td class="caseMap" style="background-image: url(\'images/colormuscu_01.gif\')">';
		}else{
		echo "\t\t\t", '<td class="caseMap" style="background-image: url(\'images/colormuscu_03.gif\')">';
		}
		}else{
		if($compteurY%2){		
        echo "\t\t\t", '<td class="caseMap" style="background-image: url(\'images/colormuscu_02.gif\')">';
		}else{
		echo "\t\t\t", '<td class="caseMap" style="background-image: url(\'images/colormuscu_04.gif\')">';
		}
		}
		}
		elseif($compteurX >= 10  && $compteurX <= 24 && $compteurY >= 48 && $compteurY <= 50){
		$douche++;
		
		if($douche < 10){
		$douche = "0$douche";
		}
		
		echo "\t\t\t", '<td class="caseMap" style="background-image: url(\'images/colordouche_'.$douche.'.gif\')">';
		}
		else{
		
		if ($compteurX%2){
		if($compteurY%2){		
        echo "\t\t\t", '<td class="caseMap" style="background-image: url(\'images/colorcour_01.gif\')">';
		}else{
		echo "\t\t\t", '<td class="caseMap" style="background-image: url(\'images/colorcour_03.gif\')">';
		}
		}else{
		if($compteurY%2){		
        echo "\t\t\t", '<td class="caseMap" style="background-image: url(\'images/colorcour_02.gif\')">';
		}else{
		echo "\t\t\t", '<td class="caseMap" style="background-image: url(\'images/colorcour_04.gif\')">';
		}
		
		}
		
		}


		
			


			echo '</td>', "\n";
            $compteurX++;


			
			
        }
                                                                             
        echo "\t\t", '</tr>', "\n";
        $compteurX = $debutX;
        $compteurY--;
    }
    echo '</table>';
	

?>