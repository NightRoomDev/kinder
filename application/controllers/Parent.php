<?
class Parent extends CI_Controller{

	public function index()
	{	
		$this->load->view('head');
		$this->load->view('navbar_parent');
		$this->load->view('info_childern');
	}

	public function insert_message() {

		$this->load->view('head');
		$this->load->view('navbar_parent');
		$this->load->view('message');

	}
	public function out() {

		$this->session->unset_userdata('username');
		redirect('main/index');

	}
}
?>