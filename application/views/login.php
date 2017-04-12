
	<style>
		input{padding:10px; margin-bottom:10px; width:100%; border:1px solid rgba(0,0,0,0.2);}
		input[type="submit"]{border-radius:0px; width:50%; text-align:center;}
		#login_form{box-shadow:0px 0px 2px 0px rgba(0,0,0,0.2); padding:30px; border-radius:8px; background:#fff; }
		.btn-primary{background:#255; color:#fff;}
	</style>
	
	
	<body style='background:#eee;'>
		<div class='container-fluid' style='padding:40px; position:relative; top:20%;' >
			<div class='row'>
				
				<div class='col-sm-4 col-sm-offset-4' id='login_form'>
					<div><h1>HingiCredit</h1></div>
					<form action='<?php echo base_url(); ?>index.php/home/auth' method='post' role='form'>
						<input type='text' name='email' placeholder="Email or username" /><br>
						<input type='password' name='pwd' placeholder="Password" /><br>
						<input type='submit' name='login' value="Login" class='btn btn-primary'/>
					</form>
					
					<?php if($msg) {echo $msg;} ?>
					
					<a href='<?php echo base_url(); ?>index.php/bank/create'><span><i class='fa fa-plus'></i>&nbsp;Create account</span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<span><i class='fa fa-key'></i>&nbsp;Forgot password</span>
				</div>
			</div>
		</div>
	</body>
	
	
</html>