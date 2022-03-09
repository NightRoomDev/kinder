<?
class Sekretar extends CI_Controller{

	public function index()
	{	
	
		$this->load->model('groupp_model');

		$data['select_groupp'] = $this->groupp_model->select_groupp();

		$this->load->view('head');
		$this->load->view('navbar_sekretar');
		$this->load->view('sved_groupp', $data);
		$this->load->view('footer');

	}

	public function vvod_prikazov() {

		$this->load->model('Worker_model');
		$this->load->model('Groupp_model');

		if (!empty($_POST)) {

			$chars="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";
            $max=10; 
            $size=StrLen($chars)-1;
            $password=null; 
            while($max--) 
            	$password.=$chars[rand(0,$size)]; 

            if ($_POST['dolgn'] != 'Воспитатель') {

			$data['insert_worker'] = $this->Worker_model->insert_worker($_POST['FIO'], $_POST['login'], $password, $_POST['tel'], $_POST['dolgn'], NULL);

            } else {

			$data['insert_worker'] = $this->Worker_model->insert_worker($_POST['FIO'], $_POST['login'], $password, $_POST['tel'], $_POST['dolgn'], $_POST['id_groupp']);

            }


			// var_dump($$data['insert_worker']);

		}

		$data['select_worker'] = $this->Worker_model->select_worker();
		$data['select_groupp'] = $this->Groupp_model->select_groupp();

    	$this->load->view('head');
		$this->load->view('navbar_sekretar');
		$this->load->view('vvod_prikazov', $data);
		$this->load->view('footer');

    }
    
    public function update_private_data_page() {

    	$this->load->model('groupp_model');
    	$this->load->model('cheildren_model');

    	$data['select_groupp'] = $this->groupp_model->select_groupp();
    	$data['select_cheildren'] = $this->cheildren_model->select_cheildren();

		$this->load->view('head');
		$this->load->view('navbar_sekretar');
		$this->load->view('update_private_data', $data);
		$this->load->view('footer');


    }

    public function update_private_data() {

    	$this->load->model('cheildren_model');

    	if (!empty($_POST['add'])) {

    	$data['update_private_data'] = $this->cheildren_model->update_private_data($_POST['surname_c'], $_POST['name_c'], $_POST['patronymic_c'], $_POST['date_birthday'], $_POST['rost'], $_POST['ves'], $_POST['pol'], $_POST['id_cheildren']);
    	redirect('Sekretar/update_private_data_page');

    	}

    }
    
    public function spiski_po_groupp() {

		$this->load->view('head');
		$this->load->view('navbar_sekretar');
		$this->load->view('spiski_po_groupp');
		$this->load->view('footer');

    }
    
