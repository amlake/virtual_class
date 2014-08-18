<?php
class Dept_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_depts()
	{
		$this->db->select('name');
		$query = $this->db->get('dept');
		$results = $query->result_array();
		$names = array();
		for ($i = 0; $i < count($results); ++$i) {
			$names[$i] = $results[$i]['name'];
		}

		return $names;
	}
}