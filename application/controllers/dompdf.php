<? class Dompdf_test extends CI_Controller {
        function __construct() {
            parent::__construct();
        }
 
        function index($offset=0) { 
            $this->load->view('header', $data, true);
            $html=$this->load->view('login_view',$data, true);
            $this->load->view('footer');
            $html="<html><head></head><body>".$html."</body></html>";
                        //call the function createPDF
            $this->dompdf_lib->createPDF($html, 'myfilename');        
             
        }       
    }
?>