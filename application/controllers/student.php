<?php
class Student extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('student_model');
		$this->load->model('dept_model');
		#$this->load->library('javascript');
		#$this->load->library('jquery');
	}

	public function index()
	{

		$data['students'] = $this->student_model->get_students();
		$data['title'] = 'students list';

		$this->load->view('templates/header', $data);
		$this->load->view('student/index', $data);
		$this->load->view('templates/footer');
	}

	public function delete($id) {
		$this->student_model->delete_student($id);
		$this->load->helper('url');
		redirect(base_url().'index.php/student/');
	}

	public function edit_student($id) {
		$firstname = $this->input->post('firstname');
		$data = array (
						'firstname' => $firstname

					   );
		$this->db->where('id',$id);
		$this->db->update('student',$data);
		redirect('student/view/'.$id);
	}

	public function view($id)
	{
		$data['student_item'] = $this->student_model->get_students($id);

		if (empty($data['student_item']))
		{
			show_404();
		}

		$data['firstname'] = $data['student_item']['firstname'];
		$data['dept_name'] = $data['student_item']['dept_name'];
		$data['id'] = $id;

		$this->load->view('templates/header', $data);
		$this->load->view('student/view', $data);
		$this->load->view('templates/footer');
	}

	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Add a student';

		$this->form_validation->set_rules('firstname', 'First Name', 'required');
		# + MORE


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