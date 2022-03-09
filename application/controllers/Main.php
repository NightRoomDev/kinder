<?php
class Main extends CI_Controller{

	public function index()
	{
		$this->load->view('head'); 

		if ($this->session->has_userdata('role')) { 

		if ($this->session->userdata('role') == 'Секретарь') { 

			redirect('Sekretar/index');
		}

		if ($this->session->userdata('role') == 'Воспитатель') { 

			redirect('Vospitatel/index');

		}

		if ($this->session->userdata('role') == 'Мед.сестра') { 

			redirect('Med_sistr/index');

		}	

	if ($this->session->userdata('role') == 'Зав.системой') { 
		
		redirect('Zav_system/index');
	}
	
if (!empty($this->session->userdata('id_parent'))){ 
	
	redirect('parents/index');
	}	
		
		}
		else{

		$this->load->view('navbar');
		$this->load->view('content');
		$this->load->view('footer');
			
		}
			
} /*Проверка пользователя и доб. в сессию */
	
		public function contact()
	{
		$this->load->view('head');
		$this->load->view('navbar');
		$this->load->view('contacts');
		$this->load->view('footer');
	}

	public function registr()
	{
		$this->load->view('head');
		$this->load->model('cheildren_model');
		$data['cheildren'] = $this->cheildren_model->select_cheildren();
		$this->load->view('regist',$data);
		$this->load->view('footer');

		if(!empty($_POST))
		{
			$this->load->model('parent_model');
			$data['id_parent'] = $this->parent_model->add_parent($_POST['name'],$_POST['surname'],$_POST['patronymic'],$_POST['phone'],$_POST['login'],$_POST['password'],$_POST['id_Cheildren'], $_POST['mesto_work'], $_POST['position'], $_POST['email'], $_POST['stepen_rodstva']);
			//Записать в сессию username и пароль родитель id_parent
			$parent = array ( 
				'id_parent' => $data['id_parent'], 
		
		
		); 
		$this->session->set_userdata($parent); 
			
			redirect('parents/index');
			
		}
	
	}

	public function autoriz()
	{
		$data['message']= '';
		$this->load->view('head');
		//$this->load->view('autoriz');
		$this->load->view('autoriz',$data);
		$this->load->view('footer');
		$this->load->model('vhod');

		if (!empty($_POST)) { 

		$this->form_validation->set_rules('login','password','required'); 
		$this->form_validation->set_message('required','Поля %з не заполнены');
		
		$data['worker'] = $this->vhod->autoriz($_POST['login'],password_verify($_POST['password'],PASSWORD_DEFAULT)); 
		//проверка рабочих
		if (!empty($data['worker'])) { 
		$worker = array ( 
			'id_worker' => $data['worker']->id_worker, 
			'username' => $_POST['login'], 
			'password' => $_POST['password'],
			'role' => $data['worker']->role,
			'id_groupp' => $data['worker']->id_groupp
		
		); 
		$this->session->set_userdata($worker);
		redirect('Main/index'); 		
		}
		
		$data['parent'] = $this->vhod->autoriz_parent($_POST['login'],$_POST['password']); 
		//проверка родителей
		if (!empty($data['parent'])) { 
		$parent = array ( 
		'id_worker' => $data['parent']->id_parent, 
		'username' => $_POST['login'], 
		'password' => $_POST['password'],
		'id_Cheildren' => $data['parent']->id_Cheildren
		); 
		$this->session->set_userdata($parent); 
		redirect('Parents/insert_message'); 
		} 		





		else { 
		$data['message']='Пользователь не существует, либо проверьте правильность написания логина и пароля'; 
}
	
		
} /*Проверка пользователя и доб. в сессию */
	}		
		
		


	public function out() {

		$this->session->unset_userdata('role', 'id_parent');
		redirect('main/index');

	}


}
?>