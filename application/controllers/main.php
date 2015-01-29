<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
	}

	public function index()
	{
		//see if the 'counter' exits in the session
		if($this->session->userdata('counter'))
		{
			$counter = $this->session->userdata('counter');
			$this->session->set_userdata('counter', $counter+1);
		}
		else
		{
			$this->session->set_userdata('counter', 1);
		}
		// echo $this->session->userdata('counter');
		$this->load->view('index', array("counter"=>$this->session->userdata('counter')));
		
	}

	public function hello()
	{
		echo "came here!";
	}

	public function reset()
	{
		$this->session->set_userdata('counter', 0);
		redirect('/');
	}

}

//end of main controller