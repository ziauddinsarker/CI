<?php

class News_model extends CI_Model{
	
	public function __construct()
	{
		//Load the Database module
		$this->load->database();
	}
	
	//
	public function get_news($slug = FALSE)
	{
		//This will query all the data from news table
		if($slug == FALSE)
		{
			$query = $this->db->get('news');
			return $query->result_array();
		}
		
		//This will query the given slug only
		$query = $this->db->get_where('news', array('slug' => $slug));
		return $query->row_array();
	}
        
        //Add News 
        public function set_news()
        {
            $this->load->helper('url');

            $slug = url_title($this->input->post('title'), 'dash', TRUE);

            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'text' => $this->input->post('text')
            );

            return $this->db->insert('news', $data);
        }
}