<?php

class News extends CI_Controller{
	
	public function __construct()
	{
		//Parent Construct of CI_Controller 
		parent::__construct();
		
		//Load the news Model to use query
		
		$this->load->model('news_model');
	}
	/**
	*
	*@param get_news($slug = FALSE)
	*
	*/
	
	//View All of the News from News Database
	public function index()
	{	
		/**
		*
		*Get all data from news database 
		*
		*/
		
		$data['news'] = $this->news_model->get_news();
		
		//Passing a title
		$data['title'] = 'News archive';

        $this->load->view('templates/header', $data);
        $this->load->view('news/index', $data);
        $this->load->view('templates/footer');
	}
	
	//View Specific News from News Database when select
	public function view($slug = NULL)
	{
		$data['news_item'] = $this->news_model->get_news($slug);
        
                if (empty($data['news_item']))
        {
                show_404();
        }

        $data['title'] = $data['news_item']['title'];

        $this->load->view('templates/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer');
	}
        
        public function create()
        {
            //Loader Helper for form and form validation
            $this->load->helper('form');
            $this->load->library('form_validation');

            $data['title'] = 'Create a news item';

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('text', 'text', 'required');

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('news/create');
                $this->load->view('templates/footer');

            }
            else
            {
                $this->news_model->set_news();
                $this->load->view('news/success');
            }
        }
        
	
}