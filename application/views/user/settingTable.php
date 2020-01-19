<table class="table table-bordered table-striped tableAll">
	<thead>
		<tr>
			<th>No.</th>
			<th>Nama</th>
			<th>Username</th>
			<th>Role</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>	                	
		<?php 
			$i=1;
			$query = $this->db->query("SELECT *,
											CASE
											    WHEN role = 0 THEN 'User Only'
											    ELSE 'Super Admin'
											END AS roleUser
										FROM master_user");
			foreach ($query->result() as $row){              	
		?>             
		    <tr>
				<td><center><?php echo $i; ?></center></td>
				<td><center><?php echo $row->nama; ?></center></td>
				<td><center><?php echo $row->username; ?></center></td>
				<td><center><?php echo $row->roleUser; ?></center></td>
				<td>
					<center>
						<input type="button" value="Edit" class="btn btn-success btn-xs editUser" id="<?php echo $row->id_user;?>"/>
						<input type="button" value="Delete" class="btn btn-danger btn-xs deleteUser" id="<?php echo $row->id_user;?>"/>
						<br/>																								
					</center>
				</td>
		    </tr>	
		<?php
				$i++;
			}
		?>
	</tbody>
</table>
<script type="text/javascript">
	    //data table
    $(document).ready(function() {
        $('.tableAll').DataTable();
    });  
</script>