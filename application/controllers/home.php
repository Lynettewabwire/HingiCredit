<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

	public function index($er=null)
	{	$data['title']="HingiCredit";
		$data['author']="don brians";
		if($er){$data['msg']=$er;} else {$data['msg']=null;}
		
		if(!$this->loggedin()){
			$this->load->view('head',$data);
			$this->load->view('login');
		} else {
			redirect($this->session->userdata('ctrl'));
		}
	}
	
	public function auth(){
		
		$em=$this->input->post('email');
		$pwd=sha1($this->input->post('pwd'));
		
		if(filter_var($em,FILTER_VALIDATE_EMAIL)==false){
			$log_dets=array(
				'username'=>$em,
				'password'=>$pwd
			);
			
			$this->load->model('M_admin');
			$chk_login=$this->M_admin->admin_login($log_dets);
			
			if($chk_login){
				$dets=$this->M_admin->get_admin_dets($em);
				
				$session_array=array(
					'ctrl'=>'admin',
					'ad_id'=>$dets->id,
					'type'=>'sys_admin',
					'role'=>$dets->role,
					'username'=>$em
				);
				
				//print_r($session_array); return;
				$this->session->set_userdata($session_array);
				
				redirect("admin");
			}else {
				$this->index($er="<p style='color:#de0017; font-weight:bold;>Your Username or password is wrong</p>'");
			}
			
		}else{
		
			$log_dets=array(
				'email'=>$em,
				'password'=>$pwd
			);
			
			$this->load->model('M_bank');
			$chk_login=$this->M_bank->bank_login($log_dets);
			
			if($chk_login){
				$dets=$this->M_bank->get_user_dets($em);
				
				$session_array=array(
					'ctrl'=>'bank',
					'bud_id'=>$dets->id,
					'btype'=>'bank_admin',
					'brole'=>'admin',//$dets->role,
					'bemail'=>$em,
					'bname'=>$dets->name
				);
				
				//print_r($session_array); return;
				$this->session->set_userdata($session_array);
				
				redirect("bank");
			}else {
				$this->index($er="<p style='color:#de0017; font-weight:bold;>Your Username or password is wrong</p>'");
			}
		}
		
		
		
	}
	
	public function loggedin(){
		if($this->session->userdata("ctrl")){
			return true;
		} else{
			return false;
		}
	}
}
