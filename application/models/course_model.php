<?php
class Course_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_courses($id=FALSE,$pagenum=1)
	{
		if ($id === FALSE)
		{
			$query = $this->db->get('course',10,10*($pagenum-1));
			$results = $query->result_array();
			for ($i = 0; $i < count($results); ++$i) {
			    #now, query `dept` table using dept_id to select corresponding dept_name for display
			    $id = $results[$i]['dept_id'];
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

		$query = $this->db->get_where('course', array('id' => $id));
		$row = $query->row_array();
		#now, query `dept` table using dept_id to select corresponding dept_name for display
		$dept_id = $row['dept_id'];
		$this->db->select('name');
		$this->db->where('id', $dept_id);
		$q = $this->db->get('dept');
		assert($q->num_rows()===1);
		$dept_name = $q->row()->name;
		$row['dept_name'] = $dept_name;
		return $row;
	}

	public function set_course()
	{
		$this->load->helper('url');

		$dept_name = $this->input->post('dept_name'); # must use 'dept_name' from form to query `dept` table for 'dept_id'
		
		$this->db->select('id');
		$this->db->where('name', $dept_name);
		$query = $this->db->get('dept');

		assert($query->num_rows()>0);

	   foreach ($query->result() as $row)
	   {
	      $dept_id = $row->id;
	   }

		$data = array(
			'title' => $this->input->post('title'),
			'dept_id' => $dept_id
		);

		return $this->db->insert('course', $data);
	}

	public function delete_course($id) {
		$this->db->delete('course', array('id' => $id));
		$this->db->delete('enrollment', array('course_id' => $id));
	}

}