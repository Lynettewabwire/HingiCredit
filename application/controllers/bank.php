<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class bank extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->library('PHPMailer');
		$this->load->model('M_bank');
	}
	
	public function index($view=null, $page_data=null)
	{	if(!$this->loggedin()){
			redirect("home/index");
		}else{
			$data['title']="Admin | HingiCredit";
			$data['author']="don brians";
			
			if($view && $data){
				$data['view']=$view;
				$data['page_data']=$page_data;
			}else{
				$data['view']="bank/index";
				$data['page_data']="";
			}
			$this->load->view('head',$data);
			$this->load->view('bank/dashboard');
		}
	}
	
	public function dashboard(){
		if(!$this->loggedin()){ 
			redirect("home/index");
		}else {
			$view="bank/index";
			$data="";
			$this->index($view,$data);
		}
	}
	
	public function create($method=null){
		if($method=="add"){
			$add_dets=array(
				'name'=>$this->check_input($this->input->post('name')),
				'Location'=>$this->check_input($this->input->post('loc')),
				'Contact'=>$this->check_input($this->input->post('cont')),
				'email'=>$this->check_input($this->input->post('email')),
				'password'=>sha1($this->check_input($this->input->post('pwd'))),
				'tin'=>$this->check_input($this->input->post('tin')),
				'date_crtd'=>date('Y-M-d')
			);
			
			
			$this->M_bank->add_bank($add_dets);
			
			$this->PHPMailer->SMTPDebug = 0;     
			$this->PHPMailer->isSMTP(); 
			try{	
				$this->PHPMailer->Host = "sv53.ifastnet2.org";
				$this->PHPMailer->SMTPAuth = true;             
				$this->PHPMailer->Username = "honeypri";                 
				$this->PHPMailer->Password = "7Qc6uzMp17";   
				$this->PHPMailer->SMTPSecure = "ssl";   
				$this->PHPMailer->Port = 290; 

				$this->PHPMailer->setFrom('info@honeyprideug.com', 'Honey Pride Arua (U) Limited');
				$this->PHPMailer->addReplyTo("info@honeyprideug.com", "Reply");
				$this->PHPMailer->addCC("honeyprideug@gthis.com");

				$this->PHPMailer->addAddress($emial, $name);
				$this->PHPMailer->Subject  = 'Webthis Response';
				$this->PHPMailer->isHTML(true);
				$this->PHPMailer->Body="";
				$this->PHPMailer->AltBody = '';
				$this->PHPMailer->Send();
				
			} catch (phpmailerException $e) {
				$e->errorMessage(); 
			} catch (Exception $e) {
				$e->getMessage(); 
			}
			
			}
		
	
		$this->load->view('head');
		$this->load->view('bank/create');
	}
	
	
	public function loggedin(){
		if($this->session->userdata("bud_id","btype","brole","bemail")){
			return true;
		} else{
			return false;
		}
	}
	
	public function check_input($input){
		$output=htmlentities(stripslashes($input));
		return $output;
	}
	
	public function logout(){
		$session_array=array(
					'ctrl',
					'bud_id',
					'btype',
					'brole',
					'bemail',
					'bname'
				);
		$this->session->unset_userdata($session_array);
		$this->index();
	}

//user mgt
public function users($meth=null,$id=null){
	if($meth=='create'){
		$branch_add_dets=array(
			'name'=>$this->check_input($this->input->post('uname')),
			'bank'=>$this->session->userdata('bud_id'),
			'email'=>$this->check_input($this->input->post('uemail')),
			'branch'=>$this->check_input($this->input->post('branch')),
			'password'=>sha1($this->check_input($this->input->post('bcont'))),
			'date_added'=>date('y-m-d'),
			'role'=>$this->check_input($this->input->post('urole')),
			'status'=>1
		);
		$this->M_bank->add_bank_user($branch_add_dets);
		//redirect('bank/users','refresh');
		
	}else if($meth=='delete'){
		$this->M_bank->delete_user($id);
	}else if($meth=='block'){
		$this->M_bank->block_user($id);
	}
	else if($meth=='renew'){
		$this->M_bank->renew_user($id);
	}
	
	$view='bank/view_users';
	$data=$this->M_bank->get_bank_users($this->session->userdata('bud_id'));
	
	$this->index($view,$data);
}

//branches
public function branches($meth=null,$id=null){
	if($meth=='create'){
		$branch_add_dets=array(
			'name'=>$this->check_input($this->input->post('branch')),
			'bank'=>$this->session->userdata('bud_id'),
			'location'=>$this->check_input($this->input->post('bloc')),
			'contact'=>$this->check_input($this->input->post('bcont')),
			'status'=>1
		);
		$this->M_bank->add_bank_branch($branch_add_dets);
		redirect('bank/branches','refresh');
		
	}else if($meth=='delete'){
		$this->M_bank->delete($id); //redirect('bank/branches','refresh');
	}else if($meth=='block'){
		$this->M_bank->block($id); //redirect('bank/branches','refresh');
	}
	else if($meth=='renew'){
		$this->M_bank->renew($id); //redirect('bank/branches','refresh');
	}
	
	
	$bid=$this->session->userdata('bud_id');
	$view='bank/view_branches';
	
	$data=$this->M_bank->get_branches($bid);
	$this->index($view,$data);
}

} //closes class