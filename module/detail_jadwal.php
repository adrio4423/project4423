 <?php
 // scrip klik edit

 if(isset($_GET['edit'])){
	$id  		= $_GET['id'];
	$sql_edit 	= mysql_query("SELECT * FROM detail_jadwal WHERE id_jadwal='".$id."'");
	$data_edit	= mysql_fetch_array($sql_edit);

	$jam_m 			= $data_edit['jam_mulai'];
    $jam_a 			= $data_edit['jam_akhir'];
	$aktivitas		= $data_edit['id_aktivitas'];
	$mapel			= $data_edit['id_mapel'];	
     
    $txt_del        = "Kosongkan jika tidak update";
	
	$aksi 		    = "edit";
	
 }else{
 
	$value 		= "";
	$aksi 		= "simpan";
	
 }
 ?>
 <!-- form -->
<div class="box box-info">
	<div class="box-header">
		<h3 class="box-title">Form Data Master Jadwal</h3>
	</div>
	<div class="box-body">
	
		<!-- Color Picker -->
		<form method="POST">

			<div class="input-group margin">
				Jam Mulai :
				<input class="form-control" type="text" placeholder="" name="jam_mulai" value="<?php echo $jam_m;?>">
			</div>
			<div class="input-group margin">
				Jam Akhir :
				<input class="form-control" type="text" placeholder="" name="jam_akhir" value="<?php echo $jam_a;?>">
			</div>
			<div class="input-group margin">
				Aktivitas :
				<select name="id_aktivitas" class="form-control">
                    <option selected disabled>-- PIlih Aktivitas -- </option>
                    <?php 
                        $sql = mysql_query("select * from kegiatan");
                        while($data=mysql_fetch_array($sql)){
                            if(isset($_GET['edit'])){
                                if($data['id_aktivitas'] == $aktivitas){
                                    echo "<option value=".$data['id_aktivitas']." selected>".$data['aktivitas']."</option>";
                                }else{
                                    echo "<option value=".$data['id_aktivitas'].">".$data['aktivitas']."</option>";
                                }
                            }else{
                                echo "<option value=".$data['id_aktivitas'].">".$data['aktivitas']."</option>";
                            }
                            
                        }
                    ?>
                </select>
			</div>
			<div class="input-group margin">
				Mata Pelajaran :
			<select name="mapel" class="form-control">
                    <option selected disabled>-- PIlih Mapel -- </option>
                    <?php 
                        $sql = mysql_query("select * from mapel");
                        while($data=mysql_fetch_array($sql)){
                            if(isset($_GET['edit'])){
                                if($data['id_mapel'] == $mapel){
                                    echo "<option value=".$data['id_mapel']." selected>".$data['mapel']."</option>";
                                }else{
                                    echo "<option value=".$data['id_mapel'].">".$data['mapel']."</option>";
                                }
                            }else{
                                echo "<option value=".$data['id_mapel'].">".$data['mapel']."</option>";
                            }
                            
                        }
                    ?>
                </select>
			</div>
          
			<div class="input-group margin">
				<span class="input-group-btn">
					<input type="submit" name="simpan" value="Simpan" class="btn btn-info btn-flat">
				</span>
			</div>
		</form>
	</div><!-- /.box-body -->
</div><!-- /.box -->
 

<div class="box">
	<div class="box-header">
		<h3 class="box-title">Data Master Jadwal</h3>
	</div>
	<div class="box-body table-responsive">
		<?php 
		if(isset($_GET['sukses'])){
		?>
			<div class="alert alert-success alert-dismissable">
				<i class="fa fa-check"></i>
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
				<b>Alert!</b> Success. Menyimpan Data.
			</div>
		<?php 
		}elseif(isset($_GET['gagal'])){
		?>
			<div class="alert alert-warning alert-dismissable">
				<i class="fa fa-warning"></i>
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
				<b>Alert!</b> Warning. Data Gagal Menyimpan.
			</div>
		<?php 
		}elseif(isset($_GET['kosong'])){
		?>
			<div class="alert alert-warning alert-dismissable">
				<i class="fa fa-warning"></i>
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
				<b>Alert!</b> Warning. Data Gagal, data tidak boleh kosong.
			</div>
		<?php 
		}
		?>
		
		<table id="example1" class="table table-bordered table-striped">
			<?php 
					echo "<thead><tr>";
					$th .= "<th>No</th>";
					$th .= "<th>Jam Mulai</th>";
					$th .= "<th>Jam Akhir</th>";
					$th .= "<th>Aktivitas</th>";
					$th .= "<th>MAta Pelajaran</th>";
					$th .= "<th>Aksi</th>";
					echo $th;
					echo "</tr></thead>";
					$body .= "<tbody>";
					$no = 1;
					
					$sql = mysql_query("select * from ");
					while($data=mysql_fetch_array($sql)){
						$body .= "<tr>";
						$body .= "<td>".$no."</td>";
						$body .= "<td>".$data['jam_mulai']."</td>";
                        $body .= "<td>".$data['jam_akhir']."</td>";
                        $body .= "<td>".$data['id_aktivitas']."</td>";
                        $body .= "<td>".$data['id_mapel']."</td>";
						
						$body .= "<td><a href='index.php?mod=".$_GET['mod']."&edit&id=".$data['id_jadwal']."' class='btn btn-success'>EDIT</a> <a onClick=\"javascript:return confirm('Hapus data jadwal?')\" href='index.php?mod=".$_GET['mod']."&hapus&id=".$data['id_jadwal']."' class='btn btn-danger'>HAPUS</a></td>";
						$body .= "</tr>";
						$no++;
					}
					$body .= "</tbody>";
					
					echo $body;
				
			?>
		</table>
	</div>
</div>
<?php
// script simpan dan edit
if(isset($_POST['simpan'])){

	$jam_m 			= $_POST['jam_mulai'];
	$jam_a			= $_POST['jam_akhir'];
	$aktivitas 		= $_POST['id_aktivitas'];
	$mapel			= $_POST['id_mapel'];
	
    if(!empty($aktivitas) ){
        
        if($aksi == "edit"){
    		$sql_proses = "UPDATE detail_jadwal SET nis='".$nis."',nama='".$nama."', kelas='".$kelas."', jurusan='".$jurusan."' WHERE id_siswa='".$id."';";		
        }else{
           $sql_proses = "INSERT INTO `detail_jadwal` VALUES ( null,'".$nis."', '".$nama."', '".$kelas."', '".$jurusan  	."');";
        }

        //die($sql_proses);
        $query = mysql_query($sql_proses);

        if($query){
            echo "<script>document.location.href='index.php?mod=".$_GET['mod']."&sukses';</script>";
        }else{
            echo "<script>document.location.href='index.php?mod=".$_GET['mod']."&gagal';</script>";
        }
    }else{
        echo "<script>document.location.href='index.php?mod=".$_GET['mod']."&kosong';</script>";
    }
}

//script hapus
if(isset($_GET['hapus'])){
	$id 	= $_GET['id'];
	$query 	= mysql_query("DELETE FROM detail_jadwal WHERE id_jadwal='".$id."'");
	
	if($query){
		echo "<script>document.location.href='index.php?mod=".$_GET['mod']."&sukses';</script>";
	}else{
		echo "<script>document.location.href='index.php?mod=".$_GET['mod']."&gagal';</script>";
		
	}
}
?>
