<?php
 if (! defined('BASEPATH')) exit('No direct script access allowed');
 
 //require_once"/home/demo/public_html/ERF/gr/dompdf/dompdf_config.inc.php";
 
 Class Menu extends CI_Controller {
    protected $Name, $Version, $data;
    
    function __construct(){
        parent::__construct();
        $this->load->model('Config_model');
        //$this->load->model('Menu_model');
        $this->Config_model->load_config();
        $this->Name = $this->Config_model->get_Name();
        $this->Version = $this->Config_model->get_Version();
		check_session();
    }
	function index(){
		$this->menu();
		$hdata = array('Name' => $this->Name, 'Version' => $this->Version, 'Page' => 'Menu');
        $this->load->view('partials/header', $hdata);
        $this->load->view('order/menu', $this->data);
        $this->load->view('partials/footer', $hdata);
	}
	public function menu(){
		   			
   		$this->load->model('Category_model');
		$this->Category_model->load_categories();
		$this->load->model('Meal_model');
		$this->Meal_model->load_meals();
		
		
        $this->step_name = "Menu";
        $this->data = array('Step' => $this->step_name, 'categories'=>$this->Category_model->my_categories, 'meals'=>$this->Meal_model->my_meals);
		

		
	}
	public function print_menu(){
		$this->fb->setEnabled(true);
		$this->fb->log('Inside print menu function of menu controller');
		$this->load->model('Category_model');
		$this->Category_model->load_categories();
		$this->load->model('Meal_model');
		$this->Meal_model->load_meals();
		$data = array('categories'=>$this->Category_model->my_categories, 'meals'=>$this->Meal_model->my_meals);
		$this->fb->log($data);
		/*$this->load->library('Pdf');
		$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', true);
		$pdf->SetTitle('Menu');
		$pdf->SetAutoPageBreak(true, '1');
		$pdf->SetAuthor('Georges');
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
		$pdf->SetMargins('0', '0');
		$pdf->SetDisplayMode('real', 'default', 'FullScreen');
		$pdf->AddPage();*/
		$html = $this->load->view('print_menu', $data, true);
		$this->fb->log($html);
		$this->load->helper(dompdf);
		pdf_create($html, 'menu');
		/*$pdf->writeHTML($html, true, true, true, 0, 'L');
		$pdf->lastPage();
		$pdf->Output('Menu.pdf', 'FI');*/

	}
	public function print_test(){
		$this->fb->setEnabled(true);
		$this->load->model('Category_model');
		$this->Category_model->load_categories();
		$this->load->model('Meal_model');
		$this->Meal_model->load_meals();
		$data = array('categories'=>$this->Category_model->my_categories, 'meals'=>$this->Meal_model->my_meals);
		$this->load->view('print_menu', $data);
	}
	public function delete(){
		$id;
		if(isset($_POST['id'])){
			$id = $_POST['id'];
		
			$this->load->model('Meals_model');
			$return = $this->Meals_model->delete($id);
			return $return;
		}
	}
	
}
 ?>