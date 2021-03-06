<style>
	input{padding:10px; border:1px solid rgba(0,0,0,0.2);}
	li{display:inline-block;}
	#add_branch{font-size:13px;}
	ul{margin:0px; width:100%;}
</style>

<button class='btn btn-primary' data-toggle="collapse" data-target="#add_branch"><i class='fa fa-edit'></i> Create New</button>

<div id="add_branch" class="collapse" style='padding:10px; background:#fff;'>
	<b>Fill in the details to create new form.</b>
	<form method='post' action='<?php echo base_url();?>index.php/bank/branches/create'>
		<ul>
			<li>Branch Name: <input required type='text' name='branch' maxlength='50'/></li>
			<li>Location: <input required type='text' name='bloc' maxlength='50'/></li>
			<li>Contact: <input required type='number' name='bcont' maxlength='14'/></li>
			<li><input required type='submit' name='add_brach_sub' Value='Add Branch'/></li>
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
				<th>CONTACT</th>
				<th>LOCATION</th>
				<th>USERS</th>
				<th>ACTION</th>
			</tr>
			<?php 
			
			$link=base_url();
			//print_r(array_keys($page_data)); return;
			foreach($page_data as $acc){
				echo "
					<tr >
						<td>$i</td>
						<td>".$acc['name']."</td>
						<td>".$acc['contact']."</td>
						<td>".$acc['location']."</td>
						<td>".$acc['users']."</td>
						<td>
							";
							if($acc['status']==1){
								echo"<a href='$link/index.php/bank/branches/block/".$acc['id']."'><button class='btn btn-danger' style='padding:1px;'><i class='fa fa-remove'></i> Block</button></a> &nbsp;&nbsp;&nbsp;";
							}else {
								echo"
									<a href='$link/index.php/bank/branches/delete/".$acc['id']."'><button class='btn btn-danger' style='padding:1px;'><i class='fa fa-trash-o'></i> Delete</button></a> &nbsp;&nbsp;&nbsp;
									<a href='$link/index.php/bank/branches/activate/".$acc['id']."'><button class='btn btn-success' style='padding:1px;'><i class='fa fa-check'></i> Renew</button></a>
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