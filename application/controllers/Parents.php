<?
class Parents extends CI_Controller{

	public function index()
	{	
	
		$this->load->model('parent_model');
		$this->load->model('Cheildren_model');

		$data['visible_fio'] = $this->parent_model->visible_fio($this->session->userdata('id_worker'));

		$data['info_childern'] = $this->Cheildren_model->info_childern($this->session->userdata('id_Cheildren'));
		$this->load->view('head');

		$this->load->view('navbar_parent', $data);
		$this->load->view('info_childern', $data);

	}

	public function insert_message() {

		$this->load->model('parent_model');

		$data['visible_fio'] = $this->parent_model->visible_fio($this->session->userdata('id_worker'));

		$this->load->view('head');
		$this->load->view('navbar_parent', $data);
		$this->load->model('cause_model');
		$this->load->model('Message_model');

		$data['cause'] = $this->cause_model->select_cause();
		$this->load->model('add_message');

		$data['message_my_children'] = $this->Message_model->message_my_children($this->session->userdata('id_Cheildren'));
		$this->load->view('message', $data);

		if(!empty($_POST)) {
			$this->load->model('message_model');
			$this->message_model->add_message($_POST['date_end_m'],$_POST['date_start_m'],$_POST['id_cause'],$_POST['text_message'], $this->session->userdata('id_worker'));
			redirect('Parents/insert_message');
		}
			
	}

	public function out() {

		$this->session->unset_userdata('username');
		redirect('main/index');

	}
}
?>