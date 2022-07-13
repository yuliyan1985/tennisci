<h1><center><?php echo $title; ?></center></h1>



<table class="table">
	<tr>
		<th>players_1</th>
		<th>players_2</th>
		<th>score</th>
		<th>winner</th>
	</tr>
<!--	Generirai redove-->

<?php
	foreach ($info_players as $players) {


	echo '<tr>';
		echo '<th>'.$players["player1name"].'</th>';
		echo '<th>'.$players["player2name"].'</th>';
		echo '<th>';
			if (empty($players['score'])){
		echo "<a href='".base_url('players/result/'.$players['id'])."' class='btn btn-info'>добави резултат за този мач</a> ";

			} else {
			echo "резултат: ".$players['score'];
			}

		echo '<th>' . $players['winnerPlayer'];
			echo '</th>';
		echo '</tr>';


	}
	?>
</table>














