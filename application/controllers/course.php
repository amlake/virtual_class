<?php
class Course extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('course_model');
		$this->load->model('dept_model');
		$this->load->model('enrollment_model');
		$this->load->model('student_model');
		#$this->load->library('javascript');
		#$this->load->library('jquery');
	}

	public function index()
	{

		$data['courses'] = $this->course_model->get_courses();
		$data['title'] = 'courses list';
		$data['pagenum'] = 1;

		$this->load->view('templates/header', $data);
		$this->load->view('course/page', $data);
		$this->load->view('templates/footer');
	}

	public function page($pagenum)
	{
		$data['courses'] = $this->course_model->get_courses($id=FALSE, $pagenum);
		$data['title'] = 'courses list';
		$data['pagenum'] = $pagenum;

		$this->load->view('templates/header', $data);
		$this->load->view('course/page', $data);
		$this->load->view('templates/footer');
	}

	public function delete($id) {
		$this->course_model->delete_course($id);
		$this->load->helper('url');
		redirect(base_url().'index.php/course/');
		# TO -DO: ALSO UPDATE ENROLLMENT TABLE
	}

	public function delete_student($course_id, $student_id) {
		$this->enrollment_model->delete_student($course_id, $student_id);
		redirect(base_url().'index.php/course/view/'.$course_id);
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
		
		$enrolled_students = $this->enrollment_model->get_students($id);

		$my_array = array();

		foreach ($enrolled_students as $item) {
			$name = $this->student_model->get_name($item->student_id);
			$my_array[] = $name;
	    }

	    $data['enrolled_students'] = $my_array;

		$this->load->view('templates/header', $data);
		$this->load->view('course/view', $data);
		$this->load->view('templates/footer');
	}

	public function dept_check($str) {
		$depts = $this->dept_model->get_depts(); # must check to make sure 'dept_name' is one of the hard-coded departments
		if (!in_array($str, $depts))
		{
			$this->form_validation->set_message('dept_check', 'Invalid department name!');
			return FALSE;
		} else 
		{
			return TRUE;
		}
	}

	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Add a course';

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('dept_name', 'Department', 'required');
		$this->form_validation->set_rules('dept_name', 'Department', 'callback_dept_check');


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