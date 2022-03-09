<?php
class Med_sistr extends CI_Controller{

	public function index()
	{

		$this->load->model('cheildren_model');
		$this->load->model('med_cart_model');
		$this->load->model('vid_zabolevnia');
		$this->load->model('groupp_model');

		$data['select_cheildren'] = $this->cheildren_model->select_cheildren();
		$data['visible_med_cart'] = $this->med_cart_model->visible_med_cart();
		$data['visible_viz_zabolev'] = $this->vid_zabolevnia->visible_viz_zabolev();
		$data['select_groupp'] = $this->groupp_model->select_groupp();


		$this->load->view('head');
		$this->load->view('navbar_med_sistr');
		$this->load->view('med_cart', $data);
		$this->load->view('footer');
		
    }

    public function filter_med_cart() {

		$this->load->model('med_cart_model');

		$filter_med_cart = '<thead class="thead-light""><tr><th scope="col">Ребенок</th><th scope="col">Группа здоровья</th><th scope="col">Отклонения</th><th scope="col">Заболевание</th><th scope="col">Тип записи</th><th scope="col">Текст записи</th><th scope="col">Дата начала</th><th scope="col">Дата окончания</th></tr></thead><tbody>';

		if (!empty($_POST)) {

			$data['filter_med_cart'] = $this->med_cart_model->filter_med_cart($_POST['naim_zabolevania']);

			foreach ($data['filter_med_cart'] as $item) {
				
				$filter_med_cart .= '<tr>';
				$filter_med_cart .= '<td>'.$item['surname_c'].' '.$item['name_c'].'</td>';
                $filter_med_cart .= '<td>'.$item['groupp_heal'].'</td>';
                $filter_med_cart .= '<td>'.$item['deviation'].'</td>';
                $filter_med_cart .= '<td>'.$item['naim_zabolevania'].'</td>';
                $filter_med_cart .= '<td>'.$item['tip_zapisi'].'</td>';
                $filter_med_cart .= '<td>'.$item['text_zapisi'].'</td>';
                $filter_med_cart .= '<td>'.$item['date_nach'].'</td>';
                $filter_med_cart .= '<td>'.$item['date_kon'].'</td>';
                $filter_med_cart .= '</tr>';

			}

		}  

		$filter_med_cart .= '</tbody>';
		echo $filter_med_cart;  
		// var_dump($filter_med_cart);	

    }

    public function filter_groupp_heal() {

		$this->load->model('med_cart_model');

		$filter_groupp_heal = '<thead class="thead-light"><tr><th scope="col">Ребенок</th><th scope="col">Группа здоровья</th><th scope="col">Отклонения</th><th scope="col">Заболевание</th><th scope="col">Дата начала</th><th scope="col">Дата окончания</th></tr></thead><tbody>';

		if (!empty($_POST)) {

			$data['filter_groupp_heal'] = $this->med_cart_model->filter_groupp_heal($_POST['groupp_heal_filter']);

			foreach ($data['filter_groupp_heal'] as $item) {
				
				$filter_groupp_heal .= '<tr>';
				$filter_groupp_heal .= '<td>'.$item['surname_c'].' '.$item['name_c'].'</td>';
				$filter_groupp_heal .= '<td>'.$item['groupp_heal'].'</td>';
				$filter_groupp_heal .= '<td>'.$item['deviation'].'</td>';
				$filter_groupp_heal .= '<td>'.$item['naim_zabolevania'].'</td>';
				$filter_groupp_heal .= '<td>'.$item['date_nach'].'</td>';
				$filter_groupp_heal .= '<td>'.$item['date_kon'].'</td>';
				$filter_groupp_heal .= '</tr>';

			}

		}  

		$filter_groupp_heal .= '</tbody>';
		echo $filter_groupp_heal;  

    }

    // Группа здоровья
    public function grouppHeal() 
    {

		$this->load->model('cheildren_model');
		$this->load->model('med_cart_model');
		$this->load->model('vid_zabolevnia');
		$this->load->model('groupp_model');	

    	$data['select_cheildren'] = $this->cheildren_model->select_cheildren();
		$data['visible_med_cart'] = $this->med_cart_model->visible_med_cart();
		$data['visible_viz_zabolev'] = $this->vid_zabolevnia->visible_viz_zabolev();
		$data['select_groupp'] = $this->groupp_model->select_groupp();

		$this->load->view('head');
		$this->load->view('navbar_med_sistr');
		$this->load->view('grouppHeal', $data);
		$this->load->view('footer');
    }

    // Анализ заболеваемости
    public function analiz_zabolev()
	{
		$data['analiz_zabolev'] = '';
		$this->load->model('med_cart_model');

		if (!empty($_POST)) {
			$date1=$_POST['date1'];
			$date2=$_POST['date2'];

		$data['obshee']= $this->med_cart_model->obshee($date1,$date2);
		$data['analiz_zabolev'] = $this->med_cart_model->analiz_zabolev($date1,$date2,$data['obshee']);
		}
		$this->load->view('head');
		$this->load->view('navbar_med_sistr');
		$this->load->view('analiz_zabolev', $data);
		$this->load->view('footer');
	
}

