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

//loan application
public function application($method=null){
	if(!$this->loggedin()){
			redirect("home/index");
		}
	else{

		if($method=='submit'){
			$loan_application = array(
				'applicantName'=>$this->check_input($this->input->post('firstname')).' '.$this->check_input($this->input->post('lastname')),
				'bank'=>$this->session->userdata('bud_id'),
				'age'=>$this->check_input($this->input->post('age')),
				'gender'=>$this->check_input($this->input->post('gender')),
				'maritalStatus'=>$this->check_input($this->input->post('marital')),
				'householdSize'=>$this->check_input($this->input->post('household')),
				'citizen'=>$this->check_input($this->input->post('citizenship')),
				'levelOfEducation'=>$this->check_input($this->input->post('education')),
				'employed'=>$this->check_input($this->input->post('employment')),
				'accountHolder'=>$this->check_input($this->input->post('accountholder')),
				'bankAccountBalance'=>$this->check_input($this->input->post('aacountbal')),
				'gotALoanBefore'=>$this->check_input($this->input->post('loanbefore')),
				'unservicedLoans'=>$this->check_input($this->input->post('unserviced')),
				'nonAgriculturalIncome'=>$this->check_input($this->input->post('nonagricincome')),
				'loanSizeRequested'=>$this->check_input($this->input->post('loanamount')),
				'farmSize'=>$this->check_input($this->input->post('farmsize')),
				'numberOfWorkers'=>$this->check_input($this->input->post('farmworkers')),
				'categoryOfCropsGrown'=>$this->check_input($this->input->post('categoryofcrops')),
				'categoryOfLivestock'=>$this->check_input($this->input->post('categoryoflivestock')),
				'agriculturalTraining'=>$this->check_input($this->input->post('agrictraining')),
				'yearsExperienceInAgriculture'=>$this->check_input($this->input->post('yearsinagric')),
				'proximityToMarket'=>$this->check_input($this->input->post('marketproximity')),
				'valueOfProduction'=>$this->check_input($this->input->post('valofprod')),
				'useOfAgriculturalIncentives'=>$this->check_input($this->input->post('agricincent')),
			);
			$this->M_bank->add_application($loan_application);
			redirect('bank/reportmodal','refresh');
		}

		$view='bank/loanapplication';
		$this->index($view);
	}
}
public function reportmodal(){
	if(!$this->loggedin()){
			redirect("home/index");
		}
	else{
		$id = $this->M_bank->get_lastinsertedid();
		$from_db = $this->M_bank->get_lastdata($id);

		error_reporting(E_ALL);
		ini_set('display_errors', 1);

		$url = 'https://ussouthcentral.services.azureml.net/workspaces/473e621ef21e4000a3176627eb8e8663/services/558bf240f65646fdbc892d8c50fac2ba/execute?api-version=2.0&details=true';
		$api_key = '0qPW2VnTRjxrq+1/6xRxsp2liFYzbWAbIAu8ZhUNBgQJ1uk8fodXGZ5e+yDIajhE6bpwSaSWwkzKOtElZDFIkA==';

		$loan = array(
		    'Inputs'=> array(
		        'input1'=> array(
		            'ColumnNames' => ["age", "levelOfEducation", "maritalStatus", "householdSize", "nonAgriculturalIncome", "loanSizeRequested", "farmSize", "categoryOfCropsGrown", "categoryOfLivestock", "agricTraining", "yearsExperienceInAgriculture", "noOfWorkers", "proximityTomarket", "useOfAgriculturalIncentives"],
		            'Values' => [ [ $from_db->age, $from_db->levelOfEducation, $from_db->maritalStatus, $from_db->householdSize, $from_db->nonAgriculturalIncome, $from_db->loanSizeRequested, $from_db->farmSize, $from_db->categoryOfCropsGrown, $from_db->categoryOfLivestock, $from_db->agriculturalTraining, $from_db->yearsExperienceInAgriculture, $from_db->numberOfWorkers, $from_db->proximityToMarket, $from_db->useOfAgriculturalIncentives ] ]
		        ),
		    ),
		        'GlobalParameters' => new StdClass(),
		);

		$body = json_encode($loan);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Bearer '.$api_key, 'Accept: application/json'));
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		$result  = json_decode(curl_exec($ch));
		//echo 'Curl error: ' . curl_error($ch);
		
		curl_close($ch);
		
		$newdata = array(
        'scoreLabel' => $result->Results->output1->value->Values['0']['14'],
        'scoreProbability' => $result->Results->output1->value->Values['0']['15'],
        );
		$data['resp']=$this->M_bank->insert_getazuredata($id,$newdata);
		$view='bank/riskreportmodal';
		$this->index($view,$data);
	}
} // closes function

} //closes class
