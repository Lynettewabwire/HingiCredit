<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bank extends CI_Model {

	public function add_bank($a=array()){
		$this->db->insert('banks',$a);
	}

	public function add_bank_branch($a=array()){
		$this->db->insert('branches',$a);
		$b=$this->db->where('id',$a['bank'])->select('branches')->get('banks')->row();
		$new_branches=$b->branches+1;
		$this->db->where('id',$a['bank'])->set('branches',$new_branches)->update('banks');
	}

	public function add_bank_user($a=array()){
		$this->db->insert('bank_users',$a);
		$b=$this->db->where('id',$a['bank'])->select('users')->get('banks')->row();
		$new_branches=$b->users+1;
		$this->db->where('id',$a['bank'])->set('users',$new_branches)->update('banks');

		$c=$this->db->where('bank',$a['bank'])->select('users')->get('branches')->row();
		$new_user=$c->users+1;
		$this->db->where('id',$a['bank'])->set('users',$new_user)->update('branches');
	}

	public function get_branches($bid){
		return $this->db->where('bank',$bid)->get('branches')->result_array();
	}

	public function get_bank_users($bid){
		return $this->db->where('bank',$bid)->get('bank_users')->result_array();
	}

	//get bank admin dets
	public function get_user_dets($uname){
		return $this->db->where('email',$uname)->get('banks')->row();
	}

	public function block($id){
		$this->db->where('id',$id)->set('status',0)->update('branches');
	}

	public function renew($id){
		$this->db->where('id',$id)->set('status',1)->update('branches');
	}

	public function delete($id){
		$this->db->where('id',$id)->delete('branches');
	}

	public function block_user($id){
		$this->db->where('id',$id)->set('status',0)->update('bank_users');
	}

	public function renew_user($id){
		$this->db->where('id',$id)->set('status',1)->update('bank_users');
	}

	public function delete_user($id){
		$this->db->where('id',$id)->delete('bank_users');
	}

	public function get_bank_dets(){}
	public function block_bank(){}




	//bank login
	public function bank_login($login_dets){
		$a=$this->db->where($login_dets)->get('banks');
		if($a->num_rows()==1){
			return true;
		} else {
			return false;
		}
	}

	//loan application
	public function add_application($a=array()){
		$this->db->insert('applications',$a);
	}

	//getting last insertd id
	public function get_lastinsertedid(){
		$this->db->select_max('id');
		$query = $this->db->get('applications')->row('id');
		return $query; 
	}

	//getting data coresponding to last inserted id
	public function get_lastdata($id){
		return $this->db->where('id', $id)->get('applications')->row();
	}
	public function insert_getazuredata($id,$data){
		$this->db->update('applications', $data, array('id' => $id));
		return $this->db->where('id', $id)->get('applications')->row();
	}
}
