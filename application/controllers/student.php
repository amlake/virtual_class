<?php
class Student extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('student_model');
		$this->load->model('dept_model');
		$this->load->model('enrollment_model');
		#$this->load->library('javascript');
		#$this->load->library('jquery');
	}

	public function index()
	{
		$data['students'] = $this->student_model->get_students();
		$data['title'] = 'students list';
		$data['pagenum'] = 1;

		$this->load->view('templates/header', $data);
		$this->load->view('student/page', $data);
		$this->load->view('templates/footer');
	}

	public function page($pagenum)
	{
		$data['students'] = $this->student_model->get_students($id=FALSE, $pagenum);
		$data['title'] = 'students list';
		$data['pagenum'] = $pagenum;

		$this->load->view('templates/header', $data);
		$this->load->view('student/page', $data);
		$this->load->view('templates/footer');
	}

	public function delete($id) {
		$this->student_model->delete_student($id);
		$this->load->helper('url');
		redirect(base_url().'index.php/student/');
		# TO -DO: ALSO UPDATE ENROLLMENT TABLE
	}

	public function edit_student() {
		$id = $this->input->post('studentid');
		$firstname = $this->input->post('firstname');
		$middlename = $this->input->post('middlename');
		$lastname = $this->input->post('lastname');


		$data = array (
						'firstname' => $firstname,
						'middlename' => $middlename,
						'lastname' => $lastname

					   );
		$this->db->where('id',$id);
		$this->db->update('student',$data);

		echo json_encode($data);
	}

	public function enroll() 
	{
		$course_data = $this->input->post();
		$course_id = $course_data['id'];
		$student_id = $course_data['studentid'];
		echo "student_id: ".$student_id;
		echo "  course_id: ". $course_id;
		$this->enrollment_model->enroll_student($student_id,$course_id);
	}

	public function view($id)
	{
		$data['student_item'] = $this->student_model->get_students($id);
		$name_for_title = $data['student_item']['firstname'].$data['student_item']['middlename'].$data['student_item']['lastname'];

		if (empty($data['student_item']))
		{
			show_404();
		}

		$data['title'] = $data['student_item']['firstname'];
		$data['firstname'] = $name_for_title;
		$data['dept_name'] = $data['student_item']['dept_name'];
		$data['id'] = $id;

		$data['course_names'] = $this->enrollment_model->get_courses();

		$this->load->view('templates/header', $data);
		$this->load->view('student/view', $data);
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

		$data['title'] = 'Add a student';

		$this->form_validation->set_rules('firstname', 'First name', 'required');
		$this->form_validation->set_rules('lastname', 'Last name', 'required');
		$this->form_validation->set_rules('dept_name', 'Major', 'required');

		$this->form_validation->set_rules('dept_name', 'Department', 'callback_dept_check');


		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('student/create');
			$this->load->view('templates/footer');

		}
		else
		{
			$this->student_model->set_student();
			redirect('student/');
		}
	}
}