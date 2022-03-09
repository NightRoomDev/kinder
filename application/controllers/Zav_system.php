<?
class Zav_system extends CI_Controller{

	public function index()
	{	
	
		$this->load->model('groupp_model');

		$data['select_groupp'] = $this->groupp_model->select_groupp();

		$this->load->view('head');
		$this->load->view('navbar_zav_system');
		$this->load->view('sved_groupp', $data);
		$this->load->view('footer');

	}

	public function sved_med_cart_childred() {

		$this->load->model('groupp_model');
		$this->load->model('cheildren_model');

		$data['select_groupp'] = $this->groupp_model->select_groupp();

		if (!empty($_POST)) {
			
			$data['children_svedenia'] = $this->cheildren_model->children_svedenia($_POST['id_cheildren']);

		}

		$this->load->view('head');
		$this->load->view('navbar_zav_system');
		$this->load->view('sved_med_cart_childred', $data);
		$this->load->view('footer');

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
    
    public function spiski_po_groupp() {

		$this->load->view('head');
		$this->load->view('navbar_zav_system');
		$this->load->view('vvod_prikazov');
		$this->load->view('footer');

    }
    
    public function svod_attendance() {

		$this->load->view('head');
		$this->load->view('navbar_zav_system');
		$this->load->view('vvod_prikazov');
		$this->load->view('footer');

    }
    
    public function info_missing() {

	$this->load->model('Med_cart_model');

    	if (!empty($_POST)) {

    		$sql = "select groupp.name_groupp, count(cheildren.id_Cheildren) as kol_chl, (select count(cheildren.id_Cheildren) as kol_chl_ot from cheildren, tabel, cause WHERE cheildren.id_Cheildren = tabel.id_cheildren and cause.id_cause = tabel.id_cause) kolv1, (COUNT(cheildren.id_Cheildren) * (select count(cheildren.id_Cheildren) as kol_chl_ot from cheildren, tabel, cause WHERE cheildren.id_Cheildren = tabel.id_cheildren and cause.id_cause = tabel.id_cause) / 100) as procent_ot, (select count(cheildren.id_Cheildren) as kol_chl_ot from cheildren, tabel, cause WHERE cheildren.id_Cheildren = tabel.id_cheildren and cause.id_cause = tabel.id_cause and cause.name_cause = 'ОРВИ') as kolv2, (COUNT(cheildren.id_Cheildren) * (select count(cheildren.id_Cheildren) as kol_chl_ot from cheildren, tabel, cause WHERE cheildren.id_Cheildren = tabel.id_cheildren and cause.id_cause = tabel.id_cause and cause.name_cause = 'ОРВИ') / 100) as procent_ot_orvi from cheildren, groupp, tabel, cause, med_cart WHERE cheildren.id_groupp = groupp.id_groupp and tabel.id_cheildren = cheildren.id_Cheildren and tabel.id_cause = cause.id_cause and med_cart.id_Сheildren = cheildren.id_Cheildren and med_cart.date_nach >= '".$_POST['date1']."' and med_cart.date_kon <= '".$_POST['date2']."' GROUP BY name_groupp";

    	} else {

    		$sql = "select groupp.name_groupp, count(cheildren.id_Cheildren) as kol_chl, (select count(cheildren.id_Cheildren) as kol_chl_ot from cheildren, tabel, cause WHERE cheildren.id_Cheildren = tabel.id_cheildren and cause.id_cause = tabel.id_cause) kolv1, (COUNT(cheildren.id_Cheildren) * (select count(cheildren.id_Cheildren) as kol_chl_ot from cheildren, tabel, cause WHERE cheildren.id_Cheildren = tabel.id_cheildren and cause.id_cause = tabel.id_cause) / 100) as procent_ot, (select count(cheildren.id_Cheildren) as kol_chl_ot from cheildren, tabel, cause WHERE cheildren.id_Cheildren = tabel.id_cheildren and cause.id_cause = tabel.id_cause and cause.name_cause = 'ОРВИ') as kolv2, (COUNT(cheildren.id_Cheildren) * (select count(cheildren.id_Cheildren) as kol_chl_ot from cheildren, tabel, cause WHERE cheildren.id_Cheildren = tabel.id_cheildren and cause.id_cause = tabel.id_cause and cause.name_cause = 'ОРВИ') / 100) as procent_ot_orvi from cheildren, groupp, tabel, cause, med_cart WHERE cheildren.id_groupp = groupp.id_groupp and tabel.id_cheildren = cheildren.id_Cheildren and tabel.id_cause = cause.id_cause and med_cart.id_Сheildren = cheildren.id_Cheildren GROUP BY name_groupp";

    	}	

    	$data['info_missing'] = $this->Med_cart_model->template_report($sql);

		$this->load->view('head');
		$this->load->view('navbar_zav_system');
		$this->load->view('info_missing', $data);
		$this->load->view('footer');

    }
    
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
		$this->load->view('navbar_zav_system');
		$this->load->view('analiz_zabolev', $data);
    }

    public function analiz_zdorov()
	{

		$this->load->model('med_cart_model');

		$data['zdorow']=$this->med_cart_model->analiz_zdorov();

		$this->load->view('head');
		$this->load->view('navbar_zav_system');
		$this->load->view('analiz_zdorov', $data);
		$this->load->view('footer');
    }
    
    public function haracter_zabolev()
	{

		$this->load->model('Med_cart_model');

		if (!empty($_POST)) {

			$sql = "SELECT name_groupp, count(cheildren.id_Cheildren) as kol_chl, sum(datediff(date_kon, date_nach)) as sum_days, (sum(datediff(date_kon, date_nach)) / count(cheildren.id_Cheildren)) as day_one_chl FROM cheildren, groupp, med_cart where cheildren.id_groupp = groupp.id_groupp and cheildren.id_Cheildren = med_cart.id_Сheildren and date_nach >= '".$_POST['date1']."' and date_kon <= '".$_POST['date2']."' GROUP BY name_groupp";

		} else {

			$sql = "SELECT name_groupp, count(cheildren.id_Cheildren) as kol_chl, sum(datediff(date_kon, date_nach)) as sum_days, (sum(datediff(date_kon, date_nach)) / count(cheildren.id_Cheildren)) as day_one_chl FROM cheildren, groupp, med_cart where cheildren.id_groupp = groupp.id_groupp and cheildren.id_Cheildren = med_cart.id_Сheildren GROUP BY name_groupp";

		}

		$data['haracter_zabolev'] = $this->Med_cart_model->template_report($sql);

		$this->load->view('head');
		$this->load->view('navbar_zav_system');
		$this->load->view('haracter_zabolev', $data);
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
		$this->load->view('navbar_zav_system');
		$this->load->view('info_attendance', $data);
		$this->load->view('footer');

    }


	public function out() {

		$this->session->unset_userdata('username');
		redirect('main/index');

	}

}
?>