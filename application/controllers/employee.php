<?php
/* 
 * File Name: employee.php
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class employee extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('pagination');
        $this->load->library('form_validation');
        //load the employee model
        $this->load->model('employee_model');
    }

    //index function
    function index()
    {
        //fetch data from department and designation tables
        $data['department'] = $this->employee_model->get_department();
        $data['designation'] = $this->employee_model->get_designation();

        //set validation rules
        $this->form_validation->set_rules('employeeno', 'Employee No', 'trim|required|numeric');
        $this->form_validation->set_rules('employeename', 'Employee Name', 'trim|required|xss_clean|callback_alpha_only_space');
        $this->form_validation->set_rules('department', 'Department', 'callback_combo_check');
        $this->form_validation->set_rules('designation', 'Designation', 'callback_combo_check');
        $this->form_validation->set_rules('hireddate', 'Hired Date', 'required');
        $this->form_validation->set_rules('salary', 'Salary', 'required|numeric');

        if ($this->form_validation->run() == FALSE)
        {
            //fail validation
            $this->load->view('employee_view', $data);
        }
        else
        {
            //pass validation
            $data = array(
                'employee_no' => $this->input->post('employeeno'),
                'employee_name' => $this->input->post('employeename'),
                'department_id' => $this->input->post('department'),
                'designation_id' => $this->input->post('designation'),
                'hired_date' => @date('Y-m-d', @strtotime($this->input->post('hireddate'))),
                'salary' => $this->input->post('salary'),
            );

            //insert the form data into database
            $this->db->insert('tbl_employee', $data);

            //display success message
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Employee details added to Database!!!</div>');
            redirect('employee/index');
        }

    }


    public function get_employee() {
        $this->load->model('employee_model');

        $data = $this->employee_model->get_employee_suggestion();

        echo json_encode($data);

    }

    //custom validation function for dropdown input
    function combo_check($str)
    {
        if ($str == '-SELECT-')
        {
            $this->form_validation->set_message('combo_check', 'Valid %s Name is required');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    //custom validation function to accept only alpha and space input
    function alpha_only_space($str)
    {
        if (!preg_match("/^([-a-z ])+$/i", $str))
        {
            $this->form_validation->set_message('alpha_only_space', 'The %s field must contain only alphabets or spaces');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    public function GetEmployee(){

        $keyword = $this->input->post('keyword');
        $data = $this->employee_model->GetRow($keyword);
        echo json_encode($data);
    }

    //function for Pagination
    public function employee_page(){
        $config = array();
        $config["base_url"] = base_url() . "employee/employee_page/";
        $config["total_rows"] = $this->employee_model->employee_record_count();
        $config["per_page"] = 2;
        $config["uri_segment"] = 1;

        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';





        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->employee_model->fetch_employee($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();

        $this->load->view("employee_view", $data);

    }
}
?>