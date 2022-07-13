<?php
class Players_model extends CI_Model
{

	public function add_player($data)
	{
		return $this->db->insert('players_table', $data);
	}

	public function start_tournament()
	{


		$query = $this->db->get('players_table');
		$result_pt = $query->result();

		$query_scores = $this->db->get('scores');
		$result_scores = $query_scores->result();

		$n = count($result_scores);

		$passed = [];

		if (empty($result_scores)) {

			foreach ($result_pt as $key => $players) {

				foreach ($result_pt as $key2 => $players2) {

					if ($key != $key2 && !isset($array[$key][$key2]) && !in_array($key2, $passed)) {

						$array[$key][$key2] = $players->players.'-'.$players2->players;

						$passed[] = $key;


						$data = [
							'players_1' => $players->id,

							'players_2' => $players2->id
						];

						$this->db->insert('scores', $data);


					}
				}
			}
		}
	}


	public function get_table()
	{


		$this->db->select('scores.*,`player1`.`players` as `player1name`,`player2`.`players` as `player2name`, `winner`.`players` as `winnerPlayer`');
		$this->db->from('scores');
		$this->db->join('players_table as player1', '`scores`.`players_1` = `player1`.`id`', 'left outer');
		$this->db->join('players_table as player2', '`scores`.`players_2` = `player2`.`id`', 'left outer');
		$this->db->join('players_table as winner',  '`scores`.`winner_player_id` = `winner` .`id`', 'left outer');

		$query = $this->db->get();

		return $query->result_array();

	}



	public function update_result()
	{

		//взимам стойностите на 'result'

		$result = $this->input->post('result');
		$result2 = $this->input->post('result2');
		$scores_id = $this->input->post('scores_id');


		if (!is_null($result) && !is_null($result2)) {
			if ((int)$result == (int)$result2) {
				redirect('players/result/'.$this->input->post('scores_id'));
				}
			}
		if ((int)$result > (int)$result2) {

			$names = 'players_1';
		} else {
			$names = 'players_2';
		}


		$this->db->set('score', $result . ':' . $result2);
		$this->db->set('winner_player_id', $names,false);
		$this->db->where('id', $scores_id);



		return $this->db->update('scores');
	}




	public function winner(){


		$this->db->select('winner_player_id');
		$query = $this->db->get('scores');
		$result = $query->result();
		$result = json_decode(json_encode($result), true);

		$nov = [];
		foreach ($result as $keyresult => $valueresult){
			$nov[] = $valueresult['winner_player_id'];
		}

		$countWinners = array_count_values($nov);
		arsort($countWinners);
		$winner = array_slice(array_keys($countWinners), 0, 1, true);

		$this->db->select('players');
		$this->db->where('id',$winner[0]);
		$result = $this->db->get('players_table');
		return $this->db->get($result);

		redirect(base_url());

	}
}