    public function info_missing() {

    	$this->load->model('med_cart_model');

    	if (!empty($_POST)) {

    		$sql = "select groupp.name_groupp, count(cheildren.id_Cheildren) as kol_chl, (select count(cheildren.id_Cheildren) as kol_chl_ot from cheildren, tabel, cause WHERE cheildren.id_Cheildren = tabel.id_cheildren and cause.id_cause = tabel.id_cause) kolv1, (COUNT(cheildren.id_Cheildren) * (select count(cheildren.id_Cheildren) as kol_chl_ot from cheildren, tabel, cause WHERE cheildren.id_Cheildren = tabel.id_cheildren and cause.id_cause = tabel.id_cause) / 100) as procent_ot, (select count(cheildren.id_Cheildren) as kol_chl_ot from cheildren, tabel, cause WHERE cheildren.id_Cheildren = tabel.id_cheildren and cause.id_cause = tabel.id_cause and cause.name_cause = 'ОРВИ') as kolv2, (COUNT(cheildren.id_Cheildren) * (select count(cheildren.id_Cheildren) as kol_chl_ot from cheildren, tabel, cause WHERE cheildren.id_Cheildren = tabel.id_cheildren and cause.id_cause = tabel.id_cause and cause.name_cause = 'ОРВИ') / 100) as procent_ot_orvi from cheildren, groupp, tabel, cause, med_cart WHERE cheildren.id_groupp = groupp.id_groupp and tabel.id_cheildren = cheildren.id_Cheildren and tabel.id_cause = cause.id_cause and med_cart.id_Сheildren = cheildren.id_Cheildren and med_cart.date_nach >= '".$_POST['date1']."' and med_cart.date_kon <= '".$_POST['date2']."' GROUP BY name_groupp";

    	} else {

    		$sql = "select groupp.name_groupp, count(cheildren.id_Cheildren) as kol_chl, (select count(cheildren.id_Cheildren) as kol_chl_ot from cheildren, tabel, cause WHERE cheildren.id_Cheildren = tabel.id_cheildren and cause.id_cause = tabel.id_cause) kolv1, (COUNT(cheildren.id_Cheildren) * (select count(cheildren.id_Cheildren) as kol_chl_ot from cheildren, tabel, cause WHERE cheildren.id_Cheildren = tabel.id_cheildren and cause.id_cause = tabel.id_cause) / 100) as procent_ot, (select count(cheildren.id_Cheildren) as kol_chl_ot from cheildren, tabel, cause WHERE cheildren.id_Cheildren = tabel.id_cheildren and cause.id_cause = tabel.id_cause and cause.name_cause = 'ОРВИ') as kolv2, (COUNT(cheildren.id_Cheildren) * (select count(cheildren.id_Cheildren) as kol_chl_ot from cheildren, tabel, cause WHERE cheildren.id_Cheildren = tabel.id_cheildren and cause.id_cause = tabel.id_cause and cause.name_cause = 'ОРВИ') / 100) as procent_ot_orvi from cheildren, groupp, tabel, cause, med_cart WHERE cheildren.id_groupp = groupp.id_groupp and tabel.id_cheildren = cheildren.id_Cheildren and tabel.id_cause = cause.id_cause and med_cart.id_Сheildren = cheildren.id_Cheildren GROUP BY name_groupp";

    	}	

    	$data['info_missing'] = $this->med_cart_model->template_report($sql);

		$this->load->view('head');
		$this->load->view('navbar_sekretar');
		$this->load->view('info_missing', $data);
		$this->load->view('footer');

    }
    