    // Анализ здоровья
    public function analiz_zdorov()
	{
		$this->load->model('med_cart_model');

		$data['zdorow']=$this->med_cart_model->analiz_zdorov();
		
		$this->load->view('head');
		$this->load->view('navbar_med_sistr');
		$this->load->view('analiz_zdorov',$data);
		$this->load->view('footer');

    }

    // Характер заболеваемости
    public function haracter_zabolev()
	{

		$this->load->model('med_cart_model');

		if (!empty($_POST)) {

			$sql = "SELECT name_groupp, count(cheildren.id_Cheildren) as kol_chl, sum(datediff(date_kon, date_nach)) as sum_days, (sum(datediff(date_kon, date_nach)) / count(cheildren.id_Cheildren)) as day_one_chl FROM cheildren, groupp, med_cart where cheildren.id_groupp = groupp.id_groupp and cheildren.id_Cheildren = med_cart.id_Сheildren and date_nach >= '".$_POST['date1']."' and date_kon <= '".$_POST['date2']."' GROUP BY name_groupp";

		} else {

			$sql = "SELECT name_groupp, count(cheildren.id_Cheildren) as kol_chl, sum(datediff(date_kon, date_nach)) as sum_days, (sum(datediff(date_kon, date_nach)) / count(cheildren.id_Cheildren)) as day_one_chl FROM cheildren, groupp, med_cart where cheildren.id_groupp = groupp.id_groupp and cheildren.id_Cheildren = med_cart.id_Сheildren GROUP BY name_groupp";

		}


		$data['haracter_zabolev'] = $this->med_cart_model->template_report($sql);

		$this->load->view('head');
		$this->load->view('navbar_med_sistr');
		$this->load->view('haracter_zabolev', $data);
		$this->load->view('footer');
		
	}
		
	public function add_spavka() {
			 
		$this->load->model('med_cart_model');

		if (!empty($_POST)) {

			$data['add_spavka'] = $this->med_cart_model->add_spavka($_POST['id_cheildren'], $_POST['date_nach'],$_POST['date_kon'], $_POST['id_zabolevania'], $_POST['tip_zapisi'], $_POST['text_zapisi']);

			redirect('Med_sistr/index');
				

		}
			
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

	// Изменение группы здоровья
	public function update_grouppHeal() {


		$this->load->model('med_cart_model');

		if (!empty($_POST)) {

			$data['update_grouppHeal'] = $this->med_cart_model->update_grouppHeal($_POST['groupp_heal'], $_POST['date_kon'], $_POST['id_cheildren']);
			redirect('Med_sistr/grouppHeal');

		}


	}
    
    // Страница сведений о мед процедурах
	public function med_procedure() {


		$this->load->model('cheildren_model');
		$this->load->model('med_cart_model');
		$this->load->model('vid_zabolevnia');
		$this->load->model('groupp_model');	

    	$data['select_cheildren'] = $this->cheildren_model->select_cheildren();
		$data['visible_med_cart_two'] = $this->med_cart_model->visible_med_cart_two();
		$data['visible_viz_zabolev'] = $this->vid_zabolevnia->visible_viz_zabolev();
		$data['select_groupp'] = $this->groupp_model->select_groupp();

		$this->load->view('head');
		$this->load->view('navbar_med_sistr');
		$this->load->view('med_procedure', $data);	
		$this->load->view('footer');	


	}

	public function filter_med_procedure() {

		$this->load->model('med_cart_model');

		$filter_med_procedure = '<thead class="thead-light"><tr><th scope="col">Ребенок</th><th scope="col">Группа здоровья</th><th scope="col">Отклонения</th><th scope="col">Тип записи</th><th scope="col">Текст записи</th><th scope="col">Дата начала</th><th scope="col">Дата окончания</th></tr></thead><tbody>';

		if (!empty($_POST)) {

			$data['filter_med_procedure'] = $this->med_cart_model->filter_med_procedure($_POST['med_procedure_name']);

			foreach ($data['filter_med_procedure'] as $item) {
				
			$filter_med_procedure .= '<tr>';
			$filter_med_procedure .= '<td>'.$item['surname_c'].' '.$item['name_c'].'</td>';
			$filter_med_procedure .= '<td>'.$item['groupp_heal'].'</td>';
			$filter_med_procedure .= '<td>'.$item['deviation'].'</td>';
			$filter_med_procedure .= '<td>'.$item['tip_zapisi'].'</td>';
			$filter_med_procedure .= '<td>'.$item['text_zapisi'].'</td>';
			$filter_med_procedure .= '<td>'.$item['date_nach'].'</td>';
			$filter_med_procedure .= '<td>'.$item['date_kon'].'</td>';
			$filter_med_procedure .= '</tr>';

			}

		}  

		$filter_med_procedure .= '</tbody>';
		echo $filter_med_procedure;  

    }

	// Ввод сведений о мед процедура
	public function add_med_procedure() {

		$this->load->model('med_cart_model');

		if (!empty($_POST)) {

			$data['add_med_procedure'] = $this->med_cart_model->add_med_procedure($_POST['tip_zapisi'], $_POST['text_zapisi'], $_POST['date_nach'], $_POST['id_cheildren']);
			redirect('Med_sistr/med_procedure');

		}

	}


	// Выход
	public function out() {

		$this->session->unset_userdata('username');
		redirect('main/index');

	}


}
?>