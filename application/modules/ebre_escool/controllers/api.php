<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Acacha Manager ebre_escool API
 *
 * @package     Acacha Manager
 * @subpackage  API
 * @category    Controller
 * @author         Sergi Tur Badenas
 * @link        http://acacha.org/mediawiki/index.php/ebre-escool
*/

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH.'/libraries/REST_Controller.php';

class api extends REST_Controller {

	public $LOGTAG = "ACACHA MANAGER EBRE_ESCOOL API: ";

	function __construct()
    {
        // Construct our parent class
        parent::__construct();
        
        $this->load->model('api_model');
    }

	public function index_get() {
        $this->schools_get();	
    }
		
	function school_get()
    {
        if(!$this->get('id'))
        {
            $this->response(NULL, 400);
        }

        $school = $this->api_model->getSchool( $this->get('id') );
        
        $school = @$schools[$this->get('id')];
        
        if($school)
        {
            $this->response($school, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'school could not be found'), 404);
        }
    }
    
    function school_post()
    {
        //$this->some_model->updateschool( $this->get('id') );
        $message = array('id' => $this->get('id'), 'name' => $this->post('name'), 'email' => $this->post('email'), 'message' => 'ADDED!');
        
        $this->response($message, 200); // 200 being the HTTP response code
    }
    
    function school_delete()
    {
        //$this->some_model->deletesomething( $this->get('id') );
        $message = array('id' => $this->get('id'), 'message' => 'DELETED!');
        
        $this->response($message, 200); // 200 being the HTTP response code
    }
    
    function schools_get()
    {

        $aslist = $this->get('aslist'); 

        $schools = array();

        if ($aslist) {
            $schools = $this->api_model->getSchoolsAsList();
        } else {
            $schools = $this->api_model->getSchools();    
        }

        //print_r($schools);
        
        if($schools)         {
            $this->response($schools, 200); // 200 being the HTTP response code
        } else {
            $this->response(array('error' => 'Couldn\'t find any schools!'), 404);
        }
    }



}
 
/* End of file api.php */
/* Location: ./application/modules/helloworld_module/controllers/hmvc.php */