<table class="table table-bordered table-striped tableAll">
	<thead>
		<tr>
			<th>No.</th>
			<th>Nama Proses</th>
			<th>Waktu Awal Proses</th>
			<th>Looping</th>
			<th>Loping Setiap</th>
			<th>Channel ID</th>
			<th>Konten</th>
			<th>Aksi</th>

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
				<td><center><?php echo $row->api_token; ?></center></td>
				<td><center><?php echo $row->api_token; ?></center></td>
				<td><center><?php echo $row->api_token; ?></center></td>
				<td>
					<center>
						<input type="button" value="Edit" class="btn btn-success btn-xs editChannel" id="<?php echo $row->id_channel;?>"/>
						<input type="button" value="Delete" class="btn btn-primary btn-xs deleteChannel" id="<?php echo $row->id_channel;?>"/>
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