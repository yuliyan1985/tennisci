<?php

foreach ($players_table as $key => $players){
	foreach ($players as $playerkey=>$playervalue){
		echo  'And the winner is' . ' '  . $playervalue .  "\n" , '<br>';
	}
}

?>

