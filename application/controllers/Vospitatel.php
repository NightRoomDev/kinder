<?
class Vospitatel extends CI_Controller{

	public function index()
	{	

		$this->load->model('groupp_model');
		$this->load->model('cheildren_model');

		$data['select_groupp_id'] = $this->groupp_model->select_groupp_id($this->session->userdata('id_groupp'));

		if (!empty($_POST)) {
			
			$data['children_svedenia'] = $this->cheildren_model->children_svedenia($_POST['id_cheildren']);

		}
	
		$this->load->view('head');
		$this->load->view('navbar_vospitatel');
		$this->load->view('watch_cheildren', $data);
		$this->load->view('footer');

	}


	public function message_vospet() {

		$this->load->model('message_model');

		$data['message_vospet'] = $this->message_model->message_vospet($this->session->userdata('id_groupp'));

		$this->load->view('head');
		$this->load->view('navbar_vospitatel');
		$this->load->view('message_vospet', $data);	
		$this->load->view('footer');

	}
    
    public function watch_cheildren() {

		$this->load->view('head');
		$this->load->view('navbar_vospitatel');
		$this->load->view('watch_cheildren');
		$this->load->view('footer');

    }
    // Ввод табеля
    public function add_table() {

		$this->load->model('tabel_model');
		
		if (!empty($_POST))
		{
		// Выбор списка детеей для заполнения табеля
			$data['cheildren'] = $this->tabel_model->search($_POST['id_groupp'], $_POST['datet']);
		
			$data['datet'] = $_POST['datet'];	

		}


		$this->load->model('groupp_model');
		$this->load->model('cause_model');
		
		$this->load->view('head');
		$this->load->view('navbar_vospitatel');


		$data['groupp'] = $this->groupp_model->select_groupp();		
		
		$data['cause'] = $this->cause_model->select_cause();
		$this->load->view('add_table',$data);
		$this->load->view('footer');
	
	}

	public function insert_tabel()
	{
		$this->load->model('tabel_model');
		$str = '<thead><tr><th scope="col">Ребенок</th><th scope="col">Стаус(был/отсутствовал)</th><th scope="col">Причина</th><th scope="col">Изменить</th></tr></thead>';
		$str = '<tbody>';



				
		if (!empty($_POST))
		{

			// $data['exists_table'] = $this->tabel_model->exists_table($_POST['id_cheildren']);

			// if ($data['exists_table'] == 0) {

					$this->tabel_model->insert_tabel($_POST['id_cheildren'],$_POST['status'],$_POST['id_cause'],$_POST['datet']);
					$data['cheildren'] = $this->tabel_model->search($_POST['id_groupp'], $_POST['datet']);	
					
						$datet = $_POST['datet'];	
					
						foreach ($data['cheildren'] as $item) { 

							$str.= '<tr class="table-tr">';  
							$str.= '<td>'.$item['surname_c'].' '.$item['name_c'].' '.$item['patronymic_c'].'</td>'; 
							$str.= '<td>'.$item['status'].'</td>'; 
							$str.= '<td>'.$item['name_cause'].'</td>'; 
							$str.= '<td><button type="button" class="btn btn-success updateModal " data-toggle="modal" data-target="#updateModal" data-id_cheildren="'.$item['id_Cheildren'].'" data-datet="'.$datet.'" data-id_groupp="'.$item['id_groupp'].'" >Изменить</button></td>';
							$str.= '</tr>';

						}	
					
				}

				$str.='</tbody>';
				echo $str;

	}

public function update_tabel()
{
	$this->load->model('tabel_model');
}





	public function children_from_groupp() {

		$this->load->model('cheildren_model');

		$str_child = '';

		if (!empty($_POST)) {

			$data['children_from_groupp'] = $this->cheildren_model->children_from_groupp($_POST['id_groupp']);

			foreach ($data['children_from_groupp'] as $item) {
	
				$str_child .= '<option value='.$item['id_Cheildren'].'>'.$item['surname_c'].' '.$item['name_c'].'</option>';
	
			} 	

		}

		echo $str_child;

	}
    
  
	public function out() {

		$this->session->unset_userdata('role');
		redirect('main/index');

	}


}
?>