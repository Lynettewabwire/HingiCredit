<head>
	<title>Admin Panel - hingiCredit</title>
	<link rel='stylesheet' href='<?php echo base_url(); ?>assets/css/fontawesome.css'  type='text/css'/>
	<link rel='stylesheet' href='<?php echo base_url(); ?>assets/css/bootstrap.css'  type='text/css'/>
	<link rel='stylesheet' href='<?php echo base_url(); ?>assets/js/bootstrap.js'  type='text/css'/>
</head>

<style>
	body{padding:0px; margin:0px; width:100%; height:100%; font-family:trebuchet Ms;}
	ul{padding:0px; margin:0px;}
	a{text-decoration:none; color:inherit;}
	li{list-style:none;}

	.head_menu{padding:10px 22px 10px 22px; background:#255; color:#fff; margin:0px;}

	.head_menu li{list-style:none; display:inline-block; text-decoration:none; margin:5px;}
	.head_menu li:first-child{padding:0px 40px 0px 40px; font-weight:bold;}
	.head_menu li:nth-child(3){padding:0px 40px 0px 40px; }

	input[type='search']{border-radius:10px; background:#eee; border:none; outline:none; padding:5px; margin:0px; width:300px;}
	.vertical_menu{ height:100%; color:#333; padding:0px; background:#fff;}
	.vertical_menu li{display:block; padding:10px 15px 10px 15px; font-size:14px; font-weight:bold;}
	.vertical_menu li:hover{color:#fff; background:#255; border-left:2px solid #dc134c;}
	.response_div{padding:10px; margin:10px; overflow-Y:scroll; height:97%;  pbox-shadow:0px 0px 2px 0px rgba(0,0,0,0.2); }
	.head_boxes{height:100px; margin:5px; padding:20px; background:#fff; box-shadow:0px 0px 2px 0px rgba(0,0,0,0.2); border-radius:3px;}
	section{height:50; width:50; text-align:center; border-radius:50%; background:#eee;}

	.btn-primary{border-radius:none !important;}
</style>

<body>
	<div class='head_menu'>
		<ul>
			<li>HingiCredit</li>
			<li><button style='background:none; border:none; color:#fff; font-weight:bold;' id='menu_toggle'><i class="fa fa-bars" aria-hidden="true"></i></button> </li>
			<li><b style='padding-left:30px; opacity:0.5;'><?php echo $this->session->userdata('bname'); ?> | Dashboard</b></li>
		</ul>
	</div>

	<div>
		<table cellpadding=0 cellspacing=0 border=0 width=100% height=86.4%>
			<tr>
				<td  width='15%' valign='top' class='vertical_menu_t0ggle'>
					<div class='vertical_menu'>
						<ul>
							<a href='<?php echo base_url(); ?>index.php/bank/dashboard'><li><i class='fa fa-tachometer'></i> &nbsp; Dashboard</li></a>
							<a href='<?php echo base_url(); ?>index.php/bank/users'><li><i class='fa fa-user-o'></i> &nbsp; User Accounts</li></a>
							<a href='<?php echo base_url(); ?>index.php/bank/branches'><li><i class='fa fa-bank'></i> &nbsp; Branches</li></a>
							<a href='<?php echo base_url(); ?>index.php/bank/application'><li><i class='fa fa-edit'></i> &nbsp; New Application</li></a>
							<a href='<?php echo base_url(); ?>index.php/bank/report'><li><i class='fa fa-file-o'></i> &nbsp; Report</li></a>
							<a href='<?php echo base_url(); ?>index.php/bank/profile'><li><i class='fa fa-user-circle'></i> &nbsp; Profile</li></a>
							<a href='<?php echo base_url(); ?>index.php/bank/logout'><li><i class='fa fa-sign-out'></i> &nbsp; Logout</li></a>

						</ul>
					</div>
				</td>
				<td valign='top' style='background:#eee;'>

					<div class='response_div'>

						<?php
							if(isset($view)){
								$this->load->view($view);
							}
						?>

					</div>
				</td>
			</tr>
		</table>
	</div>
</body>


<script>
	$("#menu_toggle").click(function(){
		$(".vertical_menu_t0ggle").toggle();
	});
</script>
<footer  style='padding:10px 22px 10px 22px; background:#255; color:#fff; margin:0px; font-size:14px;'>
			<ul>
				<li>A product of HingiCredit Plc. &nbsp;&nbsp;&nbsp; Terms and conditions apply</li>
				<li></li>
			</li>
</footer>
