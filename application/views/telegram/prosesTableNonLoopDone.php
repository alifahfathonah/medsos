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
			$query = $this->db->query("SELECT * FROM telegram_proses A INNER JOIN telegram_channel B ON A.CHANNEL_ID = B.ID_CHANNEL WHERE A.status='1' AND A.looping='0'");
			foreach ($query->result() as $row){              	
		?>             
		    <tr>
				<td><center><?php echo $i; ?></center></td>
				<td><center><?php echo $row->nama_proses; ?></center></td>
				<td><center><?php echo $this->Fungsi->dateTime2($row->startdatetime); ?></center></td>
				<td><center><?php echo $row->channel_name; ?></center></td>
				<td><center><a href="#" class="viewKonten" id="<?php echo $row->id_telegram_proses;?>">View</a></center></td>
				<td>
					<center>
						<input type="button" value="Edit" class="btn btn-success btn-xs editChannel" id="<?php echo $row->id_telegram_proses;?>"/>
						<input type="button" value="Delete" class="btn btn-danger btn-xs deleteChannel" id="<?php echo $row->id_telegram_proses;?>"/>
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