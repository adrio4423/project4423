 <?php
 // scrip klik edit

$conn = mysqli_connect("localhost","root","","agenda");

 if(isset($_GET['edit'])){
	$id  		= $_GET['id'];
	$sql_edit 	= mysqli_query($conn, "SELECT * FROM siswa WHERE id_siswa = $id");
	$data_edit	= mysqli_fetch_assoc($sql_edit);

	$nis 			= $data_edit['nis'];
    $nama 			= $data_edit['nama'];
	$kelas			= $data_edit['kelas'];
	$jurusan		= $data_edit['jurusan'];	
     
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
		<h3 class="box-title">Form Data Master Siswa</h3>
	</div>
	<div class="box-body">
	
		<!-- Color Picker -->
		<form method="POST">

			<div class="input-group margin">
				Nis :
				<input class="form-control" type="text" placeholder="Nis" name="nis" value="<?php echo $nis;?>">
			</div>
			<div class="input-group margin">
				Nama :
				<input class="form-control" type="text" placeholder="Nama" name="nama" value="<?php echo $nama;?>">
			</div>
			<div class="input-group margin">
				Kelas :
				<select name="kelas" class="form-control">
					<option value="" readonly>--- PILIH ---</option>
                    <option value="X" <?php if(isset($_GET['edit']) && $kelas=="X"){ echo "selected"; }?>>10</option>
                    <option value="XI" <?php if(isset($_GET['edit']) && $kelas=="XI"){ echo "selected"; }?>>11</option>
                     <option value="XII" <?php if(isset($_GET['edit']) && $kelas=="XII"){ echo "selected"; }?>>12</option>
                </select>
			</div>
			<div class="input-group margin">
				Jurusan :
				<select name="jurusan" class="form-control">
					<option value="" readonly>--- PILIH ---</option>
                    <option value="RPL" <?php if(isset($_GET['edit']) && $jurusan=="RPL"){ echo "selected"; }?>>RPL</option>
                    <option value="TKJ" <?php if(isset($_GET['edit']) && $jurusan=="TKJ"){ echo "selected"; }?>>TKJ</option>
                    <option value="MMD" <?php if(isset($_GET['edit']) && $jurusan=="MMD"){ echo "selected"; }?>>MMD</option>
                    <option value="OTKP" <?php if(isset($_GET['edit']) && $jurusan=="OTKP"){ echo "selected"; }?>>OTKP</option>
                    <option value="TBG" <?php if(isset($_GET['edit']) && $jurusan=="TBG"){ echo "selected"; }?>>TBG</option>
                    <option value="BDP" <?php if(isset($_GET['edit']) && $jurusan=="BDP"){ echo "selected"; }?>>BDP</option>
                    <option value="HTL" <?php if(isset($_GET['edit']) && $jurusan=="HTL"){ echo "selected"; }?>>HTL</option>
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
		<h3 class="box-title">Data Master Siswa</h3>
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
					$th .= "<th>Nis</th>";
					$th .= "<th>Nama</th>";
					$th .= "<th>Kelas</th>";
					$th .= "<th>Jurusan</th>";
					$th .= "<th>Aksi</th>";
					echo $th;
					echo "</tr></thead>";
					$body .= "<tbody>";
					$no = 1;
					
					$sql = mysqli_query($conn, "SELECT * FROM siswa");
					while($data=mysqli_fetch_array($sql)){
						$body .= "<tr>";
						$body .= "<td>".$no."</td>";
						$body .= "<td>".$data['nis']."</td>";
                        $body .= "<td>".$data['nama']."</td>";
                        $body .= "<td>".$data['kelas']."</td>";
                        $body .= "<td>".$data['jurusan']."</td>";
						
						$body .= "<td><a href='index.php?mod=".$_GET['mod']."&edit&id=".$data['id_siswa']."' class='btn btn-success'>EDIT</a> <a onClick=\"javascript:return confirm('Hapus data siswa?')\" href='index.php?mod=".$_GET['mod']."&hapus&id=".$data['id_siswa']."' class='btn btn-danger'>HAPUS</a></td>";
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

	$nis 			= $_POST['nis'];
	$nama 			= $_POST['nama'];
	$kelas 			= $_POST['kelas'];
	$jurusan 		= $_POST['jurusan'];
	
    if(!empty($nis) ){
        
        if($aksi == "edit"){
    		$sql_proses = "UPDATE siswa SET nis = '$nis',nama = '$nama',kelas = '$kelas',jurusan = '$jurusan', WHERE id_siswa = $id;";		
        }else{
            $sql_proses = "INSERT INTO siswa VALUES (null,'$nis','$nama','$kelas','$jurusan');";
        }

        //die($sql_proses);
        $conn = mysqli_connect($conn, "localhost","root","","agenda");
        $query = mysqli_query($conn, $sql_proses);

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
	$query 	= mysqli_query($conn, "DELETE FROM siswa WHERE id_siswa = $id");
	
	if($query){
		echo "<script>document.location.href='index.php?mod=".$_GET['mod']."&sukses';</script>";
	}else{
		echo "<script>document.location.href='index.php?mod=".$_GET['mod']."&gagal';</script>";
	}
}
?>