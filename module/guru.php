 <?php
 // scrip klik edit

 if(isset($_GET['edit'])){
	$id  		= $_GET['id'];
	$sql_edit 	= mysql_query("SELECT * FROM guru WHERE id_guru='".$id."'");
	$data_edit	= mysql_fetch_array($sql_edit);
	
    $nip 			= $data_edit['nip'];
	$nama 			= $data_edit['nama'];
	$jk        		= $data_edit['jk'];
	$mapel			= $data_edit['mapel']; 
     
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
		<h3 class="box-title">Form Data Master Guru</h3>
	</div>
	<div class="box-body">
	
		<!-- Color Picker -->
		<form method="POST">
			<div class="input-group margin">
				NIP :
				<input class="form-control" type="text" placeholder="NIP" name="nip" value="<?php echo $nip;?>">
			</div>
            <div class="input-group margin">
				Nama Lengkap :
				<input class="form-control" type="text" placeholder="Nama Lengkap" name="nama" value="<?php echo $nama;?>">
			</div>
            <div class="input-group margin">
				JK :
				<select name="jk" class="form-control">
					<option selected disabled>--- Jenis Kelamin ---</option>
                    <option value="L" <?php if(isset($_GET['edit']) && $jk=="L"){ echo "selected"; }?>>Laki-Laki</option>
                    <option value="P" <?php if(isset($_GET['edit']) && $jk=="P"){ echo "selected"; }?>>Perempuan</option>
                </select>
			</div>
			<div class="input-group margin">
				Mata Pelajaran :
				<select name="mapel" class="form-control">
                    <option selected disabled>-- Selecet Mapel -- </option>
                    <?php 
                        $sql = mysql_query("select * from mapel");
                        while($data=mysql_fetch_array($sql)){
                            if(isset($_GET['edit'])){
                                if($data['mapel'] == $mapel){
                                    echo "<option value=".$data['mapel']." selected>".$data['mapel']."</option>";
                                }else{
                                    echo "<option value=".$data['mapel'].">".$data['mapel']."</option>";
                                }
                            }else{
                                echo "<option value=".$data['mapel'].">".$data['mapel']."</option>";
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
		<h3 class="box-title">Data Master Guru</h3>
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
					$th .= "<th>NIP</th>";
					$th .= "<th>NAMA</th>";
					$th .= "<th>JENIS KELAMIN</th>";
					$th .= "<th>MAPEL</th>";
					$th .= "<th>Aksi</th>";
					echo $th;
					echo "</tr></thead>";
					$body .= "<tbody>";
					$no = 1;
					
					$sql = mysql_query("select * from guru");
					while($data=mysql_fetch_array($sql)){
						$body .= "<tr>";
						$body .= "<td>".$no."</td>";
						
						$body .= "<td>".$data['nip']."</td>";
						$body .= "<td>".$data['nama']."</td>";
                        $body .= "<td>".$data['jk']."</td>";
                        $body .= "<td>".$data['mapel']."</td>";
						
						$body .= "<td><a href='index.php?mod=".$_GET['mod']."&edit&id=".$data['id_guru']."' class='btn btn-success'>EDIT</a> <a onClick=\"javascript:return confirm('Hapus data guru?')\" href='index.php?mod=".$_GET['mod']."&hapus&id=".$data['id_guru']."' class='btn btn-danger'>HAPUS</a></td>";
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

	$nip 			= $_POST['nip'];
	$nama			= $_POST['nama'];
	$jk        		= $_POST['jk'];
	$mapel 			= $_POST['mapel'];
    
	$id 			= $_GET['id'];
	
    if(!empty($nama) && !empty($nip) && !empty($jk) && !empty($mapel)){
        

        if($aksi == "edit"){
           $sql_proses = "UPDATE guru SET nip='".$nip."', nama='".$nama."', jk='".$jk."', mapel='".$mapel."' WHERE id_guru='".$id."';";		
        }else{
            $sql_proses = "INSERT INTO `guru` VALUES (NULL, '".$nip."', '".$nama."', '".$jk."', '".$mapel."');";
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
	$query 	= mysql_query("DELETE FROM guru WHERE id_guru='".$id."'");
	
	if($query){
		echo "<script>document.location.href='index.php?mod=".$_GET['mod']."&sukses';</script>";
	}else{
		echo "<script>document.location.href='index.php?mod=".$_GET['mod']."&gagal';</script>";
		
	}
}
?>
