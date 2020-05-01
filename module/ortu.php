 <?php
 // scrip klik edit

 if(isset($_GET['edit'])){
	$id  		= $_GET['id'];
	$sql_edit 	= mysql_query("SELECT * FROM ortu WHERE id_ortu='".$id."'");
	$data_edit	= mysql_fetch_array($sql_edit);

	$nik 			= $data_edit['nik'];
    $nama 			= $data_edit['nama'];
	$nis			= $data_edit['nis'];	
     
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
		<h3 class="box-title">Form Data Master Orangtua</h3>
	</div>
	<div class="box-body">
	
		<!-- Color Picker -->
		<form method="POST">

			<div class="input-group margin">
				nik :
				<input class="form-control" type="text" placeholder="nik" name="nik" value="<?php echo $nik;?>">
			</div>
			<div class="input-group margin">
				Nama :
				<input class="form-control" type="text" placeholder="Nama" name="nama" value="<?php echo $nama;?>">
			</div>
			<div class="input-group margin">
				Nis :
				<select name="nis" class="form-control">
                    <option selected disabled>-- Select Nis -- </option>
                    <?php 
                        $sql = mysql_query("select * from siswa");
                        while($data=mysql_fetch_array($sql)){
                            if(isset($_GET['edit'])){
                                if($data['nis'] == $nis){
                                    echo "<option value=".$data['nis']." selected>".$data['nis']."</option>";
                                }else{
                                    echo "<option value=".$data['nis'].">".$data['nis']."</option>";
                                }
                            }else{
                                echo "<option value=".$data['nis'].">".$data['nis']."</option>";
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
		<h3 class="box-title">Data Master Orangtua</h3>
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
					$th .= "<th>nik</th>";
					$th .= "<th>Nama</th>";
					$th .= "<th>Nis</th>";
					$th .= "<th>Aksi</th>";
					echo $th;
					echo "</tr></thead>";
					$body .= "<tbody>";
					$no = 1;
					
					$sql = mysql_query("select * from ortu");
					while($data=mysql_fetch_array($sql)){
						$body .= "<tr>";
						$body .= "<td>".$no."</td>";
						$body .= "<td>".$data['nik']."</td>";
                        $body .= "<td>".$data['nama']."</td>";
                        $body .= "<td>".$data['nis']."</td>";
						
						$body .= "<td><a href='index.php?mod=".$_GET['mod']."&edit&id=".$data['id_ortu']."' class='btn btn-success'>EDIT</a> <a onClick=\"javascript:return confirm('Hapus data orangtua?')\" href='index.php?mod=".$_GET['mod']."&hapus&id=".$data['id_ortu']."' class='btn btn-danger'>HAPUS</a></td>";
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

	$nik 			= $_POST['nik'];
	$nama 			= $_POST['nama'];
	$nis 			= $_POST['nis'];
	
    if(!empty($nik) ){
        
        if($aksi == "edit"){
    		$sql_proses = "UPDATE ortu SET nik='".$nik."',nama='".$nama."', nis='".$nis."' WHERE id_siswa='".$id."';";		
        }else{
           $sql_proses = "INSERT INTO `ortu` VALUES ( null,'".$nik."', '".$nama."', '".$nis."');";
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
	$query 	= mysql_query("DELETE FROM ortu WHERE id_ortu='".$id."'");
	
	if($query){
		echo "<script>document.location.href='index.php?mod=".$_GET['mod']."&sukses';</script>";
	}else{
		echo "<script>document.location.href='index.php?mod=".$_GET['mod']."&gagal';</script>";
		
	}
}
?>