    public function info_attendance() {


    	$this->load->model('med_cart_model');

    	if (!empty($_POST)) {

    		$sql = "SELECT groupp.plan_count_cheildren, (groupp.plan_count_cheildren * 30) AS pp, (COUNT(cheildren.id_Cheildren) * 30) as fp, (count(cheildren.id_Cheildren) * (select count(tabel.id_cheildren) from cheildren, tabel where cheildren.id_Cheildren = tabel.id_cheildren and tabel.status = 'был')) as detoday, (select count(tabel.id_cheildren) from cheildren, tabel, groupp where cheildren.id_Cheildren = tabel.id_cheildren and groupp.id_groupp = cheildren.id_groupp and tabel.status = 'отсутствовал') as vsego, (SELECT COUNT(cheildren.id_Cheildren) from cheildren, tabel, cause where cheildren.id_Cheildren = tabel.id_cheildren and tabel.id_cause = cause.id_cause and cause.name_cause = 'Болеет') as boleet, (SELECT COUNT(cheildren.id_Cheildren) from cheildren, tabel, cause where cheildren.id_Cheildren = tabel.id_cheildren and tabel.id_cause = cause.id_cause and cause.name_cause = 'Метотвод') as metotvod, (SELECT COUNT(cheildren.id_Cheildren) from cheildren, tabel, cause where cheildren.id_Cheildren = tabel.id_cheildren and tabel.id_cause = cause.id_cause and cause.name_cause = 'Нет причины') as net, (SELECT COUNT(cheildren.id_Cheildren) from cheildren, tabel, cause where cheildren.id_Cheildren = tabel.id_cheildren and tabel.id_cause = cause.id_cause and cause.name_cause = 'По заявлению родителей') as roditeli FROM groupp, med_cart, tabel, cause, vid_zabolevania, cheildren where groupp.id_groupp = cheildren.id_groupp and cheildren.id_Cheildren = tabel.id_cheildren and cause.id_cause = tabel.id_cause and med_cart.id_Сheildren = med_cart.id_Сheildren and med_cart.id_zabolevania = vid_zabolevania.id_zabolevania and med_cart.date_nach >= '".$_POST['date1']."' and med_cart.date_kon <= '".$_POST['date2']."' GROUP BY plan_count_cheildren";

    	} else {

    		$sql = "SELECT groupp.plan_count_cheildren, (groupp.plan_count_cheildren * 30) AS pp, (COUNT(cheildren.id_Cheildren) * 30) as fp, (count(cheildren.id_Cheildren) * (select count(tabel.id_cheildren) from cheildren, tabel where cheildren.id_Cheildren = tabel.id_cheildren and tabel.status = 'был')) as detoday, (select count(tabel.id_cheildren) from cheildren, tabel, groupp where cheildren.id_Cheildren = tabel.id_cheildren and groupp.id_groupp = cheildren.id_groupp and tabel.status = 'отсутствовал') as vsego, (SELECT COUNT(cheildren.id_Cheildren) from cheildren, tabel, cause where cheildren.id_Cheildren = tabel.id_cheildren and tabel.id_cause = cause.id_cause and cause.name_cause = 'Болеет') as boleet, (SELECT COUNT(cheildren.id_Cheildren) from cheildren, tabel, cause where cheildren.id_Cheildren = tabel.id_cheildren and tabel.id_cause = cause.id_cause and cause.name_cause = 'Метотвод') as metotvod, (SELECT COUNT(cheildren.id_Cheildren) from cheildren, tabel, cause where cheildren.id_Cheildren = tabel.id_cheildren and tabel.id_cause = cause.id_cause and cause.name_cause = 'Нет причины') as net, (SELECT COUNT(cheildren.id_Cheildren) from cheildren, tabel, cause where cheildren.id_Cheildren = tabel.id_cheildren and tabel.id_cause = cause.id_cause and cause.name_cause = 'По заявлению родителей') as roditeli FROM groupp, med_cart, tabel, cause, vid_zabolevania, cheildren where groupp.id_groupp = cheildren.id_groupp and cheildren.id_Cheildren = tabel.id_cheildren and cause.id_cause = tabel.id_cause and med_cart.id_Сheildren = med_cart.id_Сheildren and med_cart.id_zabolevania = vid_zabolevania.id_zabolevania GROUP BY plan_count_cheildren";

    	}


    	$data['info_attendance'] = $this->med_cart_model->template_report($sql);

		$this->load->view('head');
		$this->load->view('navbar_sekretar');
		$this->load->view('info_attendance', $data);
		$this->load->view('footer');

    }
    
    public function add_cheildren() {
		
		$this->load->model('cheildren_model');
		$data['cheildrens']  = $this->cheildren_model->cheildrens();
		$this->load->view('head');
		$this->load->view('navbar_sekretar');
		$this->load->model('groupp_model');
		$data['groupp'] = $this->groupp_model->select_groupp();
		$this->load->view('add_cheildren',$data);
		$this->load->view('footer');
		
		if (!empty($_POST['add']))
		{
			//$this->load->model('cheildren_model');
			
			$this->cheildren_model->add_cheildren($_POST['name_c'],$_POST['surname_c'],$_POST['patronymic_c'],$_POST['rost'],$_POST['id_groupp'], $_POST['date_birthday'], $_POST['ves'], $_POST['pol']);
			redirect('Sekretar/add_cheildren');
		}
		if (!empty($_POST['add_p'])) 
		{
			redirect('Sekretar/sved_o_parents');
		}
		
				
	}

