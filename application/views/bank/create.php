<style>
	input[type='text'],input[type='password'],input[type='number'],input[type='email']{padding:6px; width:100%; border:1px solid rgba(0,0,0,0.2); outline:none;}
	body{font-family:calibri;}
	
</style>

<div class='container-fluid'>
	<div class='row'>
		<div class='col-sm-3' style='padding:30px; background:#eee;'>
			<form  action='<?php echo base_url(); ?>index.php/bank/create/add' method='post'>
				Insitituion name &nbsp;*<br>
				<input type='text' name='name' required/><br><br>
				
				Location &nbsp;*<br>
				<input type='text' name='loc' required/><br><br>
				
				Contact &nbsp;*<br>
				<input type='text' name='cont' maxlength='13' required/><br><br>
				
				Email &nbsp;*<br>
				<input type='email' name='email' required/><br><br>
				
				TIN &nbsp;*<br>
				<input type='number' name='tin' maxlength='20' required/><br><br>
				
				Logo &nbsp;*<br>
				<input type='file' name='logo'  accept="image/png, image/jpeg" required/><br>
				
				Password &nbsp;*</br>
				<input type='password' name='pwd' id='pwd' maxlength='12' required/><br><br>
				
				Confirm Password &nbsp;*<i id='pwd_er_msg' style='color:red;'></i></br>
				<input type='password' name='pwd2' id='pwd2' maxlength='12' required/><br><br>
				
				<button type='submit' name='add_ins' id='sub_btn'><i class='fa fa-check' ></i> &nbsp;&nbsp;&nbsp;&nbsp; Create Account</button><br><br>
			</form>
			
			<script>
				//alert('aa'); return;
				$("#pwd2").keyup(function(){
					var pwd=$("#pwd").val();
					var pwd2=$("#pwd2").val();
					if(pwd!=pwd2){
						//$("#sub_btn").attr('disabled','disabled');
						$("#pwd_er_msg").html("Passwords dont match.");
					} else {$("#pwd_er_msg").hide();}
				});
			</script>
		</div>
		
		<div class='col-sm-8' style='padding:30px; background:#fff;' >
			Terms and conditions apply
		</div>
	</div>
</div>