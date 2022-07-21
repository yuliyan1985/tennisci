<?php

class Players extends CI_Controller
{



	public function add()
	{


		$data['copyright'] = 'Tennis Draw';
		$data['title'] = 'Добави играч';

		$this->load->view('players/add', $data);
		$this->load->view('templates/footer');
	}


	public function create()
	{
		$this->form_validation->set_rules('player', 'player', 'required');
		if ($this->form_validation->run() === false) {
			redirect('/players/add');
		} else {
			$this->Players_model->add_player(['players' => $_POST['player']]);
			redirect('/pages/view');
		}
	}


	public function start()
	{
		$this->Players_model->start_tournament();
		redirect('/pages/view');
	}

	public function result($id)
	{

		$data = [
			'id' => $id,
		];

		$data['copyright'] = 'Tennis Draw';

		$this->load->view('players/scores', $data);
		$this->load->view('templates/footer');
	}

	public function result_update()
	{
		$this->Players_model->update_result();

		$this->db->from('scores');
		$this->db->where('score', '' );
		$rows = $this->db->count_all_results();


		if ($rows == 0) {
			redirect(base_url('players/winner'));
		}

		redirect(base_url());
	}


	public function winner()
	{
		$champion['players_table'] = $this->Players_model->winner();

		$this->load->view('players/winner', $champion);

	}

}




