<?php
/**
 * Reports_model Model
 *
 *
 * @package    	acacha_manager
 * @author     	Sergi Tur <sergiturbadenas@gmail.com>
 * @version    	1.0
 * @link		http://www.acacha.org
 */
class api_model  extends CI_Model  {
	
	function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

    function get_primary_key($table_name) {
		$fields = $this->db->field_data($table_name);
		
		foreach ($fields as $field)	{
			if ($field->primary_key) {
					return $field->name;
			}
		} 	
		return false;
	}


	function getSchool($id){
	
		/*
		SELECT school_id, school_name, school_fullname, school_email, school_secondary_email, 
		school_terciary_email, school_official_id, school_locality_id, school_telephoneNumber, 
		school_mobile, school_bank_account_id, school_notes, school_entryDate, school_last_update, 
		school_creationUserId, school_lastupdateUserId, school_markedForDeletion, 
		school_markedForDeletionDate 
		FROM school 
		WHERE school_id=1 
		*/
		$this->db->select('school_id, school_name, school_fullname, school_email, school_secondary_email, 
		school_terciary_email, school_official_id, school_locality_id, school_telephoneNumber, 
		school_mobile, school_bank_account_id, school_notes, school_entryDate, school_last_update, 
		school_creationUserId, school_lastupdateUserId, school_markedForDeletion, 
		school_markedForDeletionDate');
		
		$this->db->from('school');
		$this->db->where('school_id',$id);

		$query = $this->db->get();
		//echo $this->db->last_query(). "<br/>";

		if ($query->num_rows() == 1){
			
			$row = $query->row(); 

			$school = new stdClass();

			$school->id = $row->school_id;
			$school->name = $row->school_name;
			$school->fullname = $row->school_fullname;
			$school->email = $row->school_email;
			$school->secondary_email = $row->school_secondary_email;
			$school->secondary_email = $row->school_secondary_email;
			$school->school_terciary_email = $row->school_terciary_email;
			$school->school_official_id = $row->school_official_id;
			$school->school_locality_id = $row->school_locality_id;
			$school->school_telephoneNumber = $row->school_telephoneNumber;
			$school->school_mobile = $row->school_mobile;
			$school->school_bank_account_id = $row->school_bank_account_id;
			$school->school_notes = $row->school_notes;
			$school->school_entryDate = $row->school_entryDate;
			$school->school_last_update = $row->school_last_update;
			$school->school_creationUserId = $row->school_creationUserId;
			$school->school_lastupdateUserId = $row->school_lastupdateUserId;
			$school->school_markedForDeletion = $row->school_markedForDeletion;
			$school->school_markedForDeletionDate = $row->school_markedForDeletionDate;
			
			//...

			return $school;
		}	
		else {
			return false;
		}

	}

	function getSchools(){
	
		/*
		SELECT school_id, school_name, school_fullname, school_email, school_secondary_email, 
		school_terciary_email, school_official_id, school_locality_id, school_telephoneNumber, 
		school_mobile, school_bank_account_id, school_notes, school_entryDate, school_last_update, 
		school_creationUserId, school_lastupdateUserId, school_markedForDeletion, 
		school_markedForDeletionDate 
		FROM school 
		WHERE school_id=1 
		*/
		$this->db->select('school_id, school_name, school_fullname, school_email, school_secondary_email, 
		school_terciary_email, school_official_id, school_locality_id, school_telephoneNumber, 
		school_mobile, school_bank_account_id, school_notes, school_entryDate, school_last_update, 
		school_creationUserId, school_lastupdateUserId, school_markedForDeletion, 
		school_markedForDeletionDate');
		
		$this->db->from('school');

		$query = $this->db->get();
		//echo $this->db->last_query(). "<br/>";

		if ($query->num_rows() > 0) {

			$schools_array = array();

			foreach ($query->result() as $row)	{
				
				$school = new stdClass();

				$school->id = $row->school_id;
				$school->name = $row->school_name;
				$school->fullname = $row->school_fullname;
				$school->email = $row->school_email;
				$school->secondary_email = $row->school_secondary_email;
				$school->secondary_email = $row->school_secondary_email;
				$school->school_terciary_email = $row->school_terciary_email;
				$school->school_official_id = $row->school_official_id;
				$school->school_locality_id = $row->school_locality_id;
				$school->school_telephoneNumber = $row->school_telephoneNumber;
				$school->school_mobile = $row->school_mobile;
				$school->school_bank_account_id = $row->school_bank_account_id;
				$school->school_notes = $row->school_notes;
				$school->school_entryDate = $row->school_entryDate;
				$school->school_last_update = $row->school_last_update;
				$school->school_creationUserId = $row->school_creationUserId;
				$school->school_lastupdateUserId = $row->school_lastupdateUserId;
				$school->school_markedForDeletion = $row->school_markedForDeletion;
				$school->school_markedForDeletionDate = $row->school_markedForDeletionDate;

   				$schools_array[$row->school_id] = $school;
			}

			return $schools_array;
		}			
		else
			return false;
	}

	
}
