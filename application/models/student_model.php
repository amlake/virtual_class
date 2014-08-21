<?php
class Student_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_name($id) { 
	# helper function -- inputs student id and outputs student's full name
		$this->db->select(array('firstname', 'middlename', 'lastname'));
		$this->db->where('id', $id);
		$query = $this->db->get('student');
		foreach ($query->result() as $item) {
			$name = $item->firstname.' '.$item->middlename.' '.$item->lastname;
		}

		return $name;
	}

	public function get_students($id=FALSE,$pagenum=1)
	{
		if ($id === FALSE)
		{
			$query = $this->db->get('student',20,20*($pagenum-1));
			$results = $query->result_array();
			for ($i = 0; $i < count($results); ++$i) {
			    #now, query `dept` table using major_id to select corresponding dept_name for display
			    $id = $results[$i]['major_id'];
			    $this->db->select('name');
			    $this->db->where('id', $id);
			    $q = $this->db->get('dept');

			    assert($q->num_rows()>0);

			    foreach ($q->result() as $row)
			    {
			         $dept_name = $row->name;
			    }

			    $results[$i]['dept_name'] = $dept_name;
			}

			return $results;
		}

		$query = $this->db->get_where('student', array('id' => $id));
		$row = $query->row_array();
		#now, query `dept` table using dept_id to select corresponding dept_name for display
		$major_id = $row['major_id'];
		$this->db->select('name');
		$this->db->where('id', $major_id);
		$q = $this->db->get('dept');
		assert($q->num_rows()===1);
		$dept_name = $q->row()->name;
		$row['dept_name'] = $dept_name;
		return $row;
	}

	public function set_student()
	{

		$dept_name = $this->input->post('dept_name'); # must use 'dept_name' from form to query `dept` table for 'dept_id'
		
		$this->db->select('id');
		$this->db->where('name', $dept_name);
		$query = $this->db->get('dept');

		assert($query->num_rows()>0);

	   foreach ($query->result() as $row)
	   {
	      $major_id = $row->id;
	   }

		$data = array(
			'firstname' => $this->input->post('firstname'),
			'middlename' => $this->input->post('middlename'),
			'lastname' => $this->input->post('lastname'),
			'major_id' => $major_id
		);

		return $this->db->insert('student', $data);
	}

	public function delete_student($id) {
		$this->db->delete('student', array('id' => $id));
		$this->db->delete('enrollment', array('student_id' => $id));
	}
}