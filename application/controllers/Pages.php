<?php
class Pages extends CI_Controller
{
	public function view($page = 'draw')
	{

		if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
			show_404();
		}
		$data['info_players'] = $this->Players_model->get_table();

		$data['title'] = ucfirst($page);
		$data['copyright'] = 'Tennis Draw';

		$this->load->view('templates/header');
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer');
	}

}




