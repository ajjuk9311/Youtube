<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		load_view('dashboard');
	}

	function get_user_data(){
		$search = $this->input->get('search');

		$query = $this->db->select('name')
		->from('user_search')
		->like('name',$search,'after')
		->get();

		if($query->num_rows()>0){
			$data = $query->result_array();
		}else{
			$data = false;
		}

		echo json_encode($data);
	}

}
