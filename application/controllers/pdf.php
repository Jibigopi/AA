<?php
class Pdf  Extends CI_Controller
{
    function __construct() { 
        parent::__construct();
         $this->load->helper(array('form', 'url'));
        $this->load->helper('form');
        $this->load->helper('file'); 
       
        
        
    }
    function index($id)
    {
        
        
        $this->get_invoice($id);
     
        
    }
    function phptopdf_url($source_url,$save_directory,$save_filename)
	{		
		$API_KEY = '7a4gz5yttswbzgzdn';
                $url = 'http://phptopdf.com/urltopdf.php?key='.$API_KEY.'&url='.urlencode($source_url);
		$resultsXml = file_get_contents(($url)); 		
		file_put_contents($save_directory.$save_filename,$resultsXml);
	}
	function phptopdf_html($html,$save_directory,$save_filename)
	{		
		$API_KEY = '7a4gz5yttswbzgzdn';
                $postdata = http_build_query(
			array(
				'html' => $html,
				'key' => $API_KEY
			)
		);
		
		$opts = array('http' =>
			array(
				'method'  => 'POST',
				'header'  => 'Content-type: application/x-www-form-urlencoded',				
				'content' => $postdata
			)
		);
		
		$context  = stream_context_create($opts);
		
		
		$resultsXml = file_get_contents('http://phptopdf.com/htmltopdf.php', false, $context);
		file_put_contents($save_directory.$save_filename,$resultsXml);
	}
        function get_invoice($id){
            if($id!=""){
             $this->load->model('users');
        $data['row']=  $this->users->get_invoice($id);
        $data['items']=  $this->users->get_items($id);
        $this->load->view('dashboard/invoice',$data);
            }else{
                redirect('ancientagro');
            }
        }
}
?>
