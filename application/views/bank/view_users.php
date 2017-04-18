<style>
	input,select{padding:10px; border:1px solid rgba(0,0,0,0.2);}
	li{display:inline-block; margin:10px;}
	#add_branch{font-size:13px;}
	ul{margin:0px; width:100%;}
</style>

<button class='btn btn-primary' data-toggle="collapse" data-target="#add_branch"><i class='fa fa-edit'></i> Create New User</button>

<div id="add_branch" class="collapse" style='padding:10px; background:#fff;'>
	
	<form method='post' action='<?php echo base_url();?>index.php/bank/users/create'>
		<ul>
			<li>Name: <input required type='text' name='uname' maxlength='50'/></li>
			<li>Email: <input required type='email' name='uemail' maxlength='50'/></li>
			<li>Branch: 
				<select name='branch'>
					<option>Please choose branch</option>
					<?php
						$a=$this->db->where('bank',$this->session->userdata('bud_id'))->get('branches')->result_array(); 
						foreach($a as $b){
							$name=$b['name'];
							$id=$b['id'];
							echo"<option value='".$id."'>".$name."</option>";
						}
					?>
				
				</select>
			</li>
			
			<li>Role: <select name='urole'>
				<option>Select Role</option>
				<option value='admin'>Administrator</option>
				<option value='user'>system User</option>
			</select></li>
			<li>Password: <input required type='password' name='upwd' maxlength='50'/></li>
			<li><input required type='submit' name='add_user' Value='Add User'/></li>
		</ul>
	</form>
</div>

<style>
	.td_display td{font-size:13px; padding:5px;}
	.td_display td_display:first-child td{border-right:1px solid rgba(0,0,0,0.1);}
	.td_display td{font-size:13px;border-right:1px solid rgba(0,0,0,0.1);border-bottom:1px solid rgba(0,0,0,0.1);}
	.td_display td:first-child{border-left:1px solid rgba(0,0,0,0.1);}
	.td_display  tr:first-child th{border-top:1px solid rgba(0,0,0,0.1); background:#255; color:#fff; }
	.td_display  th{border-left:1px solid rgba(0,0,0,0.1);border-bottom:1px solid rgba(0,0,0,0.1);  }
	.td_display tr:first-child  th:last-child{border-right:1px solid rgba(0,0,0,0.1); }
</style>

<br>
<div class='container-fluid' style='background:#fff;'>
	<div class='row'>
		<?php $i=1; ?>
		<table cellspacing=0 cellpadding=5 width=100% class='td_display'>
			<tr>
				<th>#</th>
				<th>NAME</th>
				<th>EMAIL</th>
				<th>BRANCH</th>
				<th>ROLE</th>
				<th>DATE CREATED</th>
				<th>ACTION</th>
			</tr>
			<?php 
			
			$link=base_url();
			//print_r(array_keys($page_data)); return;
			foreach($page_data as $acc){
				
				$bname=$this->db->select('name')->from('branches')->where('id',$acc['branch'])->get()->row()->name;
				
				echo "
					<tr >
						<td>$i</td>
						<td>".$acc['name']."</td>
						<td>".$acc['email']."</td>
						<td>".$bname."</td>
						<td>".$acc['role']."</td>
						<td>".$acc['date_added']."</td>
						<td>
							";
							if($acc['status']==1){
								echo"<a href='$link/index.php/bank/users/block/".$acc['id']."'><button class='btn btn-danger' style='padding:1px;'><i class='fa fa-remove'></i> Block</button></a> &nbsp;&nbsp;&nbsp;";
							}else {
								echo"
									<a href='$link/index.php/bank/users/delete/".$acc['id']."'><button class='btn btn-danger' style='padding:1px;'><i class='fa fa-trash-o'></i> Delete</button></a> &nbsp;&nbsp;&nbsp;
									<a href='$link/index.php/bank/users/activate/".$acc['id']."'><button class='btn btn-success' style='padding:1px;'><i class='fa fa-check'></i> Renew</button></a>
								";
							}
					echo"
						</td>
					</tr>
				";
				
				$i++;
			} ?>
			
		</table>
	
		
	</div>
</div>