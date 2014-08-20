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


	public function get_students($id) {
		$this->db->select('student_id');
	    $this->db->where('course_id', $id);
	    $this->db->group_by('student_id');
	    $query = $this->db->get('enrollment');
	    
	    # non-ideal solution to preventing a student showing up in the same class multiple times:
	    #	just modify db query to only select each student once
	    #	if time, modify so that students are prevented from being enrolled in the same class multiple times in the first place

		return $query->result();
	}

	public function enroll_student($student_id, $course_id)
	{
		$data = array(
			'student_id' => $student_id,
			'course_id' => $course_id);

		return $this->db->insert('enrollment', $data);

	}

	public function delete_student($course_id, $student_id) {
		$this->db->delete('enrollment', array(
												'student_id' => $student_id,
												'course_id' => $course_id
											));
	}
}