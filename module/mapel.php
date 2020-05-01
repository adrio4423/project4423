 <?php
 // scrip klik edit

$conn = mysqli_connect("localhost","root","","agenda");

 if(isset($_GET['edit'])){
	$id  		= $_GET['id'];
	$sql_edit 	= mysqli_query($conn, "SELECT * FROM mapel WHERE id_mapel='".$id."'");
	$data_edit	= mysqli_fetch_assoc($sql_edit);

	
    $mapel 			= $data_edit['mapel'];
	
     
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
		<h3 class="box-title">Form Data Master Mata Pelajaran</h3>
	</div>
	<div class="box-body">
	
		<!-- Color Picker -->
		<form method="POST">

			<div class="input-group margin">
				Mata Pelajaran :
				<input class="form-control" type="text" placeholder="Mata Pelajaran" name="mapel" value="<?php echo $mapel;?>">
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
		<h3 class="box-title">Data Master Mata Pelajaran</h3>
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
					$th .= "<th>Mata Pelajaran</th>";
					$th .= "<th>Aksi</th>";
					echo $th;
					echo "</tr></thead>";
					$body .= "<tbody>";
					$no = 1;
					
					$sql = mysqli_query($conn,"SELECT * FROM mapel");
					while($data=mysqli_fetch_array($sql)){
						$body .= "<tr>";
						$body .= "<td>".$no."</td>";
                        $body .= "<td>".$data['mapel']."</td>";
						
						$body .= "<td><a href='index.php?mod=".$_GET['mod']."&edit&id=".$data['id_mapel']."' class='btn btn-success'>EDIT</a> <a onClick=\"javascript:return confirm('Hapus data Mata Pelajaran?')\" href='index.php?mod=".$_GET['mod']."&hapus&id=".$data['id_mapel']."' class='btn btn-danger'>HAPUS</a></td>";
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

	$mapel 			= $_POST['mapel'];
	
    if(!empty($mapel) ){
        
        if($aksi == "edit"){
    		$sql_proses = "UPDATE mapel SET mapel='".$mapel."' WHERE id_mapel='".$id."';";		
        }else{
            $sql_proses = "INSERT INTO mapel VALUES (NULL, '".$mapel."');";
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
	$query 	= mysql_query("DELETE FROM mapel WHERE id_mapel='".$id."'");
	
	if($query){
		echo "<script>document.location.href='index.php?mod=".$_GET['mod']."&sukses';</script>";
	}else{
		echo "<script>document.location.href='index.php?mod=".$_GET['mod']."&gagal';</script>";
		
	}
}
?>
