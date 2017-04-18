<style>
	input[type='text'],input[type='password'],input[type='number'],input[type='email']{padding:6px; width:100%; border:1px solid rgba(0,0,0,0.2); outline:none;}
	body{padding:0px; margin:0px; width:100%; height:100%; font-family:trebuchet Ms;}
	ul{padding:0px; margin:0px;}
	a{text-decoration:none; color:inherit;}
	li{list-style:none;}
	
	.head_menu{padding:10px 22px 10px 22px; background:#255; color:#fff; margin:0px;}
	
	.head_menu li{list-style:none; display:inline-block; text-decoration:none; margin:5px;}
	.head_menu li:first-child{padding:0px 40px 0px 40px; font-weight:bold;}
	.head_menu li:nth-child(3){padding:0px 40px 0px 40px; }
	

	
</style>

<div class='head_menu'>
	<ul>
		<li>HingiCredit</li>
		<li><button style='background:none; border:none; color:#fff; font-weight:bold;' id='togle_side_menu'><i class="fa fa-bars" aria-hidden="true"></i></button> </li>
		
	</ul>
</div>

<div class='container-fluid' style='background:#eee;'>
	<div class='row'>
	
		<div class='col-sm-3 col-sm-offset-2' style='padding:30px; background:#fff; height:100%;'>
			<form  action='<?php echo base_url(); ?>index.php/bank/create/add' method='post'>
				Insitituion name &nbsp;<br>
				<input type='text' name='name' required placeholder='*'/><br><br>
				
				Location &nbsp;<br>
				<input type='text' name='loc' required placeholder='*'/><br><br>
				
				Contact &nbsp;<br>
				<input type='text' name='cont' maxlength='13' required placeholder='*'/><br><br>
				
				Email &nbsp;<br>
				<input type='email' name='email' required placeholder='*'/><br><br>
				
				TIN &nbsp;<br>
				<input type='number' name='tin' maxlength='14' required placeholder='*'/><br><br>
				
				Logo &nbsp;<br>
				<input type='file' name='logo'  accept="image/png, image/jpeg" required placeholder='*'/><br>
				
				Password &nbsp;</br>
				<input type='password' name='pwd' id='pwd' maxlength='12' required placeholder='*'/><br><br>
				
				Confirm Password &nbsp;<i id='pwd_er_msg' style='color:red;'></i></br>
				<input type='password' name='pwd2' id='pwd2' maxlength='12' required placeholder='*'/><br><br>
				
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
		
		<div class='col-sm-5' style='padding:30px; background:#fff; border-left:1px solid rgba(0,0,0,0.2); height:100%;'>
			<p>Use the following form to create an ccount for your Financial Instituion.</p><hr>
			<b>Terms and conditions to follow</b>
		</div>
	
	</div>
</div>

<footer  style='padding:10px 22px 10px 22px; background:#255; color:#fff; margin:0px; font-size:14px;'>
	<ul>
		<li>A product of HingiCredit Plc. &nbsp;&nbsp;&nbsp; Terms and conditions apply</li>
		<li></li>
	</li>
</footer>