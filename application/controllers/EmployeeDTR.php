<?php



class EmployeeDTR extends CI_Controller{


    function __construct(){
        parent::__construct();

        $this->load->helper('html');
         $this->load->model('EmployeeDTRModel', 'empdtr');
        $this->load->helper('url');
        $this->load->library('session');
    }
    
    public function index(){
        //  session_destroy();
		if (isset($_SESSION['user']['employee_id'])) {
            $data['db_id'] = $_SESSION['user']['db_id'];
            $data['employee_id'] = $_SESSION['user']['employee_id'];
			$data['first_name'] = $_SESSION['user']['f_name'];
            $data['last_name'] = $_SESSION['user']['s_name'];
            $data['category'] = $_SESSION['user']['category'];



            $data['employees_data'] = $this->empdtr->getEmployees();


            $this->load->view('employee_dtr', $data);
        } else {
            $data = array();

            $this->load->view('login', $data);
        }
    }



    public function insertTimeInData(){
        
        //$chartmap2_mode_fn2 = $this->uri->segment('3');
        $data['test'] = $this->input->post('time_in');

        

        // //pwede na ata tanggalin? tong first if
        // if($loc_level_sessdata_fn2 == null){
        //     $loc_sessdata_fn2 = array( 
        //         'cmap1cat_prodsupp'=>'seed'
        //      );   
        //     $this->session->set_userdata($loc_sessdata_fn2);

        //     $chartmap2data = $this->prodsupp->getChartMap1Data_singleDset('2021', 'reg', 3, $chartmap2_mode_fn2, $this->input->post('cat'));

        // }
        // else if($loc_level_sessdata_fn2 == 'region'){
        //     $locid_qparam_region = 3;

        //     $chartmap2data =  $this->prodsupp->getChartMap1Data_singleDset('2021', 'reg', $locid_qparam_region, $chartmap2_mode_fn2, $this->input->post('cat'));
        // }
        // else if($loc_level_sessdata_fn2 == 'province'){
        //     $locid_qparam = $this->input->post('current_locid');
        //     //$loclevel_qparam = 'province';

        //     $chartmap2data =  $this->prodsupp->getChartMap1Data_singleDset('2021', 'prov', $locid_qparam, $chartmap2_mode_fn2, $this->input->post('cat'));
        // }
        // else if($loc_level_sessdata_fn2 == 'municipality'){
        //     $locid_qparam = $this->input->post('current_locid');
        //     // $loclevel_qparam = 'municipality';

        //     $chartmap2data =  $this->prodsupp->getChartMap1Data_singleDset('2021', 'muni', $locid_qparam, $chartmap2_mode_fn2, $this->input->post('cat'));
        //     // $data['chartmap2_modes_display'] = 'display:none;';
        //     // $data['chartmap2_perloc_display'] = 'display:none;';

        // }
        
        // $this->session->set_userdata('cmap1cat_prodsupp',$this->input->post('cat'));


           //chart and map data - extserv rendered
    


        // $response1 = $chartmap2data->categ1;
        // $response2 =  $chartmap2data->map1data_jsonstring;
        
        // $ajaxresponse = array($response1, $response2);
        
        $ajaxresponse = "time_in:".$data['test'];
        echo json_encode($ajaxresponse);

        //echo $response1;


    }

}