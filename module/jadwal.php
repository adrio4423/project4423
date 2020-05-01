<div class="box box-info">
	<div class="box-header">
		<h3 class="box-title">Form Jadwal</h3>
	</div>
	<div class="box-body">
	
		<!-- Color Picker -->
		<form method="POST">

			<div class="input-group margin">
				Nis :
				<input class="form-control" type="text" placeholder="Nis" name="nis" value="<?php echo $nis;?>">
			</div>
			<table id="example1" class="table table-bordered table-striped">
			<?php 
					echo "<thead><tr>";
					$th .= "<th>No</th>";
					$th .= "<th>Jam Mulai</th>";
					$th .= "<th>Jam AKhir</th>";
					$th .= "<th>Aktivitas</th>";
					$th .= "<th>Mata Pelajaran</th>";
					
					echo $th;
					echo "</tr></thead>";
					$body .= "<tbody>";
					$no = 1;
					
					$sql = mysqli_query($conn,"SELECT * FROM detail_jadwal");
					while($data=mysqli_fetch_array($sql)){
						$body .= "<tr>";
						$body .= "<td>".$no."</td>";
						$body .= "<td>".$data['jam_mulai']."</td>";
						$body .= "<td>".$data['jam_akhir']."</td>";
						$body .= "<td>".$data['id_aktivitas']."</td>";
                        $body .= "<td>".$data['id_mapel']."</td>";
						
						$body .= "</tr>";
						$no++;
					}
					$body .= "</tbody>";
					
					echo $body;
				
			?>
		</table>
			</div>
		</form>
	</div><!-- /.box-body -->
</div><!-- /.box -->
 
