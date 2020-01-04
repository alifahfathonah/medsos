<table class="table table-bordered table-striped tableAll">
	<thead>
		<tr>
			<th>No.</th>
			<th>Nama Channel</th>
			<th>Chat ID Bot</th>
			<th>API Token</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>	                	
		<?php 
			$i=1;
			$query = $this->db->query("SELECT * FROM telegram_channel");
			foreach ($query->result() as $row){              	
		?>             
		    <tr>
				<td><center><?php echo $i; ?></center></td>
				<td><center><?php echo $row->channel_name; ?></center></td>
				<td><center><?php echo $row->chat_id; ?></center></td>
				<td><center><?php echo $row->api_token; ?></center></td>
				<td>
					<center>
						<input type="button" value="Edit" class="btn btn-success btn-xs editChannel" id="<?php echo $row->id_channel;?>"/>
						<input type="button" value="Delete" class="btn btn-danger btn-xs deleteChannel" id="<?php echo $row->id_channel;?>"/>
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