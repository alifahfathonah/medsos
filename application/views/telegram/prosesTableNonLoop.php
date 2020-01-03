<table class="table table-bordered table-striped tableAll">
	<thead>
		<tr>
			<th>No.</th>
			<th>Nama Proses</th>
			<th>Waktu Proses</th>
			<th>Channel ID</th>
			<th>Konten</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>	                	
		<?php 
			$i=1;
			$query = $this->db->query("SELECT * FROM telegram_proses WHERE status='0' AND looping='0'");
			foreach ($query->result() as $row){              	
		?>             
		    <tr>
				<td><center><?php echo $i; ?></center></td>
				<td><center><?php echo $row->nama_proses; ?></center></td>
				<td><center><?php echo $this->Fungsi->dateTime2($row->startdatetime); ?></center></td>
				<td><center><?php echo $row->channel_id; ?></center></td>
				<td><center>View</center></td>
				<td>
					<center>
						<input type="button" value="Edit" class="btn btn-success btn-xs editChannelModal" id="<?php echo $row->id_telegram_proses;?>"/>
						<input type="button" value="Delete" class="btn btn-danger btn-xs deleteProsesModal" id="<?php echo $row->id_telegram_proses;?>"/>
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