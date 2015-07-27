<?php
class Pages extends CI_Controller{
	
	public function view ($page = 'home'){
		
		if(!file_exists (APPPATH.'/views/pages/'. $page .'.php'))
		{
			//Whoops, We don't have a page for that!
			show_404();
		}
		
		//Capitalize the first Letter
		$data['title'] = ucfirst($page); 
		
		//Load Templates from View
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);
	}
	
}