    public function add_groupp() {

		$this->load->view('head');
		$this->load->view('navbar_sekretar');
		//выберем все группы
				$this->load->model('groupp_model');
						if (!empty($_POST))
		{
			$this->groupp_model->add_groupp($_POST['name_groupp'],$_POST['plan_count_cheildren'],$_POST['tip_groupp']);

		}
		$data['groupp'] = $this->groupp_model->select_groupp();
		$this->load->view('add_groupp',$data);
		$this->load->view('footer');
		

	}
	public function sved_o_parents()
	{
		$this->load->model('cheildren_model');
		if (!empty($_POST))
		{

			     $chars="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";
                 $max=10; 
                 $size=StrLen($chars)-1;
                 $password=null; 
                 while($max--) 
                 $password.=$chars[rand(0,$size)]; 

			$this->cheildren_model->sved_o_parents($_POST['name'],$_POST['surname'],$_POST['patronymic'],$_POST['phone'],$_POST['mesto_work'],$_POST['position'],$_POST['e_mail'],$_POST['id_cheildren'], $_POST['login'], $password);

		}
  redirect('sekretar/add_cheildren');

	}

	public function sved_med_cart() {

		$this->load->model('cheildren_model');

		if (!empty($_POST)) {


			$this->cheildren_model->sved_med_cart($_POST['groupp_heal'], $_POST['date'], $_POST['deviation'], $_POST['id_med_cart'], $_POST['disease']);

		}

		redirect('sekretar/add_cheildren');

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

	public function children_date_for_inputs() {

		$this->load->model('cheildren_model');

		$str_children_date_for_inputs = '';

		if (!empty($_POST)) {

			$data['children_date_for_inputs'] = $this->Cheildren_model->children_date_for_inputs($_POST['id_cheildren']);

			foreach ($data['children_date_for_inputs'] as $item) {

				$str_children_date_for_inputs .= '<div class="col-lg-4">';
	            $str_children_date_for_inputs .= '<div class="form-group">';
				$str_children_date_for_inputs .= '<label for="surname_c">Фамилия</label>';
				$str_children_date_for_inputs .= '<input type="text" class="form-control" name="surname_c" id="surname_c" placeholder="Фамилия" value="'.$item['surname_c'].'">';
	            $str_children_date_for_inputs .= '</div>';
	            $str_children_date_for_inputs .= '</div>';

	            $str_children_date_for_inputs .= '<div class="col-lg-4">';
	            $str_children_date_for_inputs .= '<div class="form-group">';
				$str_children_date_for_inputs .= '<label for="name_c">Имя</label>';
				$str_children_date_for_inputs .= '<input type="text" class="form-control" name="name_c" id="name_c" placeholder="Имя" value="'.$item['name_c'].'">';
	            $str_children_date_for_inputs .= '</div>';
	            $str_children_date_for_inputs .= '</div>';

	           	$str_children_date_for_inputs .= '<div class="col-lg-4">';
	            $str_children_date_for_inputs .= '<div class="form-group">';
				$str_children_date_for_inputs .= '<label for="patronymic_c">Отчество</label>';
				$str_children_date_for_inputs .= '<input type="text" class="form-control" name="patronymic_c" id="patronymic_c" placeholder="Отчество" value="'.$item['patronymic_c'].'">';
	            $str_children_date_for_inputs .= '</div>';
	            $str_children_date_for_inputs .= '</div>';

				$str_children_date_for_inputs .= '<div class="col-lg-4">';
	            $str_children_date_for_inputs .= '<div class="form-group">';
				$str_children_date_for_inputs .= '<label for="rost">Рост</label>';
				$str_children_date_for_inputs .= '<input type="text" class="form-control" name="rost" id="rost" placeholder="Рост" value="'.$item['rost'].'">';
	            $str_children_date_for_inputs .= '</div>';
	            $str_children_date_for_inputs .= '</div>';


				$str_children_date_for_inputs .= '<div class="col-lg-4">';
	            $str_children_date_for_inputs .= '<div class="form-group">';
				$str_children_date_for_inputs .= '<label for="ves">Вес</label>';
				$str_children_date_for_inputs .= '<input type="text" class="form-control" name="ves" id="ves" placeholder="Вес" value="'.$item['ves'].'">';
	            $str_children_date_for_inputs .= '</div>';
	            $str_children_date_for_inputs .= '</div>';

	            $str_children_date_for_inputs .= '<div class="col-lg-4">';
	            $str_children_date_for_inputs .= '<div class="form-group">';
				$str_children_date_for_inputs .= '<label for="pol">Пол</label>';
				$str_children_date_for_inputs .= '<input type="text" class="form-control" name="pol" id="pol" placeholder="Пол" value="'.$item['pol'].'">';
	            $str_children_date_for_inputs .= '</div>';
	            $str_children_date_for_inputs .= '</div>';

	            $str_children_date_for_inputs .= '<div class="col-lg-4">';
	            $str_children_date_for_inputs .= '<div class="form-group">';
				$str_children_date_for_inputs .= '<label for="date_birthday">Дата рождения</label>';
				$str_children_date_for_inputs .= '<input type="date" class="form-control" id="date_birthday" name="date_birthday" value="'.$item['date_birthday'].'">';
	            $str_children_date_for_inputs .= '</div>';
	            $str_children_date_for_inputs .= '</div>';

	            $str_children_date_for_inputs .= '<div class="col-lg-2">';
				$str_children_date_for_inputs .= '<div class="form-group">';
				$str_children_date_for_inputs .= '<label style="visibility: hidden;">as</label>';
				$str_children_date_for_inputs .= '<input type="submit" name="add" class="btn btn-success form-control" value="Изменить">';
				$str_children_date_for_inputs .= '</div>';
				$str_children_date_for_inputs .= '</div>';

			}

		}

		echo $str_children_date_for_inputs;

	}


    public function update_status_chl() {

    	$this->load->model('cheildren_model');	

    	if (!empty($_POST)) {

	    	$data['update_status_chl'] = $this->cheildren_model->update_status_chl($_POST['id_cheildren']);
	    	redirect('sekretar/add_cheildren');

    	}

    }


    public function list_bol_children() {

    	$this->load->model('Med_cart_model');
    	$this->load->model('groupp_model');

    	if (!empty($_POST)) {

    		if ($_POST['date1'] != "" && $_POST['date2'] != "") {

    			$sql = "select name_c, surname_c, naim_zabolevania, date_nach, date_kon from cheildren, cause, med_cart, tabel, vid_zabolevania, groupp where med_cart.id_Сheildren = cheildren.id_Cheildren and tabel.id_cause = cause.id_cause and tabel.id_cheildren = cheildren.id_Cheildren and vid_zabolevania.id_zabolevania = med_cart.id_zabolevania and groupp.id_groupp = cheildren.id_groupp and date_nach >= '".$_POST['date1']."' and date_kon <= '".$_POST['date2']."'";

    		}

    		if ($_POST['id_groupp'] != 0) {

    		 	$sql = "select name_c, surname_c, naim_zabolevania, date_nach, date_kon from cheildren, cause, med_cart, tabel, vid_zabolevania, groupp where med_cart.id_Сheildren = cheildren.id_Cheildren and tabel.id_cause = cause.id_cause and tabel.id_cheildren = cheildren.id_Cheildren and vid_zabolevania.id_zabolevania = med_cart.id_zabolevania and groupp.id_groupp = cheildren.id_groupp and cheildren.id_groupp = ".$_POST['id_groupp'];	

    		}



    	} else {

    		$sql = "select name_c, surname_c, naim_zabolevania, date_nach, date_kon from cheildren, cause, med_cart, tabel, vid_zabolevania, groupp where med_cart.id_Сheildren = cheildren.id_Cheildren and tabel.id_cause = cause.id_cause and tabel.id_cheildren = cheildren.id_Cheildren and vid_zabolevania.id_zabolevania = med_cart.id_zabolevania and groupp.id_groupp = cheildren.id_groupp";

    	}

    	$data['list_bol_children'] = $this->Med_cart_model->template_report($sql);
    	$data['select_groupp'] = $this->groupp_model->select_groupp();

    	$this->load->view('head');
		$this->load->view('navbar_sekretar');
		$this->load->view('list_bol_children', $data);
		$this->load->view('footer');

    }











	
public function out() {

		$this->session->unset_userdata('username');
		redirect('main/index');

	}

}
?>