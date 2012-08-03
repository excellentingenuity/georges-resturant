<?
//require_once "./application/libraries/Category.php";
 if (! defined('BASEPATH')) exit('No direct script access allowed');

class Atest extends CI_Controller {
    
    public function index(){
        $this->load->helper('object_autoloader');
        $categories = load_all_objects('Category');
        foreach ($categories as $category){
            $category->echo_all();
        }
    }
    
}
?>