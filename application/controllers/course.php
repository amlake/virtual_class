<?php
class Course extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('course_model');
		$this->load->model('dept_model');
		#$this->load->library('javascript');
		#$this->load->library('jquery');
	}

	public function index()
	{

		$data['courses'] = $this->course_model->get_courses();
		$data['title'] = 'courses list';

		$this->load->view('templates/header', $data);
		$this->load->view('course/index', $data);
		$this->load->view('templates/footer');
	}

	public function delete($id) {
		$this->course_model->delete_course($id);
		$this->load->helper('url');
		redirect(base_url().'index.php/course/');
	}

	public function edit_course($id) {
		$title = $this->input->post('title');
		$data = array (
						'title' => $title

					   );
		$this->db->where('id',$id);
		$this->db->update('course',$data);
		redirect('course/view/'.$id);
	}

	public function view($id)
	{
		$data['course_item'] = $this->course_model->get_courses($id);

		if (empty($data['course_item']))
		{
			show_404();
		}

		$data['title'] = $data['course_item']['title'];
		$data['dept_name'] = $data['course_item']['dept_name'];
		$data['id'] = $id;

		$this->load->view('templates/header', $data);
		$this->load->view('course/view', $data);
		$this->load->view('templates/footer');
	}

	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Add a course';

		$this->form_validation->set_rules('title', 'Title', 'required');
		# + dept and prof?


		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('course/create');
			$this->load->view('templates/footer');

		}
		else
		{
			$this->course_model->set_course();
			redirect('course/');
		}
	}
}