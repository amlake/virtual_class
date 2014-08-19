<?php
class Enrollment_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_courses() #for course selection dropdowns
	{
		$this->db->select('id, title');
		$query = $this->db->get('course');
		$results = $query->result_array();

		return $results;
	}

	public function get_student_courses()  # get the courses that a particular student is enrolled in
	{

	}

	public function enrolled($student_id, $course_id) # boolean --  check to see whether a particular student is enrolled in a particular course
	{

	}


	public function get_students($course_id)
	{
		return "nothing yet";
	}

	public function enroll_student($student_id, $course_id)
	{
		$data = array(
			'student_id' => $student_id,
			'course_id' => $course_id);

		return $this->db->insert('enrollment', $data);

	}

	public function delete_student($student_id, $course_id) {
		$this->db->delete('enrollment', array(
												'student_id' => $student_id,
												'course_id' => $course_id
											));
	}
}